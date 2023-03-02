package com.example.a111project1;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class MainActivity extends Activity {

    Button ToBegin;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        //button  Log In Page
        ToBegin = findViewById(R.id.beginbutton);
        ToBegin.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(MainActivity.this, Loginpage.class);
            startActivity(intent);
        });

    }
}