<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Category</title>

</head>
<body>
<?php include("partials/navigation.php") ?>

    <?php
        if(isset($_GET['id'])){ 
        $id = $_GET['id'];

        $sql = "SELECT category.name, product.name, product.image, product.price
        FROM product 
        INNER JOIN category
        ON product.category_id = $id AND category.category_id = $id";
        
        $result = mysqli_query($conn, $sql);

        if($result == TRUE){
            $count = mysqli_num_rows($result);

            if($count > 0){
                while($rows = mysqli_fetch_assoc($result)){
                    $product_name = $rows['name'];
                    $product_image = $rows['image'];
                    $product_price = $rows['price'];
                ?>
                <h1><?php echo $product_name;?></h1>
                <img src="images/<?php echo $product_image;?>" alt="">
                <p>&#8369 <?php echo $product_price?> / Kg</p>
                <?php
            }
        }else{
            echo "<div class='error'>Do not have any product in this category yet. </div>";   
        }
        }
    }   
        
    ?>



<?php include("partials/footer.php") ?>

</body>
</html>