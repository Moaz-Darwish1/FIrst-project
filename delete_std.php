<?php
require_once("playground.php");



if (isset($_GET['name'])) {
    $name = $_GET['name'];
    echo "Student with ID $name has been deleted successfully.";
}

if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

if (isset($_GET['image'])) {
    $image = $_GET['image'];
    echo "Student with name $name has been deleted successfully.";
}

deleteStudent($name,$email,$image);
function deleteStudent($name,$email,$image){
try{
    unlink($image);
    $db_object=connect_to_database();
    $mysql_query = "DELETE FROM `students` WHERE `name` = ? AND `email` = ? AND `image` = ?";
    $stmt=$db_object->prepare($mysql_query);
    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $email, PDO::PARAM_STR);
    $stmt->bindParam(3, $image, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo "Student deleted successfully.";
    } else {
        echo "No student found with the provided details.";
    }
}catch(PDOException $e){
    echo "Error: ". $e->getMessage();
}
}

// function deleteStudent($name, $email, $image) {
//     try {
//         // Establish the database connection
//         $db_object = connect_to_database();

//         // Prepare the DELETE query with placeholders
//         $mysql_query = "DELETE FROM `students` WHERE `name` = ? AND `email` = ? AND `image` = ?";

//         // Prepare the statement
//         $stmt = $db_object->prepare($mysql_query);

//         // Bind the parameters to the query
//         $stmt->bindParam(1, $name, PDO::PARAM_STR);
//         $stmt->bindParam(2, $email, PDO::PARAM_STR);
//         $stmt->bindParam(3, $image, PDO::PARAM_STR);

//         // Execute the query
//         $stmt->execute();

//         // Check if any rows were deleted
//         if ($stmt->rowCount() > 0) {
//             echo "Student deleted successfully.";
//         } else {
//             echo "No student found with the provided details.";
//         }
//     } catch (PDOException $e) {
//         echo "Error: " . $e->getMessage();
//     }
// }

header("Location:submitform.php");

?>
