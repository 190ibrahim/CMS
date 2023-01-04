<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th colspan="2">Change role</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM users";
        $select_users = $connection->prepare( $query);
        $select_users->execute();
        $user = $select_users->fetchAll();
        foreach($user as $row){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname  = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$username}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_role}</td>";
            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user& user_id={$user_id}'>Edit</a></td>";
            echo "<td><a href='users.php?delete_user={$user_id}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </tr>
    </tbody>
</table>

<?php

if (isset($_GET['change_to_admin'])) {

    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role='admin' WHERE user_id = ?";
    $change_to_admin_query = $connection->prepare( $query);
    $change_to_admin_query->execute([$the_user_id]);
    
    header("Location: users.php");
}

if (isset($_GET['change_to_sub'])) {

    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role='subscriber' WHERE user_id = ?";
    $change_to_sub_query = $connection->prepare( $query);
    $change_to_sub_query->execute([$the_user_id]);

    header("Location: users.php");
}


// DELET A COMMENT
if (isset($_GET['delete_user'])) {

    $the_user_id = $_GET['delete_user'];
    $query = "DELETE FROM users WHERE user_id = ? ";
    $delete_query = $connection->prepare( $query);
    $delete_query->execute([$the_user_id]);

    header("Location: users.php");
}
?>