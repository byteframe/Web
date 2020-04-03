package com.example.web;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

import com.example.model.CartModel;
import com.example.model.CheckoutModel;

public class CheckoutServlet extends JSPStoreServlet {
    private CheckoutModel model;

    public void init() throws ServletException {
        model = new CheckoutModel();
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
        if (cart == null) {
            cart = new CartModel();
            session.setAttribute("cart", cart);
        }
        
        out.println(spawnHeader("checkout", "Check Out"));
        out.println(spawnNavigation());
        out.println(spawnContent(model.getData()));
        out.println(spawnFooter());
    }
    
    public String spawnContent(String data) {
        return
        "        <div id=\"checkoutform_pane\">"+
        "          <u>Checkout</u><br />" +
        "          <br />" +
        "          <form action=\"ReceiptServlet\" method=\"POST\">" +
        "            Name: <INPUT type=\"text\" id=\"name\" /><br />" +
        "            E-Mail: <INPUT type=\"text\" id=\"email\" /><br />"  +
        "            Phone: <INPUT type=\"text\" id=\"phone\" /><br />"  + 
        "            Address Line 1: <INPUT type=\"text\" id=\"add1\" /><br />"  +
        "            Address Line 2: <INPUT type=\"text\" id=\"add2\" /><br />"  +
        "            City: <INPUT type=\"text\" id=\"city\" /><br />"  +
        "            State: <INPUT type=\"text\" id=\"state\" /><br />"  +
        "            Zip-Code: <INPUT type=\"text\" id=\"zip\" /><br />"  +           
        "            Credit Card: <INPUT type=\"text\" id=\"cc\" /><br />" +
        "            <br />" +
        "            <input type=\"submit\" />" +
        "          </form>" +
        "        </div>";
    }    
}
