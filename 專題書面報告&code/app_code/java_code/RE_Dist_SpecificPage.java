package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class RE_Dist_SpecificPage extends AppCompatActivity {
    Button  Tohome,ToREhome,Dist1,Dist2,Dist3,Dist4,Dist5,Dist6,Dist7,Dist8,Dist9,Dist10,Dist11,Dist12;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_re_dist_specific_page);


        Tohome = findViewById(R.id.Home3);  // 回首頁
        Tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Dist_SpecificPage.this, Homepage.class);
            startActivity(intent);
        });
        ToREhome = findViewById(R.id.ReNormal3);  // 回首頁
        ToREhome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Dist_SpecificPage.this, RE_Homepage.class);
            startActivity(intent);
        });


        Dist1 = findViewById(R.id.Dist1);  // 選擇 北投區
        Dist1.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist1.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist2 = findViewById(R.id.Dist2);  // 選擇 士林區
        Dist2.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist2.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist3 = findViewById(R.id.Dist3);  // 選擇 大同區
        Dist3.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist3.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist4 = findViewById(R.id.Dist4);  // 選擇 中山區
        Dist4.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist4.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist5 = findViewById(R.id.Dist5);  // 選擇 松山區
        Dist5.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist5.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist6 = findViewById(R.id.Dist6);  // 選擇 內湖區
        Dist6.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist6.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist7 = findViewById(R.id.Dist7);  //  選擇 萬華區
        Dist7.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist7.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist8 = findViewById(R.id.Dist8);  // 選擇 中正區
        Dist8.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist8.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist9 = findViewById(R.id.Dist9);  // 選擇 大安區
        Dist9.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist9.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist10 = findViewById(R.id.Dist10);  // 選擇 信義區
        Dist10.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist10.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist11 = findViewById(R.id.Dist11);  // 選擇 南港區
        Dist11.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist11.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });

        Dist12 = findViewById(R.id.Dist12);  // 選擇 文山區
        Dist12.setOnClickListener(v -> {
            Intent intent = new Intent();
            Bundle bundle = new Bundle();
            bundle.putString("DistName",Dist12.getText().toString());
            intent.putExtras(bundle);
            intent.setClass(RE_Dist_SpecificPage.this, RE_DIst_SpecificPage2.class);
            startActivity(intent);
        });


    }
}