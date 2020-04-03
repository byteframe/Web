package com.example.web;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

import com.example.model.CartModel;
import com.example.model.ReceiptModel;

public class ReceiptServlet extends JSPStoreServlet {
    private ReceiptModel model;

    public void init() throws ServletException {
        model = new ReceiptModel();
    }
    public void destroy() {
        model = null;
    }
    
    public void doGet (HttpServletRequest request, HttpServletResponse response)
                       throws IOException, ServletException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();      
        HttpSession session = request.getSession(true);
        
        CartModel cart = (CartModel)session.getAttribute("cart");
        
        out.println(spawnHeader("receipt", "Thank you for your Order!"));
        out.println(spawnNavigation());
        out.println(spawnContent(cart));
        out.println(spawnFooter());
    }
    
    public void doPost (HttpServletRequest request, HttpServletResponse response)
                       throws IOException, ServletException {
        this.doGet(request, response);
    }
    
    public String spawnContent(CartModel cart) {
        String receipt =         
        "        <div id=\"content_pane\">"+
        "          <big><strong>Your Receipt</strong></big><br />" +
        "          <br />";
        for (int cnt = 0; cnt < cart.getNumItems(); cnt++) {
            receipt += cart.getItemQty(cnt) + "x - " + cart.getItemName(cnt) + "<br />";
        }
        receipt += 
        "<br /><br />" +
        "          Total: N/A" + "" +
        "        </div>";
        return receipt;
    }    
}
