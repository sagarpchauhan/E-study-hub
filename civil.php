

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>bookstoreFront</title>
        <link rel="stylesheet" href="sub1.css">
        <script type="text/javascript" src="obj1.js"></script>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <table bgcolor="#CCFFCC" width="100%" height="100">
                <tr>
                    <td rowspan="3" width="22%"><img height="120" width="300" src="best-books-book-youll-ever-read.jpg"></td>
                    <td><center><h1>ONLINE BOOK STORE</h1></center></td>
                </tr>
            </table>
        </div>
        <hr color="lime">
        <div>
        <div id="menubar">
            <table align="center" bgcolor="#CCFFCC" width="100%" height="40">
                <tr>
                    <th>Welcome Guest,</th>
                    <td align="center" width="20%"><a href="front.php">Home</a></td>
                    <td align="center" width="20%"><a href="register.php">Register</a></td>
                    <td align="center" width="20%"><a href="login.php">Login</a></td>
                    <td align="center" width="20%"><a href="about.php">About Us</a></td>
                </tr>
            </table>
        </div>
	<br><br>
      <div>
           <center>
		<form method="POST" action="search.php">
                <input type="text" class="styletxt2" name="search" value="search here book name or author..." onfocus="if(this.value=='search here book name or author...') this.value='';" size="60" height="30" />
                <select name="filter" class="styletxt" height="30">
                    <option>Book Name</option>
                    <option>Author</option>
                </select>
                <input class="styletxt3" type="submit" value="   Search   " name="go" size="60" height="30" />
		</form>
            </center>
	</div>
	<br><br>
        <div id="menu1">
            <table bgcolor="#CCFFCC" border="1" align="left" width="25%" height="400">
                <tr height="40">
                    <th  style="color:blue;">MENU</th>
                </tr>
		<tr height="40"><td align="center"><a href="computer.php">Computer Engg</a></td></tr>
	<tr height="40"><td align="center"><a href="mechanical.php">Mechanical Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="electrical.php">Electrical Engg</a></td></tr>                
                <tr height="40"><td align="center" bgcolor="lime" style="color:bisque; font-family: sans-serif;"><b>Civil Engg</b></td></tr>
             <tr height="40"><td align="center"><a href="gate.php">GATE Exam</a></td></tr>
            </table>
        </div>
        <div>
           <table border="2" width="70%" align="right">
	<tr>
		<th colspan="4" align="center"><u><h2>Civil Engineering</h2></u></th>
	</tr>
<tr>
		<th></th>
		<th colspan="2"><h2 style="color:blue";>Book Details</h2></th>
		<th colspan="2"><h2 style="color:blue";>User Details</h2></th>
	</tr>
<?php
	
require 'core.php';
require 'connect.php';

$query = "SELECT * FROM `bookinfo`,`userinfo` WHERE `bookinfo`.`uname`=`userinfo`.`uname` AND `bookinfo`.`branch`='civil'";

if($query_run=mysql_query($query)){
	$icount=mysql_num_rows($query_run);
	if($icount!=0){
	while($data=mysql_fetch_assoc($query_run)){
?>
	<tr>
		<td width="200"><img src="uploadimg/civil/<?php echo $data['addr']; ?>" width="200" height="200"></td>
		<td colspan="2"><h2><?php echo $data['bname']; ?></h2><br>
		Author  :  <?php echo $data['author']; ?><br>
		Price   :  <?php echo $data['price']; ?></td>
		<td colspan="2">
		Name  :  <?php echo $data['fname']; ?>  <?php echo $data['lname']; ?><br>
		Mobile No   :  <?php echo $data['mobno']; ?><br>
		E-mail id  :  <?php echo $data['email']; ?></td>
	</tr>
<?php
	}
	}
}
?>
</table>
</body>
        </div>
    </body>
</html>