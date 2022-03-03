
<?php include('partials/navbar.php');?>

    <!-- Main Content Section Starts -->
    <div class="main-content">
        <div class="main-top">
            <h1>PORTAL | MANAGE ADMIN </h1>
            <i class="fas fa-user-cog"></i>
        </div>
        <!-- Main body -->
        <br><br>
            <div class="main-btitle">
                <h1>Registered Users</h1>
            </div>
        <br>
        
        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add']; //Displaying session message
                unset($_SESSION['add']); //Removing session message
            }
        ?>
        <br>
        <br>
        <a href="add-admin.php">Add admin</a>
        <table class="tbl-full">
            <tr>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>Action</th>
                <th></th>
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
                            $id = $rows['id'];
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
                                <td><?php echo $address?></td>
                                <td><a href="#" class="secondary-btn">Update Admin</a></td>
                                <td><a href="#" class="secondary-btn">Delete Admin</a></td>
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