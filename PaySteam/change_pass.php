


<?php 

session_start();
//connect to mysql

$servername = "mysql.57gimp.home";
                $username_db = "fi.licursi";
                $password_db = "kJ1L27dW";
                $dbname = "fi_licursi";
                $conn = new mysqli($servername, $username_db, $password_db, $dbname);
                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
 
//test Conection

if(mysqli_connect_errno())
    
{
    echo 'Db connection error'.mysqli_connect_error();
    
    
}
$account=$_SESSION['account'];


$query=mysqli_query($conn,"SELECT * FROM PAY_user WHERE acc_no='$account'");
$result=mysqli_fetch_assoc($query);    



if(isset($_POST['change']))
{
    $passold=$_POST['opassword'];
$passnew=$_POST['npassword'];
if($passold==$result['pass']&&$passold!=$passnew)
{
    mysqli_query($conn,"UPDATE PAY_user SET pass='$passnew' WHERE acc_no='$account'");
    
    
}
    else if($passold!=$result['pass'])
    {
        
        echo"<script>alert('OLD PASSWORD IS WRONG')</script>";
        
    }
    else if($passold==$passnew)
    {
        
        echo"<script>alert('OLD PASSWORD==NEW PASSOWRD')</script>";
        
    }
    
    
}
if(isset($_POST['return']))
{
    
    header('Location:myacc.php');

}
if(isset($_POST['logout']))
{
    session_unset();
    session_destroy();
    
    
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      
<SCRIPT type="text/javascript">
	window.history.forward();
	function noBack() { window.history.forward(); }
</SCRIPT>
    <meta charset="utf-8">
    <title> Net Banking </title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
      <link rel="stylesheet" href="Main.css">
      <link rel="stylesheet" href="login.css">
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.js"></script>
  </head>
  <body onload="noBack();" 
	onpageshow="if (event.persisted) noBack();" onunload="">
  <h1> sistema di pagamento PAYSTEAM  <img style="height:50px; width:80px;" src="a.jpg" > </h1>
    <nav class="navbar navbar-default navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">

            <!--  Code for the hamburger icon-->
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <ul class="navbar-nav">
            <li class="active"> <a class="navbar-brand" href="#"> XYZ Internet Banking </a></li>
          </ul>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <form  method="post" action="" class="navbar-form navbar-right">
          <button type="submit"  name="logout" class="btn btn-default"> <a href='logout.php'> Logout  </a> </button>

        </form>



        </div>
      </div>
    </nav>

     <div>
      <h2>CHANGE PASSWORD</h2>
         <div class="login-box">
     <form method="post" action="">
           

        <p>Old Password</p>
        <input type="password" name="opassword" placeholder="Enter Old Password">
          <p>New Password</p>
        <input type="password" name="npassword" placeholder="Enter Old Password">
         <input type="submit" name="change" value="Change Password">
         <input type="submit" name="return" value="Return To Home Page">
             </form></div>
      <div class="col-xs-2" id="three">
        <h4> Account Information </h4>

        <ul>
            <li id="one"> <h5>Name:<?php
          $query=mysqli_query($conn,"SELECT name FROM PAY_user WHERE acc_no='$account'");
           $result=mysqli_fetch_assoc($query);
          $a=$result['name'];
          echo "$a"; ?></h5> </li>
          <br>
          <li id="one"><h5>Account Number:<?php
          $query=mysqli_query($conn,"SELECT acc_no FROM PAY_user WHERE acc_no='$account'");
           $result=mysqli_fetch_assoc($query);
          $a=$result['acc_no'];
          echo "$a"; ?> </h5></li>
          <br>
          <li id="one"> <h5>Email:<?php
          $query=mysqli_query($conn,"SELECT email FROM PAY_user WHERE acc_no='$account'");
           $result=mysqli_fetch_assoc($query);
          $a=$result['email'];
          echo "$a"; ?> </h5> </li>
          <br>
          <li id="one"><h5>documento:<?php
          $query=mysqli_query($conn,"SELECT documento FROM PAY_user WHERE acc_no='$account'");
           $result=mysqli_fetch_assoc($query);
          $a=$result['documento'];
          echo "$a"; ?> </h5> </li>
            <li id="one"><h5>Amount:<?php
          $query=mysqli_query($conn,"SELECT amount FROM PAY_user WHERE acc_no='$account'");
           $result=mysqli_fetch_assoc($query);
          $a=$result['amount'];
          echo "$a"; ?> </h5> </li>
        </ul>

      </div>
 
      </div>
    <script
      src="http://code.jquery.com/jquery-3.1.1.js"
      integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
      crossorigin="anonymous"></script>
    </body>
</html>
