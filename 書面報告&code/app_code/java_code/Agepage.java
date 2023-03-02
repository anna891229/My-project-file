package com.example.a111project1;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class Agepage extends AppCompatActivity {
    Button tohome,toAcompare,toArank;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_agepage);

        tohome = findViewById(R.id.button9);
        tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Agepage.this, Homepage.class);
            startActivity(intent);
        });

        toAcompare = findViewById(R.id.button11);
        toAcompare.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Agepage.this, Age_compare.class);
            startActivity(intent);
        });

        toArank = findViewById(R.id.button12);
        toArank.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(Agepage.this, Age_rank.class);
            startActivity(intent);
        });


    }
}