package com.example.a111project1;
import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.widget.Button;

public class R_Homepage extends Activity {
    Button ToRDist, ToRSpec,Tohome,ToRrank;
    Button ToReHome1, ToRHome1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rhomepage);

        Tohome = findViewById(R.id.Tohome2);
        Tohome.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(R_Homepage.this, Homepage.class);
            startActivity(intent);
        });

        ToRDist = findViewById(R.id.Distbutton);
        ToRDist.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(R_Homepage.this, R_dist_compare.class);
            startActivity(intent);
        });

        ToRSpec = findViewById(R.id.Sepecificbtn);
        ToRSpec.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(R_Homepage.this, R_Dist_SpecificPage.class);
            startActivity(intent);
        });

        ToRrank = findViewById(R.id.rankbtn);
        ToRrank.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(R_Homepage.this, R_Dist_RankPage.class);
            startActivity(intent);
        });


        ToReHome1 = findViewById(R.id.ToRE1);
        ToReHome1.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(R_Homepage.this, RE_Homepage.class);
            startActivity(intent);
        });
        ToRHome1 = findViewById(R.id.ToRent1);
        ToRHome1.setOnClickListener(v -> {
            Intent intent = new Intent();
            intent.setClass(R_Homepage.this, R_Homepage.class);
            startActivity(intent);
        });
    }
}