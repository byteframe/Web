package com.example.web;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

import com.example.model.CartModel;
import com.example.model.CartListing;

public class CartServlet extends JSPStoreServlet { 
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
                
        out.println(spawnHeader("cart", "Cart Contents"));
        out.println(spawnNavigation());

        if (request.getParameter("add") != null) { 
            cart.addItem(request.getParameter("add"));
        }
        if(request.getParameter("remove") != null) {
            cart.removeItem(request.getParameter("remove"));
        }
        
        out.println(spawnContent(cart.getData()));      
        out.println(spawnFooter());
    }
    
    public String spawnContent(LinkedList<CartListing> data) {
        String content = 
        "        <div id=\"content_pane\">"+
        "          <big><strong>Cart Contents</strong></big><br /><br />" +
        "          <div id=\"carttext_pane\">";
        for(int cnt = 0; cnt < data.size(); cnt++) {
            content +=
        "          " + data.get(cnt).getQty() + "x <a href=\"ShowItemServlet?i_name=" + data.get(cnt).getName() + "\">" + data.get(cnt).getName() + "<br />" +
        "            <i><a href=\"CartServlet?remove=" + data.get(cnt).getName() + "\">" + "REMOVE</i></a></small><br /><br />";
        }
        content += 
        "          </div>" +
        "        </div>";
        return content;
    }
}
