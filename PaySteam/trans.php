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

if(isset($_POST['trans']))
{
    $account_transfer=$_POST['acc_trans'];
    $amo=$_POST['acc_amount'];
    $pass=$_POST['password'];
     
    $query=mysqli_query($conn,"SELECT * FROM PAY_user WHERE acc_no='$account_transfer'");
    $query_m=mysqli_query($conn,"SELECT * FROM PAY_user WHERE acc_no='$account'");
    $result_m=mysqli_fetch_assoc($query_m);
   
    if(mysqli_num_rows($query)>0&&$result_m['amount']>=$amo&&$result_m['pass']==$pass)
    {
        $query_t=mysqli_query($conn,"SELECT * FROM PAY_user WHERE acc_no='$account'");
        $result_t=mysqli_fetch_assoc($query_t);
         $result=mysqli_fetch_assoc($query);
      
        $acc_cre=$result_t['amount'] - $amo;
         $acc_amo=$amo + $result['amount'];
        mysqli_query($conn,"UPDATE PAY_user SET amount='$acc_amo' WHERE acc_no='$account_transfer'");
        mysqli_query($conn,"UPDATE PAY_user SET amount='$acc_cre' WHERE acc_no='$account'");
       mysqli_query($conn,"INSERT INTO PAY_tran (acc_no,credit,debit,upamount) VALUES ('$account_transfer','$amo',0,'$acc_amo')");
         mysqli_query($conn,"INSERT INTO PAY_tran (acc_no,credit,debit,upamount) VALUES ('$account',0,'$amo','$acc_cre')");
        header('Location:success.php');
    }
    else if(mysqli_num_rows($query)==0)
    {
        echo "<script>alert('USER Doesn't Exist')</script>";   
    }
    else if($result_m['amount']<=$_POST['acc_amount'])
    {    
          echo "<script>alert('Insuff balance')</script>";
    }
    else if($result_m['pass']!=$pass)
    {
          echo "<script>alert('Password Incorrect')</script>";
    }
    

}
if(isset($_POST['logout']))
{
    session_unset();
    session_destroy();
    
    
}
if(isset($_POST['return']))
{
    
    header('Location:myacc.php');

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
    <title> PAY STEAM </title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
      <link rel="stylesheet" href="Main.css">
      <link rel="stylesheet" href="login.css">
      <script src="js/jquery.js"></script>
      <script src="js/bootstrap.js"></script>
  </head>
  <body onload="noBack();" 
	onpageshow="if (event.persisted) noBack();" onunload="">
    <h1> PAY STEAM  <img style="height:50px; width:80px;" src="a.jpg" > </h1>
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
            <li class="active"> <a class="navbar-brand" href="#"> sistema di pagamento PAYSTEAM </a></li>
          </ul>

        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
         <form  method="post" action="" class="navbar-form navbar-right">
          <button type="submit"  name="logout" class="btn btn-default"> <a href='logout.php'> Logout  </a> </button>

        </form>
         
             
          <!-- Stuff on the Right -->


        </div>
      </div>
    </nav>

     <div>
      <h2>esegui pagamento</h2>
         <div class="login-box">
     <form method="post" action="">
           <p>Account Number</p>
         <input type="text"  name="acc_trans" placeholder=" transfer Account Number">
         <p>Amount</p>
         <input type="text"  name="acc_amount" placeholder="Amount in Rs">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="trans" value="transfer">
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
