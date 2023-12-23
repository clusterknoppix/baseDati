?php

//connect to mysql

$conn = mysqli_connect('mysql.57gimp.home','project1','CompleX.1','xyz_bank');

//test Conection

if(mysqli_connect_errno())
    
{
    echo 'Db connection error'.mysqli_connect_error();
    
    
}
?>