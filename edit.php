<?php
/**
if(isset($_GET['id']) && isset($_GET['code']))
{
    $id = base64_decode($_GET['id']);
    $code = $_GET['code'];
    
    $stmt = $user_up->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
    $stmt->execute(array(":uid"=>$_GET['id'],":token"=>$_GET['code']));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if($stmt->rowCount() == 1)
    {
        if(isset($_POST['btn-update']))
        {
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $upass = $_POST['upass'];
            $gsm = $_POST['gsm'];

            
                $password = md5($upass);
                $stmt = $user_up->runQuery("UPDATE tbl_users SET userName=:un,userEmail=:ue,userPass=:up,gsm=:gsm WHERE userID=:uid");
                $stmt->execute(array(":un"=>$uname,":ue"=>$uemail,":gsm"=>$gsm,":uid"=>$rows['userID']));
                
                $msg = "<div class='alert alert-success'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        Successfully Updated.
                        </div>";
                header("refresh:5;home.php");
            
        }   

    }
    else
    {
        $msg = "<div class='alert alert-success'>
                <button class='close' data-dismiss='alert'>&times;</button>
                No Account Found, Try again
                </div>";
                
   // }
  }  
    
}
*/




    // configuration
   require_once 'config.php';
     
    // new data
    //$lname = $_POST['lname'];
    //$fname = $_POST['fname'];
    //$age = $_POST['age'];
    //$id = $_POST['memids'];


            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $upass = $_POST['upass'];
            $gsm = $_POST['gsm'];
            $password = md5($upass);


            $sql = "UPDATE tbl_users SET userName = :uname, 
            userEmail = :email, 
            userPass = :upass,  
            gsm = :gsm   
            WHERE userID = :id";


$stmt = $db->prepare($sql);                                  
$stmt->bindParam(':uname', $_POST['uname'], PDO::PARAM_STR);       
$stmt->bindParam(':email', $email = $_POST['email'], PDO::PARAM_STR);    
$stmt->bindParam(':upass', $upass = $_POST['upass'], PDO::PARAM_STR);
// use PARAM_STR although a number  
$stmt->bindParam(':gsm', $_POST['gsm'], PDO::PARAM_STR); 
$stmt->bindParam(':id', $_POST['userID'], PDO::PARAM_INT);

$stmt->execute(); 
header("location: index.php");

?>