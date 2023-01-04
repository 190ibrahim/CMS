<?php
if (isset($_POST['add_user'])) {

    $username = $_POST['username'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_password = password_hash($user_password, PASSWORD_DEFAULT);
    $user_image = $_FILES['user_image']['name'];
    $user_image_temp = $_FILES['user_image']['tmp_name'];
    $user_role = $_POST['user_role'];

    move_uploaded_file($user_image_temp, "../images/$user_image"); //DOUBLE QOUTES


    $query = "INSERT INTO users(username, user_password, user_firstname, ";
    $query .= "user_lastname, user_email, user_image, user_role) ";
    $query .= "VALUES(? , ? , ? , ? , ? , ? , ? )";
    $add_user_query = $connection->prepare( $query);
    confirm($add_user_query->execute([$username, $user_password, $user_firstname, $user_lastname, $user_email, $user_image, $user_role ]));
    // header("Location: posts.php");
    // exit;

    echo " <div class='alert alert-success' role='alert'>User Created: 
    <a href='users.php'>View User</a> </div>";
}

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="author">First Name</label>
        <input type="text" class="form-control" name="user_firstname" />
    </div>

    <div class="form-group">
        <label for="post_status">Last Name</label>
        <input type="text" class="form-control" name="user_lastname" />
    </div>

    <div class="form-group">
        <select class="form-select" name="user_role" id="">
            <option value="subscriber">Choose a role:</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username" />
    </div>

    <div class="form-group">
        <label for="post_image">User Image</label>
        <input type="file" name="user_image" />
    </div>

    <div class="form-group">
        <label for="post_content">User Email</label>
        <input type="email" class="form-control" name="user_email" />
    </div>

    <div class="form-group">
        <label for="title">User password</label>
        <input type="password" class="form-control" name="user_password" />
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="add_user" value="Add user">
    </div>
</form>