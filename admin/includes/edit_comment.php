<?php
if (isset($_GET['comment_id'])) {
    $the_comment_id = $_GET['comment_id'];
}

$query = "SELECT * FROM comments WHERE comment_id = ? ";
$select_comments_by_id = $connection->prepare( $query);
confirm($select_comments_by_id->execute([$the_comment_id]));
$comment = $select_comments_by_id->fetchAll();

foreach($comment as $row){
    $comment_id = $row['comment_id'];
    $comment_author = $row['comment_author'];
    $comment_email = $row['comment_email'];
    $comment_post_id  = $row['comment_post_id'];
    $comment_status = $row['comment_status'];
    $comment_content = $row['comment_content'];
    $comment_date = $row['comment_date'];
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
        $query = "SELECT * FROM posts WHERE post_id = ?";
        $select_image = $connection->prepare( $query);
        confirm($select_image->execute([$the_post_id]));
        $selected_image = $select_image->fetchAll();
        
        foreach($selected_image as $row){
            $the_post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET ";
    $query .= "post_title  = ?, ";
    $query .= "post_category_id = ?, ";
    $query .= "post_date   =  now(), ";
    $query .= "post_author = ?, ";
    $query .= "post_status = ?, ";
    $query .= "post_tags   = ?, ";
    $query .= "post_content= ?, ";
    $query .= "post_image  = ? ";
    $query .= "WHERE post_id = ? ";

    $update_post = $connection->prepare( $query);
    confirm($update_post->execute([$the_post_title, $the_post_category_id, $the_post_author, $the_post_status, $the_post_tags, $the_post_content,  $the_post_image, $the_post_id ]));

    echo " <div class='alert alert-success' role='alert'>Comment Updated: 
    <a href='comments.php'>View Comment</a> </div>";
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

            $select_categories = $connection->prepare( $query);
            confirm($select_categories->execute([$the_comment_id]));
            $category = $select_categories->fetchAll();
            
            foreach($category as $row){
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
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status" />
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