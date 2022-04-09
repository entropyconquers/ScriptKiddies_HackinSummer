package com.brodevs.attendify

import android.content.Context
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.view.View
import android.widget.Button

class Startup : AppCompatActivity() {
    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_startup)
        var startBtn: View = findViewById(R.id.startBtn)
        startBtn.setOnClickListener {
            var sharedPreferences = getSharedPreferences( "attendify" , Context.MODE_PRIVATE )
            sharedPreferences.edit().putBoolean( "first_time" , false ).apply()
            val intent = Intent(this, home::class.java)
            startActivity(intent)
            //finish()
        }
    }
}