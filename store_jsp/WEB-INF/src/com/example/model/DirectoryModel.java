package com.example.model;

import java.util.LinkedList;
import java.sql.*;

public class DirectoryModel extends JSPStoreDBModel {
    public LinkedList getData() {
        LinkedList<String> data = new LinkedList<String>();
        try {
            ResultSet dbRs = dbStmt.executeQuery(
              "SELECT c_name FROM category WHERE c_parent is NULL");
            
            data.add(new String("category"));
            while(dbRs.next()) {
                data.add(dbRs.getString("c_name"));  
            }
            dbRs.close();                                             
        } catch (SQLException e) {
            System.out.println("SQL:" + e.getMessage());
        }
        return data;         
    }
    
    public LinkedList getData(String c_name) {
        LinkedList<String> data = new LinkedList<String>();
        try {
            ResultSet dbRs = dbStmt.executeQuery(
              "SELECT i_name FROM item WHERE i_category = '" + c_name + "'");
              
            data.add(new String("item")); 
            while(dbRs.next()) {
                data.add(dbRs.getString("i_name"));
            }
            dbRs.close();                                                
        } catch (SQLException e) {
            System.out.println("SQL:" + e.getMessage());
        }
        return data;  
    }
}
