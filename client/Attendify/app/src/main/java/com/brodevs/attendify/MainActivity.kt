
package com.brodevs.attendify

import android.Manifest
import android.content.ContentValues.TAG
import android.content.Context
import android.content.Intent
import android.content.SharedPreferences
import android.content.pm.PackageManager
import android.graphics.Bitmap
import android.media.ExifInterface
import android.net.Uri
import android.os.Build
import android.os.Bundle
import android.text.method.ScrollingMovementMethod
import android.util.Log
import android.util.Size
import android.view.View
import android.view.WindowInsets
import android.widget.Button
import android.widget.TextView
import android.widget.Toast
import androidx.activity.result.contract.ActivityResultContracts
import androidx.annotation.RequiresApi
import androidx.appcompat.app.AlertDialog
import androidx.appcompat.app.AppCompatActivity
import androidx.camera.core.CameraSelector
import androidx.camera.core.ImageAnalysis
import androidx.camera.core.Preview
import androidx.camera.lifecycle.ProcessCameraProvider
import androidx.camera.view.PreviewView
import androidx.core.app.ActivityCompat
import androidx.core.content.ContextCompat
import androidx.lifecycle.LifecycleOwner
import com.android.volley.Request
import com.android.volley.Response
import com.android.volley.toolbox.JsonObjectRequest
import com.android.volley.toolbox.StringRequest
import com.android.volley.toolbox.Volley
import com.brodevs.attendify.model.FaceNetModel
import com.brodevs.attendify.model.Models
import com.budiyev.android.codescanner.AutoFocusMode
import com.budiyev.android.codescanner.CodeScanner
import com.budiyev.android.codescanner.CodeScannerView
import com.budiyev.android.codescanner.DecodeCallback
import com.budiyev.android.codescanner.ErrorCallback
import com.budiyev.android.codescanner.ScanMode
import com.google.common.util.concurrent.ListenableFuture
import org.json.JSONException
import org.json.JSONObject
import java.io.*
import java.text.SimpleDateFormat
import java.util.*
import java.util.concurrent.Executors


class MainActivity : AppCompatActivity() {

    private var isSerializedDataStored = false

    // Serialized data will be stored ( in app's private storage ) with this filename.
    private val SERIALIZED_DATA_FILENAME = "image_data"

    // Shared Pref key to check if the data was stored.
    private val SHARED_PREF_IS_DATA_STORED_KEY = "is_data_stored"

    private lateinit var previewView : PreviewView
    private lateinit var frameAnalyser  : FrameAnalyser
    private lateinit var faceNetModel : FaceNetModel
    private lateinit var fileReader : FileReader
    private var scanResult: String? = null
    private lateinit var sharedPreferences: SharedPreferences

    // <----------------------- User controls --------------------------->

    // Use the device's GPU to perform faster computations.
    // Refer https://www.tensorflow.org/lite/performance/gpu
    private val useGpu = true

    // Use XNNPack to accelerate inference.
    // Refer https://blog.tensorflow.org/2020/07/accelerating-tensorflow-lite-xnnpack-integration.html
    private val useXNNPack = true

    // You may the change the models here.
    // Use the model configs in Models.kt
    // Default is Models.FACENET ; Quantized models are faster
    private val modelInfo = Models.FACENET

    // <---------------------------------------------------------------->


    companion object {
        lateinit var indentifier: String
        lateinit var logTextView : TextView
        lateinit var loadingView: View
        lateinit var markedView: View
        lateinit var markedTime: TextView
        lateinit var empName: TextView
        lateinit var markBtn: View
        lateinit var markText: TextView
        lateinit var empNo: String
        lateinit var cameraProviderFuture : ListenableFuture<ProcessCameraProvider>
        fun setMessage( message : String ) {
            logTextView.text = message
        }
        fun buildMarkedView(context: Context, userData: JSONObject){
            markedView.visibility = View.VISIBLE
            logTextView.visibility = View.GONE
            empName.text = userData["name"].toString()
            val sdf = SimpleDateFormat("HH:mm")
            val currentDate = sdf.format(Date())
            markedTime.text = indentifier.uppercase() + " " +currentDate
            markText.text = "Mark ${indentifier}"

        }



        fun getData(context: Context, userID:String) {
            empNo = userID
            loadingView.visibility = View.VISIBLE
            val queue = Volley.newRequestQueue(context)
            val jsonObject = JSONObject()

            try {

                Log.d(TAG,"BONES:"+userID)
                jsonObject.put("employee_number", userID)


            } catch (e: JSONException) {
                // handle exception
                Log.i("json_error: ", "$e")
            }
            val apiLink = "https://95i7arxys8.execute-api.ap-south-1.amazonaws.com/api/employee?employee_number=${userID}"


            HttpsTrustManager.allowAllSSL();


            var obj = JSONObject()
// Request a string response from the provided URL.
            val stringRequest = StringRequest(Request.Method.GET, apiLink,
                { response ->
                    loadingView.visibility = View.GONE
                    obj = JSONObject(response)
                    buildMarkedView(context, obj)
                    // Display the first 500 characters of the response string.
                    Log.d(TAG,"Response is: ${response}")
                },
                {
                    loadingView.visibility = View.GONE
                })

// Add the request to the RequestQueue.
            queue.add(stringRequest)

        }
        fun stopCameraPreview(context: Context, userID: String) {
            val cameraProvider = cameraProviderFuture.get()
            cameraProvider.unbindAll()
            getData(context, userID)
        }
        fun stopCameraPreview() {
            val cameraProvider = cameraProviderFuture.get()
            cameraProvider.unbindAll()

        }


    }

    private var gpsTracker: GpsTracker? = null
    fun getLocation(): Pair<String, String>? {
        val p : Pair<String,String>?
        gpsTracker = GpsTracker(this@MainActivity)
        if (gpsTracker!!.canGetLocation()) {
            val latitude = gpsTracker!!.getLatitude()
            val longitude = gpsTracker!!.getLongitude()

            Log.d(TAG,"lat:"+latitude)
            Log.d(TAG,"long:"+longitude)
            p = Pair(latitude.toString(),longitude.toString())
            return p
        } else {
            gpsTracker!!.showSettingsAlert()
        }
        return null
    }
    fun goHome(){
        val intent = Intent(this, home::class.java)
        startActivity(intent)
        finish()
    }
    fun sendPostRequest  (
        params: ArrayList<Pair<String, String>>,
        apiLink: String
    ) {
        var res: String = ""
        loadingView.visibility = View.VISIBLE
        val queue = Volley.newRequestQueue(this)
        val jsonObject = JSONObject()

        try {
            for(obj in params) {
                jsonObject.put(obj.first, obj.second)
            }

        } catch (e: JSONException) {
            // handle exception
            Log.i("json_error: ", "$e")
        }

        val putRequest: JsonObjectRequest =
            object : JsonObjectRequest(
                Method.POST, apiLink, jsonObject,
                Response.Listener { response ->
                    // response
                    Log.i("response: ", "$response")
                    loadingView.visibility = View.GONE
                    var obj = JSONObject(response.toString())
                    if(obj["success"] as Boolean){
                        Toast.makeText(this, "Successfully recorded ${indentifier} time", Toast.LENGTH_LONG).show()
                        goHome()
                    }
                    else{
                        Toast.makeText(this, obj["message"].toString(), Toast.LENGTH_LONG).show()
                        goHome()
                    }
                    //val intent = Intent(this, home::class.java)
                    //startActivity(intent)
                    //finish()
                },
                Response.ErrorListener { error ->
                    // error
                    loadingView.visibility = View.GONE
                    Toast.makeText(this, "error: "+ "$error", Toast.LENGTH_LONG).show()
                    Log.i("error: ", "$error")
                }
            ) {

                override fun getHeaders(): Map<String, String> {
                    val headers: MutableMap<String, String> =
                        HashMap()
                    headers["Content-Type"] = "application/json"
                    headers["Accept"] = "application/json"
                    return headers
                }

                override fun getBody(): ByteArray {
                    Log.i("json", jsonObject.toString())
                    return jsonObject.toString().toByteArray(charset("UTF-8"))
                }

            }
        queue.add(putRequest)
    }
    private lateinit var codeScanner: CodeScanner
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)

        // Remove the status bar to have a full screen experience
        // See this answer on SO -> https://stackoverflow.com/a/68152688/10878733
        if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.R) {
            window.decorView.windowInsetsController!!
                .hide( WindowInsets.Type.statusBars() or WindowInsets.Type.navigationBars())
        }
        else {
            window.decorView.systemUiVisibility = View.SYSTEM_UI_FLAG_FULLSCREEN

        }
        setContentView(R.layout.activity_main)
        val REQUEST_LOCATION = 1
        ActivityCompat.requestPermissions(
            this,
            arrayOf(Manifest.permission.ACCESS_FINE_LOCATION,Manifest.permission.CAMERA),
            REQUEST_LOCATION
        )

        loadingView = findViewById(R.id.loading)
        loadingView.visibility = View.GONE
        markedView = findViewById(R.id.markLayout)
        markBtn = findViewById(R.id.markBtn)
        markText = findViewById(R.id.markText)
        markedTime = findViewById(R.id.time)
        empName = findViewById(R.id.emp_name)
        val newString: String?
        newString = if (savedInstanceState == null) {
            val extras = intent.extras
            extras?.getString("keyIdentifier")
        } else {
            savedInstanceState.getSerializable("keyIdentifier") as String?
        }
        if (newString != null) {
            indentifier = newString
        }
        // Implementation of CameraX preview

        previewView = findViewById( R.id.preview_view )
        logTextView = findViewById( R.id.log_textview )
        logTextView.movementMethod = ScrollingMovementMethod()
        // Necessary to keep the Overlay above the PreviewView so that the boxes are visible.
         val boundingBoxOverlay = findViewById<BoundingBoxOverlay>( R.id.bbox_overlay )
        //boundingBoxOverlay.setWillNotDraw( false )
        //boundingBoxOverlay.setZOrderOnTop( true )
        var altAuthSetupBtn: Button = findViewById(R.id.altAuth)
        val scannerView = findViewById<CodeScannerView>(R.id.scanner_view)
        val backButton:Button = findViewById(R.id.back)
        backButton.setOnClickListener {
            scannerView.visibility = View.GONE
            backButton.visibility = View.GONE
        }

        altAuthSetupBtn.setOnClickListener {
            scannerView.visibility = View.VISIBLE
            backButton.visibility = View.VISIBLE
            try {
                codeScanner = CodeScanner(this, scannerView)
            }
            catch (e: Exception) {
                // handler
            }

            // Parameters (default values)
            codeScanner.camera = CodeScanner.CAMERA_BACK // or CAMERA_FRONT or specific camera id
            codeScanner.formats = CodeScanner.ALL_FORMATS // list of type BarcodeFormat,
            // ex. listOf(BarcodeFormat.QR_CODE)
            codeScanner.autoFocusMode = AutoFocusMode.SAFE // or CONTINUOUS
            codeScanner.scanMode = ScanMode.SINGLE // or CONTINUOUS or PREVIEW
            codeScanner.isAutoFocusEnabled = true // Whether to enable auto focus or not
            codeScanner.isFlashEnabled = false // Whether to enable flash or not

            // Callbacks
            codeScanner.decodeCallback = DecodeCallback {
                runOnUiThread {
                    loadingView.visibility = View.VISIBLE
                    Toast.makeText(this, "Scan successful", Toast.LENGTH_LONG).show()
                    var num = it.text.toString().substring(it.text.toString().length-1).toIntOrNull()
                    Log.d(TAG, "NUM:: $num")
                    Log.d(TAG, "STR:: ${it.text.toString().substring(num!!,it.text.toString().length-1)}")
                    scanResult = it.text.toString().substring(num!!,it.text.toString().length-1)
                    val apiLink = "https://95i7arxys8.execute-api.ap-south-1.amazonaws.com/api/employee?android_id=${scanResult}"
                    stopCameraPreview()

                    HttpsTrustManager.allowAllSSL();

                    val queue = Volley.newRequestQueue(this)
                    val jsonObject = JSONObject()
                    var obj = JSONObject()
// Request a string response from the provided URL.
                    val stringRequest = StringRequest(Request.Method.GET, apiLink,
                        { response ->
                            loadingView.visibility = View.GONE
                            obj = JSONObject(response)
                            Log.d(TAG,"Response is: ${response}")
                            empNo = obj["id"].toString()
                            buildMarkedView(this, obj)
                            // Display the first 500 characters of the response string.

                        },
                        {
                            loadingView.visibility = View.GONE
                        })

// Add the request to the RequestQueue.
                    queue.add(stringRequest)

                    scannerView.visibility = View.GONE
                    altAuthSetupBtn.visibility = View.GONE

                }
            }
            codeScanner.errorCallback = ErrorCallback { // or ErrorCallback.SUPPRESS
                runOnUiThread {
                    Toast.makeText(this, "Camera initialization error: ${it.message}",
                        Toast.LENGTH_LONG).show()
                    scannerView.visibility = View.GONE
                }
            }
            codeScanner.startPreview()

        }
        markBtn.setOnClickListener {
            var p = getLocation()
            if(p==null){
                Toast.makeText(this,"Can't fetch location", Toast.LENGTH_SHORT).show()
                goHome()
            }
            else{
                loadingView.visibility = View.VISIBLE
                val queue = Volley.newRequestQueue(this)
                val apiLink = "https://95i7arxys8.execute-api.ap-south-1.amazonaws.com/api/employee/verify?employee_number=${empNo}&user_latitude=${p.first}0&user_longitude=${p.second}"


                HttpsTrustManager.allowAllSSL();


                var obj = JSONObject()
// Request a string response from the provided URL.
                val stringRequest = StringRequest(Request.Method.GET, apiLink,
                    { response ->
                        loadingView.visibility = View.GONE
                        obj = JSONObject(response)
                        if(obj["valid"] as Boolean){
                            var list: ArrayList<Pair<String,String>> = ArrayList()
                            list.add(Pair("employee_number", empNo))
                            sendPostRequest(list,"https://95i7arxys8.execute-api.ap-south-1.amazonaws.com/api/employee/${indentifier}")
                        }
                        else{
                            Toast.makeText(this,"Address not within 100m range", Toast.LENGTH_SHORT).show()
                            goHome()
                        }
                        // Display the first 500 characters of the response string.
                        Log.d(TAG,"Response is: ${response}")
                    },
                    {
                        loadingView.visibility = View.GONE
                    })

// Add the request to the RequestQueue.
                queue.add(stringRequest)
            }

        }
        doAsync {
            faceNetModel = home.faceNetModel
            frameAnalyser = FrameAnalyser( this , boundingBoxOverlay , home.faceNetModel)
            fileReader = FileReader(home.faceNetModel)
            sharedPreferences = getSharedPreferences( getString( R.string.app_name ) , Context.MODE_PRIVATE )
            //isSerializedDataStored = sharedPreferences.getBoolean( SHARED_PREF_IS_DATA_STORED_KEY , false )
            launchChooseDirectoryIntent()
            if ( ActivityCompat.checkSelfPermission( this , Manifest.permission.CAMERA ) != PackageManager.PERMISSION_GRANTED ) {
                requestCameraPermission()
            }
            else {
                startCameraPreview()
            }
        }.execute()

        // We'll only require the CAMERA permission from the user.
        // For scoped storage, particularly for accessing documents, we won't require WRITE_EXTERNAL_STORAGE or
        // READ_EXTERNAL_STORAGE permissions. See https://developer.android.com/training/data-storage



        /*if ( !isSerializedDataStored ) {

            Logger.log( "No serialized data was found. Select the images directory.")
            //showSelectDirectoryDialog()
        }
        else {
            val alertDialog = AlertDialog.Builder( this ).apply {
                setTitle( "Serialized Data")
                setMessage( "Existing image data was found on this device. Would you like to load it?" )
                setCancelable( false )
                setNegativeButton( "LOAD") { dialog, which ->
                    dialog.dismiss()
                    frameAnalyser.faceList = loadSerializedImageData()
                    Logger.log( "Serialized data loaded.")
                }
                setPositiveButton( "RESCAN") { dialog, which ->
                    dialog.dismiss()
                    launchChooseDirectoryIntent()
                }
                create()
            }
            alertDialog.show()
        }
        */


    }

    // ---------------------------------------------- //



    // Attach the camera stream to the PreviewView.
    private fun startCameraPreview() {
        cameraProviderFuture = ProcessCameraProvider.getInstance( this )
        cameraProviderFuture.addListener({
            val cameraProvider = cameraProviderFuture.get()
            bindPreview(cameraProvider) },
            ContextCompat.getMainExecutor(this) )
    }

    private fun bindPreview(cameraProvider : ProcessCameraProvider) {
        val preview : Preview = Preview.Builder().build()
        val cameraSelector : CameraSelector = CameraSelector.Builder()
            .requireLensFacing( CameraSelector.LENS_FACING_FRONT )
            .build()
        preview.setSurfaceProvider( previewView.surfaceProvider )
        val imageFrameAnalysis = ImageAnalysis.Builder()
            .setTargetResolution(Size( 480, 640 ) )
            .setBackpressureStrategy(ImageAnalysis.STRATEGY_KEEP_ONLY_LATEST)
            .build()
        imageFrameAnalysis.setAnalyzer(Executors.newSingleThreadExecutor(), frameAnalyser )
        cameraProvider.bindToLifecycle(this as LifecycleOwner, cameraSelector, preview , imageFrameAnalysis  )
    }

    // We let the system handle the requestCode. This doesn't require onRequestPermissionsResult and
    // hence makes the code cleaner.
    // See the official docs -> https://developer.android.com/training/permissions/requesting#request-permission
    private fun requestCameraPermission() {
        cameraPermissionLauncher.launch( Manifest.permission.CAMERA )
    }

    private val cameraPermissionLauncher = registerForActivityResult( ActivityResultContracts.RequestPermission() ) {
        isGranted ->
        if ( isGranted ) {
            startCameraPreview()
        }
        else {
            val alertDialog = AlertDialog.Builder( this ).apply {
                setTitle( "Camera Permission")
                setMessage( "The app couldn't function without the camera permission." )
                setCancelable( false )
                setPositiveButton( "ALLOW" ) { dialog, which ->
                    dialog.dismiss()
                    requestCameraPermission()
                }
                setNegativeButton( "CLOSE" ) { dialog, which ->
                    dialog.dismiss()
                    finish()
                }
                create()
            }
            alertDialog.show()
        }

    }


    // ---------------------------------------------- //


    // Open File chooser to choose the images directory.
    private fun showSelectDirectoryDialog() {
        val alertDialog = AlertDialog.Builder( this ).apply {
            setTitle( "Select Images Directory")
            setMessage( "As mentioned in the project\'s README file, please select a directory which contains the images." )
            setCancelable( false )
            setPositiveButton( "SELECT") { dialog, which ->
                dialog.dismiss()
                launchChooseDirectoryIntent()
            }
            create()
        }
        alertDialog.show()
    }


    private fun launchChooseDirectoryIntent() {
        val destPath: String = applicationContext.getExternalFilesDir(null)!!.getAbsolutePath() + "/images/"
        val files = File(destPath).listFiles()
        val fileNames = arrayOfNulls<String>(files.size)
        files?.mapIndexed { index, item ->
            fileNames[index] = item?.name
        }

        //val tree = DocumentFile.fromTreeUri(this, childrenUri)
        val images = ArrayList<Pair<String,Bitmap>>()
        Log.d(TAG,"DESTPATH: "+fileNames)
        for (fileName in fileNames) {
            val imgs_path = "$destPath$fileName/"
            val image_files = File(imgs_path).listFiles()
            image_files?.mapIndexed { index, item ->
                Log.d(TAG,"DESTPATH: "+imgs_path+item)
                images.add(Pair( fileName , getFixedBitmap( Uri.fromFile( File(item.absolutePath))  ) ) as Pair<String, Bitmap>)
            }
        }
        Log.d(TAG,"DESTPATH: "+images)
        var errorFound = false
        if ( !errorFound ) {
            Log.d(TAG, "DISTPATH2: "+images.toString())
            fileReader.run( images , fileReaderCallback )
            //Logger.log( "Detecting faces in ${images.size} images ..." )
        }
    /*Log.d(TAG,"DESTPATH: "+destPath)
        //var uri = Uri.fromFile( File(destPath))
        val dirUri = it.data?.data ?: return@registerForActivityResult
        //val dirUri = uri
        Log.d(TAG,"DESTPATH: "+dirUri)
        val childrenUri =
            DocumentsContract.buildChildDocumentsUriUsingTree(
                dirUri,
                DocumentsContract.getTreeDocumentId( dirUri )
            )
        */

        /*
        if ( tree!!.listFiles().isNotEmpty()) {
            for ( doc in tree.listFiles() ) {
                if ( doc.isDirectory && !errorFound ) {
                    val name = doc.name!!
                    for ( imageDocFile in doc.listFiles() ) {
                        try {
                            images.add( Pair( name , getFixedBitmap( imageDocFile.uri ) ) )
                        }
                        catch ( e : Exception ) {
                            errorFound = true
                            Logger.log( "Could not parse an image in $name directory. Make sure that the file structure is " +
                                    "as described in the README of the project and then restart the app." )
                            break
                        }
                    }
                    Logger.log( "Found ${doc.listFiles().size} images in $name directory" )
                }
                else {
                    errorFound = true
                    Logger.log( "The selected folder should contain only directories. Make sure that the file structure is " +
                            "as described in the README of the project and then restart the app." )
                }
            }
        }
        else {
            errorFound = true
            Logger.log( "The selected folder doesn't contain any directories. Make sure that the file structure is " +
                    "as described in the README of the project and then restart the app." )
        }
        */


        //val intent = Intent( Intent.ACTION_OPEN_DOCUMENT_TREE )
        // startForActivityResult is deprecated.
        // See this SO thread -> https://stackoverflow.com/questions/62671106/onactivityresult-method-is-deprecated-what-is-the-alternative
        //directoryAccessLauncher.launch( intent )
    }


    // Read the contents of the select directory here.
    // The system handles the request code here as well.
    // See this SO question -> https://stackoverflow.com/questions/47941357/how-to-access-files-in-a-directory-given-a-content-uri
    private val directoryAccessLauncher = registerForActivityResult( ActivityResultContracts.StartActivityForResult() ) {
        val destPath: String = applicationContext.getExternalFilesDir(null)!!.getAbsolutePath() + "/images/"
        /*Log.d(TAG,"DESTPATH: "+destPath)
        //var uri = Uri.fromFile( File(destPath))
        val dirUri = it.data?.data ?: return@registerForActivityResult
        //val dirUri = uri
        Log.d(TAG,"DESTPATH: "+dirUri)
        val childrenUri =
            DocumentsContract.buildChildDocumentsUriUsingTree(
                dirUri,
                DocumentsContract.getTreeDocumentId( dirUri )
            )
        */
        val files = File(destPath).listFiles()
        val fileNames = arrayOfNulls<String>(files.size)
        files?.mapIndexed { index, item ->
            fileNames[index] = item?.name
        }

        //val tree = DocumentFile.fromTreeUri(this, childrenUri)
        val images = ArrayList<Pair<String,Bitmap>>()
        Log.d(TAG,"DESTPATH: "+fileNames)
        for (fileName in fileNames) {
            val imgs_path = "$destPath$fileName/"
            val image_files = File(imgs_path).listFiles()
            image_files?.mapIndexed { index, item ->
                Log.d(TAG,"DESTPATH: "+imgs_path+item)
                images.add(Pair( fileName , getFixedBitmap( Uri.fromFile( File(item.absolutePath))  ) ) as Pair<String, Bitmap>)
            }
        }
        Log.d(TAG,"DESTPATH: "+images)
        var errorFound = false
        /*
        if ( tree!!.listFiles().isNotEmpty()) {
            for ( doc in tree.listFiles() ) {
                if ( doc.isDirectory && !errorFound ) {
                    val name = doc.name!!
                    for ( imageDocFile in doc.listFiles() ) {
                        try {
                            images.add( Pair( name , getFixedBitmap( imageDocFile.uri ) ) )
                        }
                        catch ( e : Exception ) {
                            errorFound = true
                            Logger.log( "Could not parse an image in $name directory. Make sure that the file structure is " +
                                    "as described in the README of the project and then restart the app." )
                            break
                        }
                    }
                    Logger.log( "Found ${doc.listFiles().size} images in $name directory" )
                }
                else {
                    errorFound = true
                    Logger.log( "The selected folder should contain only directories. Make sure that the file structure is " +
                            "as described in the README of the project and then restart the app." )
                }
            }
        }
        else {
            errorFound = true
            Logger.log( "The selected folder doesn't contain any directories. Make sure that the file structure is " +
                    "as described in the README of the project and then restart the app." )
        }
        */

        if ( !errorFound ) {
            Log.d(TAG, "DISTPATH2: "+images.toString())
            fileReader.run( images , fileReaderCallback )
            //Logger.log( "Detecting faces in ${images.size} images ..." )
        }
        else {
            /*val alertDialog = AlertDialog.Builder( this ).apply {
                setTitle( "Error while parsing directory")
                setMessage( "There were some errors while parsing the directory. Please see the log below. Make sure that the file structure is " +
                        "as described in the README of the project and then tap RESELECT" )
                setCancelable( false )
                setPositiveButton( "RESELECT") { dialog, which ->
                    dialog.dismiss()
                    launchChooseDirectoryIntent()
                }
                setNegativeButton( "CANCEL" ){ dialog , which ->
                    dialog.dismiss()
                    finish()
                }
                create()
            }
            alertDialog.show()*/
        }
    }


    // Get the image as a Bitmap from given Uri and fix the rotation using the Exif interface
    // Source -> https://stackoverflow.com/questions/14066038/why-does-an-image-captured-using-camera-intent-gets-rotated-on-some-devices-on-a
    @RequiresApi(Build.VERSION_CODES.N)
    private fun getFixedBitmap(imageFileUri : Uri ) : Bitmap {
        var imageBitmap = BitmapUtils.getBitmapFromUri( contentResolver , imageFileUri )
        val exifInterface = if (Build.VERSION.SDK_INT >= Build.VERSION_CODES.N) {
            ExifInterface( contentResolver.openInputStream( imageFileUri )!! )
        } else {
            TODO("VERSION.SDK_INT < N")
        }
        imageBitmap =
            when (exifInterface.getAttributeInt( ExifInterface.TAG_ORIENTATION ,
                ExifInterface.ORIENTATION_UNDEFINED )) {
                ExifInterface.ORIENTATION_ROTATE_90 -> BitmapUtils.rotateBitmap( imageBitmap , 90f )
                ExifInterface.ORIENTATION_ROTATE_180 -> BitmapUtils.rotateBitmap( imageBitmap , 180f )
                ExifInterface.ORIENTATION_ROTATE_270 -> BitmapUtils.rotateBitmap( imageBitmap , 270f )
                else -> imageBitmap
            }
        return imageBitmap
    }


    // ---------------------------------------------- //


    private val fileReaderCallback = object : FileReader.ProcessCallback {
        override fun onProcessCompleted(data: ArrayList<Pair<String, FloatArray>>, numImagesWithNoFaces: Int) {
            frameAnalyser.faceList = data
            saveSerializedImageData( data )
            //Logger.log( "Images parsed. Found $numImagesWithNoFaces images with no faces." )
        }
    }


    private fun saveSerializedImageData(data : ArrayList<Pair<String,FloatArray>> ) {
        val serializedDataFile = File( filesDir , SERIALIZED_DATA_FILENAME )
        ObjectOutputStream( FileOutputStream( serializedDataFile )  ).apply {
            writeObject( data )
            flush()
            close()
        }
        sharedPreferences.edit().putBoolean( SHARED_PREF_IS_DATA_STORED_KEY , true ).apply()
    }


    private fun loadSerializedImageData() : ArrayList<Pair<String,FloatArray>> {
        val serializedDataFile = File( filesDir , SERIALIZED_DATA_FILENAME )
        val objectInputStream = ObjectInputStream( FileInputStream( serializedDataFile ) )
        val data = objectInputStream.readObject() as ArrayList<Pair<String,FloatArray>>
        objectInputStream.close()
        return data
    }


}
