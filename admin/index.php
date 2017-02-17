<?php
session_start();
require_once '../class.user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtupass']);

	
	if($user_login->login($email,$upass))
	{
		$user_login->redirect('home.php');
	}
}
?>



<?php include 'assets/includes/header.php';?>







    <!-- MENU SECTION END-->
    <div class="content-wrapper">
    <div class="container">
            <div class="row">
            <h1>Admin Login</h1>
               
                       <div class = "col-md-6">
                        <?php 
                            if(isset($_GET['inactive']))
                            {
                              ?>
                                    <div class='alert alert-error'>
                                <button class='close' data-dismiss='alert'>&times;</button>
                                <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
                              </div>
                                    <?php
                            }
                            ?>
                                <form class="form-group" method="post">
                                <?php
                                if(isset($_GET['error']))
                            {
                              ?>
                                    <div class='alert alert-success'>
                                <button class='close' data-dismiss='alert'>&times;</button>
                                <strong>Wrong Details!</strong> 
                              </div>
                                    <?php
                            }
                        ?>
                                        <h2 class="form-signin-heading">Sign In.</h2><hr />

                          <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email address" name="txtemail" required />
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control"  placeholder="Password" name="txtupass" required />
                          </div>

                        <hr />
                          <button class="btn btn-large btn-primary" type="submit" name="btn-login">Sign in</button>
                          
                          <a href="../fpass.php">Lost your Password ? </a>
                        </form>
                </div>
            </div>
      </div>
      </div>
      </div>




</div>
</div>



    <!-- CONTENT-WRAPPER SECTION END-->
 

    <?php require_once 'assets/includes/footer.php';?>
</body>
</html>



















