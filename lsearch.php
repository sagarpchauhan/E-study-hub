

<!DOCTYPE html>
<?php
require 'core1.php';
require 'core.php';
	require 'connect.php';
	
	$search=$filter="";
if(loggedin()){
	$id=$_SESSION['id'];
			$query = "SELECT `fname` FROM `userinfo` where `id`='$id'";
			$query_run=mysql_query($query);
			$data=mysql_fetch_assoc($query_run);
			$user=$data['fname'];
}
else{
header('Location: login.php');
}

?>
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
            <table bgcolor="#ccffcc" width="100%" height="100">
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
                    <th>Welcome <?php echo $user; ?>,</th>
                    <td align="center" width="20%" style="color:bisque; font-family: sans-serif;" bgcolor="lime">Home</td>
                    <td align="center" width="20%"><a href="register.php">Register</a></td>
                    <td align="center" width="20%"><a href="login.php">Login</a></td>
                    <td align="center" width="20%"><a href="logout.php">Logout</a></td>
                </tr>
            </table>
        </div>
        <br><br>
        <div id="menu1">
            <table bgcolor="#CCFFCC" border="1" align="left" width="25%" height="400">
                <tr height="40">
                    <th style="color:blue;">MENU</th>
                </tr>
                <tr height="40"><td align="center"><a href="lcomputer.php">Computer Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lmechanical.php">Mechanical Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lelectrical.php">Electrical Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lcivil.php">Civil Engg</a></td></tr>
             <tr height="40"><td align="center"><a href="lgate.php">GATE Exam</a></td></tr>
            </table>
        </div>
        <div>
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
	<div>
<?php

if(isset($_POST['go'])){
if(isset($_POST['search'])){
	if(!empty($_POST['search'])){
		$filter=$_POST['filter'];
		$search=$_POST['search'];
		if($filter=="Book Name"){
			$query1="SELECT * FROM `bookinfo`,`userinfo` WHERE `bookinfo`.`uname`=`userinfo`.`uname` AND `bookinfo`.`bname` LIKE '%".mysql_real_escape_string($search)."%'";
			if($query_run=mysql_query($query1)){
			$rows=mysql_num_rows($query_run);
?>
<table border="2" width="70%" align="right">
	<tr>
		<th colspan="5" align="center"><u><h2>Search Results</u> : <?php echo $rows; ?> Results Found</h2></th>
	</tr>
<tr>
		<th></th>
		<th colspan="2"><h2 style="color:blue";>Book Details</h2></th>
		<th colspan="2"><h2 style="color:blue";>contact Details</h2></th>
	</tr>
<?php
	while($data=mysql_fetch_assoc($query_run)){
?>
		<tr>
		<td width="200"><img src="uploadimg/<?php echo $data['branch']; ?>/<?php echo $data['addr']; ?>" width="200" height="200"></td>
		<td colspan="2"><h2><?php echo $data['bname']; ?></h2><br>
		Author  :  <?php echo $data['author']; ?><br>
		Price   :  <?php echo $data['price']; ?></td>
		<td colspan="2"><h2><?php echo $data['fname']; ?>  <?php echo $data['lname']; ?></h2><br>
		mobileno  :  <?php echo $data['mobno']; ?><br>
		email  :  <?php echo $data['email']; ?></td>
	</tr>
<?php
	}
}
}
	else{
			$query2="SELECT * FROM `bookinfo`,`userinfo` WHERE `bookinfo`.`uname`=`userinfo`.`uname` AND `bookinfo`.`author` LIKE '%".mysql_real_escape_string($search)."%'";
			if($query_run=mysql_query($query2)){
			$rows=mysql_num_rows($query_run);
?>
<table border="2" width="70%" align="right">
	<tr>
		<th colspan="5" align="center"><u><h2>Search Results</u> : <?php echo $rows; ?> Results Found</h2></th>
	</tr>
<tr>
		<th></th>
		<th colspan="2"><h2 style="color:blue";>Book Details</h2></th>
		<th colspan="2"><h2 style="color:blue";>contact Details</h2></th>
	</tr>
<?php
	while($data=mysql_fetch_assoc($query_run)){
?>
		<tr>
		<td width="200"><img src="uploadimg/<?php echo $data['branch']; ?>/<?php echo $data['addr']; ?>" width="200" height="200"></td>
		<td colspan="2"><h2><?php echo $data['bname']; ?></h2><br>
		Author  :  <?php echo $data['author']; ?><br>
		Price   :  <?php echo $data['price']; ?></td>
		<td colspan="2"><h2><?php echo $data['fname']; ?>  <?php echo $data['lname']; ?></h2><br>
		mobileno  :  <?php echo $data['mobno']; ?><br>
		email  :  <?php echo $data['email']; ?></td>
	</tr>
<?php
	}
}
}
}
	else{
		echo '<script>alert ("enter text to search");</script>';
	}
}
}
?>
</table>
	</div>
        </div>
    </body>
</html>