package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class Yield_rank extends AppCompatActivity {
    Button Search,tohome,toREhome;
    Spinner year;
    TextView rankdist1,rankdist2,rankdist3,rankdist4,rankdist5,rankdist6,rankdist7,rankdist8,rankdist9,rankdist10,rankdist11,rankdist12,
            rankprice1,rankprice2,rankprice3,rankprice4,rankprice5,rankprice6,rankprice7,rankprice8,rankprice9,rankprice10,rankprice11,rankprice12;
    String chooseyear;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_yield_rank);


        rankdist1 = findViewById(R.id.rankdist1);
        rankdist2 = findViewById(R.id.rankdist2);
        rankdist3 = findViewById(R.id.rankdist3);
        rankdist4 = findViewById(R.id.rankdist4);
        rankdist5 = findViewById(R.id.rankdist5);
        rankdist6 = findViewById(R.id.rankdist6);
        rankdist7 = findViewById(R.id.rankdist7);
        rankdist8 = findViewById(R.id.rankdist8);
        rankdist9 = findViewById(R.id.rankdist9);
        rankdist10 = findViewById(R.id.rankdist10);
        rankdist11 = findViewById(R.id.rankdist11);
        rankdist12 = findViewById(R.id.rankdist12);

        rankprice1 = findViewById(R.id.rankprice1);
        rankprice2 = findViewById(R.id.rankprice2);
        rankprice3 = findViewById(R.id.rankprice3);
        rankprice4 = findViewById(R.id.rankprice4);
        rankprice5 = findViewById(R.id.rankprice5);
        rankprice6 = findViewById(R.id.rankprice6);
        rankprice7 = findViewById(R.id.rankprice7);
        rankprice8 = findViewById(R.id.rankprice8);
        rankprice9 = findViewById(R.id.rankprice9);
        rankprice10 = findViewById(R.id.rankprice10);
        rankprice11 = findViewById(R.id.rankprice11);
        rankprice12 = findViewById(R.id.rankprice12);


        year = findViewById(R.id.age);  //設定 區域1的下拉式選單
        ArrayAdapter yearAdapter = ArrayAdapter.createFromResource(this, R.array.year, android.R.layout.simple_spinner_item);
        yearAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        year.setAdapter(yearAdapter);
        year.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            //取得選取內容
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                chooseyear = year.getItemAtPosition(position).toString();
            }
            @Override
            public void onNothingSelected(AdapterView<?> parent) {
            }
        });

        Search = findViewById(R.id.button5);   // 根據 區域,年份與交易種類 取得mysql裡資料
        Search.setOnClickListener(v -> {

            Thread thread = new Thread(mutiThread);
            thread.start(); // 開始執行
        });

        tohome = findViewById(R.id.button6);   // 跳回首頁
        tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Yield_rank.this, Homepage.class);
            startActivity(intent);
        });

        toREhome = findViewById(R.id.button7);   // 跳回Yield首頁
        toREhome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Yield_rank.this, Yield_Homepage.class);
            startActivity(intent);
        });
    }
    private Runnable mutiThread = new Runnable() {
        String a="";
        public void run() {

            try {
                URL url = new URL("https://8e3d-163-14-44-237.jp.ngrok.io/forecast/yield_rank.php?"+"year="+chooseyear);
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
                    String line="null" ; // 宣告讀取用的字串
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


            runOnUiThread(new Runnable() {
                public void run() {

                    String[] c = a.split("<br/ >");


                    rankdist1.setText(c[0]);
                    rankdist2.setText(c[2]);
                    rankdist3.setText(c[4]);
                    rankdist4.setText(c[6]);
                    rankdist5.setText(c[8]);
                    rankdist6.setText(c[10]);
                    rankdist7.setText(c[12]);
                    rankdist8.setText(c[14]);
                    rankdist9.setText(c[16]);
                    rankdist10.setText(c[18]);
                    rankdist11.setText(c[20]);
                    rankdist12.setText(c[22]);

                    rankprice1.setText(c[1]);
                    rankprice2.setText(c[3]);
                    rankprice3.setText(c[5]);
                    rankprice4.setText(c[7]);
                    rankprice5.setText(c[9]);
                    rankprice6.setText(c[11]);
                    rankprice7.setText(c[13]);
                    rankprice8.setText(c[15]);
                    rankprice9.setText(c[17]);
                    rankprice10.setText(c[19]);
                    rankprice11.setText(c[21]);
                    rankprice12.setText(c[23]);

                }
            });
        }
    };


}