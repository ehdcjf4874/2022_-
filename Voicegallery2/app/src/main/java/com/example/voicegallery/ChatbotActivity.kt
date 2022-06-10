package com.example.voicegallery
import android.content.ContentValues.TAG
import androidx.appcompat.app.AppCompatActivity
import android.os.Bundle
import android.util.Log
import android.widget.Button
import android.widget.EditText
import android.widget.TextView
import com.google.gson.Gson
import com.google.gson.JsonObject
import org.json.JSONObject
import org.w3c.dom.Text
import retrofit2.Call
import retrofit2.Response
import retrofit2.Retrofit
import retrofit2.converter.gson.GsonConverterFactory
import android.net.wifi.WifiManager
import android.content.IntentFilter

import android.widget.Toast

import android.content.Intent
import android.content.BroadcastReceiver
import android.content.Context
import android.net.ConnectivityManager
import android.net.wifi.WifiInfo
import androidx.core.content.ContextCompat.getSystemService
import com.google.android.material.internal.ContextUtils.getActivity


class ChatbotActivity : AppCompatActivity() {

    lateinit var mRetrofit :Retrofit // 사용할 레트로핏 객체입니다.
    lateinit var mRetrofitAPI: RetrofitAPI // 레트로핏 api객체입니다.
    lateinit var mCallTodoList : retrofit2.Call<JsonObject> // Json형식의 데이터를 요청하는 객체입니다.

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        setContentView(R.layout.activity_main)

        // 수신 신호 강도를 구한다
        Log.e("info", IntentFilter(WifiManager.WIFI_STATE_CHANGED_ACTION).toString())

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

        setRetrofit()
        callTodoList()
    }

    private fun setRetrofit(){
        //레트로핏으로 가져올 url설정하고 세팅
         mRetrofit = Retrofit
            .Builder()
            .baseUrl("http://172.20.10.4:8000/")
            .addConverterFactory(GsonConverterFactory.create())
            .build()

        //인터페이스로 만든 레트로핏 api요청 받는 것 변수로 등록
         mRetrofitAPI = mRetrofit.create(RetrofitAPI::class.java)
    }

    private fun callTodoList() {
        mCallTodoList = mRetrofitAPI.getTodoList(1,2,3,4) // RetrofitAPI에서 Json객체 요청을 반환하는 메서드를 불러옵니다.
        mCallTodoList.enqueue(mRetrofitCallback) // 콜백, 즉 응답들을 큐에 넣어 대기시켜놓습니다. 응답이 생기면 뱉어내는거죠.
    }

    //http요청을 보냈고 이건 응답을 받을 콜벡메서드
    private val mRetrofitCallback  = (object : retrofit2.Callback<JsonObject>{//Json객체를 응답받는 콜백 객체

        //응답을 가져오는데 실패
        override fun onFailure(call: Call<JsonObject>, t: Throwable) {
            t.printStackTrace()
            Log.d(TAG, "에러입니다. => ${t.message.toString()}")
//            textView.text = "에러\n" + t.message.toString()
//
//            progressBar.visibility = View.GONE
//            button1.visibility = View.VISIBLE
        }
        //응답을 가져오는데 성공 -> 성공한 반응 처리
        override fun onResponse(call: Call<JsonObject>, response: Response<JsonObject>) {
            val result = response.body()
            Log.d(TAG, "결과는 => $result")

//            var mGson = Gson()
//            val dataParsed1 = mGson.fromJson(result, DataModel.TaskInfo::class.java)

        }
    })


}
