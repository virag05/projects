package com.example.ashokshah.login;

import android.app.NotificationManager;
import android.app.PendingIntent;
import android.content.Context;
import android.content.Intent;
import android.support.v4.app.NotificationCompat;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.example.ashokshah.login.ApiHelper.JsonField;
import com.example.ashokshah.login.ApiHelper.WebURL;

import java.util.HashMap;
import java.util.Map;

public class bookvenue extends AppCompatActivity {
    EditText etDate, etVenue, etSlot, etPrice, etStatus;
    Button btBook;
    //Spinner sp;
    //String venue_name[] = {"Rajpath", "karnawati", "parsangm partyplot", "jaalpan","jungle bhookh"};

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_bookvenue);
        etDate = (EditText) findViewById(R.id.etDate);
       // sp = (Spinner) findViewById(R.id.spvenue);
        etSlot = (EditText) findViewById(R.id.etSlot);
        btBook = (Button) findViewById(R.id.btBook);
//        ArrayAdapter<String> arrayadapter = new ArrayAdapter<String>(bookvenue.this, android.R.layout.simple_list_item_1, venue_name);
//        sp.setAdapter(arrayadapter);
//
//        sp.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
//            @Override
//            public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
//                Toast.makeText(bookvenue.this, "Spinner:" + String.valueOf(sp.getSelectedItem()), Toast.LENGTH_SHORT).show();
//            }
//
//            @Override
//            public void onNothingSelected(AdapterView<?> parent) {
//
//            }
//        });

        btBook.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                switch (v.getId()) {
                    case R.id.btBook:

                        if (checkDate() && checkSlot()) {
                            //  Toast.makeText(bookvenue.this, "Booking Successful !!", Toast.LENGTH_SHORT).show();
                            //  sendNotification();
                            // sendBookingRequest();
                            sendBookingRequest();
                            Intent intent = new Intent(bookvenue.this, MainActivity.class);
                            startActivity(intent);
                        }
                        break;
                }
            }
        });
    }

    private void sendBookingRequest() {
        StringRequest stringRequest = new StringRequest(Request.Method.POST, WebURL.KEY_BOOK_URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                parseBookVenueResponse(response);
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                error.printStackTrace();
            }
        }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> param = new HashMap<>();
                param.put(JsonField.KEY_DATE,etDate.getText().toString());
                param.put(JsonField.KEY_STATUS,etStatus.getText().toString());
                //param.put(JsonField.KEY_VENUE,etVenue.getText().toString());
               // param.put(JsonField.KEY_USER,.getText().toString());
                return param;
            }
        };
    }

    private void parseBookVenueResponse(String response) {
        Toast.makeText(bookvenue.this, response, Toast.LENGTH_SHORT).show();
    }

//    private void sendNotification()
//    {
//        NotificationCompat.Builder builder = new NotificationCompat.Builder(this)
//                .setSmallIcon(R.drawable.ic_launcher_foreground)
//                .setContentTitle("Shivangi Patel")
//                .setContentText("This is Notification demo");
//        Intent intent = new Intent(bookvenue.this, bookvenue.class);
//        PendingIntent pendingIntent= PendingIntent.getActivity(this,1,intent,PendingIntent.FLAG_UPDATE_CURRENT);
//        builder.setContentIntent(pendingIntent);
//        NotificationManager manager = (NotificationManager) getSystemService(Context.NOTIFICATION_SERVICE);
//        manager.notify(1,builder.build());
//    }
        private boolean checkDate () {
            boolean isDateValid = false;
            if (etDate.getText().toString().trim().length() <= 0) {
                etDate.setError("Enter Date");
            } else {
                isDateValid = true;
            }
            return isDateValid;
        }


        private boolean checkSlot () {
            boolean isSlotValid = false;
            if (etSlot.getText().toString().trim().length() <= 0) {
                etSlot.setError("Enter Slot");
            } else {
                isSlotValid = true;
            }
            return isSlotValid;
        }

    }
