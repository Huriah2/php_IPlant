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
    <h1 class="heading">why is my plant dropping leaves?</h1>

    <div class="box-container" >
        <?php
        // Fetching data from the database
        $sql = "SELECT image_url, Description FROM images WHERE id = 14";
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
    <br> When a plant drops leaves, it can be distressing for any plant owner, and several factors may contribute to this issue. One common reason is overwatering, which can lead to root rot. When roots sit in soggy soil for too long, they can't absorb nutrients effectively, causing leaves to yellow and fall. Conversely, underwatering can also result in leaf drop, as plants that are too dry will shed leaves to conserve moisture.</br>
    
    <br> Another factor is insufficient light; many plants require specific light conditions to thrive. If they don’t receive enough light, they may drop leaves in an attempt to reduce their energy expenditure. On the other hand, exposure to direct sunlight can scorch leaves, causing them to yellow and drop off. Temperature fluctuations or drafts can also stress plants, leading to leaf drop. Keeping plants in a stable environment helps minimize this risk.</br>
    
    <br> Pests and diseases can be culprits as well. Insects like spider mites or aphids can damage leaves, prompting them to fall off. Regularly inspecting your plants for signs of infestations is essential for early detection and treatment. Nutrient deficiencies, particularly nitrogen or potassium, can also cause leaves to drop. If the plant lacks essential nutrients, consider using a balanced fertilizer to support its health.</br>
    
    <br> Lastly, seasonal changes can impact leaf drop, as some plants naturally shed leaves in response to environmental shifts. Understanding the specific needs of your plants and monitoring their conditions can help you identify the cause of leaf drop and take appropriate action. By addressing these issues, you can restore your plant’s health and vitality.</br>
</p>


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
        2024, Jeddah | All rights reserved 
    </div>
</section>