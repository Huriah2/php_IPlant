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
    <h1 class="heading">6 Common Indoor Plant Care Mistakes</h1>

    <div class="box-container" >
        <?php
        // Fetching data from the database
        $sql = "SELECT image_url, Description FROM images WHERE id = 13";
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
                    <div class="image" >
                        <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" height="300px" alt="Image Description">   
                    </div>

                    <div class="content">
                        <p style="font-size: 19px; text-align: justify; margin: 0; padding-left: 500px; padding-right: 500px;">
                            <br>1- One of the most frequent mistakes is giving plants too much water. This can lead to root rot and other issues, as excess moisture suffocates roots. Always check the soil moisture before watering and ensure pots have drainage holes. Allowing the top inch of soil to dry out between waterings can help prevent this problem.</br>
                            
                            <br>2- Many indoor plants require specific light conditions to thrive. Placing them in low light when they need bright light can stunt their growth or cause them to become leggy. Research your plants' light requirements to position them accordingly. If natural light is lacking, consider using grow lights to supplement their needs.</br>
                            
                            <br>3- Indoor environments can be quite dry, especially during winter months when heating is used. Many tropical plants thrive in higher humidity, and neglecting this can lead to leaf drop or browning tips. To increase humidity, consider using a humidifier or placing a tray of water near your plants. Misting the leaves occasionally can also help maintain moisture levels.</br>
                            
                            <br>4- Different plants have unique soil requirements, and using garden soil or heavy potting mixes can hinder drainage and root health. It’s essential to choose a potting mix that suits your plant type for optimal growth. For instance, succulents prefer sandy soil, while tropical plants benefit from a moisture-retaining mix. Always repot plants in the appropriate soil to support their needs.</br>
                            
                            <br>5- Many plant owners forget to fertilize their indoor plants, which can lead to nutrient deficiencies and poor growth. Fertilizing regularly during the growing season is crucial for healthy foliage and blooms. Use a balanced fertilizer that suits your plant species, and follow the recommended application rates. Over-fertilizing can also harm plants, so moderation is key.</br>
                            
                            <br>6- Neglecting to prune plants can result in overgrowth, which may affect their overall health and appearance. Regular pruning helps remove dead or yellowing leaves, encourages new growth, and maintains the plant's shape. Knowing when and how to trim your plants is essential; many benefit from pruning in early spring. Always use clean, sharp tools to make precise cuts and avoid damaging the plant.</br>
                        </p>
                    </div>
                </div>
        <?php
            }
        } else {
            echo "<p>No images found for this ID.</p>";
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




