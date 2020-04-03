package com.example.web;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

import com.example.model.StorefrontModel;

public class StorefrontServlet extends JSPStoreServlet {
    private StorefrontModel model;

    public void init() throws ServletException {
        model = new StorefrontModel();
    }
    public void destroy() {
        model = null;
    }

    public void doGet (HttpServletRequest request, HttpServletResponse response)
                       throws IOException, ServletException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();      

        out.println(spawnHeader("storefront", "Store Directory"));
        out.println(spawnNavigation());
        out.println(spawnContent(model.getData()));           
        out.println(spawnFooter());
    }
    
    public String spawnContent(LinkedList data) {
        return
        "        <div id=\"content_pane\">" +
        "          <div id=\"promopic_pane\">" +
        "            <div class=\"promo_boxes\" id=\"promo1_box\">" +
        "              <a href=\"ShowItemServlet?i_name=" + data.get(0) + "\"><img src=\"images/" + data.get(1) + "\" /></a>" +
        "            </div>" +
        "            <div class=\"promo_boxes\" id=\"promo2_box\">" +
        "              <a href=\"ShowItemServlet?i_name=" + data.get(2) + "\"><img src=\"images/" + data.get(3) + "\" /></a>" +
        "            </div>" + 
        "            <div class=\"promo_boxes\" id=\"promo3_box\">" +
        "              <a href=\"ShowItemServlet?i_name=" + data.get(4) + "\"><img src=\"images/" + data.get(5) + "\" /></a>" +
        "            </div>" + 
        "          </div>" +
        "          <i>WELCOME!</i>" +  
        "        </div>";
    }
}
