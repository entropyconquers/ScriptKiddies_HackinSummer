package com.brodevs.attendify

import android.annotation.SuppressLint
import android.annotation.TargetApi
import android.app.Activity
import android.content.ClipData
import android.content.ClipboardManager
import android.content.ContentUris
import android.content.ContentValues.TAG
import android.content.Intent
import android.content.pm.PackageManager
import android.graphics.Bitmap
import android.graphics.BitmapFactory
import android.graphics.Matrix
import android.net.Uri
import android.os.Build
import android.os.Bundle
import android.provider.DocumentsContract
import android.provider.MediaStore
import android.text.Editable
import android.util.Base64
import android.util.Log
import android.widget.*
import androidx.annotation.RequiresApi
import androidx.appcompat.app.AppCompatActivity
import androidx.core.app.ActivityCompat
import androidx.core.content.ContextCompat
import androidx.core.content.FileProvider
import androidx.core.text.isDigitsOnly
import java.io.*
import java.nio.file.Files
import java.nio.file.Paths


private var REQUEST_CODE = 0

class enter_details : AppCompatActivity() {
    private var mImageView: ImageView? = null
    private var mUri: Uri? = null
    private var faceImage: Bitmap? = null
    //Our widgets
    private lateinit var btnCapture: Button
    private lateinit var btnChoose : Button
    //Our constants
    private val OPERATION_CAPTURE_PHOTO = 1
    private val OPERATION_CHOOSE_PHOTO = 2

    private fun initializeWidgets() {
        btnCapture = findViewById(R.id.button3)
        btnChoose = findViewById(R.id.button2)
        mImageView = findViewById(R.id.imageView7)
    }

    private fun show(message: String) {
        Toast.makeText(this,message,Toast.LENGTH_SHORT).show()
    }
    private fun capturePhoto(){
        val capturedImage = File(externalCacheDir, "My_Captured_Photo.jpg")
        if(capturedImage.exists()) {
            capturedImage.delete()
        }
        capturedImage.createNewFile()
        mUri = if(Build.VERSION.SDK_INT >= 24){
            FileProvider.getUriForFile(this, "com.brodevs.attendify.fileprovider",
                capturedImage)
        } else {
            Uri.fromFile(capturedImage)
        }

        val intent = Intent("android.media.action.IMAGE_CAPTURE")
        intent.putExtra(MediaStore.EXTRA_OUTPUT, mUri)
        startActivityForResult(intent, OPERATION_CAPTURE_PHOTO)
    }
    private fun openGallery(){
        val intent = Intent("android.intent.action.GET_CONTENT")
        intent.type = "image/*"
        startActivityForResult(intent, OPERATION_CHOOSE_PHOTO)
    }
    private fun renderImage(imagePath: String?){
        if (imagePath != null) {
            val bitmap = BitmapFactory.decodeFile(imagePath)
            faceImage = bitmap
            mImageView?.setImageBitmap(bitmap)
        }
        else {
            show("ImagePath is null")
        }
    }
    @SuppressLint("Range")
    private fun getImagePath(uri: Uri?, selection: String?): String {
        var path: String? = null
        val cursor = uri?.let { contentResolver.query(it, null, selection, null, null ) }
        if (cursor != null){
            if (cursor.moveToFirst()) {
                path = cursor.getString(cursor.getColumnIndex(MediaStore.Images.Media.DATA))
            }
            cursor.close()
        }
        return path!!
    }
    fun RotateBitmap(source: Bitmap, angle: Float): Bitmap? {
        val matrix = Matrix()
        matrix.postRotate(angle)
        return Bitmap.createBitmap(source, 0, 0, source.width, source.height, matrix, true)
    }
    @TargetApi(19)
    private fun handleImageOnKitkat(data: Intent?) {
        var imagePath: String? = null
        val uri = data!!.data
        //DocumentsContract defines the contract between a documents provider and the platform.
        if (DocumentsContract.isDocumentUri(this, uri)){
            val docId = DocumentsContract.getDocumentId(uri)
            if (uri != null) {
                if ("com.android.providers.media.documents" == uri.authority){
                    val id = docId.split(":")[1]
                    val selsetion = MediaStore.Images.Media._ID + "=" + id
                    imagePath = getImagePath(MediaStore.Images.Media.EXTERNAL_CONTENT_URI,
                        selsetion)
                } else if ("com.android.providers.downloads.documents" == uri.authority){
                    val contentUri = ContentUris.withAppendedId(Uri.parse(
                        "content://downloads/public_downloads"), java.lang.Long.valueOf(docId))
                    imagePath = getImagePath(contentUri, null)
                }
            }
        }
        else if (uri != null) {
            if ("content".equals(uri.scheme, ignoreCase = true)){
                imagePath = getImagePath(uri, null)
            }
            else if ("file".equals(uri.scheme, ignoreCase = true)){
                imagePath = uri.path
            }
        }
        renderImage(imagePath)
    }

    override fun onRequestPermissionsResult(requestCode: Int, permissions: Array<out String>
                                            , grantedResults: IntArray) {
        super.onRequestPermissionsResult(requestCode, permissions, grantedResults)
        when(requestCode){
            1 ->
                if (grantedResults.isNotEmpty() && grantedResults.get(0) ==
                    PackageManager.PERMISSION_GRANTED){
                    openGallery()
                }else {
                    show("Unfortunately You are Denied Permission to Perform this Operataion.")
                }
        }
    }

    override fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
        super.onActivityResult(requestCode, resultCode, data)
        when(requestCode){
            OPERATION_CAPTURE_PHOTO ->
                if (resultCode == Activity.RESULT_OK) {
                    var bitmap = BitmapFactory.decodeStream(
                        mUri?.let { getContentResolver().openInputStream(it) })
                    if(REQUEST_CODE==1){
                        bitmap = RotateBitmap(bitmap, 90f)
                    }
                    else{
                        bitmap = RotateBitmap(bitmap, 0f)
                    }
                    faceImage = bitmap
                    mImageView!!.setImageBitmap(bitmap)
                }
            OPERATION_CHOOSE_PHOTO ->
                if (resultCode == Activity.RESULT_OK) {
                    if (Build.VERSION.SDK_INT >= 19) {
                        handleImageOnKitkat(data)
                    }
                }
        }
    }



    @RequiresApi(Build.VERSION_CODES.O)
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_enter_details)


        val mEditText = findViewById<EditText>(R.id.name)
        val designation1 = findViewById<EditText>(R.id.designation)
        val employeeno = findViewById<EditText>(R.id.employee_no)
        val radioGroup = findViewById<RadioGroup>(R.id.radioGroup)
        val symbols = "0123456789/?!:;%"

        val radioMale : RadioButton = findViewById(R.id.male)
        radioMale.isChecked = true
        var radioButtonID: Int = radioGroup.getCheckedRadioButtonId()
        var radioButton: RadioButton = radioGroup.findViewById(radioButtonID)

        val mButtonSave = findViewById<Button>(R.id.button);
        /*
        val imageclick1 = findViewById<View>(R.id.addPhotoBtn);
        fun getPhotoFile(fileName: String): File {
            // Use `getExternalFilesDir` on Context to access package-specific directories.
            val destPath: String = applicationContext.getExternalFilesDir(null)!!.getAbsolutePath() + "/images/${employeeno.text}/"
            //val storageDirectory = getExternalFilesDir(Environment.DIRECTORY_PICTURES)
            return File.createTempFile(fileName, ".jpg", File(destPath))
        }
        imageclick1.setOnClickListener {

            val takePictureIntent = Intent(MediaStore.ACTION_IMAGE_CAPTURE)
            photoFile = getPhotoFile(FILE_NAME)
            val destPath: String = applicationContext.getExternalFilesDir(null)!!.getAbsolutePath() + "/images/${employeeno.text}/"

            val fileProvider = FileProvider.getUriForFile(this, "Attendfiy Jpeg ", photoFile)
            takePictureIntent.putExtra(MediaStore.EXTRA_OUTPUT, fileProvider)
            if (takePictureIntent.resolveActivity(this.packageManager) != null) {
                startActivityForResult(takePictureIntent, REQUEST_CODE)
            } else {
                Toast.makeText(this, "Unable to open camera", Toast.LENGTH_SHORT).show()
            }

        }



        fun onActivityResult(requestCode: Int, resultCode: Int, data: Intent?) {
            if (requestCode == REQUEST_CODE && resultCode == Activity.RESULT_OK) {
//            val takenImage = data?.extras?.get("data") as Bitmap
                val takenImage = BitmapFactory.decodeFile(photoFile.absolutePath)
            } else {
                super.onActivityResult(requestCode, resultCode, data)
            }


        }
        */
        initializeWidgets()

        btnCapture.setOnClickListener{
            REQUEST_CODE = 1
            capturePhoto()
        }
        btnChoose.setOnClickListener{
            REQUEST_CODE = 2
            //check permission at runtime
            val checkSelfPermission = ContextCompat.checkSelfPermission(this,
                android.Manifest.permission.WRITE_EXTERNAL_STORAGE)
            if (checkSelfPermission != PackageManager.PERMISSION_GRANTED){
                //Requests permissions to be granted to this application at runtime
                ActivityCompat.requestPermissions(this,
                    arrayOf(android.Manifest.permission.WRITE_EXTERNAL_STORAGE), 1)
            }
            else{
                openGallery()
            }
        }



        var Address: EditText = findViewById(R.id.address)

        mButtonSave.setOnClickListener{
            var name:String = ""
            var designation:String
            var emp_num:String = ""
            var gender:String
            var address: String
            var check: Boolean= true

            if(mEditText.text.toString().isNotEmpty()  ||  (mEditText.text.any {it in symbols})){
                name = mEditText.text.toString()

            } else {
                check = false
                Toast.makeText(applicationContext, "Enter Name", Toast.LENGTH_SHORT).show()
            }
            if(designation1.text.toString().isNotEmpty()  ||  (designation1.text.any {it in symbols} ))
                run {
                    designation = designation1.text.toString()

                } else {
                check = false
                Toast.makeText(applicationContext, "Enter Designation", Toast.LENGTH_SHORT).show()
            }
            if(employeeno.text.toString().isNotEmpty() &&  employeeno.text.toString().isDigitsOnly()) {
                    emp_num = employeeno.text.toString()
            } else {
                check = false
                Toast.makeText(applicationContext, "Enter Employee ID", Toast.LENGTH_SHORT).show()
            }
            radioButtonID = radioGroup.getCheckedRadioButtonId()
            radioButton = radioGroup.findViewById(radioButtonID)

            if (radioButton.isChecked()){
                gender = radioButton.text.toString()

            } else {
                check = false
                Toast.makeText(applicationContext, "Choose one gender", Toast.LENGTH_SHORT).show()
            }
            if(Address.text.toString().isNotEmpty() ){
                address = Address.text.toString()
            }
            else{
                check = false
                Toast.makeText(applicationContext, "Enter office address", Toast.LENGTH_SHORT).show()
            }
            val destPath: String = applicationContext.getExternalFilesDir(null)!!.getAbsolutePath() + "/images/${emp_num}/"
            if(faceImage != null && check){
                val destPath: String = applicationContext.getExternalFilesDir(null)!!.getAbsolutePath() + "/images/${emp_num}/"

                Files.createDirectories(Paths.get(destPath));
                val path = destPath
                var fOut: OutputStream? = null
                val counter = 0
                val file = File(
                    path,
                    "${name}.jpg"
                ) // the File to save , append increasing numeric counter to prevent files from getting overwritten.

                fOut = FileOutputStream(file)

                val pictureBitmap: Bitmap = faceImage as Bitmap // obtaining the Bitmap

                pictureBitmap.compress(
                    Bitmap.CompressFormat.JPEG,
                    85,
                    fOut
                ) // saving the Bitmap to a file compressed as a JPEG with 85% compression rate

                fOut.flush() // Not really required

                fOut.close() // do not forget to close the stream


                MediaStore.Images.Media.insertImage(
                    contentResolver,
                    file.absolutePath,
                    file.name,
                    file.name
                )
            }
            else {
                check = false
            }
            if(check){
                doAsync {
                    try {
                        val bitmap = faceImage
                        // initialize byte stream
                        val stream = ByteArrayOutputStream()
                        // compress Bitmap
                        if (bitmap != null) {
                            bitmap.compress(Bitmap.CompressFormat.JPEG, 100, stream)
                        }
                        // Initialize byte array
                        val bytes = stream.toByteArray()
                        // get base64 encoded string
                         val sImage = Base64.encodeToString(bytes, Base64.DEFAULT)
                        // set encoded text on textview
                        


                    } catch (e: IOException) {
                        e.printStackTrace()
                    }

                }.execute()
                //implement data entry
            }


        }




    }
}

fun getFileToByte(filePath: String?): String? {
    var bmp: Bitmap? = null
    var bos: ByteArrayOutputStream? = null
    var bt: ByteArray? = null
    var encodeString: String? = null
    try {
        bmp = BitmapFactory.decodeFile(filePath)
        bos = ByteArrayOutputStream()
        bmp.compress(Bitmap.CompressFormat.JPEG, 100, bos)
        bt = bos.toByteArray()
        encodeString = Base64.encodeToString(bt, Base64.DEFAULT)
    } catch (e: Exception) {
        e.printStackTrace()
    }
    return encodeString
}


private fun Editable.any(predicate: (Char) -> Unit, any: Any) {

}