<?php

    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $password = isset($_GET['password']) ? $_GET['password'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $room = isset($_GET['room']) ? $_GET['room'] : '';
    $image = isset($_GET['image']) ? $_GET['image'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="col-8" style="padding-left: 100px; padding-top: 50px;">
        <h3>Fill this form</h3>
        <form action="./save.php" method="post" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo ($name); ?>">
                <label for="name">Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo ($email); ?>">
                <label for="email">Email address</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo ($password); ?>">
              <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" name="c_password" placeholder="Confirm Password">
              <label for="password">Confirm Password</label>
            </div>
            <div class="form-floating">
              <select class="form-select" id="room_num" name="room_num" aria-label="clivk here">
                <option selected>Open to select</option>
                <option value="application1" <?php if($room=="application1"){echo"selected";} ?>>Application 1</option>
                <option value="application2" <?php if($room=="application2"){echo"selected";} ?>>Application 2</option>
                <option value="cloud" <?php if($room=="cloud"){echo"selected";} ?>>Cloud</option>
              </select>
              <label for="room_num">choose the room</label>
            </div>
            <br>
            <div>
              <input type="file" name="image" class="form-label" id="">
              <label for="image" class="form-label">Image</label>
            </div>
            <input type="hidden" name="id" id="id" value="<?php echo ($id); ?>">
            <input type="hidden" name="pimage" id="pimage" value="<?php echo ($image); ?>">
                <button type="submit" class="btn btn-primary">save</button> 
        </form>
    </div>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</body>
</html>




