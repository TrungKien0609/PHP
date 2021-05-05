<?php 
session_start();
if(isset($_SESSION['unique_id'])){
   include_once("config.php");
   $outgoing_id = mysqli_real_escape_string($conn,$_POST['outgoing_id']);
   $incoming_id = mysqli_real_escape_string($conn,$_POST['incoming_id']);
   $output = " ";
   $sql = " SELECT * FROM messages 
   LEFT JOIN users ON users.unique_id = messages.outgoing_mes_id
   WHERE ( outgoing_mes_id = '{$outgoing_id}' AND 
   incoming_mes_id = '{$incoming_id}') OR ( outgoing_mes_id = '{$incoming_id}' AND  incoming_mes_id = '{$outgoing_id}') ORDER BY mes_id ASC"; 
   $query = mysqli_query($conn,$sql); 
   if(mysqli_num_rows($query) > 0){
       while($row = mysqli_fetch_assoc($query)){
           if($row['outgoing_mes_id'] === $outgoing_id){
               // chọn ra người gửi trong một dòng row . để hiển thị tin nhắn của người đó
               $output .= '<div class="chat outgoing">
                <div class="details">
                    <p>'.$row['mes'].'</p>
                </div>
            </div>' ;

            }
            else
            {
                $output .= '<div class="chat incomming">
                <img src="filephp/images/'.$row['img'].'" alt="">
                <div class="details">
                    <p> '.$row['mes'].'</p>
                </div>
            </div>' ; 
            }
       }
      echo $output;
   }
}
else
{
    header("../login.php");
}
?>