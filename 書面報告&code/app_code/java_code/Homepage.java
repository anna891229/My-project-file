package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class Homepage extends Activity {
    Button Tore,Toyield,Toage;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_homepage);

        Tore = findViewById(R.id.analyzebtn);
        Tore.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Homepage.this, RE_Homepage.class);
            startActivity(intent);
        });


        Toyield = findViewById(R.id.yieldbtn);
        Toyield.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Homepage.this, Yield_Homepage.class);
            startActivity(intent);
        });

        Toage = findViewById(R.id.agebtn);
        Toage.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Homepage.this, Agepage.class);
            startActivity(intent);
        });
    }
}