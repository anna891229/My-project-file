package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import org.json.JSONArray;
import org.json.JSONObject;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.lang.reflect.Array;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;
import java.util.Objects;

public class Loginpage extends Activity {

    Button ToLogin, ToSignup; //Button
    EditText userid, userpwd; // user input id & pwd
    TextView result1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_loginpage);

        userid = findViewById(R.id.inputid);//輸入的使用者id
        userpwd = findViewById(R.id.inputpwd);//輸入的使用者密碼

        ToLogin =(Button) findViewById(R.id.loginbutton);        // Login
        ToLogin.setOnClickListener(v -> {
            // 按下之後會執行的程式碼
            // 宣告執行緒
            Thread thread = new Thread(mutiThread);
            thread.start(); // 開始執行
        });

        ToSignup =(Button) findViewById(R.id.Signupbtn);       // Sign up
        ToSignup.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Loginpage.this, Registerpage.class);
            startActivity(intent);
        });
    }

    private Runnable mutiThread = new Runnable(){
        String a = "";
        public void run() {
            try {
                URL url = new URL("https://8e3d-163-14-44-237.jp.ngrok.io/forecast/user.php?account="+userid.getText().toString()+"&password="+userpwd.getText().toString());
                // 開始宣告 HTTP 連線需要的物件，這邊通常都是一綑的
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                // 建立 Google 比較挺的 HttpURLConnection 物件
                connection.setRequestMethod("POST");
                // 設定連線方式為 Get
                connection.setDoOutput(true); // 允許輸出
                connection.setDoInput(true); // 允許讀入
                connection.setUseCaches(false); // 不使用快取
                connection.connect(); // 開始連線
                // 建立取得回應的物件
                // 讀取輸入串流並存到字串的部分
                // 取得資料後想用不同的格式
                // 例如 Json 等等，都是在這一段做處理

                int responseCode =
                        connection.getResponseCode();
                // 建立取得回應的物件
                if(responseCode ==
                        HttpURLConnection.HTTP_OK){
                    // 如果 HTTP 回傳狀態是 OK ，而不是 Error
                    InputStream inputStream =
                            connection.getInputStream();
                    // 取得輸入串流
                    BufferedReader bufReader = new BufferedReader(new InputStreamReader(inputStream, "utf-8"), 8);
                    // 讀取輸入串流的資料
                    String box = ""; // 宣告存放用字串
                    String line = null; // 宣告讀取用的字串
                    while((line = bufReader.readLine()) != null) {
                        box += line + "\n";
                        // 每當讀取出一列，就加到存放字串後面
                    }
                    inputStream.close(); // 關閉輸入串流
                    a = box; // 把存放用字串放到全域變數

                }
            } catch(Exception e) {
                a = e.toString(); // 如果出事，回傳錯誤訊息
            }


            // 當這個執行緒完全跑完後執行
            runOnUiThread(new Runnable() {
                public void run() {
                    String[] c =a.split("<br/ >");
                    // c[0]為true or false
                    if(c[0].equals(userid.getText().toString()) && c[1].equals(userpwd.getText().toString())){
                        Intent intent = new Intent();
                        intent.setClass(Loginpage.this,Homepage.class);
                        Bundle bundle = new Bundle();
                        bundle.putString("id", userid.getText().toString());//行業別打包帶到下一頁面
                        intent.putExtras(bundle);   // 記得put進去，不然資料不會帶過去
                        startActivity(intent);
                    }
                    else{
                        result1 = findViewById(R.id.textView);
                        result1.setText(c[0]);
                    }

                }
            });
        }
    };
}