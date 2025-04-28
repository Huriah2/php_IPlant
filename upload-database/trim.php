<?php
include 'function.php';
include 'db_conf.php';
// Check if user is logged in
$user_data = check_login($conn);
$is_logged_in = isset($_SESSION['user_id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>I Plant</title>
    <link rel="stylesheet" href="Pl.css">
    <style>
        header {
            background-color: #b4cf97; /* Change this to your desired header background color */
            padding: 10px; /* Add some padding */
        }
        </style>
</head>
<body>

<header>
    <a class="logo">I Plant</a>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="index.php #about">About</a>
        <a href="index.php #types">Plants</a>
        <a href="index.php #learn">Plant Care</a>
        <?php if (!$is_logged_in): ?>
            <a href="login.php">Login</a>
            
            <a href="signup.php">Sign Up</a>
        <?php else: ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
        </header>



</body>
</html>

<section class="types" id="types" style="background-color: #f0f0f0; padding: 20px; margin: 0; border: none;">
    <h1 class="heading">How to trim your plants?</h1>

    <div class="box-container">
        <?php
        // Fetching data from the database
        $sql = "SELECT image_url, Description FROM images WHERE id =3";
        $all_img = $conn->query($sql);

        // Check if the query was successful
        if (!$all_img) {
            die("Query failed: " . $conn->error);
        }

        // Check if there are results
        if ($all_img->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($all_img)) {
        ?>
                 <div class="box" style="margin: 10px; background: transparent; border: none; box-shadow: none;">
                    <div class="image">
                        <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" height="300px" alt="Image Description">   
                    </div>
                    
                    <div class="content">
                    <p style="font-size: 19px; text-align: justify; margin: 0; padding-left: 500px; padding-right: 500px;">
                        <br> Trimming your plants is an essential part of maintaining their health and encouraging growth. First, it’s important to choose the right time to trim. Early spring is often the best season, as most plants are entering their active growing phase. Begin by gathering the necessary tools, including clean, sharp pruning shears or scissors, to make precise cuts without damaging the plant. </br> 
                        <br>  Start by assessing the plant and identifying any dead, yellowing, or damaged leaves. Removing these not only improves the plant's appearance but also prevents the spread of disease. Next, look for overgrown stems or branches that are crowding the plant. Cutting these back helps improve air circulation and allows more light to reach the inner parts of the plant. </br>
                        <br>  When trimming, make cuts at a slight angle just above a leaf node or bud to encourage new growth. Avoid cutting too much at once; a general rule of thumb is to remove no more than one-third of the plant at a time. This helps minimize stress and allows the plant to recover more easily. </br>
                        <br>  For flowering plants, deadheading spent blooms encourages further flowering and maintains a tidy appearance. Always ensure your tools are clean to prevent introducing pathogens. After trimming, monitor the plant for any signs of stress or disease, and adjust your care routine as needed. Regular trimming not only enhances the plant's health but also shapes it for a more aesthetically pleasing look, fostering a thriving indoor or garden environment. </br></p>


                    </div>

                    <?php
            }
        }
        ?>
    </div>
</section>





<section class="footer" style="background-color: #362d23; padding: 20px; color: white;">  <!-- Background color and padding -->
    <div class="box-container" style="text-align: center;">  <!-- Center align the box content -->
        <div class="box">
            <h3>Nav</h3>
            <a href="index.php" style="color: #70b087; text-decoration: none;">home</a>
            <a href="index.php #about" style="color: #70b087; text-decoration: none;">about</a>
            <a href="index.php #types" style="color: #70b087; text-decoration: none;">Plants</a>
            <a href="index.php #learn" style="color: #70b087; text-decoration: none;">Plant Care</a>
        </div>

        <div class="box">
            <h3>Contact Info</h3>
            <a href="tel:0539803721" style="color: #70b087;">0539803721</a>

            <?php
            // Fetch images and names from the database
            $sql = "SELECT * FROM images WHERE id IN (44, 45, 46)";
            $all_img = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($all_img)) {
                $name = $row["name"];
                $url = '';
                
                // Assign URLs based on ID
                if ($row["id"] == 44) { // Instagram
                    $url = 'https://www.instagram.com/yourusername';
                } elseif ($row["id"] == 45) { // LinkedIn
                    $url = 'https://www.linkedin.com/in/yourusername';
                } elseif ($row["id"] == 46) { // Outlook email
                    $url = 'mailto:youremail@example.com';
                }
            ?>
                <div style="margin-bottom: 10px; display: flex; flex-direction: column; align-items: center;">
                    <img src="<?php echo $row["image_url"]; ?>" width="20" height="20" alt="<?php echo $name; ?>" style="margin-bottom: 5px;">
                    <a href="<?php echo $url; ?>" target="_blank" style="text-align: right; margin-left: 5px; color: #70b087;">
                        <?php echo $name; ?>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="credit" style="text-align: center; margin-top: 20px; color: white;"> 
        2024, IPlant | All rights reserved 
    </div>
</section>