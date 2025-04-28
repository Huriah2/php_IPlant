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
    <h1 class="heading">How to care for plants while you're away?</h1>

    <div class="box-container">
        <?php
        // Fetching data from the database
        $sql = "SELECT image_url, Description FROM images WHERE id =22";
        $all_img = $conn->query($sql);

        // Check if the query was successful
        if (!$all_img) {
            die("Query failed: " . $conn->error);
        }

        // Check if there are results
        if ($all_img->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($all_img)) {
        ?>
                 <div class="box" style="margin: 10px; background: transparent; border: none; box-shadow: none; ">
                    <div class="image" >
                        <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" height="300px" alt="Image Description">   
                    </div>
                    
                    <div class="content">
                    <p style="font-size: 19px; text-align: justify; margin: 0; padding-left: 500px; padding-right: 500px;">
    <br> Caring for plants while you’re away requires some planning to ensure they remain healthy and thriving. First, assess the needs of each plant and group them according to their light and water requirements. This helps streamline care and makes it easier to provide the right environment for each type.</br>
    
    <br> Before leaving, water your plants thoroughly to ensure they are well-hydrated. Use a self-watering system or place pots in a basin of water to keep the soil moist for longer periods. Another option is to create a DIY watering globe using a filled bottle with a small hole in the cap, allowing water to seep out gradually.</br>
    
    <br> If your plants require bright light, consider moving them to a well-lit area before your departure. For those that prefer indirect light, place them in a spot where they will receive filtered sunlight. You can also use sheer curtains to diffuse harsh sunlight and prevent leaf burn.</br>
    
    <br> For longer trips, consider asking a friend or neighbor to check in on your plants. Provide them with clear instructions on watering schedules and any specific care requirements. Alternatively, many communities have services that offer plant-sitting during vacations.</br>
    
    <br> If you're leaving for an extended period, prune any dead or yellowing leaves beforehand. This helps reduce the plant's energy consumption and encourages healthy growth. Lastly, ensure all pots have proper drainage to prevent root rot during your absence. By preparing your plants properly, you can enjoy your time away without worrying about their well-being.</br>
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
        2024, IPlant | All rights reserved 
    </div>
</section>