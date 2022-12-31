<?php include "includes/admin_header.php"; ?>

<?php

if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}'";
    $select_user_query = mysqli_query($connection, $query);
    if (!$select_user_query) {

        die("QUERY FAILED" . mysqli_error($connection));
    }


    while ($row = mysqli_fetch_assoc($select_user_query)) {
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
    }
}
?>
<?Php
if (isset($_POST['update_user'])) {

    $the_username = $_POST['username'];
    $the_user_password = $_POST['user_password'];
    $the_user_firstname = $_POST['user_firstname'];
    $the_user_lastname = $_POST['user_lastname'];

    $the_user_image = $_FILES['user_image']['name'];
    $the_user_image_temp = $_FILES['user_image']['tmp_name'];

    $the_user_email = $_POST['user_email'];
    $the_user_role = $_POST['user_role'];


    move_uploaded_file($the_user_image_temp, "../images/$the_user_image"); //DOUBLE QOUTES

    if (empty($the_user_image)) {
        $query = "SELECT * FROM users WHERE user_id = {$user_id}";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_image)) {
            $the_user_image = $row['user_image'];
        }
    }

    $query = "UPDATE users SET ";
    $query .= "username  = '{$the_username}', ";
    $query .= "user_password = '{$the_user_password}', ";

    $query .= "user_firstname = '{$the_user_firstname}', ";
    $query .= "user_lastname = '{$the_user_lastname}', ";

    $query .= "user_role= '{$the_user_role}', ";
    $query .= "user_image  = '{$the_user_image}',  ";
    $query .= "user_email  = '{$the_user_email}' ";
    $query .= "WHERE username = '{$username}' ";

    $update_user_query = mysqli_query($connection, $query);
    comfirm($update_user_query);
    header("Location: profile.php");
}


?>
<div id="wrapper">
    <!-- Navigation -->
    <?php include "includes/admin_navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to admin
                        <small><?php echo "{$user_firstname}" ?></small>
                    </h1>

                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="author">First Name</label>
                            <input type="text" class="form-control" name="user_firstname"
                                value="<?php echo "{$user_firstname}" ?>" />
                        </div>

                        <div class="form-group">
                            <label for="post_status">Last Name</label>
                            <input type="text" class="form-control" name="user_lastname"
                                value="<?php echo "$user_lastname" ?>" />
                        </div>

                        <div class="form-group">
                            <select class="form-select" name="user_role" id="">
                                <option value="<?php echo "$user_role" ?>"><?php echo "$user_role" ?></option>
                                <?php
                                    if ($user_role = 'admin') {
                                        echo "<option value='subscriber'>Subscriber</option>";
                                    } else {
                                        echo "<option value='admin'>Admin</option>";
                                    }
                                    ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="title">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo "$username" ?>" />
                        </div>

                        <div class="form-group">
                            <img width="100" src="../images/<?php echo $user_image; ?>" alt="">
                            <input type="file" name="user_image">
                        </div>

                        <div class="form-group">
                            <label for="post_content">User Email</label>
                            <input type="email" class="form-control" name="user_email"
                                value="<?php echo "$user_email" ?>" />
                        </div>

                        <div class="form-group">
                            <label for="title">User password</label>
                            <input type="password" class="form-control" name="user_password"
                                value="<?php echo "$user_password" ?>" />
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="update_user" value="Update profile ">
                        </div>
                    </form>


                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
    <?php
    

    include "includes/admin_footer.php";
    ?>