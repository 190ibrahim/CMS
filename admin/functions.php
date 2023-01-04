<?php

function confirm($result) {
  global $connection;
  if (!$result) {
    die('QUERY FAILED' . $connection->errorInfo());
  }
} 

function insertCategories(){
    global $connection;
    if (isset($_POST['submit'])) {

        $cat_title = $_POST['cat_title'];
        if ($cat_title == "" || empty($cat_title)) {
            echo "This field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUES(?)";
            $create_category_query = $connection->prepare( $query);
            $create_category_query->execute($cat_title);

            header("Location: categories.php");
            exit;

        }
    }
}



function findAllCategories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = $connection->prepare( $query);
    $select_categories->execute();
    $category = $select_categories->fetchAll();

    foreach($category as $row){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}


function deleteCategories()
{

    global $connection;
    if (isset($_GET['delete'])) {

        $the_cat_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE cat_id = ? ";
        $delete_query = $connection->prepare( $query);
        $delete_query->execute($the_cat_id);

        header("Location: categories.php");
    }
}



function count_rows($table) {
    global $connection;
    $query = "SELECT * FROM $table";
    $result = $connection->prepare( $query);
    $result->execute();

    return $result->rowCount();
}

function getRowCount($query) {
    global $connection;
  $result = $connection->prepare( $query);
  $result->execute();
  return $result->rowCount();
}