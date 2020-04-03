<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <title>address_book : search</title>
    <link href="address_book.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <a href="address_book.php">address book</a> |
      <a href="address_book_add.php">add</a> |
        <a href="address_book_search.php">search</a><br />
    <?php
    if (mysql_connect("localhost", "", "") && mysql_select_db("address_book")) {
      echo mysql_num_rows(mysql_query("SELECT * from contact")) . " contacts in database.<br /><br />";
    ?>

    <form action="<?php htmlentities($_SERVER['PHP_SELF']); ?>" method="GET">
      <fieldset>
        <legend>Search for Contact</legend>
        <label>Search</label><input type="text" name="search" /><br />
        <label></label><input type="submit" value="Search" class="button">
      </fieldset>
    </form>

    <?php
      if ($_GET['search'] != NULL) {
        $selectResult = mysql_query(
          "SELECT * from contact WHERE name LIKE '%" . $_GET['search'] . "%"
          . "' || address LIKE '%" . $_GET['search'] . "%"
          . "' || city LIKE '%" . $_GET['search'] . "%"
          . "' || state LIKE '%" . $_GET['search'] . "%"
          . "' || phone LIKE '%" . $_GET['search'] . "%"
          . "' || email LIKE '%" . $_GET['search'] . "%" . "'");
        echo "<br />";
        if (mysql_num_rows($selectResult) > 0) {
          echo "<fieldset>
                  <legend>Search Results</legend>
                  <table>
                    <tr>
                      <th>Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Zip</th>
                      <th>Phone</th>
                      <th>Email</th>
                      <th>Delete</th>
                    </tr>";
          while ($result_row = mysql_fetch_row($selectResult)) {
            echo "  <tr>";
            for($c = 1; $c < count($result_row); $c++) {
              echo "  <td>" . $result_row[$c] . "</td>";
            }
            echo "<td align=\"center\"><a href=\"address_book.php?remove=" . $result_row[0] . "\">" . X . "</a></td>";
            echo "  </tr>";
          }
          echo "  </table>
                </fieldset>";
        } else {
          echo "No Contacts Found.";
        }
      }
    } else {
      echo "Failed to connect to Database.";
    }
    ?>
    <br />
  </body>
</html>