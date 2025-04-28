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
    <h1 class="heading">How to keep Gants from the soil & treat?</h1>

    <div class="box-container">
        <?php
        // Fetching data from the database
        $sql = "SELECT image_url, Description FROM images WHERE id =7";
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
<br>Keeping gnats away from your plants and effectively treating them involves a combination of prevention and targeted actions. First, it’s essential to identify the source of the problem; gnats often thrive in moist, 
organic-rich soil, particularly in potted plants. To prevent infestations, avoid overwatering your plants, as soggy soil provides an ideal breeding ground for these pests. 
Allow the top inch of soil to dry out between waterings, as this disrupts the life cycle of gnats and discourages them from laying eggs.</br>


<br> If you notice gnats around your plants, consider using yellow sticky traps placed near the soil surface. These traps attract adult gnats, helping to reduce their population. Another effective method is to cover the soil surface with a layer of sand or fine gravel; 
this deters gnats from accessing the moist soil beneath. Additionally, you can introduce beneficial nematodes or predatory insects like fungus gnats, which feed on the larvae in the soil.</br>


<br> For a more direct treatment, consider using a mixture of water and hydrogen peroxide (one part hydrogen peroxide to four parts water) to drench the soil. This solution kills larvae while being safe for the plant. 
Regularly inspect your plants for signs of infestations, such as wilting leaves or visible gnats, and address issues promptly.</br>


<br> If infestations persist, repotting the plant in fresh, sterile soil may be necessary to eliminate any lingering eggs or larvae. Remember to clean your plant pots and tools regularly to avoid introducing pests from outside. By implementing these prevention and treatment strategies,
 you can effectively manage and eliminate gnats, ensuring a healthier environment for your plants.</br></p>


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