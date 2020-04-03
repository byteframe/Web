package com.example.web;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

import com.example.model.DirectoryModel;

public class DirectoryServlet extends JSPStoreServlet {
    private DirectoryModel model;

    public void init() throws ServletException {
        model = new DirectoryModel();
    }
    public void destroy() {
        model = null;
    }    
    
    public void doGet (HttpServletRequest request, HttpServletResponse response)
                       throws IOException, ServletException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();      

        out.println(spawnHeader("directory", "Store Directory"));
        out.println(spawnNavigation());
        
        /* crap: make it handle recursive directories and item and dirs on same page */
        if(request.getParameter("c_name") == null) {
            out.println(spawnContent(model.getData()));
        } else {
            out.println(spawnContent(model.getData(request.getParameter("c_name"))));
        }
            
        out.println(spawnFooter());
    } 

    public String spawnContent(LinkedList data) {
        String categoryListElements = "";
         if(data.get(0).equals("category")) {
               for(int cnt = 1; cnt < data.size(); cnt++) {
                   categoryListElements += "<a href=\"DirectoryServlet?c_name=" + data.get(cnt) + "\">" + data.get(cnt) + "</a><br />";
               } 
         } else if(data.get(0).equals("item")) {
             for(int cnt = 1; cnt < data.size(); cnt++) {
                   categoryListElements += "<a href=\"ShowItemServlet?i_name=" + data.get(cnt) + "\">" + data.get(cnt) + "</a><br />";
             }     
         }
        return
        "        <div id=\"categorylist_pane\">" + categoryListElements +
        "        </div>";
    }
}
