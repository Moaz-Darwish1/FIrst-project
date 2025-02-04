<?php

require_once("playground.php");
require_once("bootstrap.html");


$fname = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$upassword = isset($_POST['password']) ? $_POST['password'] : '';
$room_num = isset($_POST['room_num']) ? $_POST['room_num'] : '';
$file_name = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';



if (isset($_FILES["image"]["name"])) {
    $image_ext = explode(".", $file_name);
    $image_ext = end($image_ext);
    $image_ext = strtolower($image_ext);
    if (in_array($image_ext, array('jpg', 'jpeg', 'png'))) {
        $file_size = $_FILES["image"]["size"];
        $file_type = $_FILES["image"]["type"];
        $file_tmp = $_FILES["image"]["tmp_name"];
        $file_name = "./uploads/" . time() . "_" . $file_name;
        $moved = move_uploaded_file($file_tmp, "$file_name");
        if (!$moved) {
            $file_name = null;
        }
    }
}


draw_table();
function draw_table()
{
    $content = get_students();
    echo "<div class='container mt-5'>";
    echo "<table class='table table-striped'>";
    echo "<thead><tr><th>Name</th><th>Email</th><th>Room number</th><th>Image</th><th>edit</th><th>delete</th></tr></thead>";
    echo "<tbody>";
    foreach ($content as $item) {
        echo "<tr><td>$item[name]</td>
        <td>$item[email]</td>
        <td>$item[room]</td>
        <td><img src='$item[image]' height=50px; width=50px;></td>";

        echo "<td class='btn'><a href='edit.php?id={$item['id']}&name={$item['name']}&password={$item['password']}&email={$item['email']}&room={$item['room']}&{$item['image']}'>Edit</a>
        </td><td><a  href='delete_std.php?name={$item['name']}&email={$item['email']}&image={$item['image']}'>Delete</a></tr>";
    }
    echo "</tbody></table></div>";
}


if($fname&&$email&&$upassword){    
    save_data($fname, $email, $password, $room_num, $file_name);
    header("Location: ".$_SERVER['PHP_SELF']);
}


function save_data($fname, $email, $password, $room_num, $file_name)
{
    insert_student($fname, $email, $password, $room_num, $file_name);
}




