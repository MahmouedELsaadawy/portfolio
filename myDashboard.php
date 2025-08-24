<?php

    //connection
    $conn = mysqli_connect('localhost', 'mahmoud', 'Mahmoud-1995', 'projects');

    //check connection

    if(!$conn){

        echo 'connection: ' . mysqli_connect_error();
    }
     

    $name = $type = $url = $file = $about = $category = '';
    $error = array('name'=>'', 'type'=>'', 'url'=>'', 'file'=>'', 'about'=>'', 'category'=>'');

    if (isset($_POST['submit'])) {

        if (empty($_POST['name'])){

            $error['name'] = 'name is required'; 
        } else {
            $name = $_POST['name'];
        }

        if (empty($_POST['type'])){

            $error['type'] = 'type is required'; 
        } else {
            $type = $_POST['type'];
        }

        if($_POST['category'] == 1){
            if (empty($_POST['url'])){

                $error['url'] = 'url is required'; 
            } else {
            $url = $_POST['url'];
            }
        } else {
            $url = $_POST['url'];
        }

        if (empty($_POST['file'])){

            $error['file'] = 'file is required'; 
        } else {
            $file = $_POST['file'];
        }

        if (empty($_POST['about'])){

            $error['about'] = 'info is required'; 
        } else {
            $about = $_POST['about'];
        }

        if (empty($_POST['category'])){

            $error['category'] = 'category is required'; 
        } else {
            $category = $_POST['category'];
        }

        if(array_filter($error)){

        } else {

            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $type = mysqli_real_escape_string($conn, $_POST['type']);
            $url = mysqli_real_escape_string($conn, $_POST['url']);
            $file = mysqli_real_escape_string($conn, $_POST['file']);
            $about = mysqli_real_escape_string($conn, $_POST['about']);
            $category = mysqli_real_escape_string($conn, $_POST['category']);

            //creat sql
            if($category == "1"){
                $sql1 = "INSERT INTO web(name, type, url, file, about, category) VALUES('$name', '$type', '$url', '$file',  '$about', '$category')";
                
                // Execute the query
                if (mysqli_query($conn, $sql1)) {
                header('Location: home.php');
                exit;
                } else {
                echo "Error: " . mysqli_error($conn);
                }

            } elseif($category == "2"){
                $sql2 = "INSERT INTO designs(name, type, url, file, about, category) VALUES('$name', '$type', '$url', '$file',  '$about', '$category')";
                
                // Execute the query
                if (mysqli_query($conn, $sql2)) {
                    header('Location: home.php');
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }

                mysqli_close($conn);
                
         
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dash.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <title>My Dashboard</title>
</head>
<body>
    <form class="section" id="add" action="myDashboard.php" method="POST">

        <input type="text" placeholder="Name" class="input-field" name="name" require>
        <input type="text" placeholder="type" class="input-field" name="type" require>
        <input type="url" placeholder="url" class="input-field" name="url" require>
        <input type="file" value="" class="input-field" name="file" accept="image/png, image/jpeg">
        <textarea name="about" id="about" require class="input-field"></textarea>
        
        <select name="category" id="add" require class="input-field" name="select">
            <option value="0">Select one</option>
            <option value="1">Website</option>
            <option value="2">Design</option>
        </select>

        <button type="submit" name ="submit">Add</button>

    </form>
</body>
</html>