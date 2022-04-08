package com.brodevs.attendify

import android.content.Intent
import android.os.Bundle
import android.view.View
import androidx.appcompat.app.AppCompatActivity
import com.brodevs.attendify.model.FaceNetModel
import com.brodevs.attendify.model.Models


class home : AppCompatActivity() {
    companion object {

        public lateinit var faceNetModel : FaceNetModel
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
        setContentView(R.layout.activity_home)
        faceNetModel = FaceNetModel( this , modelInfo , useGpu , useXNNPack )
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