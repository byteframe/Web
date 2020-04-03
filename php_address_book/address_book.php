<!DOCTYPE html PUBLIC "-//W3C/DTD XHTML 1.1//EN"
  "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

  <head>
    <title>address_book</title>
    <link href="address_book.css" rel="stylesheet" type="text/css">
  </head>

  <body>
    <a href="address_book.php">address book</a> |
      <a href="address_book_add.php">add</a> |
        <a href="address_book_search.php">search</a><br />
    <?php
      if (mysql_connect("localhost", "root", "")
       && mysql_select_db("address_book")) {
        if ($_GET['remove'] != NULL) {
          mysql_query("DELETE FROM contact WHERE id = '" . $_GET['remove'] . "'");
        }
        $selectResult = mysql_query("SELECT * FROM contact");
        echo mysql_num_rows($selectResult) . " contacts in database.<br /><br />";

        echo "<fieldset>
                <legend>Address Book</legend>
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
        echo "Failed to connect to database..." ;
      }
    ?>

  </body>
</html>
