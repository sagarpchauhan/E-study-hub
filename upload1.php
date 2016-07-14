<?php 
require 'core.php';

require 'core1.php';
require 'connect.php';

$bname=$uname=$author=$publ=$branch=$price=$desc="";
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


if(isset($_FILES['file']['name'])&&isset($_POST['uname'])&&isset($_POST['bname'])&&isset($_POST['author'])&&isset($_POST['price'])&&isset($_POST['branch'])) 
{
$name = $_FILES['file']['name'];
$uname=$_POST['uname'];
$bname=$_POST['bname'];
$author=$_POST['author'];
$publ=$_POST['pub'];
$branch=$_POST['branch'];
$price=$_POST['price'];
$desc=$_POST['desc'];
$current_date = date("y-m-d");
$tmp_name  = $_FILES['file']['tmp_name'];

if (!empty($name)&&!empty($uname)&&!empty($bname)&&!empty($author)&&!empty($branch)&&!empty($price))
{
		$query_run=mysql_query("SELECT uname FROM userinfo WHERE uname='$uname'");
			$query1_run=mysql_query("SELECT `bname` FROM `bookinfo` WHERE uname='$uname'");
		$rows=mysql_num_rows($query1_run);
if($rows>=5){
	echo "<script>alert ('sorry but you can only post 5 adds..please delete your adds for proceding...')</script>";
}
	else{
	if(mysql_num_rows($query_run)==0){
	echo "<script>alert ('username doesn't exist...please register first...')</script>";
	}
else{


if($branch=="computer"){
$location = 'uploadimg/computer/';
}
  if($branch=="electrical"){
$location = 'uploadimg/electrical/';
}
if($branch=="gate"){
$location = 'uploadimg/gate/';
}
if($branch=="civil"){
$location = 'uploadimg/civil/';
}
if($branch=="mechanical"){
$location = 'uploadimg/mechanical/';
}
  if(move_uploaded_file($tmp_name, $location.$name))
  {
mysql_query("INSERT INTO bookinfo VALUES('$uname','$bname','$author','$publ','$branch','$price','$desc','$name','$current_date','')");  
mysql_query("INSERT INTO $uname VALUES('$bname','$author','$price','$current_date')");  
    echo "<script>alert ('uploaded succefully..')</script>";
     
$bname=$uname=$author=$publ=$branch=$price=$desc="";
	}
 else
	  {
	  echo 'please choose a file';
	  }
}
}
}
else{
echo "<script>alert ('please enter data..')</script>";
}
}
	  ?>

<!DOCTYPE html>

<html>
    <head>
        <title>bookstoreupload</title>
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
                    <td colspan="3" align="center"><h1>E-STUDY HUB</h1></td>
                </tr>
            </table>
        </div>
        <hr color="lime">
      	 <div id="menubar">
            <table align="center" bgcolor="#ccffcc" width="100%" height="40">
                <tr>
                    <th style="color:lime;" bgcolor="whitesmoke">Welcome <?php echo $user; ?>,</th>
                    <td align="center" width="20%"><a href="front1.php">Home</a></td>
                    <td align="center" width="20%" style="color:black; font-family: sans-serif;" bgcolor="lime">Upload books</td>
                    <td align="center" width="20%"><a href="profile.php">My Profile</a></td>
                    <td align="center" width="20%"><a href="logout.php">Log Out</a></td>
                </tr>
            </table>
        </div><br>
            <div id="menu1">
	 <h4 align="center"> <marquee direction="left" width="5%"><<<<<</marquee>Post Your Add Here....<marquee width="5%" direction="right">>>>>></marquee></h4><br>
             <table bgcolor="#ccffcc" border="1" align="left" width="25%" height="400">
                <tr height="40" bgcolor="whitesmoke">
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
            <center> <form action="<?php echo $current_file;?>" method="post" enctype="multipart/form-data">
                <table bgcolor="white" width="25%" align="center">
                <tr>
                    <th colspan="3">Insert Book Details</th>
                </tr>
                <tr>
                    <td colspan="2" align="center">User Name</td><td><input class="styletxt" type="text" name="uname" value="<?php echo $uname;?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Book Name</td><td><input class="styletxt" type="text" name="bname" value="<?php echo $bname; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Author</td><td><input class="styletxt" type="text" name="author" value="<?php echo $author; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Publications</td><td><input type="text" class="styletxt" name="pub" value="<?php echo $publ; ?>"></td>
                </tr>
               <tr>
                   <td colspan="2" align="center">Branch</td><td><select name="branch" class="styletxt">
<option></option>
<option>computer</option>
<option>electrical</option>
<option>gate</option>
<option>mechanical</option>
<option>civil</option></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Description</td><td><input type="textarea" name="desc" class="styletxt" value="<?php echo $desc; ?>"></td>
                </tr>
                <tr>
                       <td colspan="2" align="center">Price</td><td><input type="number" class="styletxt" name="price" value="<?php echo $price; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">Upload Photo</td>
                     <td align="center" colspan="3"> <input type="file" name="file">
</td></tr>
          <tr>               
          <td align="center" colspan="3"><input class="styletxt" type="submit" value="Upload Post"></td>
   </tr>
                </table>
</form>
        </div>    
    </body>
</html>
