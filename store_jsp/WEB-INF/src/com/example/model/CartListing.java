package com.example.model;

public class CartListing {
    private String name;
    private double price;
    private int qty;
    
    public CartListing(String i_name, int i_qty) {
        name = i_name;
        qty = 1;
    }
    
    public void incQty() {
        qty++;
    }
    
    public String getName() { return name; }
    public int getQty() { return qty; }
}
