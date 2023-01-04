<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>
    </div>
    <?php
    if (isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];
        $query = "SELECT * FROM categories WHERE cat_id = ?  ";
        $select_categories_id = $connection->prepare( $query);
        confirm($select_categories_id->execute([$cat_id]));
        $category = $select_categories_id->fetchAll();

        foreach($category as $row){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
    ?>
    <input value="<?php if (isset($cat_title)) {
                                echo $cat_title;
                            } ?>" type="text" class="form-control" name="cat_title">
    <?php
        }
    }

    //update query
    if (isset($_POST['update_category'])) {

        $the_cat_title = $_POST['cat_title'];
        $query = "UPDATE categories SET cat_title = ? WHERE cat_id = ? ";
        $update_query = $connection->prepare( $query);
        confirm($update_query->execute([$the_cat_title ,$cat_id]));

        echo " <div class='alert alert-success' role='alert'>Category Updated: </div>";
    }
    ?>


    <br>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="update">
    </div>
</form>