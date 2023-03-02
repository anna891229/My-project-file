package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class RE_Homepage extends AppCompatActivity {
    Button ToReDist,ToReSpec,Tohome,ToReHome, ToRHome,ToRerank;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_re_homepage);

        ToReDist = findViewById(R.id.Distbutton);
        ToReDist.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Homepage.this,RE_Dist_compare.class);
            startActivity(intent);
        });

        ToReSpec = findViewById(R.id.Sepecificbtn);
        ToReSpec.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Homepage.this,RE_Dist_SpecificPage.class);
            startActivity(intent);
        });
        ToRerank = findViewById(R.id.rankbtn);
        ToRerank.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Homepage.this, RE_rank.class);
            startActivity(intent);
        });

        Tohome = findViewById(R.id.ToHome);
        Tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Homepage.this,Homepage.class);
            startActivity(intent);
        });

        ToReHome = findViewById(R.id.ToDist);
        ToReHome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Homepage.this,RE_Homepage.class);
            startActivity(intent);
        });

        ToRHome = findViewById(R.id.ToRent);
        ToRHome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(RE_Homepage.this,R_Homepage.class);
            startActivity(intent);
        });
    }
}