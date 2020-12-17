<html><head>
<link href="../css/user_styles.css" rel="stylesheet" type="text/css" />
<script language="JavaScript" src="../js/user.js">
</script>
</head>
<body bgcolor="tan">
   
<br><br>
<div id="page">


<fieldset>

<legend><b><h1>Register HERE... </h1></b></legend>

<?php
require('../connection.php');
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //This will make your password encrypted into md5, a high security hash
$q="SELECT * FROM tbadministrators WHERE email='$myEmail'";
$result=mysqli_query($con,$q);
$c=mysqli_num_rows($result);

mysqli_close($con);
if($c){
    
   echo "<center><h1>email already Registerd Please Try Another</h1></center>";
}
else
{

   require('../connection.php');
  
    $sql ="INSERT INTO tbadministrators(first_name, last_name, email,password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass') ";
   $result= mysqli_query($con, $sql);
    if ($result==1) {
        echo "<center><h1>You have registered for an account, successfully !</h1></center>";
     } else {
        echo "Error: " . $result . ":-" . mysqli_error($conn);
     }
     mysqli_close($con);

}
}

echo "<center><h3>Register An Admin by filling in the needed information below:</h3></center><br><br>";
echo '<form action="register-admin.php" method="post" onsubmit="return registerValidate(this)">';
echo '<table align="center"><tr><td>';
echo "<tr><td>First Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Email Address:</td><td><input type='email' style='background-color:#999999; font-weight:bold;' name='email' maxlength='100' id='email'value=''></td><td><span id='result' style='color:red;'></span></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' style='background-color:#999999; font-weight:bold;' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";
echo "<tr><td colspan = '2'><p> <a href='logout.php'><b>Logout</b></a></td></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
</fieldset>

</div>
</body>

</html>
