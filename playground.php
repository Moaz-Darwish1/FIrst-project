<?php

require_once("cred.php");

function connect_to_database()
{
    global $host, $username, $password, $dbname;
    try {
        $connection = new PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
        return $connection;

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}


function create_table()
{
    $db_object = connect_to_database();
    try {
        $mysql_query = "CREATE TABLE IF NOT EXISTs `students` (`id` int(11) not null auto_increment primary key,
        `name` varchar(25) not null ,`email` varchar(255) not null ,
        `password` varchar(15) not null ,`room` varchar(50));";
        $stmt=$db_object->prepare($mysql_query);
        $stmt->execute();
        echo "tabel created successfully";
    } catch (Exception $e) {
        echo "error:".$e->getMessage();
    }
}

// create_table();

function insert_student($fname, $email, $upassword, $room_num, $file_name)
{
    $db_object = connect_to_database();
    try {

        $mysql_query = "INSERT INTO `students` (`name`, `email`, `password`, `room`,`image`) VALUES (:name, :email, :password, :room, :image);";
        $stmt = $db_object->prepare($mysql_query);
        $stmt->bindParam(':name', $fname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $upassword);
        $stmt->bindParam(':room',$room_num);
        $stmt->bindParam(':image', $file_name);

        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}


// insert_student();


function get_students()
{
    try {
        $db_object = connect_to_database();
        $mysql_query = "SELECT * FROM `students`";
        $stmt = $db_object->prepare($mysql_query);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    return $res;
};

// get_students();

function delete_student($id)
{
    $db_object = connect_to_database();
    try {
        $mysql_query = "DELETE FROM `students` WHERE `id` = :id";
        $stmt = $db_object->prepare($mysql_query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }
}

// delete_student(71);

function update_student($id, $fname, $email, $upassword, $room_num ,$image)
{
    $db_object = connect_to_database();
    try {
        $mysql_query = "UPDATE `students` SET `name` = :name, `email` = :email, `password` = :password, `room` = :room ,`image`= :imag WHERE `id` = :id";
        $stmt = $db_object->prepare($mysql_query);
        $stmt->bindParam(':name', $fname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $upassword);
        $stmt->bindParam(':room', $room_num);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':imag', $image);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }
}

// update_student(80, "ssssssss", "moaz@gmail.com", 12345, "cloud");


function update_student1($id, $fname, $email, $upassword, $room_num)
{
    $db_object = connect_to_database();
    try {
        $mysql_query = "UPDATE `students` SET `name` = :name, `email` = :email, `password` = :password, `room` = :room  WHERE `id` = :id";
        $stmt = $db_object->prepare($mysql_query);
        $stmt->bindParam(':name', $fname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $upassword);
        $stmt->bindParam(':room', $room_num);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }
}












