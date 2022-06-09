package com.example.voicegallery
import android.content.Intent
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import org.json.JSONObject
import org.w3c.dom.Text

class LoginActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_sign_in)

        val button = findViewById<Button>(R.id.btn_login)
        button.setOnClickListener {
                val nextIntent = Intent(this, ChatbotActivity::class.java)
                startActivity(nextIntent)

        }

    }

}
