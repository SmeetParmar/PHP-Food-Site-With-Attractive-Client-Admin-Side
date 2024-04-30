<?php

$apiKey = '62d8b3ce353c6db94ca6f8272096854c';
$city = 'Kitchener';
$weatherUrl = "http://api.openweathermap.org/data/2.5/weather?q=$city&appid=$apiKey&units=metric";

$response = file_get_contents($weatherUrl);

if ($response) {
    $weatherData = json_decode($response, true);

    if ($weatherData && $weatherData['cod'] == 200) {
        $cityName = $weatherData['name'];
        $weatherDesc = $weatherData['weather'][0]['description'];
        $temp = $weatherData['main']['temp'];
        $minTemp = $weatherData['main']['temp_min'];
        $maxTemp = $weatherData['main']['temp_max'];
        $humidity = $weatherData['main']['humidity'];
        $windSpeed = $weatherData['wind']['speed'];
        $countryCode = $weatherData['sys']['country'];
    } else {
        echo "Error fetching weather data.";
    }
} else {
    echo "Error fetching weather data. Please try again later.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cloud Kitchen</title>
</head>

<body>
    <?php require_once('Database/initializeDatabase.php'); ?>
    <?php include('header.php'); ?>
    <div class="cover-photo">
        <div class="cover-text">
            <h1>Taste the Difference. From Our Kitchen to Your Table.</h1>
            <h5>Discover the finest flavors delivered straight to your doorstep</h5>
            <a href="menu.php" class="menu-button">Order Now</a>
        </div>
    </div>

    <div class="container weatherContainer mt-5">
    <h2 class="text-center">Current Weather in <?php echo $cityName . ", " . $countryCode; ?></h2>
    <h4 class="text-center">Condition : <?php echo $weatherDesc; ?></h4>
    <h4 class="text-center">Temperature : <?php echo $temp . "&deg;" . "C" . " " . " [" . $minTemp . "&deg;" . "C" . " - " . $maxTemp . "&deg;" . "C" . "]"; ?></h4>
    <h4 class="text-center">Humidity : <?php echo $humidity. "%"; ?></h4>
    <h4 class="text-center">Wind Speed : <?php echo $windSpeed . "m/s"; ?></h4>
    </div>

    <div class="container"> <br><Br>
        <h3 class="text-center">Today's Special Dishes</h3>
        <br>
        <h5 class="text-center" >Discover a world of taste sensations with our rotating lineup of special dishes, showcasing the finest ingredients and culinary expertise and also experience culinary excellence with our chef's specially crafted dishes, each bursting with flavor and creativity.</h5>
        <?php
        include('Database/product.php'); 

        $product = new product();
        $database = $product->getDatabase();

        $random_products = $product->getRandomProducts();
        ?>
        <div class="menucontainer">
            <?php
            while ($product = mysqli_fetch_array($random_products, MYSQLI_ASSOC)) {
                ?>
                <div class="card align-items-center">
                        <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $product['name']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $product['price']; ?>
                            </p>
                            <a href="productDetails.php?id=<?php echo $product['id']; ?>" class="btn btn-primary"></i>View
                                Details</a>
                        </div>
                    </div>
            <?php
            }
            ?>
        </div>
        <div class="container index-container">
        <br><br>
        <h3 class="text-center">Our Mission</h3>
        <br>
        <p class="fs-5">
        At Cloud Kitchem, we believe that food is more than just sustenance , it's a powerful catalyst for connection, creativity, and joy. Our mission is to cultivate a vibrant online community where food enthusiasts of all backgrounds can come together to discover, learn, and share their passion for cooking and eating.

        Through our extensive collection of recipes, ranging from quick and easy weeknight dinners to indulgent desserts and gourmet specialties, we aim to inspire culinary exploration and experimentation. We're committed to providing diverse, accessible, and adaptable recipes that cater to various dietary preferences and restrictions, ensuring that everyone can find something delicious to enjoy.
        <br><br>
        But our mission extends beyond just recipes. We're dedicated to empowering our audience with the knowledge and skills they need to become confident and proficient home cooks. That's why we offer comprehensive cooking guides, tutorials, and tips covering everything from knife skills and basic cooking techniques to advanced culinary concepts.

        At the heart of our mission is a commitment to promoting sustainability, wellness, and mindful eating. We believe in celebrating the abundance of fresh, seasonal ingredients while minimizing food waste and environmental impact. Through our content, we strive to educate our audience about the importance of making informed choices about what we eat and how it's sourced, prepared, and consumed.
        </p>
        </div>
        <br><br>
        <h3 class="text-center">Chef's Special Signarture Dishes</h3>
        <br>
        <?php
        $product = new product();
        $random_products = $product->getRandomProducts();
        ?>
        <div class="menucontainer">
            <?php
            while ($product = mysqli_fetch_array($random_products, MYSQLI_ASSOC)) {
                ?>
                <div class="card align-items-center">
                        <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?php echo $product['name']; ?>
                            </h5>
                            <p class="card-text">
                                <?php echo $product['price']; ?>
                            </p>
                            <a href="productDetails.php?id=<?php echo $product['id']; ?>" class="btn btn-primary"></i>View
                                Details</a>
                        </div>
                    </div>
            <?php
            }
            ?>
        </div>

        </div>
        <?php include('footer.php'); ?>
</body>

</html>
