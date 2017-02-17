<?php
session_start();
require_once 'class.user.php';
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



<?php require_once 'assets/includes/header.php';?>







    <!-- MENU SECTION END-->
    <div class="content-wrapper">
            
                  <div class="jumbotron" style = "background: url(assets/img/back.jpg)">
				  
                    <div class = "container">
					<div class="row">
                <div class="col-md-7">
                      <h1>Welcome to WondaFund</h1>
                      <p>Wondafund is majorly founded to eradicate poverty in our community.</p>
                      
                       
              
                </div>
            
			
			<div class = "col-md-5">
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
                                    <div class='alert alert-danger'>
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
                          <button class="btn btn-large btn-danger" type="submit" name="btn-login">Sign in</button>
                          <a href="signup.php" style="float:right;" class="btn btn-large btn-danger">Sign Up</a><hr />
                          <a href="fpass.php"class = "btn btn-large btn-danger">Lost your Password ? </a>
                        </form>
			 </div>
			</div>
      </div>
      </div>
      </div>


    <section class="aboutUs">
    <div class='container'>
    <div class="row">
                <div class="col-md-12">

                  <div class="alert alert-danger">
                        <h2 class = "text-center">About WondaFund</h2>
                    <p class="bigtext">
                        Wondafund is majorly founded to eradicate poverty in our community. This website is based on peer-to-peer donation. Wondafund is a community created to help each get financial help. Donate to receive donations. Scroll down to see how it works.
                    </p>
                       
                    </div>
            
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">

                     <div class="panel panel-success">
                      <div class="panel-heading text-center"><h4>Reliable</h4></div>
                      <div class="panel-body">Our services are strong and reliable, we are here to serve you to the best without making you go through any stress.</div>
                    </div>
                  
                    
                        
                   
                    
                </div>
                <div class="col-md-3">

                        

                     <div class="panel panel-primary">
                      <div class="panel-heading text-center"><h4>Auto Pairing</h4></div>
                      <div class="panel-body">Wondafund has been well designed in such a way to make things very easy for our members through our simple and transparent method of auto-pairing.</div>
                    </div>
                  
                    
            
                    
                </div>
                <div class="col-md-3">

                    <div class="panel panel-warning">
                      <div class="panel-heading text-center"><h4>Straight Foward</h4></div>
                      <div class="panel-body"> We want our memebers to easily know and understand our services, therefore the platform has been created in a way that is simple and comprehending enough.</div>
                    </div>
                    
                   
                </div>

                <div class="col-md-3 ">


                 <div class="panel panel-danger">
                      <div class="panel-heading text-center"><h4>Efficient</h4></div>
                      <div class="panel-body">  We have well-trained staffs to handle any condition and good technicians to handle any technical issues. Our help center is available 24/7</div>
                    </div>
                    
                    
                
                </div>
            </div>

</div>

</section>
<!-- /ABOUT US ENDS HERE HERE-->


<section class="ourmission" style = "background: url(assets/img/back.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>There is a saying that “If you are not making money while sleeping then you’ll work till you die”.</h3>
                    <small>Only smart and matured people make it big in life...</small>
                </div>
            </div>
        </div>
    </section>


<section class="aboutUs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">


                <div class="col-md-12 ">
                 <div class="alert alert-danger">
                    <h2 class="text-center">How Wondafund works</h2>
                    <p class="bigtext">In Wondafund, you donate N25,000 and make N100,000 within 48hrs. It sounds like magic, this is how it works. After making your donation, the system will automatically pair u with 4 people to pay you N25,000 each. There is no room for upgrade and you don’t have to open a multiple accounts as the system will automatically recycle you to donate N25,000 and make N100,000 continuously. Now imagine how sweet it is when you’re making N100,000 every 48hrs. With this you can achieve your financial dreams. The reason why there is no room for upgrade is because we studied that in most platforms involving upgrade, people will not want to upgrade and keep opening multiple accounts, and those that upgrade will get stucked at the higher stage. Those are the things that make a peer to peer donation system crash. FareWealth avoided all these in order to keep the system alive forever. Can you now see you don’t have to work hard to make money, all you need is to be smart by joining FareWealth. No referral, no multiple accounts, with one account you achieve all you want.</p>
                </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</div>
</div>



    <!-- CONTENT-WRAPPER SECTION END-->
 

    <?php require_once 'assets/includes/footer.php';?>
</body>
</html>



















