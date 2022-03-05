<?php
    include("../config/constant.php");
    include("login-check.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">



    <title>FOOGS Admin</title>
</head>

<body>
    <!-- Menu/Navigation Bar Section Starts -->
    <div class="container">
        <nav>
            <ul>                
                <li><a href="../index.php" class="logo">
                    <img src="../images/favicon.ico" alt="">
                </a></li>
                </a></li>
                <li><a href="index.php">
                    <i class="fa-solid fa-house-chimney"></i>
                    <span class="nav-item">Home</span>
                </a></li>
                <li><a href="manage-admin.php">
                    <i class="fa-solid fa-user-gear"></i>
                    <span class="nav-item">Admin</span>
                </a></li>
                <li><a href="manage-category.php">
                    <i class="fa-solid fa-arrow-down-wide-short"></i>
                    <span class="nav-item">Category</span>
                </a></li>
                <li><a href="manage-inventory.php">
                    <i class="fa-solid fa-warehouse"></i>
                    <span class="nav-item">Inventory</span>
                </a></li>

                <li><a href="manage-order.php">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span class="nav-itemDisable">Orders</span>
                </a></li>

                <li><a href="#">
                    <i class="fas fa-question-circle"></i>
                    <span class="nav-itemDisable">Help</span>
                </a></li>

                <li><a href="../admin/logout.php" class="logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-item">Logout</span>
                </a></li>           
            </ul>
        </nav>

        <!-- Menu/Navigation Bar Section Ends -->