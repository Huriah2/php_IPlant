<section class="upload">
    <h2>Upload Plant</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Plant Name" required>
        <textarea name="description" placeholder="Plant Description" required></textarea>
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Upload">
    </form>
</section>
<?php
// Database connection
$servername = "localhost"; // Your server name
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "test_dp";        // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch plant data
$sql = "SELECT name, description, image_url FROM plants";
$result = $conn->query($sql);
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
    </nav>
</header>

<section class="upload">
    <h2>Upload Plant</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Plant Name" required>
        <textarea name="description" placeholder="Plant Description" required></textarea>
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Upload">
    </form>
</section>

<section class="home" id="home"> 
    <div class="content">
        <h3>Welcome to I Plant!</h3>
        <p>Your ultimate guide to exploring and nurturing the world of plants. Discover diverse plant varieties and expert tips for thriving gardens right at your fingertips.</p>     
    </div>
</section>

<section class="about" id="about">
    <div class="heading">
        <h3>About us</h3>
        <p>At I Plant, we’re passionate about plants and dedicated to sharing our curated plant collections and expert care tips. Join us to explore, learn, and cultivate your green thumb!</p>
    </div>
</section>

<section class="types" id="types">
    <h1 class="heading">Types of Plants</h1>
    <div class="box-container">

        <?php
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='box'>
                        <div class='image'>
                            <img src='" . htmlspecialchars($row["image_url"]) . "' height='300px' alt='" . htmlspecialchars($row["name"]) . "'>
                        </div>
                        <div class='content'>
                            <span>" . htmlspecialchars($row["name"]) . "</span>
                            <p>Description: " . htmlspecialchars($row["description"]) . "</p>
                        </div>
                      </div>";
            }
        } else {
            echo "<p>No plants found.</p>";
        }
        ?>

    </div>
</section>

<section class="footer">
    <div class="box-container">
        <div class="box">
            <h3>Nav</h3>
            <a href="index.php">Home</a>
            <a href="#about">About</a>
            <a href="#types">Plants</a>
            <a href="#learn">Plant Care</a>
        </div>
        
        <div class="box"> 
            <h3>Contact Info</h3>
            <a>0539803721</a>
            <a>
                <img src="path/to/insta.png" width="20" height="20">IPla_nt
            </a>
            <a>
                <img src="path/to/linkedin.png" width="20" height="20">IPlant
            </a>
            <a>
                <img src="path/to/email.jpg" width="20" height="20">IPlant@hotmail.com
            </a>
        </div>
    </div>
    
    <div class="credit">2024, Jeddah | All rights reserved</div>
</section>

</body>
</html>

<?php
// Close connection
$conn->close();
?>

