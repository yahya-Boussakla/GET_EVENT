<?php
  try {
    $conn = new PDO("mysql:host=localhost;dbname=gestion_evenment", "root", "");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  $query = $conn->prepare("select * FROM EVENMENT");
  $query->execute();
  $data = $query->fetchAll(PDO::FETCH:ASSOC);
?>