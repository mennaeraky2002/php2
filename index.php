<?php 
ob_start();
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["f_name"])){
    $first_name = filter_var($_POST["f_name"],FILTER_SANITIZE_STRING);
    $second_name = filter_var($_POST["s_name"],FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"],FILTER_SANITIZE_EMAIL);
    $_SESSION["f_name"] = $first_name;
    $_SESSION["s_name"] = $second_name;
    $_SESSION["email"] = $email;
    @$image = $_FILES["amr_img"]["name"];
    @$size = $_FILES["amr_img"]["size"];
    @$tmp_name = $_FILES["amr_img"]["tmp_name"];
    @$type = $_FILES["amr_img"]["type"];
    $extention_allowed = array("png","jpg","jpeg");
    @$extention = strtolower(end(explode(".",$image)));
    if(in_array($extention,$extention_allowed)){
        $avatar = rand(0,1000000) . "_" . $image ;
        $destination = "img/" . $avatar ;
        move_uploaded_file($tmp_name,$destination);
    }else{
        echo "<div class=\"container\"><div class=\"alert alert-danger\" role=\"alert\">
                Sorry Extention Not Allowed
                </div></div>";
    }   

    header("Location:about.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/index.css">
</head>
<body>

    <form method="POST" action="index.php" enctype="multipart/form-data">
        <label for="fname">First name:</label><br>
        <input type="text" name="f_name"><br>
        <label for="lname">Second name:</label><br>
        <input type="text" name="s_name"><br>
        <label for="email">Enter your email:</label><br>
        <input type="email" name="email"><br>
        <input type="file" name="amr_img"><br>
        <input type="submit" value="Submit"><br>
    </form>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
</body>
</html>

