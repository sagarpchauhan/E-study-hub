<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'core.php';
require 'connect.php';

if(isset($_POST['uname'])&&isset($_POST['qans']))
{
if(!empty($_POST['uname'])&&!empty($_POST['qans']))
{

	$uname=$_POST['uname'];
	$qans=$_POST['qans'];
$query_run=mysql_query("SELECT uname FROM userinfo WHERE uname='$uname' AND ans='$qans'");

	if(mysql_num_rows($query_run)==0){
	echo "<script>alert ('your answer not match...')</script>";
	}
else 
{
	header ('Location: change.php');
}
}
else
{
	echo "<script>alert ('enter username and answer...');</script>";
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
<th align="center" width="20%"><h3  style="color:whitesmoke; font-family: sans-serif;">Click here to</h3></th>
                    <td align="center" width="20%"><a href="login.php">Login</a></td>
                    <td align="center" width="20%"><a href="register.php">Register</a></td>
                    <td align="center" width="20%" style="color:lime; font-family: sans-serif;" bgcolor="whitesmoke">Forget Password</td>
                </tr>
            </table>
        </div>
            <br><br><br>
            <div id="register">
         <form name="myform" action="<?php echo $current_file;?>" method="post">
             <br><br>
            <table bgcolor="white" width="25%" align="center">
                <tr>
                    <th colspan="3">Forget Password</th>
                </tr>
                <tr>
                    <td colspan="2" align="center">User Name</td><td><input class="styletxt" type="text" name="uname"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Security Question</td><td>
                    <select name="ques">
                        <option>What is your favorite food?</option>
                        <option>What is your nationality?</option>
                        <option>What is your favorite colour?</option>
                        <option>What is your pet name?</option>
                        <option>What is your birth city?</option>
                        <option>Who is your favorite personality?</option>
                    </select>
                      </td>
                </tr>

	
                <tr>
                    <td colspan="2" align="center">Answer</td><td><input class="styletxt" type="text" name="qans"></td>
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
