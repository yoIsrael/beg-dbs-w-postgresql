<?php
   $db_handle = pg_connect('dbname=bpsimple user=jon password=secret');
   $query = 'SELECT title, fname, lname FROM customer';
   $result = pg_query($db_handle, $query);
   if ($result) {
      echo "The query executed successfully.<br />\n";
      for ($row = 0; $row < pg_num_rows($result); $row++) {
         $values = pg_fetch_row($result, $row);
         echo 'Customer: ' . implode(' ', $values) . "<br />\n";
      }
   } else {
      echo "The query failed with the following error:<br />\n";
      echo pg_last_error($db_handle);
   }
   pg_close($db_handle);
?>
