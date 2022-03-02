
<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <a href="logout.php"> Logout </a>
    Welcome <?php //echo $_SESSION['username']; ?>
    <?php 
       $conn = new mysqli('localhost', 'root', '', 'accounts');

       if($conn -> connect_error){
          die('Connection Failed: ' .$conn -> connect_error);
       }

       $sql = 'select firstname, lastname, email from users';
       while($row = mysqli_fetch_query($sql)){
        echo "<b><a href="readphp.php?id={$row['employee_id']}">{$row['employee_name']}</a></b>";
        echo "<br />";
       }
    ?>
    
</body>
</html>