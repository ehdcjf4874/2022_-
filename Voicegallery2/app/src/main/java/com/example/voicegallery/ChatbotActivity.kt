package com.example.voicegallery
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import org.json.JSONObject
import org.w3c.dom.Text

class ChatbotActivity : AppCompatActivity() {

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        val question = findViewById<EditText>(R.id.txt_question)
        val button = findViewById<Button>(R.id.button)
        val theAnswer = findViewById<TextView>(R.id.txt_answer)

        var painting = "별이 빛나는 밤에" // 위치에 따른 작품이름 설정
        val chatbotProc1 = ChatbotProc()

        button.setOnClickListener {
            var user_question = question.text.toString()
            Thread {
                var answer = chatbotProc1.chatbot(painting + user_question ) // network 동작, 인터넷에서 xml을 받아오는 코드
               //Log.e(" 기법1",answer.toString())
                var jsonObject = JSONObject(answer)
                var bubbles = jsonObject.getJSONArray("bubbles")
                var jsonObject2 = JSONObject(bubbles[0].toString())
                var data = jsonObject2.getJSONObject("data")
                var description = data.getString("description")
                theAnswer.setText(description.toString())

            }.start()
        }

    }

}
