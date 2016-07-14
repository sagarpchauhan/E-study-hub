
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'core1.php';
require 'core.php';
require 'connect.php';
		
if(loggedin()){
	$id=$_SESSION['id'];
			$query = "SELECT `uname`,`fname`,`lname`,`mobno`,`email` FROM `userinfo` where `id`='$id'";
			$query_run=mysql_query($query);
			$data=mysql_fetch_assoc($query_run);
			$user=$data['uname'];
}
else{
header('Location: login.php');
}
			$query1 = "SELECT `bname`,`postdate`,`price`,`id` FROM `bookinfo` where `uname`='$user'";
			$query1_run=mysql_query($query1);
		if(isset($_GET['record_id'])){
			$id=mysql_real_escape_string($_GET['record_id']);
			$name=mysql_real_escape_string($_GET['record_name']);
			$sql_delete="DELETE FROM `bookinfo` WHERE `id`='$id'";
			$sql1_delete="DELETE FROM `$user` WHERE `bookname`='$name'";
			mysql_query($sql_delete) or die(mysql_error());
			mysql_query($sql1_delete) or die(mysql_error());
			header('Location: profile.php');
			exit();
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
                    <td><center><h1>E-STUDY HUB</h1></center></td>
                </tr>
            </table>
        </div>
        <hr color="lime">
        <div id="menubar">
            <table align="center" bgcolor="#ccffcc" width="100%" height="40">
                <tr>
                    <th style="color:lime;" bgcolor="whitesmoke">Welcome <?php echo $user; ?>,</th>
                    <td align="center" width="20%"><a href="front1.php">Home</a></td>
                    <td align="center" width="20%"><a href="upload1.php">Upload books</a></td>
                    <td align="center" width="20%" style="color:black; font-family: sans-serif;" bgcolor="lime">My Profile</td>
                    <td align="center" width="20%"><a href="logout.php">Log Out</a></td>
                </tr>
            </table>
        </div>
        <br><br>
<div>
        <div id="menu1">
            <table bgcolor="#ccffcc" border="1" align="left" width="25%" height="400">
                <tr height="40">
                    <th  style="color:blue;">MENU</th>
                </tr>
                <tr height="40"><td align="center"><a href="lcomputer.php">Computer Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lmechanical.php">Mechanical Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lelectrical.php">Electrical Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lcivil.php">Civil Engg</a></td></tr>
             <tr height="40"><td align="center"><a href="lgate.php">GATE Exam</a></td></tr>
            </table>
        </div>
	<div>
		<table align="right" width="60%" border="1">
			<tr>
				<th colspan="2"><h2>Profile Info</h2></th>
			</tr>
			
		<tr>
			<td width=>Name  : </td><td><?php echo $data['fname']; ?></td>
		</tr>	
		<tr>		
			<td>LastName: </td><td> <?php echo $data['lname']; ?></td>
		</tr>	
		<tr>		
			<td>Mobile Number: </td><td> <?php echo $data['mobno']; ?></td>
		</tr>
		<tr>		
			<td>Email: </td><td> <?php echo $data['email']; ?></td>
		</tr>
		</table>
		<form action="<?php echo $current_file;?>" method="post">
		<table align="right" width="60%" border="1">
			<tr>
				<th colspan="4"><h2>Book Info</h2></th>
			</tr>
			<tr>
				<th width="15%">BookName</th>
				<th width="15%">Price</th>
				<th width="15%">PostDate</th>
				<th width="15%">Select to remove add</th>
			</tr>
			<?php
			while($data1=mysql_fetch_assoc($query1_run)){
			?>
		<tr align="center">
			
			<td><?php echo $data1['bname']; ?></td>
			
			<td> <?php echo $data1['price']; ?></td>
	
			<td> <?php echo $data1['postdate']; ?></td>
			<td><a href="profile.php?record_id=<?php echo $data1['id'];?>&&record_name=<?php echo $data1['bname'];?>">Delete</a></td>

		</tr>		
		<?php
			}
		?>
		</table>
	</form>
	</div>
</div>
       </body>
</html>