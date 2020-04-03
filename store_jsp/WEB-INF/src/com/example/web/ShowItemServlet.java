package com.example.web;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

import com.example.model.ShowItemModel;

public class ShowItemServlet extends JSPStoreServlet {
    private ShowItemModel model;

    public void init() throws ServletException {
        model = new ShowItemModel();
    }
    public void destroy() {
        model = null;
    }
    
    public void doGet (HttpServletRequest request, HttpServletResponse response)
                       throws IOException, ServletException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();      
        
        out.println(spawnHeader("showitem", "Item Description"));
        out.println(spawnNavigation());
        out.println(spawnContent(model.getData(request.getParameter("i_name"))));
        out.println(spawnFooter());
    }
    
    public String spawnContent(String[] data) {
        return
        "        <div id=\"infotext_pane\">" +
        "          <div id=\"titletext_pane\">" +
        "            " + data[0] +
        "          </div>" +
        "          <br />" +
        "          <div id=\"spectext_pane\">" +
        "            &nbsp;&nbsp;&nbsp;Vendor: " + data[1] + "<br />" +
        "            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Code: " + data[2] + "<br />" + 
        "            &nbsp;Category: " + data[3] + "<br />" +
        "            &nbsp;Quantity: " + data[4] + "<br /><br />" + 
        "          </div>" +
        "        Description:<i><br /><br />" + data[5] + "</i>" +
        "        </div>" +
        "        <div class=\"boxes\" id=\"pic_box\">" +
        "          <img src=\"images/" + data[6] + "\"></img>" +
        "        </div>" +
        "        <div class=\"boxes\" id=\"price_box\">" +
        "          Price: $" + data[7] + "<br />" +
        "          S&H: $" + data[8] + "<br />" +
        "          <a href=\"CartServlet?add=" + data[0] + "\"><img src=\"images/cart.png\" /></a>" +
        "        </div>";
    }       
}
