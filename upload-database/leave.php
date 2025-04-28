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
             /* Add some padding */
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
    <h1 class="heading">Why does my plants have yellow leaves?</h1>

    <div class="box-container">
        <?php
        // Fetching data from the database
        $sql = "SELECT image_url, Description FROM images WHERE id =2";
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
                    <br>Yellowing leaves on your plants can be a sign of several underlying issues, often indicating stress or poor health. One common cause is overwatering, 
                    which leads to root rot and deprives roots of oxygen. When the roots are damaged, they can't uptake nutrients effectively,
                     resulting in yellow leaves. To remedy this, check the soil moisture; if it feels overly wet, allow it to dry out before watering again.</br>
                    
                    <br> Conversely, underwatering can also cause yellowing. If the soil is too dry, plants can't absorb the water and nutrients they need, leading to wilting and yellow leaves. Make sure to establish a consistent watering schedule based on the specific needs of each plant. Nutrient deficiencies, particularly nitrogen, can also result in yellowing foliage. If the plant isn't getting enough nutrients from the soil, consider using a balanced fertilizer to replenish essential elements.</br>
                
                    <br> Another factor could be insufficient light. Many plants require specific light conditions to thrive; inadequate light can hinder photosynthesis and lead to yellowing. Ensure your plants are placed in appropriate lighting conditions—if they require more light, consider relocating them or supplementing with grow lights.</br>
            
                    <br> Pests and diseases can also cause leaves to yellow. Inspect your plants for signs of infestations, such as webs or visible insects, and treat accordingly. Lastly, environmental stressors like temperature fluctuations or drafts can impact plant health, leading to yellow leaves. Keeping your plants in a stable environment helps minimize stress. By identifying and addressing these issues promptly, you can restore your plants' health and vibrancy.</br></p>


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