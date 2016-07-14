<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'core.php';
require 'connect.php';

if(isset($_POST['pword'])&&isset($_POST['rpword'])&&isset($_POST['uname']))
{
if(!empty($_POST['pword'])&&!empty($_POST['rpword'])&&!empty($_POST['uname']))
{
	$pass=md5($_POST['pword']);
	$rpass=md5($_POST['rpword']);
	$uname=($_POST['uname']);
if($pass==$rpass)
{
mysql_query("UPDATE `userinfo` SET `password`='$pass' WHERE `uname`='$uname'");
echo "<script>alert ('successfully changed password...')</script>";
}
else
{
	echo "password not matched...";
}
}
else
{
	echo "enter username/password";
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
<th align="center" width="20%"><h3 style="color:whitesmoke; font-family: sans-serif;">Click here to</h3></th>
                    <td align="center" width="20%"><a href="login.php">Login</a></td>
                    <td align="center" width="20%"><a href="register.php">Register</a></td>
                    <td align="center" width="20%" style="color:lime; font-family: sans-serif;" bgcolor="whitesmoke">Forget Password</a></td>
                </tr>
            </table>
        </div>
            <br><br><br>
            <div id="register">
         <form name="myform" action="<?php echo $current_file;?>" method="post">
             <br><br>
            <table bgcolor="white" width="25%" align="center">
                <tr>
                    <th colspan="3">Change Password</th>
                </tr>
	      <tr>
                    <td colspan="2" align="center">Username</td><td><input class="styletxt" type="text" name="uname"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">New Password</td><td><input class="styletxt" type="password" name="pword"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Re-Type Password</td><td><input class="styletxt" type="password" name="rpword"></td>
                </tr>
 
                <tr>
                    <td align="center" colspan="3"><input class="styletxt" type="submit" value="Submit"></td>
                </tr>
                
            </table>
            </form>
            </div>
        </div> 
    </body>
</html>
