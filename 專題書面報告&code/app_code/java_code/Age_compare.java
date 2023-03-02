package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.graphics.Color;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;

import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.components.YAxis;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;

public class Age_compare extends AppCompatActivity {
    Button Search,tohome,toREhome;
    Spinner area1,area2,area3;
    Context context;
    LineChart AvgPrice;
    String[] yearstore = new String[11];
    String dist1,dist2,dist3;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_age_compare);
        context = this;
        AvgPrice = findViewById(R.id.AvgPrice);

        area1 = findViewById(R.id.area1);  //設定 區域1的下拉式選單
        ArrayAdapter areaAdapter = ArrayAdapter.createFromResource(this, R.array.area1, android.R.layout.simple_spinner_item);
        areaAdapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        area1.setAdapter(areaAdapter);
        area1.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            //取得選取內容
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                dist1 = area1.getItemAtPosition(position).toString();
            }
            @Override
            public void onNothingSelected(AdapterView<?> parent) {
            }
        });

        area2 = findViewById(R.id.area2);  //設定 區域2的下拉式選單
        ArrayAdapter areaAdapter2 = ArrayAdapter.createFromResource(this, R.array.area2, android.R.layout.simple_spinner_item);
        areaAdapter2.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        area2.setAdapter(areaAdapter2);
        area2.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            //取得選取內容
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                dist2 = area2.getItemAtPosition(position).toString();
            }
            @Override
            public void onNothingSelected(AdapterView<?> parent) {
            }
        });

        area3 = findViewById(R.id.area3);  //設定 區域2的下拉式選單
        ArrayAdapter areaAdapter3 = ArrayAdapter.createFromResource(this, R.array.area3, android.R.layout.simple_spinner_item);
        areaAdapter3.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        area3.setAdapter(areaAdapter3);
        area3.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            //取得選取內容
            @Override
            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
                dist3 = area3.getItemAtPosition(position).toString();
            }
            @Override
            public void onNothingSelected(AdapterView<?> parent) {
            }
        });


        Search = findViewById(R.id.button8);   // 根據 區域,年份與交易種類 取得mysql裡資料
        Search.setOnClickListener(v -> {

            Thread thread = new Thread(mutiThread);
            thread.start(); // 開始執行
        });

        tohome = findViewById(R.id.button9);   // 跳回首頁
        tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Age_compare.this, Homepage.class);
            startActivity(intent);
        });

        toREhome = findViewById(R.id.button10);   // 跳回RE首頁
        toREhome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Age_compare.this, Agepage.class);
            startActivity(intent);
        });
    }
    private Runnable mutiThread = new Runnable() {
        String a="";
        public void run() {

            try {
                URL url = new URL("https://8e3d-163-14-44-237.jp.ngrok.io/forecast/age_compare.php?"+"dist1="+dist1+"&dist2="+dist2+"&dist3="+dist3);
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
                    int counttext=0;
                    for (int i = 102; i < 113; i++) {       // 測試之X軸座標
                        yearstore[counttext]= i+"年";
                        counttext++;
                    }
                    String[] datayear = new String[counttext];
                    for(int i=0;i<counttext;i++){
                        datayear[i] = yearstore[i];
                    }
                    // 存放數值陣列  Y軸資料

                    int count=0;
                    // 存放數值陣列  Y軸資料
                    ArrayList<Entry> value1 = new ArrayList<>();
                    ArrayList<Entry> forecast1 = new ArrayList<>();
                    for (int i = 0; i<22; i++) {                            //建立區域1 lineChart的數值
                        if(i%2==0 && i<20){
                            value1.add(new Entry(count, Integer.parseInt(c[i])));
                            count++;
                        }
                        if(i==18 || i==20){
                            forecast1.add(new Entry(count-1,Integer.parseInt(c[i])));
                            count++;
                        }
                    }

                    int count2=0;
                    ArrayList<Entry> value2 = new ArrayList<>();
                    ArrayList<Entry> forecast2 = new ArrayList<>();
                    for (int i = 22; i<44; i++) {                            //建立區域2 lineChart的數值
                        if(i%2==0 && i<42){
                            value2.add(new Entry(count2, Integer.parseInt(c[i])));
                            count2++;
                        }
                        if(i==40 ||i==42){
                            forecast2.add(new Entry(count2-1,Integer.parseInt(c[i])));
                            count2++;
                        }
                    }

                    int count3=0;
                    ArrayList<Entry> value3 = new ArrayList<>();
                    ArrayList<Entry> forecast3 = new ArrayList<>();
                    for (int i = 44; i<65; i++) {                            //建立區域3 lineChart的數值
                        if(i%2==0 && i<64){
                            value3.add(new Entry(count3, Integer.parseInt(c[i])));
                            count3++;
                        }
                        if(i==62||i==64){
                            forecast3.add(new Entry(count3-1,Integer.parseInt(c[i])));
                            count3++;
                        }
                    }
                    // 未來預測圖表

                    AvgPrice.setDragEnabled(true);  // 可拖拽
                    AvgPrice.setScaleEnabled(true); // 縮放
                    AvgPrice.setTouchEnabled(true); // 可點擊
                    AvgPrice.setBackgroundColor(Color.WHITE); //設置背景顏色
                    AvgPrice.setNoDataText("暫時沒有數據");
                    AvgPrice.setNoDataTextColor(Color.BLUE);

                    YAxis rightAxis = AvgPrice.getAxisRight();//獲取右側的軸線
                    rightAxis.setEnabled(false);//不顯示右側Y軸

                    AvgPrice.getXAxis().setSpaceMin(0.5f);  //折線起點距離左側Y軸距離
                    AvgPrice.getXAxis().setSpaceMax(0.5f);  //折線起點距離右側Y軸距離
                    AvgPrice.setVisibleXRangeMaximum(4);
                    AvgPrice.getXAxis().setGranularity(1f);
                    AvgPrice.getXAxis().setValueFormatter(new com.github.mikephil.charting.formatter.IndexAxisValueFormatter(datayear));
                    AvgPrice.getXAxis().setPosition(XAxis.XAxisPosition.BOTTOM); //X軸標籤位置
                    AvgPrice.getXAxis().setTextColor(R.color.purple_700);// 字體的顏色
                    AvgPrice.getXAxis().setTextSize(13f);

                    // area1 主線
                    LineDataSet set1 = new LineDataSet(value1, dist1);
                    set1.setMode(LineDataSet.Mode.LINEAR);//類型為折線
                    set1.setColor(getResources().getColor(R.color.purple_500)); //線的顏色
                    set1.setValueTextColor(getResources().getColor(R.color.purple_500));
                    set1.setLineWidth(2f);//線寬
                    set1.setValueTextSize(15);
                    set1.setCircleColor(getResources().getColor(R.color.purple_500));
                    set1.setCircleRadius(4);//圓點大小
                    set1.setDrawCircleHole(false);//圓點為實心(預設空心)

                    // area_forecast point
                    LineDataSet point1 = new LineDataSet(forecast1,"預測");
                    point1.setCircleColor(getResources().getColor(R.color.future));
                    point1.setValueTextColor(getResources().getColor(R.color.future));
                    point1.setLineWidth(2f);//線寬
                    point1.setColor(getResources().getColor(R.color.future)); //線的顏色
                    point1.setValueTextSize(15);
                    point1.setCircleRadius(4);//圓點大小
                    point1.setDrawCircleHole(false);//圓點為實心(預設空心)


                    // area2 主線
                    LineDataSet set2 = new LineDataSet(value2, dist2);
                    set2.setMode(LineDataSet.Mode.LINEAR);//類型為折線
                    set2.setColor(getResources().getColor(R.color.button_color2)); //線的顏色
                    set2.setValueTextColor(getResources().getColor(R.color.button_color2));
                    set2.setLineWidth(2f);//線寬
                    set2.setValueTextSize(15);
                    set2.setCircleColor(getResources().getColor(R.color.button_color2));//圓點顏色
                    set2.setCircleRadius(4);//圓點大小
                    set2.setDrawCircleHole(false);//圓點為實心(預設空心)

                    // area_forecast point
                    LineDataSet point2 = new LineDataSet(forecast2,"預測");
                    point2.setCircleColor(getResources().getColor(R.color.future));
                    point2.setValueTextColor(getResources().getColor(R.color.future));
                    point2.setLineWidth(2f);//線寬
                    point2.setColor(getResources().getColor(R.color.future)); //線的顏色
                    point2.setValueTextSize(15);
                    point2.setCircleRadius(4);//圓點大小
                    point2.setDrawCircleHole(false);//圓點為實心(預設空心)

                    // area3 主線
                    LineDataSet set3= new LineDataSet(value3, dist3);
                    set3.setMode(LineDataSet.Mode.LINEAR);//類型為折線
                    set3.setColor(getResources().getColor(R.color.teal_200)); //線的顏色
                    set3.setValueTextColor(getResources().getColor(R.color.teal_200));
                    set3.setLineWidth(2f);//線寬
                    set3.setValueTextSize(15);
                    set3.setCircleColor(getResources().getColor(R.color.teal_200));//圓點顏色
                    set3.setCircleRadius(4);//圓點大小
                    set3.setDrawCircleHole(false);//圓點為實心(預設空心)

                    // area_forecast point
                    LineDataSet point3 = new LineDataSet(forecast3,"預測");
                    point3.setCircleColor(getResources().getColor(R.color.future));
                    point3.setColor(getResources().getColor(R.color.future)); //線的顏色
                    point3.setValueTextColor(getResources().getColor(R.color.future));
                    point3.setLineWidth(2f);//線寬
                    point3.setValueTextSize(15);
                    point3.setCircleRadius(4);//圓點大小
                    point3.setDrawCircleHole(false);//圓點為實心(預設空心)


                    LineData data = new LineData(point1,point2,point3,set1,set2,set3);
                    AvgPrice.setData(data);  // 填充數據
                    AvgPrice.getDescription().setEnabled(false);
                    AvgPrice.animateXY(2500, 2000);
                    AvgPrice.invalidate(); //繪製圖表
                    AvgPrice.refreshDrawableState();


                }
            });
        }
    };


}