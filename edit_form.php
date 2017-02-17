
<?php 

session_start();
require_once 'class.user.php';

//$userID=$_GET['userID'];


$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
    //$user->redirect('index.php');

    if(isset($_POST['btn-update']))
        {
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            //$upass = $_POST['upass'];
            $gsm = $_POST['gsm'];

            
                //$password = md5($upass);
                //$stmt = $user->runQuery("UPDATE tbl_users SET userName=:un,userEmail=:ue,userPass=:up,gsm=:gsm WHERE userID=:uid");
                //$stmt->execute(array(":un"=>$uname,":ue"=>$email,":gsm"=>$gsm,":uid"=>$_GET['id']));
                $stmt = $user->runQuery("UPDATE tbl_users SET userName=:un,gsm=:gsm WHERE userEmail=:email");
                $stmt->execute(array(":un"=>$uname,":gsm"=>$gsm,"email"=>$email));

                $msg = "<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        Successfully Updated.
                        </div>";
                //header("refresh:5;home.php");
            
        } 

}//else{

if(isset($_GET['id']) && isset($_GET['code']))
{
    $id = base64_decode($_GET['id']);
    $code = $_GET['code'];
    
    $stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
    $stmt->execute(array(":uid"=>$_GET['id'],":token"=>$_GET['code']));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    
  //  if($stmt->rowCount() == 1)
    //{
          

    }
    else
    {
        $msg = "<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        Successfully Updated.
                        </div>";
                header("refresh:0;home.php");
                
   // }
  //}  
    
}


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
    <title>:::Welcome to WondaFund</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png"/>
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">

    .aboutUs{
        margin:70px 0;
    }

    .ourmission{
        background-repeat: no-repeat;
        background-size: cover;
        height: 200px;
    }

    .ourmission >.container {
    padding-top: 70px;
    padding-bottom: 110px;
    color:#fff;
    margin:75px;
    }

    .jumbotron{
        margin-top:-40px;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center right;
        height: 500px;
        color: #fff;

    }

    .jumbotron h1{
        color:white;
        padding:50px 0;
    }

    .btn-custom {
            width: 200px;
            height: 41px;
            line-height: 21px;
          background-color: hsl(49, 2%, 16%) !important;
          background-repeat: repeat-x;
          filter: progid:DXImageTransform.Microsoft.gradient(startColorstr="#585754", endColorstr="#292927");
          background-image: -khtml-gradient(linear, left top, left bottom, from(#585754), to(#292927));
          background-image: -moz-linear-gradient(top, #585754, #292927);
          background-image: -ms-linear-gradient(top, #585754, #292927);
          background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585754), color-stop(100%, #292927));
          background-image: -webkit-linear-gradient(top, #585754, #292927);
          background-image: -o-linear-gradient(top, #585754, #292927);
          background-image: linear-gradient(#585754, #292927);
          border-color: #292927 #292927 hsl(49, 2%, 11.5%);
          color: #fff !important;
          text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.29);
          -webkit-font-smoothing: antialiased;
    }

    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Email: </strong>info@wondafund.com
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
                            <li><a class="menu-top-active" href="index.php">Home</a></li>
                           
                            

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateForm' action='edit_form.php'>

     <?php
            if(isset($msg))
            {
                echo $msg;
            }
            ?>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='id' value='<?php echo $row['userID']; ?>' />
        <tr>
            <td>User Name</td>
            <td><input type='text' name='uname' class='form-control' value='<?php echo $rows['userName'];?>' ></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control' value='<?php echo $rows['userEmail'];?>' ></td>
        </tr>
 
         <tr>
            <td>Phone Number</td>
            <td><input type='tel' name='gsm' class='form-control' value='<?php echo $rows['gsm'];?>' required></td>
        </tr>
 
 
        <tr>
            <td colspan="2">
            <input type="submit" class="btn btn-primary" name="btn-update"  value="update" id="btn-update">
            </td>
        </tr>
 
    </table>
</form>


<?php require_once 'assets/includes/footer.php';?>

</body>
</html>
     
