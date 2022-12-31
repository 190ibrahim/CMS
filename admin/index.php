<?php 
    include "includes/admin_header.php"; 


?>

<body>

    <div id="wrapper">

        <!-- Navigation -->

        <?php include "includes/admin_navigation.php"; ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small> <?php echo $_SESSION['user_firstname']; ?>
                            </small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        $posts_count = count_rows('posts');
                                        echo "<div class='huge'>{$posts_count}</div>";
                                    ?>

                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        $comments_count = count_rows('comments');
                                        echo "<div class='huge'>{$comments_count}</div>";
                                    ?>

                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        $users_count = count_rows('users');
                                        echo "<div class='huge'>{$users_count}</div>";
                                    ?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php
                                        $categories_count = count_rows('categories');
                                        echo "<div class='huge'>{$categories_count}</div>";
                                    ?>

                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php

                $query = "SELECT * FROM posts WHERE post_status= 'draft'";
                $draft_posts_count = getRowCount($connection, $query);
                
                $query = "SELECT * FROM posts WHERE post_status= 'published'";
                $published_posts_count =  getRowCount($connection, $query);
                
                $query = "SELECT * FROM users WHERE user_role= 'admin'";
                $admin_users_count =  getRowCount($connection, $query);
                
                $query = "SELECT * FROM users WHERE user_role= 'subscriber'";
                $subscriber_users_count =  getRowCount($connection, $query);
                
                $query = "SELECT * FROM comments WHERE comment_status= 'Approved'";
                $approved_comments_count =  getRowCount($connection, $query);
                
                $query = "SELECT * FROM comments WHERE comment_status= 'Unapproved'";
                $unapproved_comments_count =  getRowCount($connection, $query);
                

?>



                <div class="row">

                    <script type="text/javascript">
                    google.load("visualization", "1.1", {
                        packages: ["bar"]
                    });
                    google.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],

                            <?php  
                            $element_text = ['All Posts','Active Posts','Darft Posts','Comments','Approved Comments','Unapproved Comments', 'Users','Subscriber Users','Categories'];       
                            $element_count = [$posts_count,$published_posts_count, $draft_posts_count,$comments_count,$approved_comments_count,$unapproved_comments_count, $users_count, $subscriber_users_count, $categories_count];
                            for($i =0;$i < 9; $i++) {
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}], ";
                            }                                                
                            ?>


                        ]);
                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };
                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
                        chart.draw(data, options);
                    }
                    </script>
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/admin_footer.php"; ?>