<?php
if (isset($_GET['user_id'])) {
    $the_user_id = $_GET['user_id'];
}

$query = "SELECT * FROM users WHERE user_id = ?";

$select_users_by_id = $connection->prepare( $query);
confirm($select_users_by_id->execute([$the_user_id]));
$user = $select_users_by_id->fetchAll();
foreach($user as $row){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
}

?>


<?php
if (isset($_POST['update_user'])) {

    $the_username = $_POST['username'];
    $the_user_password = $_POST['user_password'];
    $the_user_password = password_hash($the_user_password, PASSWORD_DEFAULT);
    $the_user_firstname = $_POST['user_firstname'];
    $the_user_lastname = $_POST['user_lastname'];

    $the_user_image = $_FILES['user_image']['name'];
    $the_user_image_temp = $_FILES['user_image']['tmp_name'];

    $the_user_email = $_POST['user_email'];
    $the_user_role = $_POST['user_role'];


    move_uploaded_file($the_user_image_temp, "../images/$the_user_image"); //DOUBLE QOUTES

    if (empty($the_user_image)) {
        $query = "SELECT * FROM users WHERE user_id = ? ";
        $select_image = $connection->prepare( $query);
        confirm($select_image->execute([$the_user_id]));
        $selected_image = $select_image->fetchAll();
        foreach($selected_image as $row){
            $the_user_image = $row['user_image'];
        }
    }

    $query = "UPDATE users SET ";
    $query .= "username  = ?, ";
    $query .= "user_password = ?, ";
    $query .= "user_firstname = ?, ";
    $query .= "user_lastname = ?, ";
    $query .= "user_role= ?, ";
    $query .= "user_image  = ?,  ";
    $query .= "user_email  = ? ";
    $query .= " WHERE user_id = ? ";



    $update_user_query = $connection->prepare( $query);
    confirm($update_user_query->execute([$the_username, $the_user_password, $the_user_firstname, $the_user_lastname, $the_user_role, $the_user_image, $the_user_email, $the_user_id]));
    
    echo " <div class='alert alert-success' role='alert'>User Updated: 
    <a href='users.php'>View User</a> </div>";
}
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname" value="<?php echo "$user_firstname" ?>" />
    </div>

    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" value="<?php echo "$user_lastname" ?>" />
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
        <input type="email" class="form-control" name="user_email" value="<?php echo "$user_email" ?>" />
    </div>

    <div class="form-group">
        <label for="title">User password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo "$user_password" ?>" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="edit user">
    </div>
</form>