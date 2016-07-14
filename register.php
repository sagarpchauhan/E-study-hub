<?php
require 'core.php';
require 'connect.php';

$fname=$lname=$uname=$mob=$mail=$qans="";

if(isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['uname'])&&isset($_POST['mno'])&&isset($_POST['email'])&&isset($_POST['pword'])&&isset($_POST['rpword'])&&isset($_POST['ans']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$uname=$_POST['uname'];
	$mob=$_POST['mno'];
	$mail=$_POST['email'];
	$pass=md5($_POST['pword']);
	$rpass=md5($_POST['rpword']);
	$qans=$_POST['ans'];

if(!empty($fname)&&!empty($lname)&&!empty($uname)&&!empty($mob)&&!empty($mail)&&!empty($pass)&&!empty($rpass)&&!empty($qans))
{
	if($pass!=$rpass){
	echo "<script>alert ('password  not match...')</script>";
	}
	else{
		$query_run=mysql_query("SELECT uname FROM userinfo WHERE uname='$uname'");

	if(mysql_num_rows($query_run)==1){
	echo "<script>alert ('username already exist...')</script>";
	}
	else{
mysql_query("INSERT INTO userinfo VALUES('$fname','$lname','$uname','$mail','$mob','$pass','','$qans')");
mysql_query("CREATE TABLE $uname( ". 
"bookname VARCHAR(100) NOT NULL, ". 
"bookauthor VARCHAR(100) NOT NULL, ". 
"price VARCHAR(100) NOT NULL, ". 
"postdate DATE".")");
$fname=$lname=$uname=$mob=$mail=$qans=""; 
echo "<script>alert ('successfully registered...')</script>";		}
	}
}
else
{
echo "<script>alert ('all fields shoul be enterted...')</script>";
}
}
?>

<html>
    <head>
        <title>bookstoreregister</title>
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
       <tr align="center">
<th width="20%"><h3 style="color:whitesmoke; font-family: sans-serif;">Click here to</h3></th>
                    <td align="center" width="20%"><a href="login.php">Login</a></td>
                    <td align="center" width="20%" style="color:lime; font-family: sans-serif;" bgcolor="whitesmoke">Register</td>
                    <td align="center" width="20%"><a href="forget.php">Forget Password</a></td>
                </tr>
            </table>
        </div>
            <br><br><br>
            <div id="register">
         <form name="myform" method="post" action="<?php echo $current_file;?>">
             <br><br>
            <table bgcolor="white" width="25%" align="center">
                <tr>
                    <th colspan="3">Registration</th>
                </tr>
                <tr>
          <td colspan="2" align="center">First name</td><td><input class="styletxt" type="text" name="fname" value="<?php echo $fname; ?>"></td>
                </tr>
                <tr>
           <td colspan="2" align="center">Last name</td><td><input class="styletxt" type="text" name="lname" value="<?php echo $lname; ?>"></td>
                </tr>
                <tr>
              <td colspan="2" align="center">Username</td><td><input type="text" class="styletxt" name="uname" value="<?php echo $uname;?>"></td>
                </tr>
               <tr>
                   <td colspan="2" align="center">Mob no.</td><td><input type="number" class="styletxt" name="mno" value="<?php echo $mob; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">E-mail id</td><td><input type="email" name="email" class="styletxt" value="<?php echo $mail; ?>"></td>
                </tr>
                   <tr>
                      <td colspan="2" align="center">Password</td><td><input type="password" name="pword" class="styletxt"></td>
                </tr>
                 <tr>
                     <td colspan="2" align="center">Re-type password</td><td><input type="password" name="rpword" class="styletxt"></td>
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
                <td colspan="2" align="center">Answer</td><td>
                    <input type="text" class="styletxt" name="ans" size="30"  value="<?php echo $qans; ?>">
                </td></tr>
                <tr>
                    <td align="center" colspan="3"><input class="styletxt" type="submit" value="Register"></td>
                </tr>
            </table>
            </form>
            </div>
        </div> 
    </body>
</html>