<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];
}

$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
$select_posts_bt_id = mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts_bt_id)) {
    $post_id = $row['post_id'];
    $post_author = $row['post_author'];
    $post_title = $row['post_title'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_content = $row['post_content'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];
}

?>


<?php
if (isset($_POST['update_post'])) {

    $the_post_title = $_POST['title'];
    $the_post_category_id = $_POST['post_category'];
    $the_post_author = $_POST['author'];
    $the_post_status = $_POST['post_status'];

    $the_post_image = $_FILES['image']['name'];
    $the_post_image_temp = $_FILES['image']['tmp_name'];

    $the_post_tags = $_POST['post_tags'];
    $the_post_content = $_POST['post_content'];


    move_uploaded_file($the_post_image_temp, "../images/$the_post_image"); //DOUBLE QOUTES

    if (empty($the_post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
        $select_image = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_image)) {
            $the_post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title  = '{$the_post_title}', ";
    $query .= "post_category_id = '{$the_post_category_id}', ";
    $query .= "post_date   =  now(), ";
    $query .= "post_author = '{$the_post_author}', ";
    $query .= "post_status = '{$the_post_status}', ";
    $query .= "post_tags   = '{$the_post_tags}', ";
    $query .= "post_content= '{$the_post_content}', ";
    $query .= "post_image  = '{$the_post_image}' ";
    $query .= "WHERE post_id = {$the_post_id} ";



    $update_post = mysqli_query($connection, $query);
    comfirm($update_post);
    echo " <div class='alert alert-success' role='alert'>Post Updated: 
    <a href='../post.php?p_id= {$the_post_id}'>View Post</a>
Or <a href='posts.php'>Edit Other Posts</a></div>";
}
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title" />
    </div>

    <div class="form-group">
        <label for="post_category">Choose a category:</label>
        <select class="form-select" name="post_category" id="">
            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);
            comfirm($select_categories);
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'> $cat_title</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author" />
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-select" name="post_status" id="">
            <option value="<?php echo "$post_status" ?>"><?php echo "$post_status" ?></option>
            <?php
            if ($post_status = 'draft') {
                echo "<option value='published'>Published</option>";
            } else {
                echo "<option value='draft'>Draft</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags" />
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" rows="5"
            cols="15"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
    </div>
</form>