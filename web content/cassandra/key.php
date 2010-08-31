<?php
function key_cms()
{
  $File = "test.txt"; 
  $Handle = fopen($File, 'a');

  $content = file_get_contents($File);
  $pieces = explode(",", $content);
  $lengt = sizeof($pieces);

      if($lengt>1)
       {
         $inner = ($lengt-1);
         $Data = ($inner);
       }
      else if(lengt==0)
      {
         $inner =0;
         $Data = ($inner);
      }
     else if($lengt==1)
     {
       $inner=1;
      $Data = ($inner);
     }


    if($lengt==0)
    {
       fwrite($Handle,$Data);
        if(lengt<=0)
           fwrite($Handle,",");   
    }
   else if($lengt>0)
    {
        fwrite($Handle,",".$Data);
    } 
       return $Data;
    fclose($Handle);
}
function key_users($user)
{
  $File = "users.txt"; 
  $Handle = fopen($File, 'a');

  $content = file_get_contents($File);
  $pieces = explode(",", $content);
  $lengt = sizeof($pieces);

      if($lengt>1)
       {
         $inner = ($lengt-1);
        
       }
      else if(lengt==0)
      {
         $inner =0;

      }
     else if($lengt==1)
     {
       $inner=1;
  
     }
    $Data = ($user);

    if(lengt==0)
    {
       fwrite($Handle,$Data);
        if(lengt<=0)
           fwrite($Handle,",");   
    }
   else if(lengt>0)
    {
        fwrite($Handle,",".$Data);
    } 
       return $Data;
    fclose($Handle);
}
function username()
{
$File = "users.txt"; 
$fh = fopen($File, 'r');
  $content = file_get_contents($File);
  $pieces = explode(",", $content);
  $lengt = sizeof($pieces);

 if( $lengt>1)
{
  $theData = fgets($fh, filesize($File));
}
$theData = explode(",",$theData);

fclose($fh);

   return $theData;
}

?>