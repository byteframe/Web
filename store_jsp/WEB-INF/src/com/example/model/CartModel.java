package com.example.model;

import java.util.LinkedList;
import java.sql.*;

public class CartModel extends JSPStoreDBModel {
    private LinkedList<CartListing> cart;
    
    public CartModel() {
        cart = new LinkedList<CartListing>();
    }

    /* parameters from request in CartServlet*/
    public void addItem(String i_name) {
        boolean bHack = true;
        /* checkk if item is in cart, if then add1 */
        for (int cnt = 0; cnt < cart.size(); cnt++) {
            if (cart.get(cnt).getName().equals(i_name)) {
                cart.get(cnt).incQty();            
                bHack = false;
                cnt = cart.size();
            }
        }
        if (bHack) {
            cart.add(new CartListing(i_name, 1));
        }
    }

    public void removeItem(String tolose) {
        for(int cnt = 0; cnt < cart.size(); cnt++) {
            if(cart.get(cnt).getName().equals(tolose)) {
                cart.remove(cnt);
                cnt = cart.size();
            }
        }
    }

    public String getItemName(int index) {
        return cart.get(index).getName();
    }
    public int getItemQty(int index) {
        return cart.get(index).getQty();
    }
    public int getNumItems() {
        return cart.size();
    }

    /* get cart contents */
    public LinkedList<CartListing> getData() {      
        return cart;   
    }
}
