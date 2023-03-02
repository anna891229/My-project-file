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
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;

import com.github.mikephil.charting.animation.Easing;
import com.github.mikephil.charting.charts.BarChart;
import com.github.mikephil.charting.charts.LineChart;
import com.github.mikephil.charting.components.XAxis;
import com.github.mikephil.charting.components.YAxis;
import com.github.mikephil.charting.data.BarData;
import com.github.mikephil.charting.data.BarDataSet;
import com.github.mikephil.charting.data.BarEntry;
import com.github.mikephil.charting.data.Entry;
import com.github.mikephil.charting.data.LineData;
import com.github.mikephil.charting.data.LineDataSet;
import com.github.mikephil.charting.utils.ColorTemplate;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;
import java.util.ArrayList;

public class RE_DIst_SpecificPage2 extends AppCompatActivity {

    EditText chooseroad;
    TextView chooseDist;
    Button Search,tohome,toREhome;
    String dbtype,DistName,road;

    Context context;
    LineChart AvgPrice;
    String[] yearstore = new String[10];
    BarChart AnnualAmounts;
    BarData barData;
    BarDataSet barDataSet;   // variable for our bar data set.
    ArrayList barEntriesArrayList;  // array list for storing entries.

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_re_dist_specific_page2);
        context = this;
        dbtype= "re"; // database name
        AvgPrice = findViewById(R.id.AvgPrice);
        AnnualAmounts = findViewById(R.id.AvgAmounts);



        Bundle bundle = getIntent().getExtras();      // 抓上一頁選取的區域名稱
        DistName = bundle.getString("DistName");
        chooseDist = findViewById(R.id.SelectDist);
        chooseDist.setText(DistName);

        Search = findViewById(R.id.Search2);   // 根據 區域,年份與交易種類 取得mysql裡資料
        Search.setOnClickListener(v -> {
            chooseroad = findViewById(R.id.road);
            road = chooseroad.getText().toString();

            Thread thread = new Thread(mutiThread);
            thread.start(); // 開始執行
        });

        tohome = findViewById(R.id.Home);   // 跳回首頁
        tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_DIst_SpecificPage2.this, Homepage.class);
            startActivity(intent);
        });

        toREhome = findViewById(R.id.Rehome);   // 跳回RE首頁
        toREhome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_DIst_SpecificPage2.this, RE_Homepage.class);
            startActivity(intent);
        });


    }
    private Runnable mutiThread = new Runnable() {
        String a="";
        public void run() {

            try {
                URL url = new URL("https://8e3d-163-14-44-237.jp.ngrok.io/forecast/dist_specific_analyze.php?"+"dist="+DistName+"&road="+road+"&dbtype="+dbtype);
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
                    for (int i =102; i < 112; i++) {       // 測試之X軸座標
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

                    ArrayList<Entry> values = new ArrayList<>();
                    for (int i = 0; i < c.length-1; i++) {                            //建立lineChart的數值
                        if(i%2==0){
                            values.add(new Entry(count, Float.parseFloat(c[i])));
                            count++;
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
                    AvgPrice.getXAxis().setTextColor(getResources().getColor(R.color.purple_700));// 字體的顏色
                    AvgPrice.getXAxis().setTextSize(13f);

                    // 主線
                    LineDataSet set1 = new LineDataSet(values, DistName);
                    set1.setMode(LineDataSet.Mode.LINEAR);//類型為折線
                    set1.setColor(getResources().getColor(R.color.purple_700)); //線的顏色
                    set1.setValueTextColor(getResources().getColor(R.color.purple_700));
                    set1.setLineWidth(2f);//線寬
                    set1.setValueTextSize(15);
                    set1.setValueTextColor(getResources().getColor(R.color.purple_700));
                    set1.setCircleColor(getResources().getColor(R.color.purple_700));//圓點顏色
                    set1.setCircleRadius(4);//圓點大小
                    set1.setDrawCircleHole(false);//圓點為實心(預設空心)


                    LineData data = new LineData(set1);
                    AvgPrice.setData(data);  // 填充數據
                    AvgPrice.getDescription().setEnabled(false);
                    AvgPrice.animateXY(2500, 2000);
                    AvgPrice.invalidate(); //繪製圖表
                    AvgPrice.refreshDrawableState();


                    //每年數量長條圖
                    int num = Integer.parseInt(c[1]);
                    for(int i = 1;i<c.length-1;i+=2){
                        if(num<=Integer.parseInt(c[i])){
                            num=Integer.parseInt(c[i]);
                        }
                    }
                    float maxnum = num+30;

                    // 存放數值陣列

                    barEntriesArrayList = new ArrayList<>();
                    int baryear = 102;
                    for (int i = 1; i < c.length-1; i+=2) {//建立BarChart的數值
                            barEntriesArrayList.add(new BarEntry(baryear, Integer.parseInt(c[i])));
                            baryear++;

                    }

                    barDataSet = new BarDataSet(barEntriesArrayList,"Amounts of year");
                    barData = new BarData(barDataSet);
                    AnnualAmounts.setData(barData);   // set data
                    barDataSet.setColors(ColorTemplate.MATERIAL_COLORS);  // adding color to bar data
                    barDataSet.setValueTextSize(Color.BLACK);  // set text colot
                    barDataSet.setValueTextSize(18f);    // set text size
                    AnnualAmounts.getDescription().setEnabled(false);
                    AnnualAmounts.getXAxis().setPosition(XAxis.XAxisPosition.BOTTOM);
                    AnnualAmounts.setVisibleXRangeMaximum(5);
                    AnnualAmounts.getXAxis().setTextSize(15f);
                    AnnualAmounts.getXAxis().setGranularity(1f);
                    YAxis barrightAxis = AnnualAmounts.getAxisRight();//獲取右側的軸線
                    barrightAxis.setEnabled(false);//不顯示右側Y軸

                    AnnualAmounts.setBackgroundColor(Color.WHITE);  // set color
                    AnnualAmounts.setDrawGridBackground(true);  // 不顯示網格
                    AnnualAmounts.animateY(1000, Easing.Linear); // 動畫效果
                    //允许Y轴缩放
                    AnnualAmounts.setScaleYEnabled(true);
                    //是否能否拖拽
                    AnnualAmounts.setDragEnabled(true);
                    //是否能够缩放
                    AnnualAmounts.setPinchZoom(true);

                    // 保證從y軸0開始
                    AnnualAmounts.getAxisLeft().setAxisMaximum(maxnum);
                    AnnualAmounts.getAxisLeft().setAxisMinimum(0f);



                }
            });
        }
    };
}