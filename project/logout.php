<?php
session_start();
?>
<html><head>
<link href="css/user_styles.css" rel="stylesheet" type="text/css" />
</head><body bgcolor="tan">  
<center><b><font color = "brown" size="6">TIME TO LOGOUT</font></b></center><br><br>
<div id="page">
<div id="header">
<h1>Logged Out Successfully </h1>
<p align="center">&nbsp;</p>
</div>
<?php
session_destroy();
?>
You have been successfully logged out.<br><br><br>
Return to <a href="user.html">Login</a>
</div>
</body></html>