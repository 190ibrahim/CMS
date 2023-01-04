<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>In response to</th>
            <th>Date</th>
            <th>Status</th>
            <th>Approve</th>
            <th>Unaprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT * FROM comments";

        $select_comments = $connection->prepare( $query);
        confirm($select_comments->execute());
        $comment = $select_comments->fetchAll();
        foreach($comment as $row){
        
            $comment_id = $row['comment_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_post_id  = $row['comment_post_id'];
            $comment_status = $row['comment_status'];
            $comment_content = $row['comment_content'];
            $comment_date = $row['comment_date'];

            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_email}</td>";

            $query1 = "SELECT * FROM posts WHERE post_id= ? ";
            $select_post = $connection->prepare( $query1);
            confirm($select_post->execute([$comment_post_id]));
            $post = $select_post->fetchAll();
            foreach($post as $row){
                $post_title = $row['post_title'];
                $post_id = $row['post_id'];
                echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
            }
            echo "<td>{$comment_date}</td>";
            echo "<td>{$comment_status}</td>";
            echo "<td><a href='comments.php?approve_comment={$comment_id}'>Approve</a></td>";
            echo "<td><a href='comments.php?unapprove_comment={$comment_id}'>Unapprove</a></td>";
            echo "<td><a href='comments.php?delete_comment={$comment_id}'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
        </tr>
    </tbody>
</table>

<?php

if (isset($_GET['approve_comment'])) {

    $the_comment_id = $_GET['approve_comment'];
    $query = "UPDATE comments SET comment_status='Approved' WHERE comment_id = ? ";
    $approve_query = $connection->prepare( $query);
    confirm($approve_query->execute([$the_comment_id]));
    header("Location: comments.php");
}

if (isset($_GET['unapprove_comment'])) {

    $the_comment_id = $_GET['unapprove_comment'];
    $query = "UPDATE comments SET comment_status='Unapproved' WHERE comment_id = ? ";
    $unapprove_query = $connection->prepare( $query);
    confirm($unapprove_query->execute([$the_comment_id]));
    header("Location: comments.php");
}


// DELET A COMMENT
if (isset($_GET['delete_comment'])) {

    $the_comment_id = $_GET['delete_comment'];
    $query = "DELETE FROM comments WHERE comment_id = ? ";
    $delete_query = $connection->prepare( $query);
    confirm($delete_query->execute([$the_comment_id]));
    header("Location: comments.php");
}
?>