<?php 
include_once "filephp/config.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realtime chat app</title>
    <link rel="stylesheet" href="./user_style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
</head>
<?php 
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php") ;
    }
?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php 
            $sql = mysqli_query($conn,"SELECT * FROM users WHERE unique_id =  '{$_SESSION['unique_id']}'");
            if(mysqli_num_rows($sql) > 0){
                $row  = mysqli_fetch_assoc($sql);
            }
            ?>
                <div class="content">
                    <img src="filephp/images/<?php echo $row['img']?>" alt="#">
                    <div class="details">
                        <span><?php echo $row['fname']." ". $row['lname']?></span>
                        <p><?php echo $row['status']?></p>
                    </div>
                </div>
                <a href="filephp/logout.php?user_id= <?php echo $row['unique_id']?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">
                    Select an user to start
                </span>
                <input type="text" placeholder="Enter your name to search..">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="user_list active">
            </div>
        </section>
    </div>
    <script src="./JS/users.js"></script>
</body>

</html>