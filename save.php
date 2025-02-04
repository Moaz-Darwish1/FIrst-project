<?php
require_once("playground.php");

$id = isset($_POST['id']) ? $_POST['id'] : '';
$fname = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$upassword = isset($_POST['password']) ? $_POST['password'] : '';
$room_num = isset($_POST['room_num']) ? $_POST['room_num'] : '';
$file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
$pimage = isset($_POST['pimage']) ? $_POST['pimage'] : '';


if($pimage===$file_name){
    
    $image_ext = explode(".", $file_name);
    $image_ext = end($image_ext);
    $image_ext = strtolower($image_ext);
    $file_size = $_FILES["image"]["size"];
    $file_type = $_FILES["image"]["type"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $file_name = "./uploads/" . time() . "_" . $file_name;
    $moved = move_uploaded_file($file_tmp, "$file_name");

    update_student1($id, $fname, $email, $upassword, $room_num);
    header("Location: submitform.php");
    
    }else{
        $image_ext = explode(".", $file_name);
        $image_ext = end($image_ext);
        $image_ext = strtolower($image_ext);
        $file_size = $_FILES["image"]["size"];
        $file_type = $_FILES["image"]["type"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_name = "./uploads/" . time() . "_" . $file_name;
        $moved = move_uploaded_file($file_tmp, "$file_name");
        update_student($id, $fname, $email, $upassword, $room_num ,$file_name);
            var_dump($pimage);
    echo "<br>";
    var_dump($file_name);
    header("Location: submitform.php");
}






// var_dump($id, $fname, $email, $upassword, $room_num ,$file_name);





?>