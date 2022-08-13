<?php 
session_start();
if(!empty($_SESSION['f_name'])){
echo $_SESSION['f_name'] . "<br>";
echo $_SESSION['s_name'] . "<br>";
echo $_SESSION['email'] . "<br>";
?>
<!-- // echo $_SESSION['amr_img']; -->
<img scr="img/<?php echo $_SESSION['amr_img']; ?>" alt="img" >
 <!-- <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>
 <body>
     <img src="./img/<?php echo  $_FILES['amr_img']; ?>"alt="img">
</body>
 </html> -->
 <?php 
}else{
    header("Location:index.php");
}