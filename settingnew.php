<?
      $database = 's104848408_db';
      $username = 's104848408';
      $password = '031105';
      $dbh = new PDO("mysql:host=feenix-mariadb.swin.edu.au;dbname=$database", $username, $password);
      foreach($dbh->query('SELECT * from my_table') as $row)
      {
         print_r($row);
      }
   ?>