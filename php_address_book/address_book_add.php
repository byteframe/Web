<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <title>address_book : add</title>
    <link href="address_book.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <a href="address_book.php">address book</a> |
      <a href="address_book_add.php">add</a> |
        <a href="address_book_search.php">search</a><br />
    <?php
    if (mysql_connect("localhost", "root", "") && mysql_select_db("address_book")) {
      echo mysql_num_rows(mysql_query("SELECT * from contact")) . " contacts in database.<br /><br />";
    ?>

    <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">
      <fieldset>
        <legend>Add a Contact</legend>
        <label>Name</label><input type="text" name="name" /><br />
        <label>Address</label><input type="text" name="address" /><br />
        <label>City</label><input type="text" name="city" /><br />
        <label>State</label><input type="text" name="state" /><br />
        <label>Zip-Code</label><input type="text" name="zip" /><br />
        <label>Phone</label><input type="text" name="phone" /><br />
        <label>E-mail</label><input type="text" name="email" /><br />
        <label></label><input type="submit" value="Add Contact" class="button" />
      </fieldset>
    </form>
    <br />
    <?php
        if ($_GET['name'] != NULL && $_GET['address'] != NULL
         && $_GET['city'] != NULL && $_GET['state'] != NULL
         && $_GET['zip'] != NULL && $_GET['phone'] != NULL
         && $_GET['email'] != NULL) {
          $insertResult = mysql_query("INSERT INTO contact VALUES('', '"
            . htmlentities($_GET["name"]) . "', '"
            . htmlentities($_GET["address"]) . "', '"
            . htmlentities($_GET["city"]) . "', '"
            . htmlentities($_GET["state"]) . "', '"
            . htmlentities($_GET["zip"]) . "', '"
            . htmlentities($_GET["phone"]) . "', '"
            . htmlentities($_GET["email"]) . "')"
          );
          echo "Contact \"" . $_GET["name"] . "\" added";
        }
      } else {
        echo "Failed to connect to Database.";
    }
    ?>
  </body>
</html>