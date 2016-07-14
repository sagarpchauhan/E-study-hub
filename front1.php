
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require 'core1.php';
require 'connect.php';
		
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
                    <td><center><h1>E-STUDY HUB</h1></center></td>
                </tr>
            </table>
        </div>
        <hr color="lime">
        <div>
        <div id="menubar">
            <table align="center" bgcolor="#ccffcc" width="100%" height="40">
                <tr>
                    <th style="color:lime;" bgcolor="whitesmoke">Welcome <?php echo $user; ?>,</th>
                    <td align="center" width="20%" style="color:black; font-family: sans-serif;" bgcolor="lime">Home</td>
                    <td align="center" width="20%"><a href="upload1.php">Upload books</a></td>
                    <td align="center" width="20%"><a href="profile.php">My Profile</a></td>
                    <td align="center" width="20%"><a href="logout.php">Log Out</a></td>
                </tr>
            </table>
        </div>
        <br><br>
            <table width="100%">
                 <tr>
                    <td class="styletxt" width="20%" align="center"><marquee>
                        <img class="styletxt1" src="uploadimg/all/mimage1.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/mimage2.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/mimage3.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/mimage4.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/mimage5.jpg" height="200">
                    </marquee></td>
  			<td class="styletxt" width="20%" align="center"><marquee>
                        <img class="styletxt1" src="uploadimg/all/cimage1.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/cimage2.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/cimage3.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/cimage4.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/cimage5.jpg" height="200">   
                    </marquee></td>
                       <td class="styletxt" width="20%" align="center"><marquee>
                        <img class="styletxt1" src="uploadimg/all/gimage1.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/gimage2.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/gimage3.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/gimage4.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/gimage5.jpg" height="200">
                    </marquee></td>
                   <td class="styletxt" width="20%" align="center"><marquee>
                        <img class="styletxt1" src="uploadimg/all/eimage1.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/eimage2.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/eimage3.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/eimage4.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/eimage5.jpg" height="200">
                        
                    </marquee></td>
                   <td class="styletxt" width="20%" align="center"><marquee>
                        <img class="styletxt1" src="uploadimg/all/image1.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/image2.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/image3.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/image4.jpg" height="200">
                        <img class="styletxt1" src="uploadimg/all/image5.jpg" height="200">
                         </marquee></td>
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
            <table bgcolor="#ccffcc" border="1" align="left" width="25%" height="400">
                <tr height="40">
                    <th style="color:blue";>MENU</th>
                </tr>
                <tr height="40"><td align="center"><a href="lcomputer.php">Computer Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lmechanical.php">Mechanical Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lelectrical.php">Electrical Engg</a></td></tr>
                <tr height="40"><td align="center"><a href="lcivil.php">Civil Engg</a></td></tr>
             <tr height="40"><td align="center"><a href="lgate.php">GATE Exam</a></td></tr>
            </table>
        </div>
        <div id="menu2">
             <table width="68%">
                <tr><th colspan="6" align="left" style="color:blue;">Mechanical Engineering</th></tr>
		<tr align="center" height="150">
                <?php
	
require 'core.php';
require 'connect.php';

$query = "SELECT `addr` FROM `bookinfo` where `branch`='mechanical'";

if($query_run=mysql_query($query)){
	$icount=mysql_num_rows($query_run);
	if($icount!=0){
	$i=0;
	while($i<=5){
	$data=mysql_fetch_assoc($query_run);
?>

		<td><a href="lmechanical.php"><img src="uploadimg/mechanical/<?php echo $data['addr']; ?>" height="100" width="100"  onmouseover="click1(this)" onmouseout="click2(this)" ></a></td>
<?php
	$i++;
	}
	}
}
?>
</tr>
                <tr><th colspan="6" align="left" style="color:blue;">Computer Engineering</th></tr>
                 <tr align="center" height="150">
                <?php
	
require 'core.php';
require 'connect.php';

$query = "SELECT `addr` FROM `bookinfo` where `branch`='computer'";

if($query_run=mysql_query($query)){
	$icount=mysql_num_rows($query_run);
	if($icount!=0){
	$i=0;
	while($i<=5){
	$data=mysql_fetch_assoc($query_run);
?>

		<td><a href="lcomputer.php"><img src="uploadimg/computer/<?php echo $data['addr']; ?>" height="100" width="100"  onmouseover="click1(this)" onmouseout="click2(this)"></a></td>
<?php
	$i++;
	}
	}
}
?>
</tr>
                <tr><th colspan="6" align="left" style="color:blue;">Electrical Engineering</th></tr>
                <tr align="center" height="150">
                <?php
	
require 'core.php';
require 'connect.php';

$query = "SELECT `addr` FROM `bookinfo` where `branch`='electrical'";

if($query_run=mysql_query($query)){
	$icount=mysql_num_rows($query_run);
	if($icount!=0){
	$i=0;
	while($i<=5){
	$data=mysql_fetch_assoc($query_run);
?>

		<td><a href="lelectrical.php"><img src="uploadimg/electrical/<?php echo $data['addr']; ?>" height="100" width="100"  onmouseover="click1(this)" onmouseout="click2(this)" ></a></td>
<?php
	$i++;
	}
	}
}
?>
</tr>
   <tr><th colspan="6" align="left" style="color:blue;">Civil Engineering</th></tr>
                <tr align="center" height="150">
                <?php
	
require 'core.php';
require 'connect.php';

$query = "SELECT `addr` FROM `bookinfo` where `branch`='civil'";

if($query_run=mysql_query($query)){
	$icount=mysql_num_rows($query_run);
	if($icount!=0){
	$i=0;
	while($i<=5){
	$data=mysql_fetch_assoc($query_run);
?>

		<td><a href="lcivil.php"><img src="uploadimg/civil/<?php echo $data['addr']; ?>" height="100" width="100"  onmouseover="click1(this)" onmouseout="click2(this)" ></a></td>
<?php
	$i++;
	}
	}
}
?>
</tr>
     <tr><th colspan="6" align="left" style="color:blue;">GATE books</th></tr>
                <tr align="center" height="150">
                <?php
	
require 'core.php';
require 'connect.php';

$query = "SELECT `addr` FROM `bookinfo` where `branch`='gate'";

if($query_run=mysql_query($query)){
	$icount=mysql_num_rows($query_run);
	if($icount!=0){
	$i=0;
	while($i<=5){
	$data=mysql_fetch_assoc($query_run);
?>

		<td><a href="lgate.php"><img src="uploadimg/gate/<?php echo $data['addr']; ?>" height="100" width="100"  onmouseover="click1(this)" onmouseout="click2(this)" ></a></td>
<?php
	$i++;
	}
	}
}
?>
</tr>
            </table>
        </div>
    </body>
</html>