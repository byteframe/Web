package com.example.model;

import java.sql.*;

public class JSPStoreDBModel {
    private String dbUrl = "jdbc:mysql://localhost:3306/JSPStoreFinalDB",
                   dbUser = "root",
                   dbPass = "javasucks4";
    protected Connection dbConn;
    protected Statement dbStmt;
          
    public JSPStoreDBModel() {
        try {
            /* register connector driver, make connection */
            Class.forName("com.mysql.jdbc.Driver"); 
            dbConn = DriverManager.getConnection( dbUrl, dbUser, dbPass);
            dbStmt = dbConn.createStatement();      
        } catch (ClassNotFoundException e) {
            System.out.println("CNF: " + e.getMessage());
        } catch (SQLException e) {
            System.out.println("SQL: " + e.getMessage());
        }
    }

    public void remove() {    
        try { 
            dbConn.close(); 
        } catch (SQLException e) {
            System.out.println("SQL:" + e.getMessage());
        }         
    }
}
