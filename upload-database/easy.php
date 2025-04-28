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
    <h1 class="heading">9 Easiest Houseplants Anyone Can Grow</h1>

    <div class="box-container">
        <?php
        // Fetching data from the database
        $sql = "SELECT image_url, Description FROM images WHERE id =18";
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
                    <br> 1- Snake Plant (Sansevieria): The snake plant is a hardy, low-maintenance plant known for its striking upright leaves. It thrives in various light conditions, from low light to bright indirect sunlight. Snake plants are drought-tolerant, requiring minimal watering—just let the soil dry out between waterings. They also improve indoor air quality by filtering out toxins.</br>

<br> 2- Pothos (Epipremnum aureum): Pothos is a popular choice for beginners due to its vibrant, trailing vines and adaptability. It can grow in low light but prefers bright, indirect light for optimal growth. Water when the top inch of soil feels dry, making it forgiving if you forget occasionally. Pothos can be easily propagated from cuttings, allowing you to create new plants.</br>

<br> 3- Spider Plant (Chlorophytum comosum): The spider plant is known for its arching leaves and baby "spiders" that dangle from long stems. It thrives in indirect sunlight and prefers to be watered when the soil is dry to the touch. Spider plants are resilient and can tolerate a range of indoor conditions. They also help purify the air, making them a great addition to any home.</br>

<br> 4- Peace Lily (Spathiphyllum): The peace lily is celebrated for its elegant white blooms and lush green leaves. It flourishes in low to medium light and prefers consistently moist soil. This plant will droop slightly when it needs water, providing a natural signal for care. Peace lilies are also known for their air-purifying qualities, making them an excellent choice for bedrooms.</br>

<br> 5- ZZ Plant (Zamioculcas zamiifolia): The ZZ plant is virtually indestructible, making it ideal for those with little plant care experience. Its glossy, dark green leaves can tolerate low light and irregular watering, as it stores water in its thick stems. ZZ plants are slow-growing but can thrive for years with minimal attention. They are also known for their air-purifying properties.</br>

<br> 6- Aloe Vera: Aloe vera is not only easy to grow but also offers soothing gel for minor burns and cuts. This succulent thrives in bright, indirect light and requires watering only when the soil is completely dry. It’s drought-tolerant, making it perfect for forgetful waterers. Aloe vera can also be a stylish addition to your kitchen or bathroom.</br>

<br> 7- Rubber Plant (Ficus elastica): The rubber plant features large, glossy leaves that can add a touch of elegance to any room. It prefers bright, indirect light but can adapt to lower light conditions. Water when the top inch of soil is dry, and avoid overwatering to prevent root rot. Rubber plants are also known for their air-purifying qualities, enhancing indoor air quality.</br>

<br> 8- Chinese Evergreen (Aglaonema): Chinese evergreens are popular for their colorful, patterned leaves and adaptability to various conditions. They thrive in low to bright indirect light and are relatively drought-tolerant. Water when the soil feels dry, but be cautious of overwatering. Chinese evergreens are also great for improving indoor air quality.</br>

<br> 9- Cast Iron Plant (Aspidistra elatior): True to its name, the cast iron plant is incredibly resilient and can tolerate neglect. It thrives in low light and can withstand fluctuating temperatures and humidity levels. Water sparingly, allowing the soil to dry out between waterings. This hardy plant is perfect for beginners or those with less-than-ideal growing conditions.</br></p>


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