package com.example.model;

import java.util.LinkedList;
import java.sql.*;

public class StorefrontModel extends JSPStoreDBModel {
     public LinkedList getData() {
        LinkedList<String> data = new LinkedList<String>();
        try {
            ResultSet dbRs = dbStmt.executeQuery(
              "SELECT p_item1, i_picfile FROM  promo, item WHERE p_month = MONTH(CURRENT_DATE()) && p_item1 = item.i_name");            
            dbRs.next();
            data.add(dbRs.getString("p_item1"));
            data.add(dbRs.getString("i_picfile"));
            
            dbRs = dbStmt.executeQuery(
              "SELECT p_item2, i_picfile FROM  promo, item WHERE p_month = MONTH(CURRENT_DATE()) && p_item2 = item.i_name");
            dbRs.next();
            data.add(dbRs.getString("p_item2"));
            data.add(dbRs.getString("i_picfile"));
            
            dbRs = dbStmt.executeQuery(
              "SELECT p_item3, i_picfile FROM  promo, item WHERE p_month = MONTH(CURRENT_DATE()) && p_item3 = item.i_name");
            dbRs.next();
            data.add(dbRs.getString("p_item3"));
            data.add(dbRs.getString("i_picfile"));
            
            dbRs.close();                                             
        } catch (SQLException e) {
            System.out.println("SQL:" + e.getMessage());
        }
        return data;   
    }    
}
