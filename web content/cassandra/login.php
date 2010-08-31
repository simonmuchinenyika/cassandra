<script language="javascript">
function notEmpty()
{
if(document.getElementById('pwd1').value != document.getElementById('pwd2').value ) {
alert('Passwords do not match');

return false;
}
elseif(document.getElementById('pwd1').value == document.getElementById('pwd2').value)
{
 return document.foms.submit()
 return true;
}

return true;
}
</script>
<?php
echo"<form name='foms' method='POST' action='".$_SERVER['PHP_SELF']."'>";
echo"<table border='0' cellspacing='0' cellpadding='2' width='80%' align='center'>";
$submitted = (isset($_REQUEST['Sub']))?$_REQUEST['Sub']  :'';
$create = (isset($_REQUEST['create']))?$_REQUEST['create']:'';
$acc = (isset($_POST['acc']))?$_POST['acc']:'';
$username = (isset($_POST['username'])&&($_POST['username']!=''))?strip_tags($_POST['username']):'';
$email = (isset($_POST['email'])&&($_POST['email']!=''))?strip_tags($_POST['email']):'';
$password = (isset($_POST['pwd1'])&&($_POST['pwd1']!=''))?strip_tags($_POST['pwd1']):'';
if(isset($submitted)&&($submitted!=''))
{
// Setup the path to the thrift library folder
$GLOBALS['THRIFT_ROOT'] = 'C:/Program Files/EasyPHP 3.0/www/cassandra'; 
// Load up all the thrift stuff
require_once $GLOBALS['THRIFT_ROOT'].'/class.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/tmp.php'; 
   // Initialize Cassandra
$cassandra = new CassandraDB("ContentManagementSystem");
   // Debug on
$cassandra->SetDisplayErrors(true);
$username = $submitted;
//get record
$records = $cassandra->GetRecordByKey("users","$username");	

     if($records['username']=="$username")
   {
        //email,pass and name 
                $_SESSION['usr'] = $records['username'];
                $_SESSION['ema'] = $records['email'];
				$_SESSION['pass'] = $records['password'];
        //redirect after making sure that the user is registered and use sessions
        echo"<script language=\"javascript\" type=\"text/javascript\">";
        echo"window.location=\"default.php\"";
        echo"</script>";

 }

}
else if(isset($create)&&($create!=''))
{

echo"<tr>";
echo"<td colspan='4' width='20%' style='font-family:arial; font-size:14pt;color:black;'>";
echo"User Account";
echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td colspan='1' width='20%' style='font-family:arial; font-size:10pt;color:black;'>";
echo"Email Address";
echo"</td>";
echo"<td colspan='1'>";
echo"<input type='text' name='email' id='email'>";
echo"</td>";
echo"<td colspan='1' width='20%' style='font-family:arial; font-size:10pt;color:black;'>";
echo"username";
echo"</td>";
echo"<td colspan='1'>";
echo"<input type='text' name='username' id='username'>";
echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td colspan='1' style='font-family:arial; font-size:10pt;color:black;'>";
echo"Password";
echo"</td>";
echo"<td colspan='1'>";
echo"<input type='password' name='pwd1' id='pwd1'>";
echo"</td>";
echo"<td colspan='1' style='font-family:arial; font-size:10pt;color:black;'>";
echo"Password Confirmation ";
echo"</td>";
echo"<td colspan='1'>";
echo"<input type='password' name='pwd2' id='pwd2'>";
echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td colspan='4' align='right'>";
echo"<input type='submit' onclick='notEmpty();' value='SUBMIT' id='acc' name='acc'>";
echo"</td>";
echo"</tr>";

}
else if(isset($acc)&&($acc!='')&&($_POST['pwd1']==$_POST['pwd2']))
{
// Setup the path to the thrift library folder
$GLOBALS['THRIFT_ROOT'] = 'C:/Program Files/EasyPHP 3.0/www/cassandra'; 
// Load up all the thrift stuff
require_once $GLOBALS['THRIFT_ROOT'].'/class.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/tmp.php'; 
require_once $GLOBALS['THRIFT_ROOT'].'/key.php';

   // Initialize Cassandra
$cassandra = new CassandraDB("ContentManagementSystem");
   // Debug on
$cassandra->SetDisplayErrors(true);

$record = array("email"=>"$email","password"=>"$password","username"=>"$username");
       if ($cassandra->InsertRecordArray("users", "$username", $record))
         {          
              //input username into text
			   key_users($username);
			  //get record
                $records = $cassandra->GetRecordByKey("users","$username");	
             //email,pass and name 
                $_SESSION['usr'] = $records['username'];
                $_SESSION['ema'] = $records['email'];
				$_SESSION['pass'] = $records['password'];
            //redirect after making sure that the user is registered and use sessions
            echo"<script language=\"javascript\" type=\"text/javascript\">";
            echo"window.location=\"default.php\"";
            echo"</script>";
		     
         }
}
else if($acc=='' || $create=='' || $submitted=='')
{
// Setup the path to the thrift library folder
$GLOBALS['THRIFT_ROOT'] = 'C:/Program Files/EasyPHP 3.0/www/cassandra'; 
// Load up all the thrift stuff
require_once $GLOBALS['THRIFT_ROOT'].'/class.php';
require_once $GLOBALS['THRIFT_ROOT'].'/Thrift.php';
require_once $GLOBALS['THRIFT_ROOT'].'/protocol/TBinaryProtocol.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TSocket.php';
require_once $GLOBALS['THRIFT_ROOT'].'/transport/TBufferedTransport.php';
require_once $GLOBALS['THRIFT_ROOT'].'/tmp.php'; 
require_once $GLOBALS['THRIFT_ROOT'].'/key.php';

   // Initialize Cassandra
$cassandra = new CassandraDB("ContentManagementSystem");
   // Debug on
$cassandra->SetDisplayErrors(true);




  


echo"<tr>";
echo"<td colspan='2' valign='top' style='font-family:arial; font-size:14pt;color:black;'>";
echo"Select user or create user to use the content management system[email based]:";
echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td colspan='2'>";
echo"<select ONCHANGE='location = this.options[this.selectedIndex].value;'>";

$username = username();
  echo"<option >";
  echo"Default";
  echo"</option>";
for($i=0;$i<sizeof($username);$i++)
{
 $users = $username[$i];
 $records = $cassandra->GetRecordByKey("users","$users");	
  echo"<option value='".$_SERVER['PHP_SELF']."?Sub=".$records['username']."'>";
  echo  $records['username'];
  echo"</option>";
}
echo"</select>";

echo"&nbsp &nbsp ";
echo"<a href='index.php?create=create'> Create A User</a>";
echo"</td>";
echo"</tr>";
}
echo"</table>";
echo"</form>";
?>