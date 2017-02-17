
<?php 

session_start();
require_once 'class.user.php';

//$userID=$_GET['userID'];


$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
    $user->redirect('index.php');

}//else{

if(isset($_GET['id']) && isset($_GET['code']))
{
    $id = base64_decode($_GET['id']);
    $code = $_GET['code'];
    
    $stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
    $stmt->execute(array(":uid"=>$_GET['id'],":token"=>$_GET['code']));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //if($stmt->rowCount() == 1)
    //{
        if(isset($_POST['btn-update']))
        {
            $uname = $_POST['uname'];
            $email = $_POST['email'];
            $upass = $_POST['upass'];
            $gsm = $_POST['gsm'];

            
                $password = md5($upass);
                $stmt = $user->runQuery("UPDATE tbl_users SET userName=:un,userEmail=:ue,userPass=:up,gsm=:gsm WHERE userID=:uid");
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
  //}  
    
}


?>




<style type="text/css">
#dis{
	display:none;
}
</style>


	
    
    <div id="dis">
    
	</div>
        
 	
	 <form method='post' id='emp-UpdateForm' action='edit_form.php'>
 
    <table class='table table-bordered'>
 		<input type='hidden' name='id' value='<?php echo $row['userID']; ?>' />
        <tr>
            <td>User Name</td>
            <td><input type='text' name='uname' class='form-control' value='<?php echo $rows['userName'];?>' required></td>
        </tr>

        <tr>
            <td>Email</td>
            <td><input type='text' name='email' class='form-control' value='<?php echo $rows['userEmail'];?>' required></td>
        </tr>
 
       
        
        <tr>
            <td>Password</td>
            <td><input type='text' name='upass' class='form-control' value='' ></td>
        </tr>

         <tr>
            <td>Phone Number</td>
            <td><input type='text' name='gsm' class='form-control' value='<?php echo $rows['gsm'];?>' required></td>
        </tr>
 
 
        <tr>
            <td colspan="2">
            <input type="submit" class="btn btn-primary" name="btn-update"  value="update" id="btn-update">
            </td>
        </tr>
 
    </table>
</form>
     
