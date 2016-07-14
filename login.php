<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

require 'core1.php';
require 'connect.php';


if (isset($_POST['uname'])&&isset($_POST['pword'])){
$username=$_POST['uname'];
$password=$_POST['pword'];
$pass=md5($password);


if(!empty($username)&&!empty($password)){
$query = "SELECT `id` FROM `userinfo` where `uname`='$username' AND `password`='$pass'";
if($query_run=mysql_query($query)){

 $query_num_rows=mysql_num_rows($query_run);

 if($query_num_rows==0){

   echo "<script>alert ('Incorrect username and password combination')</script>";
 }

 else if($query_num_rows==1)
{
  $id = mysql_result($query_run, 0, `id`);
  $_SESSION['id']=$id;
header('Location: front1.php'); 
 } 
}
}
else{
echo "<script>alert ('Enter username and password')</script>";
}
}

?>

<html>
    <head>
        <title>bookstorerlogin</title>
        <meta charset="UTF-8">
         <script type="text/javascript" src="obj1.js"></script>
         <link rel="stylesheet" href="sub1.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body bgcolor="white">
        <div>
             <table bgcolor="#CCFFCC" width="100%" height="100">
                <tr>
                    <td rowspan="3" width="22%"><img height="120" width="300" src="best-books-book-youll-ever-read.jpg"></td>
                    <td><h1><center>ONLINE BOOK STORE</center></h1></td>
                </tr>
            </table>
        </div>
        <hr color="lime">
   <h4 align="center"> <marquee direction="left" width="5%"><<<<<</marquee>Welcome To Online Book Store!!!<marquee width="5%" direction="right">>>>>></marquee></h4>
	<h4 align="right" style="color:black;"><a href="front.php"><u>Back To Home</u></a></h4>
        <div>
            <div>
            <table height="350" width="10%" align="left">
                <tr>
                    <td><h1>WHERE YOU CAN SELL AND BUY BOOKS</h1></td>
                </tr>
            </table>
        </div>
        <div id="header">
            <table bgcolor="lime" width="100%" height="50" align="right">
                <tr>                    
<th align="center" width="20%" bgcolor="lime"><h3 style="color:whitesmoke; font-family: sans-serif;">Click here to</h3></th>
                    <td align="center" width="20%" style="color:lime; font-family: sans-serif;" bgcolor="whitesmoke">Login</td>
                    <td align="center" width="20%"><a href="register.php">Register</a></td>
                    <td align="center" width="20%"><a href="forget.php">Forget Password</a></td>
                </tr>
            </table>
        </div>
            <br><br><br>
            <div id="register">
         <form name="myform" action="<?php echo $current_file;?>" method="post">
             <br><br>
            <table bgcolor="white" width="25%" align="center">
                <tr>
                    <th colspan="3">Login</th>
                </tr>
                <tr>
                    <td colspan="2" align="center">User Name</td><td><input class="styletxt" type="text" name="uname"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Password</td><td><input class="styletxt" type="password" name="pword"></td>
                </tr>
 
                <tr>
<td></td>
 	 <td align="center" colspan="2"><input class="styletxt" type="submit" value="Login"></td>

                </tr>
                
            </table>
            </form>
            </div>
        </div> 
    </body>
</html>