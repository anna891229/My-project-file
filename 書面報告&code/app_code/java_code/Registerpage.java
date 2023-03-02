package com.example.a111project1;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.Objects;


public class Registerpage extends Activity {

    Button btnSignup;
    EditText inputID, inputpwd, inputEmail;
    TextView result1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_registerpage);

        inputID = findViewById(R.id.inputID);
        inputpwd = findViewById(R.id.inputpwd);
        inputEmail = findViewById(R.id.inputEmail);

        btnSignup =findViewById(R.id.buttonSignup);       // Signup
        btnSignup.setOnClickListener(v -> {
            Thread thread = new Thread(mutiThread);
            thread.start(); // 開始執行
        });

    }

    private final Runnable mutiThread = new Runnable() {
        String a="";
        public void run() {

            try {
                URL url = new URL("https://8e3d-163-14-44-237.jp.ngrok.io/forecast/register.php?"+"userid="+inputID.getText().toString()+"&userpwd="+inputpwd.getText().toString()+"&useremail="+inputEmail.getText().toString());
                // 開始宣告 HTTP 連線需要的物件，這邊通常都是一綑的
                HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                // 建立 Google 比較挺的 HttpURLConnection 物件
                connection.setRequestMethod("POST");
                // 設定連線方式為 POST
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
                if (responseCode == HttpURLConnection.HTTP_OK) {
                    // 如果 HTTP 回傳狀態是 OK ，而不是 Error
                    //輸出資料到php

                    //讀取php echo內容
                    InputStream inputStream = connection.getInputStream();
                    // 取得輸入串流
                    BufferedReader bufReader = new BufferedReader(new InputStreamReader(inputStream, "utf-8"), 8);
                    // 讀取輸入串流的資料
                    String box = ""; // 宣告存放用字串
                    String line = null; // 宣告讀取用的字串
                    while ((line = bufReader.readLine()) != null) {
                        box += line + "\n";
                        // 每當讀取出一列，就加到存放字串後面
                    }
                    inputStream.close(); // 關閉輸入串流
                    a = box; // 把存放用字串放到全域變數
                }
                // 讀取輸入串流並存到字串的部分
                // 取得資料後想用不同的格式
                // 例如 Json 等等，都是在這一段做處理

            } catch (Exception e) {
                a = e.toString(); // 如果出事，回傳錯誤訊息
            }

            // 當這個執行緒完全跑完後執行
            runOnUiThread(new Runnable() {
                public void run() {
                    String[] c =a.split("<br/ >");
                    // c[0]為true or false
                    String s = "True";
                    if(c[0].equals(s)){
                        Intent intent = new Intent();
                        intent.setClass(Registerpage.this,Loginpage.class);
                        Bundle bundle = new Bundle();
                        bundle.putString("id", inputID.getText().toString());//行業別打包帶到下一頁面
                        intent.putExtras(bundle);   // 記得put進去，不然資料不會帶過去
                        startActivity(intent);
                    }
                    else{
                        result1 = findViewById(R.id.textView6);
                        result1.setText(c[0]);
                    }
                }
            });

        }
    };
}