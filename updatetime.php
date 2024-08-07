<?php
if(isset($_POST['final_timestamp']))
{
$file = fopen("timestamp.txt","w");
fwrite($file,$_POST['final_timestamp']);
fclose($file);
}
?>