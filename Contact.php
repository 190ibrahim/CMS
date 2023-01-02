 <?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>


 <!-- Navigation -->

 <?php  include "includes/navigation.php"; 

if(isset($_POST['submit'])){
    $subject =$_POST['subject'];
    $email =$_POST['email'];
    $body =$_POST['body'];

    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);

    echo " <div class='alert alert-success' role='alert'>Successful Registration</div>";
}

?>


 <!-- Page Content -->
 <div class="container">

     <section id="login">
         <div class="container">
             <div class="row">
                 <div class="col-xs-6 col-xs-offset-3">
                     <div class="form-wrap">
                         <h1>Contact Us</h1>
                         <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                             <div class="form-group">
                                 <input class="form-control" type="email" name="email" id="email" class="form-control"
                                     placeholder="Enter your email">
                             </div>
                             <div class="form-group">
                                 <input class="form-control" type="text" name="subject" id="subject"
                                     class="form-control" placeholder="subject">
                             </div>
                             <div class="form-group">
                                 <textarea class="form-control" name="body" id="body" cols="30" rows="10"
                                     placeholder="How can we help?"></textarea>
                             </div>
                             <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block"
                                 value="submit">
                         </form>

                     </div>
                 </div> <!-- /.col-xs-12 -->
             </div> <!-- /.row -->
         </div> <!-- /.container -->
     </section>


     <hr>



     <?php include "includes/footer.php";?>