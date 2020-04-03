
  <h2><%=request.getAttribute("title")%></h2>
  &nbsp;
<%
    int javasucks = 0;
    if(request.getAttribute("rank") != null) {
        if(request.getAttribute("rank").equals("Private")) {
            javasucks = 1;
        } else if(request.getAttribute("rank").equals("Sergeant")) {
            javasucks = 2;
        } else if(request.getAttribute("rank").equals("Lieutenant")) {
            javasucks = 3;
        } else if(request.getAttribute("rank").equals("Captain")) {
            javasucks = 4;
        }
    }
    for(int cnt = 0; cnt < javasucks; cnt++) {
        %><img src="../images/soldier_creation/rank.png" />&nbsp;<%
    }

    %>&nbsp;<%
    if(request.getAttribute("headgear") != null) {
        if(request.getAttribute("headgear").equals("Light Helmet")) {
            %><img src="../images/soldier_creation/light_helmet.jpg" /><%      
        } else if(request.getAttribute("headgear").equals("Armored Helmet")) {
            %><img src="../images/soldier_creation/armored_helmet.jpg" /><%
        }
    }

    %><br /><br /><% 
    if(request.getAttribute("armor") != null) {
        if(request.getAttribute("armor").equals("Light Kevlar")) {
            %><img src="../images/soldier_creation/light_kevlar.jpg" /><%      
        } else if(request.getAttribute("armor").equals("Heavy Kevlar")) {
            %><img src="../images/soldier_creation/heavy_kevlar.jpg" /><%
        }
    }

    %><br /><% 
    if(request.getAttribute("firearm") != null) {
        if(request.getAttribute("firearm").equals("HK MP5")) {
            %><img src="../images/soldier_creation/mp5.jpg" /><%      
        } else if(request.getAttribute("firearm").equals("M4A1")) {
            %><img src="../images/soldier_creation/m4a1.jpg" /><%
        } else if(request.getAttribute("firearm").equals("M60")) {
            %><img src="../images/soldier_creation/m60.jpg" /><%
        }
    }

    %>&nbsp; &nbsp;<%
    if(request.getAttribute("accessory") != null) {
        if(request.getAttribute("accessory").equals("Frag Grenade")) {
            %><img src="../images/soldier_creation/frag_grenade.jpg" /><%
        }
        if(request.getAttribute("accessory").equals("Smoke Grenade")) {
            %><img src="../images/soldier_creation/smoke_grenade.jpg" /><%
        }        
    }
%>
