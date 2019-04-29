package com.example.ashokshah.login;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.ashokshah.login.Adapter.CategoryAdapter;
import com.example.ashokshah.login.ApiHelper.JsonField;
import com.example.ashokshah.login.ApiHelper.WebURL;
import com.example.ashokshah.login.Listener.CategoryItemClickListner;
import com.example.ashokshah.login.Model.Category;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;

public class CategoryActivity extends AppCompatActivity implements CategoryItemClickListner {

    RecyclerView rvCategory;
    ArrayList<Category> listCategory;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_category2);
        rvCategory = (RecyclerView) findViewById(R.id.rvCategory);
        LinearLayoutManager linearLayoutManager = new LinearLayoutManager(CategoryActivity.this);
        rvCategory.setLayoutManager(linearLayoutManager);

        getCategory();
    }

    private void getCategory() {
        listCategory = new ArrayList<>();
        StringRequest stringRequest = new StringRequest(Request.Method.POST, WebURL.CATEGORY_URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                parseJson(response.toString());
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
            error.printStackTrace();
            }
        });
        RequestQueue requestQueue = Volley.newRequestQueue(CategoryActivity.this);
        requestQueue.add(stringRequest);
    }

    private void parseJson(String response) {
        Log.d("R",response);
        try {
            JSONObject jsonObject=new JSONObject(response);
            int flag = jsonObject.optInt(JsonField.FLAG);
            if(flag == 1)
            {
                JSONArray jsonArray =jsonObject.optJSONArray(JsonField.CATEGORY_ARRAY);
                if(jsonArray.length()>0){
                    for (int i=0; i<jsonArray.length(); i++){
                        JSONObject objCategory=jsonArray.optJSONObject(i);
                        String categoryId=objCategory.getString(JsonField.KEY_CAT_ID);
                        String categoryName=objCategory.getString(JsonField.KEY_CAT_NAME);
                        String categoryImage=objCategory.getString(JsonField.KEY_CAT_IMG);

                        Category category=new Category();
                        category.setCat_id(categoryId);
                        category.setCat_name(categoryName);
                        category.setCat_imagurl(categoryImage);
                        listCategory.add(category);
                    }

                        CategoryAdapter categoryAdpater=new CategoryAdapter(CategoryActivity.this,listCategory);
                        categoryAdpater.setCategoryItemClickListner(CategoryActivity.this);
                        rvCategory.setAdapter(categoryAdpater);
                }
            }
        } catch (JSONException e) {
            e.printStackTrace();
        }

    }

    @Override
    public void setOnItemClick(ArrayList<Category> listCategory, int position) {
        Intent intent = new Intent(CategoryActivity.this, VenueActivity.class);
        Category category = listCategory.get(position);
        String id = category.getCat_id();
        String name = category.getCat_name();
        intent.putExtra(JsonField.KEY_CAT_ID,id);
        intent.putExtra(JsonField.KEY_CAT_NAME,name);
        startActivity(intent);
    }
}
