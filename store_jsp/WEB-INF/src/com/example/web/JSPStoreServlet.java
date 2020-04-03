package com.example.web;

import java.io.*;
import java.util.*;
import javax.servlet.*;
import javax.servlet.http.*;

public class JSPStoreServlet extends HttpServlet {
    private String pageCss, pageTitle;
    
    public static String spawnHeader(String css, String title) {
        return 
        "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\"" +
        "        \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\">" +
        "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en\" lang=\"en\">" +
        "    <link href=\"css/base.css\" rel=\"stylesheet\" type=\"text/css\" />" +
        "    <link href=\"css/" + css + ".css\" rel=\"stylesheet\" type=\"text/css\" />" +
        "    <title>" + title + "</title>" +
        "  </head>";          
    }
    
    public static String spawnNavigation() {
        return 
        "  <body>" +
        "    <div id=\"page_centered\">" +
        "      <div class=\"boxes\" id=\"navigation_box\">" +
        "        \\  - <a href=\"StorefrontServlet\">Storefront</a> ] - " +
        "        | <a href=\"SearchServlet\">Search</a> | -" +
        "        [ <a href=\"DirectoryServlet\">Directory</a> - /" +
        "      </div>" +
        "      <div class=\"boxes\" id=\"mainview_box\">";
    }
   
    public static String spawnFooter() {
        return
        "      </div>" +
        "      <div id=\"footer_plane\">" +
        "        <div class=\"boxes\" id=\"footer1_box\">" +
        "          <a href=\"CartServlet\"><img class=\"footerpic\" src=\"images/cart.png\" /></a>" +
        "        </div>" +
        "        <div class=\"boxes\" id=\"footer2_box\">" +
        "          <em>Copyright primarydataloop</em><br />" +
        "          <strong><a href=\"mailto:byteframe@yahoo.com\">byteframe@yahoo.com</a></strong><br />" +
        "        </div>" +
        "        <div class=\"boxes\" id=\"footer3_box\">" +
        "          <a href=\"CheckoutServlet\"><img class=\"footerpic\" src=\"images/checkout.png\" /></a>" +
        "        </div>" +
        "      </div>" +
        "    </div>" +
        "  </body>" +
        "</html>";
    }      
}
