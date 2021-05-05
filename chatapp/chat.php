<?php 
session_start();
if(!isset($_SESSION['unique_id']))
{
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="./chat.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<body>
    <div class="wrapper">
        <section class="chat_area">
            <header>
            <?php 
            include_once("filephp/config.php");
            $user_id = mysqli_real_escape_string($conn,$_GET['user_id']);
            $sql = mysqli_query($conn," SELECT * FROM users WHERE unique_id = '{$user_id}'");
            if(mysqli_num_rows($sql)){
                $row = mysqli_fetch_assoc($sql);
            }
            ?>
                <a href="user.php" class="back_icon"><i class="fas fa-arrow-left"></i></a>
                <img src="filephp/images/<?php echo $row['img']?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname']." ". $row['lname']?></span>
                    <p><?php echo $row['status']?></p>
                </div>
            </header>
            <div class="chat_box">
            </div>
            <form action="#" class="typing_area" autocomplete="off">
                <input type="text" name= "outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id ?>" hidden>
                <input type="text" name="message" class="input_field" placeholder="Type a message here">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="./JS/chat.js"></script>
</body>

</html>