<?php include('partials/menu.php');?>

    <!--menu section ends-->


    <!--main content sec starts-->
    <div class="main-content">
        <div class="menu">
        <div class="wrapper">
            <h1>Manage Admin</h1>

            <br/>


            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add']; //disp
                    unset($_SESSION['add']); //to remove message from session
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete']; //disp
                    unset($_SESSION['delete']); //to
                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update']; //disp
                    unset($_SESSION['update']); //to remove message from session
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                }


            ?>

            <br><br><br>
                <!--btn add admin -->

                <a href="add-admin.php" class="btn-primary">Add Admin </a>
                <table class="tbl-full">

                <br/><br/><br>

                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr>


                <?php
                        //get admin
                    $sql = "SELECT * FROM tbl_admin";
                    //exec
                    $res = mysqli_query($conn, $sql);


                    if($res==TRUE)
                    {
                        //count
                        $count = mysqli_num_rows($res); //get all rows db
                        $sn=1; 

                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username'];

                                ?>

                            <tr>
                                <td><?php echo $sn++; ?> </td>
                                <td><?php echo $full_name; ?></td>
                                <td><?php echo $username; ?></td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>"class="btn-secondary">Update Admin</a>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"class="btn-danger">Delete Admin</a>
                                </td>
                            </tr>

                                <?php
                            }
                        }
                        else
                        {

                        }
                        //no data
                    }

                ?>


            </table>

        </div>
    </div>
 
    <!--main content sec ends-->

<?php include('partials/footer.php');?>