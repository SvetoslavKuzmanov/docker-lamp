<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Welcome to Example</title>
</head>
<body>
  <h1><?php echo "It works!"; ?></h1>
  <h2>Welcome to Example</h2>
  <p>This is the default web page for this server.</p>
  <p>The web server software is running but no content has been added, yet.</p>

  <?php
    $server_name = "mysql";
    $username = "root";
    $password = "p4ssw0rd!";
  ?>
  <p>Checking connection using mysqli</p>
  <p>
  <?php
    // Create connection using mysqli
    $conn = new mysqli($server_name, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection using mysqli failed: " . $conn->connect_error);
    }
    echo "Connected successfully using mysqli";
  ?>
  </p>

  <p>Checking connection using PDO</p>
  <p>
  <?php
    try {
        $conn = new PDO("mysql:host=$server_name;dbname=mysql", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully using PDO";
        }
    catch(PDOException $e)
        {
        echo "Connection using PDO failed: " . $e->getMessage();
        }
   ?>
   </p>
</body>
</html>
