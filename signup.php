<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Update friend</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
</head>
<body>
  
<div id="container">

    <form action="signup.php" method="POST">
        <h2>Name:</h2>
        <input type="text" name="name" required>
        <h2>Email:</h2>
        <input type="text" name="email" required>
        <h2>Password:</h2>
        <input type="text" name="password" required>
        <button>Add user</button>
    </form>
</div>

<?php

if( empty($_POST['name']) ||
empty($_POST['email']) ||
empty($_POST['password']) 
){
exit;
}

require_once('database.php');

try{

    $sQuery = $file_db->prepare('INSERT INTO users VALUES (null, :Name, :Email, :Password)');
    $sQuery->bindValue(':Name', $_POST['name']);
    $sQuery->bindValue(':Email', $_POST['email']);
    $sQuery->bindValue(':Password', $_POST['password']);
    $sQuery->execute();

    header("Location: show.php");
  }catch(PDOException $ex){
    echo '{"status":0, "message":"exception"}';
  }
