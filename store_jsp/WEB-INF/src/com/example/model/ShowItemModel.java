package com.example.model;

import java.sql.*;

public class ShowItemModel extends JSPStoreDBModel {
    public String[] getData(String i_name) {
        String[] data = new String[9];
        try {
            ResultSet dbRs = dbStmt.executeQuery(
              "SELECT * FROM item WHERE i_name = '" + i_name + "'");
            
            /* initial iteration needed */
            dbRs.next();
            data[0] = dbRs.getString("i_name"); 
            data[1] = dbRs.getString("i_vendor");
            data[2] = dbRs.getString("i_code");
            data[3] = dbRs.getString("i_category"); 
            data[4] = dbRs.getString("i_qty");
            data[5] = dbRs.getString("i_descript");
            data[6] = dbRs.getString("i_picfile");
            data[7] = dbRs.getString("i_price");
            data[8] = dbRs.getString("i_shipping");
            
            dbRs.close();            
        } catch (SQLException e) {
            System.out.println("SQL:" + e.getMessage());
        }            
        return data;         
    }
}
