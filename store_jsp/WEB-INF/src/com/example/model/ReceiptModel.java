package com.example.model;

import java.util.LinkedList;
import java.sql.*;

public class ReceiptModel extends JSPStoreDBModel {
     public LinkedList getData(CartModel cart) {
        LinkedList<String> data = new LinkedList<String>();
        for(int cnt = 0; cnt < cart.getNumItems(); cnt++) {
            data.add("item");
        }
        return data;
     }
}
