
<?php include("partials/html-head.php") ?>

    <title>Fresh & Organic Online Grocery Store | Category</title>

</head>
<body>
<?php include("partials/navigation.php") ?>
<?php
    //displayin messages
    if(isset($message)){
    foreach($message as $message){
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    };
    };

?>

<div class="container">
    <section class="products">
        <div class="box-container">
            <?php
                if(isset($_GET['id'])){ 
                $id = $_GET['id'];

                $sql = "SELECT product.name, product.image, product.price, product.product_id
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
                            $product_id = $rows['product_id'];
                        ?>

                        <form action="" method="POST">
                            <div class="box">
                                
                                <img src="images/<?php echo $product_image;?>" alt="">
                                <h3><?php echo $product_name;?></h3>
                                <div class="price"> ₱ <?php echo $product_price?> /kg</div>

                                <input type="hidden" name="product_name" value="<?php echo $product_name;?>">
                                <input type="hidden" name="product_price" value="<?php echo $product_price?>">
                                <input type="hidden" name="product_image" value="<?php echo $product_image;?>">
                                <input type="hidden" name="product_id" value="<?php echo $product_id;?>">

                                <?php 
                                if(isset($_SESSION['go-to-products'])){
                                echo $_SESSION['go-to-products'];
                                }else{
                                echo '<a href="login.php" class="btn">Log In First</a>';
                                }?>
                            </div>
                        </form>
                        

                        
                    
                    <?php
                }
            }else{
                echo "<div class='error'>Do not have any product in this category yet. </div>";   
            }
            }
        }   
            
        ?>
        </div>
    </section>
</div>



<?php include("partials/footer.php") ?>

</body>
</html>