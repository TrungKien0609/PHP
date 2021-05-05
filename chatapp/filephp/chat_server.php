<?php 
session_start();
if(isset($_SESSION['unique_id'])){
   include_once("config.php");
   $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
   $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
   $message = mysqli_real_escape_string($conn,$_POST['message']);
   if(!empty($message)) {
       $sql = mysqli_query($conn,"INSERT INTO messages (incoming_mes_id,outgoing_mes_id,mes) 
       VALUES ('{$incoming_id}','{$outgoing_id}','{$message}')") or die() ; // die để show lổi khi có lổi xảy ra
}
}
else
{
    header("../login.php");
}
?>