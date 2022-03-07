
<?php include('partials/navbar.php');?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | MANAGE ADMIN </h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <!-- Main body -->
    
        <div class="main-btitle">
            <h1>Registered Admins</h1>
        </div>

        
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //Displaying session message
                unset($_SESSION['add']); //Removing session message
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];//Displaying session message
                unset($_SESSION['delete']);//Removing session message
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];//Displaying session message
                unset($_SESSION['update']);//Removing session message
            }
            if(isset($_SESSION['user-not-found'])){
                echo $_SESSION['user-not-found']; //Displaying session message
                unset($_SESSION['user-not-found']);//Removing session message
            }
            if(isset($_SESSION['pwd-not-match'])){
                echo $_SESSION['pwd-not-match']; //Displaying session message
                unset($_SESSION['pwd-not-match']);//Removing session message
            }
            if(isset($_SESSION['change-pwd'])){
                echo $_SESSION['change-pwd']; //Displaying session message
                unset($_SESSION['change-pwd']);//Removing session message                
            }


        ?>
        
        
        <a href="add-admin.php" class="secondary-btn-add">Add admin</a>
        <br>

        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            
            <?php
                //Query in selecting admin details
                $sql = "SELECT * FROM admin";

                //Execute query
                $result = mysqli_query($conn, $sql);

                //Check if the query is executed
                if($result==TRUE){
                    //Count rows if data exist is database
                    $count = mysqli_num_rows($result); //Counting rows in data base
                    
                    $n = 1; //Variable to display number *note this is not the id in database*

                    //Check the number of rows
                    if($count > 0){
                        //Row is greater than 0 or we have data in database
                        while($rows = mysqli_fetch_assoc($result)){
                            //While loop to get all data in database
                            $id = $rows['admin_id'];
                            $first_name = $rows['first_name'];
                            $last_name = $rows['last_name'];
                            $email = $rows['email'];
                            $address = $rows['address'];
                            
                            //Display the value in table
                            ?>
                            <tr>
                                <td><?php echo $n++?></td>
                                <td><?php echo $first_name?></td>
                                <td><?php echo $last_name?></td>
                                <td><?php echo $email?></td>
                                <td class="address-td"><?php echo $address?></td>
                                <td>
                                    <a href="update-password.php?id=<?php echo$id;?>" class="secondary-btn-change">Change Password</a>
                                    <a href="update-admin.php?id=<?php echo$id;?>" class="secondary-btn-update">Update Admin</a>
                                    <a href="delete-admin.php?id=<?php echo$id;?>" class="secondary-btn-delete">Delete Admin</a>
                                </td>
                            </tr>
                            <?php

                        }

                    }else{
                        //No data in database
                    }
                }
            ?>

        </table>


    </div><!-- div main-content -->

    <!-- Main Content Section Ends -->

</div> <!-- sidebar link -->


<?php include('partials/footer.php');?>