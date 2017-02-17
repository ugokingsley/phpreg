




<?php

require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('home.php');
}


if(isset($_POST['btn-signup']))
{
	$uname = trim($_POST['txtuname']);
	$email = trim($_POST['txtemail']);
	$upass = trim($_POST['txtpass']);
	$gsm = trim($_POST['txtgsm']);
	$code = md5(uniqid(rand()));
	
	$stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
	$stmt->execute(array(":email_id"=>$email));
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	if($stmt->rowCount() > 0)
	{
		$msg = "
		      <div class='alert alert-error'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry !</strong>  email allready exists , Please Try another one
			  </div>
			  ";
	}
	else
	{
		if($reg_user->register($uname,$email,$upass,$gsm,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to DaetaCity!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://localhost/signup/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong>  We've sent an email to $email.
                    Please click on the confirmation link in the email to create your account. 
			  		</div>
					";
		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}
?>

 <?php require_once 'assets/includes/header.php';?>


  <body id="login">






<div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Register Below</h4>

                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                   
                   <?php if(isset($msg)) echo $msg;  ?>
      				<form class="form-group" method="post">
      				<div class="form-group">
                    	<input type="text" class="form-control" placeholder="Full Name" name="txtuname" required />
                    </div>
                    <div class="form-group">
        				<input type="email" class="form-control" placeholder="Email address" name="txtemail" required />
        			</div>
        			<div class="form-group">
        				<input type="password" class="form-control" placeholder="Password" id="password"  name="txtpass" required />
        			</div>
					
        			<div class="form-group">
        				<input type="tel" class="form-control" placeholder="Phone Number" id="txtgsm" name="txtgsm" required />
        			</div>
					<div class="form-group">
        				<input type="tel" class="form-control" placeholder="Confirm Phone Number" id="txtgsm_confirm" oninput="check(this)" name="txtgsm" required />
        			</div>
					<script language='javascript' type='text/javascript'>
						function check(input) {
							if (input.value != document.getElementById('txtgsm').value) {
								input.setCustomValidity('Phone Number Must be Matching.');
							} else {
								// input is valid -- reset the error message
								input.setCustomValidity('');
							}
						}
					</script>
        			<button class="btn btn-large btn-primary" type="submit" name="btn-signup"><span class="glyphicon glyphicon-user"></span> &nbsp;Sign Me Up</button>

        			</form>
                        
                </div>

            </div>
        </div>
    </div>





 <?php require_once 'assets/includes/footer.php';?>
</body>
</html>







