package com.example.ashokshah.login.Adapter;

import android.content.Context;
import android.support.annotation.NonNull;
import android.support.v7.widget.ContentFrameLayout;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.example.ashokshah.login.Listener.VenueDetailClickListener;
import com.example.ashokshah.login.Model.Venue;
import com.example.ashokshah.login.R;

import java.util.ArrayList;

public class VenueAdapter extends RecyclerView.Adapter<VenueAdapter.ViewHolder> {
    Context context;
    ArrayList<Venue> listVenue;
    VenueDetailClickListener venueDetailClickListener;

    public VenueDetailClickListener getVenueDetailClickListener(){
        return venueDetailClickListener;
    }

    public VenueAdapter(Context context, ArrayList<Venue> listVenue) {
        this.context = context;
        this.listVenue = listVenue;
    }

    public void setVenueDetailClickListener(VenueDetailClickListener venueDetailClickListener) {
        this.venueDetailClickListener = venueDetailClickListener;
    }

    @NonNull
    @Override
    public ViewHolder onCreateViewHolder(@NonNull ViewGroup viewGroup, int i) {
        context=viewGroup.getContext();
        View mView= LayoutInflater.from(context).inflate(R.layout.row_venue,viewGroup,false);
        return new ViewHolder(mView);
    }

    @Override
    public void onBindViewHolder(@NonNull ViewHolder viewHolder, final int position) {
        Venue venue=listVenue.get(position);
        String name=venue.getTitle();
        viewHolder.tvname.setText(name);
        viewHolder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                VenueDetailClickListener listener=getVenueDetailClickListener();
                listener.setOnItemClicked(listVenue, position);

            }
        });
    }

    @Override
    public int getItemCount() {
        return listVenue.size();

    }

    public class ViewHolder extends RecyclerView.ViewHolder{
    TextView tvname;
        public ViewHolder(@NonNull View itemView) {
            super(itemView);
             tvname = (TextView) itemView.findViewById(R.id.tvname);
        }
    }
}
