    <?php session_start(); ?>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    $query = $connection->prepare("SELECT * FROM categories LIMIT 3");
                    $query->execute();
                    $category = $query->fetchAll();
                    foreach ($category as $row) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='category.php?category=$cat_id''>{$cat_title}</a> </li>";
                    }


                    //if the user has signed in then he can edit
                    if(isset($_SESSION['user_role'])){
                        if(isset($_GET['p_id'])){
                            $the_post_id = $_GET['p_id'];
                            echo "  <li>
                                        <a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit post</a>
                                    </li> ";
                        }              
                    }else if(!isset($_SESSION['user_role'])){

                        echo "  <li>
                            <a href='registration.php'>Register</a>
                            </li> ";
                    }
                ?>



                    <li>
                        <a href='contact.php'>Contact us</a>
                    </li>
                    <!-- <li>
                        <a href='registration.php'>Register</a>
                    </li> -->


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
