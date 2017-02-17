<?php

require_once 'class.user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
    $reg_user->redirect('home.php');
}


if(isset($_POST['btn-email']))
{
    $recipient = trim($_POST['recipient']);
    $recipient_email = trim($_POST['recipient_email']);
    $message = trim($_POST['message']);
    $email = 'daetacity@gmail.com';
    
    /**
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
            */            
            $subject = $recipient.'  '.$recipient_email;
                        
            $reg_user->send_mail($email,$message,$subject); 
            $msg = "
                    <div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Success!</strong> your message has been sent, we will get backk to you as soon as possible. 
                    </div>
                    ";
        //}
       // else
        //{
          //  echo "sorry , Query could no execute...";
        //}       
    //}
}
?>


<?php require_once 'assets/includes/header.php';?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
             <div class = "col-md-2"></div>
                <div class="col-md-8">
                    <h4 class="page-head-line">Contact Us</h4>

                    <div class="Compose-Message">               
                <div class="panel panel-success">
                <?php if(isset($msg)) echo $msg;  ?>
                    <div class="panel-heading">
                        Compose New Message 
                    </div>
                    <div class="panel-body">
                    <form method="post" action="contact.php">
                        
                        <label>Enter Recipient Name : </label>
                        <input type="text" name="recipient" class="form-control" required />
                        <label>Enter Email Address :  </label>
                        <input type="email" name="recipient_email" class="form-control" required/>
                        <label>Enter Message : </label>
                        <textarea rows="9" name="message" class="form-control" required></textarea>
                        <hr />
                        <button  name="btn-email" class="btn btn-warning" name=""><span class="glyphicon glyphicon-envelope"></span> Send Message </button>&nbsp;
                    </form> 
                    </div>
                    <div class="panel-footer text-muted">
                        <strong>Note : </strong>Please note that we track all messages so don't send any spam.
                    </div>
                </div>
                     </div>

                </div>

                <div class = "col-md-2"></div>

            </div>
          

  
   </div>
  </div>

    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2017 Wondafund
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
   <script src="assets/js/index.js"></script>

    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>
