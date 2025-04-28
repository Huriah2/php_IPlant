<?php

require_once 'db_conf.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charest="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> I Plant</title>
        <link rel = "stylesheet" href="Pl.css">
    </head>
    <body>
    
     <header>
        <a class="logo" >I Plant</a>

        <nav class="navbar">
            <a href ="index.html">Home</a>
            <a href ="#about">About</a>
            <a href ="#types ">Plants </a>
            <a href ="#learn">Plant Care</a>
        </nav>
     </header>
        

    
<section class= "home" id="home"> 
        <div class="content">
        
        <h3>Welcome to I Plant! </h3>
        <p> your ultimate guide to exploring and nurturing the world of plants.
             Discover diverse plant varieties and expert tips for thriving gardens right at your fingertips.</p>     

        </div>
     </section>
            
     
     


     <section class= "about" id="about">
        <div class="heading">
        
            <h3>  About us </h3>
            <p> At I Plant, we’re passionate about plants and dedicated to sharing our curated plant collections and expert care tips.
                Join us to explore, learn, and cultivate your green thumb!</p>
        </div>
     </section>








     <section class ="types " id="types">

        <h1 class="heading"> Types of Plants </h1>
         
        <div class="box-container">
        <?php
             $sql = "SELECT * FROM images WHERE id IN (36, 38, 37, 34, 32, 31, 30, 28)";
             $all_img = $conn->query($sql);
             while($row = mysqli_fetch_assoc($all_img)){
        ?>
                <div class="box">
                    <div class="image">
                        <img src="<?php echo $row["image_url"];?>">   
                    </div>
                    
                </div>
            <?php
        }?> </div>
        
       
        
                
        








     <section class="learn" id="learn">
        <div class ="heading">  
            <h3>Plant <span>Care</span> </h3>
            <p>plant care! Keeping your houseplants happy and healthy doesn’t have to be complicated!</p>
        </div>

    
     <div class="box-container">

            <div class="box">
                <div class="images">
                        <img src="upload-database\fungus-gnats-on-sticky-yellow-trap.jpg" height="300px">
                </div>
                <div class="content"> <a href="index.html"><br><p> How to keep Gants</br> from the soil & treat?</p></a></div>
            </div>
        

            <div class="box">
                <div class="images">
                    <img src=" upload-database\yellow_plants.jpg" height="300px">
                </div>
                <div class="content"> <a href="index.html"><br><p> Why does my plants</br> have yellow leaves?</p></a></div>
            </div>
        

            <div class="box">
                <div class="images">
                    <img src="upload-database\Why-Ficus-Drop-Leaves-Feature.jpg " height="300px">
                </div>
                <div class="content"> <a href="index.html"><br><p> why is my plant </br>dropping leaves?</p></a></div>
            </div>
        

            <div class="box">
                <div class="images">
                    <img src="upload-database\Plant.jpg " height="300px">
                </div>
                <div class="content"> <a href="index.html"><br><p> 6 tips for effectively </br>watering your plants</p></a></div>
            </div>
       

            <div class="box">
                <div class="images">
                    <img src="upload-database\houseplantshero-a5832af514d54226b906c776fdecc265.jpg " height="300px" >
                </div>
                <div class="content"> <a href="index.html"><br><p> 9 Easiest Houseplants </br> Anyone Can Grow</p></a></div> 
            </div>
        

            <div class="box">
                <div class="images">
                    <img src="upload-database\toa-heftiba-SV3DmvO-ZQA-unsplash.jpg" height="300px">
                </div>
                <div class="content"><a href="index.html"><br><p> How to care for plants</br> while you're away?</p></a></div>
            </div>
        

            <div class="box">
                <div class="images">
                    <img src="upload-database\josephina-kolpachnikof-n_caFdCxfGU-unsplash.jpg" height="300px">
                </div>
                <div class="content"> <a href="index.html"><br><p> How to trim your plants?</br></p></a></div>
            </div>
        

            <div class="box">
                <div class="images">
                    <img src="upload-database\houseplantshero-a5832af514d54226b906c776fdecc265.jpg" height="300px">
                </div>
                <div class="content"> <a href="index.html"><br><p> 6 common indoor plant</br> care mistakes </p></a></div>
            </div>
        </div>
    </section>   

     
    








    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Nav</h3>
                <a href="index.html">home</a>
                <a href="#about">about</a>
                <a href="#types">Plants</a>
                <a href="#learn">Plant Care</a>
            </div>
            
            <div class="box"> 
                <h3>Contact Info</h3>
                <a >0539803721</a>
                <a>
                    <img src="logo\insta.png"  width="20" height="20">IPla_nt
                </a>
                <a >
                    <img src="logo\linked.png"  width="20" height="20">IPlant
                </a>
                <a>
                    <img src="logo\email.jpg" width="20" height="20">IPlant@hotmail.com
                </a>
            </div>
        </div>
    
        <div class="credit"> 2024, Jeddah | All rights reserved </div>
    </section>









   









    </body>
      

  






   
</html>



