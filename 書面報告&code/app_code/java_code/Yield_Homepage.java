package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class Yield_Homepage extends AppCompatActivity {
    Button tohome,toYcompare,toYrank;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_yield_homepage);

        tohome = findViewById(R.id.button9);
        tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Yield_Homepage.this, Homepage.class);
            startActivity(intent);
        });

        toYcompare = findViewById(R.id.button11);
        toYcompare.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Yield_Homepage.this, Yield_compare.class);
            startActivity(intent);
        });

        toYrank = findViewById(R.id.button12);
        toYrank.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Yield_Homepage.this, Yield_rank.class);
            startActivity(intent);
        });

    }
}