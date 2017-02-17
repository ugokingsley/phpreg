<?php
session_start();
require_once '../class.user.php';
$user = new USER();

if(!$user->is_logged_in())
{
	$user->redirect('index.php');
}

$stmt = $user->runQuery("SELECT bitcoin.*,tbl_users.userName,tbl_users.userEmail,tbl_users.gsm,bitcoin.amt,bitcoin.wallet,bitcoin.hashcode,bitcoin.time_created FROM bitcoin
        INNER JOIN tbl_users
        ON bitcoin.userID=tbl_users.userID
        ORDER BY id DESC
        ");
//$row = $stmt->resultset();
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
//$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>

















<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Username Dashboard | Wondafund</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="../assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@yourdomain.com
                    &nbsp;&nbsp;
                    <strong>Support: </strong>+90-897-678-44
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="assets/img/logo.png" />
                </a>
                <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> 
                                <?php echo $row['userEmail']; ?> <i class="caret"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a tabindex="-1" href="../logout.php">Logout</a>
                                    </li>
                                    </ul>>
                                    </li>
                                </ul>
                            </li>
                        </ul>

            </div>

            <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <!-- <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a> -->
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="assets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                           
                            <li><a  href="contact.html">Contact Us</a></li>
                             <li><a href="../logout.php">Logout</a></li>
                            
                             <li> <a id="<?php echo $row['userName']; ?>" class="edit-link" href="edit_form.php?id=<?php echo $row['userID'] ;?>&code=<?php echo $row['tokenCode'] ;?>" title="Edit">edit profile</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="page-head-line">Dashboard</h4>

                </div>

            </div>
           
           <div class = "col-md-12">
                <div class = "row">
                 <div class="alert alert-success">
                     <h3>Welcome Admin<?php //echo $row['userName']; ?></h3>
                 </div>
                </div>
           </div>

             

<div class="container">
<div class="row">
 <div class = "col-md-12">
 <ul id="topics">
                        <?php //if($topics): ?>
                        <?php //foreach($topics as $topic): ?>
                        
        </div>
</div>
</div>




<div class="container">
      
        <h2 class="form-signin-heading">User Payment Records.</h2><hr />
        
        <hr />
        
        <div class="content-loader">
        
        <table cellspacing="0" width="100%" id="example" class="table table-striped table-hover table-responsive">
        <thead>
        <tr>
        <th>Full Name</th>
        <th>Email Address</th>
        <th>Phone Number</th>
        <th>Amount</th>
        <th>Bitcoin Wallet</th>
        <th>HashCode</th>
		<th>Time</th>
        </tr>
        </thead>
        <tbody>
         <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
            <tr>
            <td><?php echo $row['userName']; ?></td>
            <td><?php echo $row['userEmail']; ?></td>
            <td><?php echo $row['gsm']; ?></td>
            <td><?php echo $row['amt']; ?></td>
            <td><?php echo $row['wallet']; ?></td>
            <td><?php echo $row['hashcode']; ?></td>
            <td><?php echo $row['time_created']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
        
        </div>

    </div>
    
    <br />









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

























