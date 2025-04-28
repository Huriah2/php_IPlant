<?php
session_start();
include 'db_conf.php';
include 'function.php';

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
</head>
<body>

<header>
    <a class="logo">I Plant</a>
    <nav class="navbar">
        <a href="index.php">Home</a>
        <a href="#about">About</a>
        <a href="#types">Plants</a>
        <a href="#learn">Plant Care</a>
        
        <?php if (!$is_logged_in): ?>
            <a href="login.php">Login</a>
            <a href="signup.php">Sign Up</a>
        <?php else: ?>
            <a href="logout.php">Logout</a>
        <?php endif; ?>
    </nav>
</header>

<section class="home" id="home"> 
    <?php
    $sql = "SELECT * FROM images WHERE id = 24";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $imageUrl = htmlspecialchars($row["image_url"]);
        ?>
        <div style="background-image: url('<?php echo $imageUrl; ?>'); 
            background-size: cover; 
            background-position: center; 
            height: 150vh; 
            width: 100vw; 
            position: absolute; 
            top: 0; 
            left: 0; 
            z-index: -1;">
        </div>
        <div class="content">
            <h3 class="name"><b><?php echo htmlspecialchars($row["name"]); ?></b></h3>
            <p class="Description"><?php echo htmlspecialchars($row["Description"]); ?></p>
        </div>
        <?php
    } else {
        echo "<p>Image not found.</p>";
    }
    ?>
</section>

<section class="about" id="about">
    <?php
    $sql = "SELECT * FROM images WHERE id = 25";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        $imageUrl = htmlspecialchars($row["image_url"]);
        ?>
        <div style="background-image: url('<?php echo $imageUrl; ?>'); 
            background-size: cover; 
            background-position: center; 
            height: 150vh; 
            width: 100vw; 
            position: absolute; 
            top: 0; 
            left: 0; 
            z-index: -1;">
        </div>
        <div class="heading">
            <h3 class="name"><b><?php echo htmlspecialchars($row["name"]); ?></b></h3>
            <p class="Description"><?php echo htmlspecialchars($row["Description"]); ?></p>
        </div>
        <?php
    } else {
        echo "<p>Image not found.</p>";
    }
    ?>
</section>



<section class="types" id="types">
    <h1 class="heading"> Types of Plants </h1>
    <div class="box-container">
        <?php
        $sql = "SELECT * FROM images WHERE id IN (28, 31, 32, 36, 37, 38, 41, 42)";
        $all_img = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($all_img)) {
            ?>
            <div class="box">
                <div class="image">
                    <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" height="300px">   
                </div>
                <div class="content">
                    <span class="name"><b><?php echo htmlspecialchars($row["name"]); ?></b></span>
                    <p class="Description"><?php echo htmlspecialchars($row["Description"]); ?></p>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</section>

<section class="learn" id="learn">
    <div class="heading" style="color: black; ">  
        <h3>Plant Care </h3>
        <p>Plant care! Keeping your houseplants happy and healthy doesn’t have to be complicated!</p>
    </div>
    <div class="box-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
        <?php
        $sql = "SELECT * FROM images WHERE id IN (12, 26, 27, 29, 33, 35, 39, 40)";
        $all_img = $conn->query($sql);
        while ($row = mysqli_fetch_assoc($all_img)) {
            ?>
            <div class="box" style="background: none; border: none; padding: 0; box-shadow: none;">
                <div class="image" style="overflow: hidden;">
                    <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" height="300px" style="width: 100%; object-fit: cover;">   
                </div>
                <div class="content" style="padding: 0; margin: 0;">
                    <p class="Description" style="color: black; margin: 0; font-size: 19px; ">
                        <?php if ($row["id"] == 12): ?>
                            <a href="care.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php elseif ($row["id"] == 26): ?>
                            <a href="drop.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php elseif ($row["id"] == 27): ?>
                            <a href="link.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php elseif ($row["id"] == 29): ?>
                            <a href="water.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php elseif ($row["id"] == 33): ?>
                            <a href="trim.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php elseif ($row["id"] == 35): ?>
                            <a href="easy.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php elseif ($row["id"] == 39): ?>
                            <a href="gant.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php elseif ($row["id"] == 40): ?>
                            <a href="leave.php" style="color: black;"><?php echo htmlspecialchars($row["Description"]); ?></a>
                        <?php endif; ?>
                    </p>   
                </div>
            </div>
            <?php 
        } 
        ?>
    </div>
</section>   

<section class="footer" style="background-color: #362d23; padding: 20px; color: white; box-shadow: none;">
    <div class="box-container" style="text-align: center;">
        <div class="box" style="margin: 10px; background: transparent; border: none; box-shadow: none;">
            <h3>Nav</h3>
            <a href="index.php" style="color: #70b087; text-decoration: none;">home</a>
            <a href="#about" style="color: #70b087; text-decoration: none;">about</a>
            <a href="#types" style="color: #70b087; text-decoration: none;">Plants</a>
            <a href="#learn" style="color: #70b087; text-decoration: none;">Plant Care</a>
        </div>

        <div class="box" style="margin: 10px; background: transparent; border: none; box-shadow: none;">
            <h3>Contact Info</h3>
            <a href="tel:0539803721" style="color: #70b087;">0539803721</a>

            <?php
            // Fetch images and names from the database
            $sql = "SELECT * FROM images WHERE id IN (44, 45, 46)";
            $all_img = $conn->query($sql);
            while ($row = mysqli_fetch_assoc($all_img)) {
                $name = htmlspecialchars($row["name"]);
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
                    <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" width="20" height="20" alt="<?php echo $name; ?>" style="margin-bottom: 5px;">
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

</body>
</html>
