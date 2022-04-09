package com.brodevs.attendify

import android.content.ContentValues.TAG
import android.content.Context
import android.content.Intent
import android.os.AsyncTask
import android.os.Bundle
import android.util.Log
import android.view.View
import android.widget.Button
import androidx.appcompat.app.AppCompatActivity
import com.brodevs.attendify.model.FaceNetModel
import com.brodevs.attendify.model.Models
import kotlinx.coroutines.*


class doAsync(val handler: () -> Unit) : AsyncTask<Void, Void, Void>() {
    override fun doInBackground(vararg params: Void?): Void? {
        handler()
        return null
    }
}
class home : AppCompatActivity(), CoroutineScope by MainScope() {
    companion object {

        lateinit var faceNetModel : FaceNetModel
    }
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

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        var sharedPreferences = getSharedPreferences( "attendify" , Context.MODE_PRIVATE )
        var firstTime = sharedPreferences.getBoolean( "first_time" , true )

        if(firstTime){

            val intent = Intent(this, Startup::class.java)
            startActivity(intent)
            //finish()
        }
        else{
            setContentView(R.layout.activity_home)
            doAsync {
                faceNetModel = FaceNetModel( applicationContext , modelInfo , useGpu , useXNNPack )
            }.execute()

        }
        var new_emp_btn:View = findViewById(R.id.frame_2)
        new_emp_btn.setOnClickListener {
            val intent = Intent(this, enter_details::class.java)
            startActivity(intent)
            finish()
        }


        var entry_btn: View = findViewById(R.id.frame_3)
        entry_btn.setOnClickListener {
            val intent = Intent(this, MainActivity::class.java)
// To pass any data to next activity
            intent.putExtra("keyIdentifier", "value")
// start your next activity
            startActivity(intent)
        }
    }
}