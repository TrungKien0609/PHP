<?php
   session_start();
   include_once("config.php");
   $output = "";
   $outgoing_id = $_SESSION['unique_id'];
   $searchTerm = mysqli_real_escape_string($conn,json_decode($_POST['searchTerm']));
   
   $sql = mysqli_query($conn,"SELECT * FROM users  WHERE NOT unique_id= {$outgoing_id} AND ( fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%')");
   if(mysqli_num_rows($sql)>0){
      $row = mysqli_fetch_assoc($sql);
      $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
      <div class="content">
          <img src="filephp/images/'.$row['img'].'" alt="">
          <div class="details ">
              <span>'.$row['fname']." ". $row['lname'].'</span>
              <p>This is test message</p>
          </div>
      </div>
     <div class="status_dot ">
         <i class="fas fa-circle"></i>
      </div>
  </a>';
   }
   else
   {
       $output .= "No user found related to your search term";
   }
   echo $output;
?>