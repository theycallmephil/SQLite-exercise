<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php

require_once "database.php";

try{

$sQuery = $file_db->prepare( 'SELECT * FROM users' );
$sQuery->execute();

$aUsers = $sQuery->fetchAll();
foreach($aUsers as $aUser){
    echo '<div data-id="'.$aUser['id'].'">';
    echo '<input value="'.$aUser['name'].'">';
    echo '<input value="'.$aUser['email'].'">';
    echo '<input value="'.$aUser['password'].'">';
    echo '</div>';
}
}catch(PDOException $ex){
echo '{"status":0, "message":"exception"}';
}

?>

</body>
</html>