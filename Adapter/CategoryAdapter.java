package com.example.ashokshah.login.Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.example.ashokshah.login.ApiHelper.WebURL;
import com.example.ashokshah.login.Listener.CategoryItemClickListner;
import com.example.ashokshah.login.Model.Category;
import com.example.ashokshah.login.R;

import java.util.ArrayList;

import de.hdodenhof.circleimageview.CircleImageView;

public class CategoryAdapter extends RecyclerView.Adapter<CategoryAdapter.ViewHolder> {

    Context context;
    ArrayList<Category> listCategory;

    CategoryItemClickListner categoryItemClickListner;

    public CategoryItemClickListner getCategoryItemClickListner() {
        return categoryItemClickListner;
    }

    public void setCategoryItemClickListner(CategoryItemClickListner categoryItemClickListner) {
        this.categoryItemClickListner = categoryItemClickListner;
    }

    public CategoryAdapter(Context context, ArrayList<Category> listCategory) {
        this.context = context;
        this.listCategory = listCategory;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        context =parent.getContext();
        View mView = LayoutInflater.from(context).inflate(R.layout.category_row_item,parent,false);
        return new ViewHolder(mView);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder holder, final int position) {
        Category category=listCategory.get(position);
        String name=category.getCat_name();
        holder.tvCategory.setText(name);
        Glide.with(context).load(WebURL.KEY_IMAGE_URL+category.getCat_imagurl()).into(holder.ivCatImage);
        holder.tvCategory.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                CategoryItemClickListner categoryItemClickListner= getCategoryItemClickListner();
                categoryItemClickListner.setOnItemClick(listCategory,position);

            }
        });

    }

    @Override
    public int getItemCount() {
        return listCategory.size();
    }


    public class ViewHolder extends RecyclerView.ViewHolder {

        CircleImageView ivCatImage;
        TextView tvCategory;

        public ViewHolder(@NonNull View itemView) {
            super(itemView);
            ivCatImage = itemView.findViewById(R.id.ivCatImage);
            tvCategory = (TextView)itemView.findViewById(R.id.tvCategory);
        }
    }
}
