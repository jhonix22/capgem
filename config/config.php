<?php
      $mysqli = new mysqli("us-cdbr-iron-east-03.cleardb.net", "b2c92c9b237584", "2f16bc0f", "heroku_306f40779193461");
      if ($mysqli->connect_errno) {
          echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      echo $mysqli->host_info . "\n";
?>