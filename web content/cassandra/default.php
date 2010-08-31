<?php
session_start();
$GLOBALS['THRIFT_ROOT'] = 'C:/Program Files/EasyPHP 3.0/www/cassandra';
require_once $GLOBALS['THRIFT_ROOT'].'/tmp.php'; 

		        
$action=(isset($_REQUEST['do']))?strip_tags($_REQUEST['do']):'';
$usr = $_SESSION['usr'] ;

if((isset($usr)&&($usr!='')))
{
echo"<table border='0' cellspacing='0' cellpadding='2' width='80%' align='center'>";
echo"<tr>";
echo"<td colspan='2' valign='top' style='font-family:arial;font-size:10pt;color:black;'>";
echo"Message Management System For ".$usr;

echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td colspan='1' width='15%' valign='top' >";
echo"<a href='default.php?do=Inbox' style='text-decoration:none;font-family:arial; font-size:10pt;color:#2E2E2E;'>";
echo"Inbox";
echo"</a>";
echo"<br />";
echo"<a href='default.php?do=Outbox' style='text-decoration:none;font-family:arial; font-size:10pt;color:#2E2E2E;'>";
echo"Outbox";
echo"</a>";
echo"<br />";
echo"<a href='default.php?do=search' style='text-decoration:none;font-family:arial; font-size:10pt;color:#2E2E2E;'>";
echo"Search";
echo"</a>";
echo"<br />";
echo"<a href='default.php?do=compose' style='text-decoration:none;font-family:arial; font-size:10pt;color:#2E2E2E;'>";
echo"Compose";
echo"</a>";
echo"<br />";
echo"<a href='default.php?do=logout' style='text-decoration:none;font-family:arial; font-size:10pt;color:#2E2E2E;'>";
echo"Logout";
echo"</a>";
echo"</td>";
echo"<td>";
echo"<table border='0' cellpadding='0' cellspacing='0' width='100%'>";
echo"<tr>";
echo"<td colspan='2'>";
echo"<span style='font-family:arial; font-size:10pt;color:#2E2E2E;'>";
if(isset($_REQUEST['do'])&&($_REQUEST['do']!=''))
{
 $actions = $_REQUEST['do'];
  echo $actions;
}
else if(isset($_REQUEST['do'])&&($_REQUEST['do']==''))
{
 echo"&nbsp";
}
echo"</span>";

echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td colspan='2' style='font-family:arial;font-size:10pt;color:#2E2E2E;'>";
if(isset($action) &&($action!=''))
{
 $OutPut = Cms($action);
 echo $OutPut;
}
else
{
 echo"Welcome to your Messages ".$usr;
}
echo"</td>";
echo"</tr>";
echo"</table>";
echo"</td>";
echo"</tr>";
echo"</table>";
}
?>