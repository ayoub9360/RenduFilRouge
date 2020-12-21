<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fils Rouge</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/slider.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet"> 
</head>

<body>
    
    <?php
        include'../include/nav.php';
    ?>

    <main>
        <section class="slider">
            <h1>Affrontez vos amis dans votre terrain de</h1>

            <!-- Slideshow container -->
            <div class="slideshow-container">

                <!-- Full-width images with number and caption text -->
                <div class="mySlides fade">
                    <div class="numbertext">1 / 3</div>
                    <img src="../assets/slider/1.png" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 3</div>
                    <img src="../assets/slider/2.png" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 3</div>
                    <img src="../assets/slider/3.png" style="width:100%">
                </div>

                <!-- Next and previous buttons -->
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <br>

            <!-- The dots/circles -->
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
        </section>
    </main>
    
    <?php
        include'../include/footer.php';
    ?>
    <script src="../js/slideshow.js"></script>
</body>
</html>