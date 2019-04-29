package com.example.ashokshah.login;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;


public class ChangePassword extends AppCompatActivity {
    EditText etOldPass,etNewPass,etConfPass;
    Button btnsubmit;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_change_password);
        etOldPass=(EditText)findViewById(R.id.etOldPass);
        etNewPass=(EditText)findViewById(R.id.etNewPass);
        etConfPass=(EditText)findViewById(R.id.etconfPass);
        btnsubmit=(Button)findViewById(R.id.button3);
        btnsubmit.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if ( checkOldPassword() && checkNewPassword() && checkConfPassword()) {
                    Toast.makeText(ChangePassword.this, "", Toast.LENGTH_SHORT).show();
                }
            }
        });
    }
    public boolean checkOldPassword() {
        boolean isPasswordValid = false;
//Required Field Validation
        if (etOldPass.getText().toString().trim().length() <= 0) {
            etOldPass.setError("Enter Old Password");
        } else {
            isPasswordValid = true;
        }
        return isPasswordValid;
    }
    public boolean checkNewPassword() {
        boolean isPasswordValid = false;
//Required Field Validation
        if (etNewPass.getText().toString().trim().length() <= 0) {
            etNewPass.setError("Enter New Password");
        } else {
            isPasswordValid = true;
        }
        return isPasswordValid;
    }

    public boolean checkConfPassword() {
        boolean isPasswordValid = false;
//Required Field Validation
        if (etConfPass.getText().toString().trim().length() <= 0) {
            etConfPass.setError("Enter Confirm Password");
        } else {
            isPasswordValid = true;
        }
        return isPasswordValid;
    }
}
