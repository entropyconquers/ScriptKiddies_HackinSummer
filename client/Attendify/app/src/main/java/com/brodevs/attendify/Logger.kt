
package com.brodevs.attendify

import android.os.Handler
import android.os.Looper

// Logs message using log_textview present in activity_main.xml
class Logger {

    companion object {

        fun log( message : String ) {
            Handler(Looper.getMainLooper()).post(Runnable {
                MainActivity.setMessage( message)
            })


        }

    }

}