package com.example.web;

import com.example.model.*;

import javax.servlet.*;
import javax.servlet.http.*;
import java.io.*;
import java.util.*;

public class SoldierCreate extends HttpServlet {
    public void doPost(HttpServletRequest request, HttpServletResponse response)
        throws IOException, ServletException
    {
        String[] formInput = new String[6];
        formInput[0] = request.getParameter("name");
        formInput[1] = request.getParameter("rank");
        formInput[2] = request.getParameter("headgear");
        formInput[3] = request.getParameter("armor");
        formInput[4] = request.getParameter("firearm");
        formInput[5] = request.getParameter("accessory");

        Soldier ltdan = new Soldier(formInput);
        request.setAttribute("title", ltdan.getRank() + " " + ltdan.getName());
        request.setAttribute("rank", ltdan.getRank());        
        request.setAttribute("rankNum", ltdan.getRankNum());
        request.setAttribute("headgear", ltdan.getHeadgear());
        request.setAttribute("armor", ltdan.getArmor());    		
        request.setAttribute("firearm", ltdan.getFirearm());
        request.setAttribute("accessory", ltdan.getAccessory());

        RequestDispatcher view = request.getRequestDispatcher("/html/soldier_creation.jsp");
        view.include(request, response);
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response)
        throws IOException, ServletException
    {
        doPost(request, response);
    }
}
