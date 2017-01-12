<?php
  $host = 'localhost';
  $user = 'root';
  $pass = 'root';
  $base = 'Ziekwel';

  // Create connection
  $conn = new PDO("mysql:host=$host;dbname=$base", $user, $pass);

  // Make sure errors are shown
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
