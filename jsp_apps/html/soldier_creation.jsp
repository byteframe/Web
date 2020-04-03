<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
    <link href="../css/base.css" rel="stylesheet" type="text/css"></link>
    <link href="../css/soldier_creation.css" rel="stylesheet" type="text/css"></link>
    <title>Soldier Creation</title>
  </head>

  <body>
    <div id="main">
      <form method="POST" action="CreateSoldier.do">
        <div id="form_controls">
          Name:<input type="text" name="name" value="John"/>
          <br /><br />
          Rank:
          <select name="rank" size="1">
  		      <option>Private</option>
  		      <option>Sergeant</option>
  		      <option>Lieutenant</option>
  		      <option>Captain</option>
			    </select>
			    <br /><br />
			    Headgear:
			    <select name="headgear" size="1">
            <option>(None)</option>
            <option>Light Helmet</option>
            <option>Armored Helmet</option>
			    </select>
			    <br /><br />
          Armor:
          <select name="armor" size="1">
	          <option>(None)</option>
	          <option>Light Kevlar</option>
	          <option>Heavy Kevlar</option>
			    </select>
			    <br /><br />
          Firearm:
          <select name="firearm" size="1">
	          <option>(None)</option>
	          <option>HK MP5</option>
	          <option>M4A1</option>
	          <option>M60</option>
			    </select>
			    <br /><br />
          Accessory:
          <select name="accessory" size="1">
	          <option>(None)</option>
	          <option>Smoke Grenade</option>
	          <option>Frag Grenade</option>
			    </select>
			    <br /><br />
          <input type="submit" value="Create Soldier" />			    
        </div>
        
        <div id="form_result">
          <%@ include file="VAR_soldier.jsp" %>
        </div>
      </form>
    </div>
  </body>
</html>
