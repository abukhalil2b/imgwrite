<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
        <img class="img" src="bg.jpg" alt="">
        <form action="/imgwitre/show.php" method="POST">
            <input type="text" name="name" >
            <input type="text" name="state" >
            <button class="btn">أتعهد</button>
        </form>
        <div class="counter">
            <?php 
                include 'connection.php';

                if($link === false){
                    die("ERROR: Could not connect. " . mysqli_connect_error());
                }
                
                $sql = "SELECT * FROM persons";
                if($row = mysqli_query($link, $sql)){
                    
                    echo mysqli_num_rows($row);
                } else{
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                }
                
                // Close connection
                mysqli_close($link);

            ?>
        </div>
    </div>
</body>
</html>