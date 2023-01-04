<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Post Contengt</th>
            <th>Date</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>

        <?php

        $query = "SELECT * FROM posts";
        $select_posts = $connection->prepare( $query);
        confirm($select_posts->execute());
        $posts = $select_posts-> fetchAll();

        foreach($posts as $row){
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

            $query1 = "SELECT * FROM categories WHERE cat_id= $post_category_id";

            $select_category = $connection->prepare( $query1);
            confirm($select_category->execute());
            $category = $select_category->fetchAll();
            foreach ($category as $row) {
                $cat_title = $row['cat_title'];
            }

            echo "<tr>";
            echo "<td>{$post_id}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$cat_title}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><img width= '100' class='img-responsive' src= '../images/{$post_image}' alt='There is no photo'></td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><a href='../post.php?p_id= {$post_id}'>View Post</a></td>";
            echo "<td><a href='posts.php?source=edit_post& p_id={$post_id}'>Edit</a></td>";
            echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </tr>
    </tbody>
</table>

<?php
// DELET A POST
if (isset($_GET['delete'])) {

    $the_post_id = $_GET['delete'];
    $delete_query = "DELETE FROM posts WHERE post_id =?";
    $delete_query = $connection->prepare( $delete_query);
    confirm($delete_query->execute([$the_post_id]));

    header("Location: posts.php");
}



//UPDATE A POST
?>