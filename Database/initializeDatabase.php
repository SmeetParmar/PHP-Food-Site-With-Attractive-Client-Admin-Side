<?php 

//test connection without database....
$testConnection = mysqli_connect("localhost","root","");

//checking if database exist or not using show database like query of MySQL...
//It will return number of data fetched...
$checkDatabase = mysqli_query($testConnection,"show databases like 'php_project'");

//It will return 0 if no database is found...
if(MYSQLI_NUM_ROWS($checkDatabase) == 0)
{
    //Creating the database...
    mysqli_query($testConnection,"Create database IF NOT EXISTS `php_project`");
    echo "<script>alert('Database Created Successfully...')</script>";
}

//New connection with database...
$connection = mysqli_connect("localhost","root","","php_project");

//checking if table exist or not using show tables like query of MySQL...
//It will return number of data fetched...
$checkTable = mysqli_query($connection,"show tables like 'users'");

//It will return 0 if no table is found...
if(MYSQLI_NUM_ROWS($checkTable) == 0)
{
    //creating categories table...
    mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `categories` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `categoryName` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
    ) ");

    //creating feedbacks table...
    mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `feedbacks` (
        `id` int(10) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL,
        `phone` varchar(20) NOT NULL,
        `message` longtext NOT NULL,
        PRIMARY KEY (`id`)
      ) ");

    //creating orders table...
      mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `orders` (
        `id` varchar(100) NOT NULL,
        `userEmail` varchar(100) NOT NULL,
        `userPassword` varchar(100) NOT NULL,
        `name` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL,
        `phone` varchar(100) NOT NULL,
        `street` varchar(200) NOT NULL,
        `city` varchar(100) NOT NULL,
        `province` varchar(100) NOT NULL,
        `postalCode` varchar(50) NOT NULL,
        `cardNumber` varchar(50) NOT NULL,
        `expiryDate` varchar(100) NOT NULL,
        `cvv` varchar(10) NOT NULL,
        `date` varchar(100) NOT NULL,
        `total` varchar(50) NOT NULL,
        PRIMARY KEY (`id`)
      ) ");

    //creating products table...
      mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `products` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `categoryID` int(11) NOT NULL,
        `description` text NOT NULL,
        `image` varchar(255) NOT NULL,
        `price` varchar(100) NOT NULL,
        `name` varchar(200) NOT NULL,
        PRIMARY KEY (`id`),
        KEY `categoryID` (`categoryID`),
        CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`id`)
      )");

      //creating users table...
      mysqli_query($connection,"CREATE TABLE IF NOT EXISTS `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `firstName` varchar(200) NOT NULL,
        `lastName` varchar(200) NOT NULL,
        `email` varchar(200) NOT NULL,
        `password` varchar(200) NOT NULL,
        `userType` varchar(100) NOT NULL,
        PRIMARY KEY (`id`)
      )");

    echo "<script>alert('Tables Created Successfully...')</script>";

    //inserting to categories table...
    mysqli_query($connection,"INSERT INTO `categories` (`id`, `categoryName`) VALUES
    (1, 'Breakfast'),
    (2, 'Lunch'),
    (3, 'Dinner'),
    (4, 'Snacks')");

    //inserting to feedbacks table...
    mysqli_query($connection,"INSERT INTO `feedbacks` (`id`, `name`, `email`, `phone`, `message`) VALUES
    (2, 'Smeet Parmar', 'smeet@gmail.com', '1234567890', 'As an avid food enthusiast and frequent visitor to your website, I must commend you on the overall quality of your offerings. The array of dishes available is impressive, ranging from classic comfort foods to more adventurous culinary creations. However, as someone who values transparency and information when making food choices, I believe there is room for improvement in certain aspects of the website.'),
    (3, 'Virat Kohli', 'vkohli@gmail.com', '0987654321', 'Firstly, while the images of the dishes are undoubtedly enticing and visually captivating, I found myself craving more detailed descriptions for each item. A tantalizing snapshot may pique my interest, but knowing the ingredients, preparation method, and flavor profile would greatly enhance my decision-making process. Providing comprehensive descriptions would not only aid in making informed choices but also showcase the thoughtfulness and craftsmanship behind each dish.'),
    (4, 'Ravi Chotaliya', 'rchotaliya@gmail.com', '88594372123', 'Additionally, I recently utilized your online ordering system, and while I appreciated the convenience and user-friendly interface, I encountered a slight limitation in customization options. As someone with specific dietary preferences and restrictions, I value the ability to tailor my order to suit my needs. Offering a wider range of customization choices, such as ingredient substitutions or portion adjustments, would undoubtedly enhance the user experience and cater to a broader audience.'),
    (5, 'Darshan Bhatt', 'dbhatt@gmail.com', '9988776655', 'Furthermore, I must address a minor inconsistency between the visual representation of the food on the website and the actual presentation upon delivery. While I understand the challenges of capturing the essence of a dish through photography, ensuring that the images closely align with the reality of the dining experience is crucial. Perhaps updating the images to accurately reflect the portion sizes, plating techniques, and overall presentation would mitigate any disparities and uphold the integrity of your brand.'),
    (6, 'James Bond', 'jamesbond007@gmail.com', '0987654321', 'Outstanding service! The cloud kitchen site offers a seamless ordering process and a wide array of delectable dishes. I was impressed by the efficiency of the delivery, which was right on time. The food was impeccably prepared, showcasing the chef\'s expertise and creativity. Every bite was a symphony of flavors, leaving me craving for more. The packaging was eco-friendly, reflecting their commitment to sustainability. Overall, a fantastic dining experience that I\'ll gladly repeat!'),
    (7, 'Peter Parker', 'peterparker@gmail.com', '1234567890', 'Exceptional experience! From ordering to delivery, the cloud kitchen site surpassed my expectations. The interface was intuitive, making it effortless to browse through the diverse menu options. The food arrived promptly and was packaged meticulously, ensuring freshness. Each dish was a culinary delight, bursting with flavor and made with quality ingredients. I appreciated the attention to detail and personalized service. Definitely my go-to for delicious meals delivered straight to my doorstep.'),
    (11, 'Shubham Sheliya', 'shubham@gmail.com', '6789098757', 'Absolutely fantastic! The cloud kitchen site provided a hassle-free dining experience from start to finish. The website\'s user-friendly interface made it easy to explore their diverse menu offerings and place an order within minutes. The delivery was prompt, and the food arrived piping hot and beautifully presented. Each dish was a culinary masterpiece, exuding freshness and bursting with authentic flavors. The attention to detail and customer service were commendable. Highly recommend for anyone craving a memorable dining experience!'),
    (12, 'Hritik Roshan', 'roshan@gmail.com', '9998887776', 'Impressive quality and convenience! The cloud kitchen site offers a wide selection of mouthwatering dishes that cater to various tastes and preferences. Ordering was a breeze, thanks to the intuitive interface and seamless checkout process. The delivery was prompt, and the food arrived in pristine condition. Every dish was a delight to the senses, showcasing the chef\'s expertise and commitment to quality. The portion sizes were generous, offering great value for money. Overall, a top-notch dining experience that I\'ll definitely be returning for!'),
    (13, 'Akshay Kumar', 'akshaykumar@gmail.com', '112233445566', 'A culinary delight! The cloud kitchen site exceeded my expectations with its exceptional service and exquisite cuisine. The online ordering process was effortless, and the delivery was swift and efficient. The food arrived well-packaged and still warm, indicative of its freshness. Each dish was expertly crafted, using premium ingredients and innovative techniques. The flavors were bold and authentic, leaving a lasting impression. The customer service was attentive and responsive, ensuring a seamless dining experience. Highly recommended for anyone seeking gourmet meals delivered to their doorstep')");

    //inserting to orders table...
    mysqli_query($connection,"INSERT INTO `orders` (`id`, `userEmail`, `userPassword`, `name`, `email`, `phone`, `street`, `city`, `province`, `postalCode`, `cardNumber`, `expiryDate`, `cvv`, `date`, `total`) VALUES
    ('ORD-202404060517330AIP2', 'smeet@gmail.com', '123456', 'Smeet Parmar', 'smeetparmar@gmail.com', '6479671406', '136 Brentwood Ave', 'Kitchener', 'ON', 'N2H 2E1', '1111222233334444', '2024-10', '111', '06/04/2024', '37.36'),
    ('ORD-20240406053720FQNMT', 'smeet@gmail.com', '123456', 'Smeet Parmar', 'smeetparmar@gmail.com', '6479671406', '136 Brentwood Ave', 'Kitchener', 'ON', 'N2H 2E1', '1111222233334444', '2024-06', '111', '06/04/2024', '67.96'),
    ('ORD-20240406070840B5DM2', 'aneri@gmail.com', '123456', 'Aneri Patel', 'aneripatel@gmail.com', '1234567890', '60 Fredrick Street', 'Kitchener', 'ON', 'N2H 3P3', '1111222233334444', '2025-10', '999', '06/04/2024', '123.69'),
    ('ORD-20240406071122A5W7G', 'nisarg@gmail.com', '123456', 'Nisarg Ghevariya', 'nisargghevariya@gmail.com', '9999999999', '136 Brentwood Ave', 'Kitchener', 'ON', 'N2H 2E1', '9999888877776666', '2024-07', '123', '06/04/2024', '45.52'),
    ('ORD-20240406071258Z9CZJ', 'nisarg@gmail.com', '123456', 'Nisarg Ghevariya', 'nisargghevariya@gmail.com', '5556667778', '136 Brentwood Ave', 'Kitchener', 'ON', 'N2H 2E1', '5555666677778888', '2024-06', '889', '06/04/2024', '23.96'),
    ('ORD-202404072254171WUZJ', 'smeet@gmail.com', '123456', 'Smeet Parmar', 'smeet@gmail.com', '6479671406', '136 Brentwood Ave', 'Kitchener', 'ON', 'N2H 2E1', '1111222233334444', '2024-10', '999', '07/04/2024', '134.9'),
    ('ORD-20240408002219JCLB5', 'smeet@gmail.com', '123456', 'Smeet Parmar', 'smeetparmar2001@gmail.com', '6479671406', '136 Brentwood Ave', 'Kitchener', 'ON', 'N2H 2E1', '1234567890123456', '2024-06', '999', '08/04/2024', '47.16')");

    //inserting to products table...
    mysqli_query($connection,"INSERT INTO `products` (`id`, `categoryID`, `description`, `image`, `price`, `name`) VALUES
    (1, 1, 'Italian pizza, renowned worldwide, embodies the essence of culinary excellence with its rich history and unparalleled flavors. Originating from Naples, Italy, it\'s a culinary masterpiece characterized by a thin, crispy crust adorned with flavorful toppings. The traditional Margherita pizza, a symbol of Italian heritage, features fresh tomatoes, mozzarella cheese, basil, and a drizzle of olive oil, representing the colors of the Italian flag. Each bite is a harmonious blend of tangy tomatoes, creamy cheese, and fragrant basil, delivering a burst of authentic Italian flavors. From classic varieties to innovative creations, Italian pizza offers endless possibilities, catering to diverse palates worldwide. Whether enjoyed in a rustic pizzeria in Naples or savored in bustling cities across the globe, the allure of Italian pizza lies in its simplicity, quality ingredients, and timeless appeal, making it a beloved culinary treasure cherished by food enthusiasts everywhere.', 'images/products/pizza.jpg', '12.99$', 'Italian Pizza'),
    (2, 3, 'A veg burger is a delectable culinary creation that satisfies both the palate and conscience. Crafted from a medley of wholesome vegetarian ingredients, it offers a savory and satisfying alternative to its meaty counterpart. At its core lies a hearty vegetable patty, meticulously prepared with a blend of nutritious vegetables such as potatoes, peas, carrots, and lentils, seasoned to perfection with herbs and spices. Nestled within a soft and toasted bun, the patty is complemented by crisp lettuce, juicy tomatoes, crunchy pickles, and creamy sauces, creating a symphony of textures and flavors with every bite. Whether enjoyed as a quick and convenient meal on the go or savored leisurely in a cozy diner, the veg burger embodies the essence of wholesome goodness and culinary innovation, appealing to vegetarians and meat-eaters alike with its irresistible taste and nutritional value.', 'images/products/burger.jpg', '9.99$', 'Veggie Burger'),
    (3, 2, 'French fries, a beloved culinary delight enjoyed worldwide, epitomize simplicity and indulgence in every golden, crispy bite. Originating from Belgium but popularized as \"French\" fries, these thinly cut strips of potatoes are fried to perfection, resulting in a delectable contrast of crunchy exterior and fluffy interior. Whether served as a side dish, a snack, or a comfort food favorite, French fries offer universal appeal and versatility. Seasoned with a sprinkle of salt or adorned with an array of tantalizing toppings, such as cheese, herbs, or sauces, they tantalize the taste buds with their irresistible aroma and addictive flavor. Whether devoured solo or paired with a juicy burger or sandwich, French fries evoke feelings of nostalgia and contentment, making them a cherished culinary staple enjoyed by people of all ages, cultures, and backgrounds around the globe.', 'images/products/fries.jpg', '7.89$', 'French Fries'),
    (4, 4, 'A burrito is a culinary marvel that encapsulates a delightful fusion of flavors, textures, and cultural influences. Originating from Mexico, this handheld masterpiece has captured the hearts and taste buds of food enthusiasts worldwide. At its core lies a warm flour tortilla, generously filled with a tantalizing assortment of ingredients, creating a harmonious blend of savory, spicy, and satisfying flavors. Common fillings include tender meats such as grilled chicken, beef, or pork, paired with beans, rice, cheese, and a medley of fresh vegetables. Additional toppings such as salsa, guacamole, sour cream, and jalapeños add layers of complexity and depth to the culinary experience. Rolled into a convenient bundle, the burrito becomes a portable feast, perfect for on-the-go enjoyment or leisurely dining. Whether enjoyed as a quick street food snack or savored as a hearty meal in a bustling restaurant, the burrito embodies the spirit of culinary creativity and cultural diversity, inviting all to indulge in its delicious embrace.', 'images/products/burrito.jpg', '10.59$', 'Burrito'),
    (5, 1, 'Tacos are a beloved staple of Mexican cuisine, celebrated for their vibrant flavors, versatility, and cultural significance. These handheld treasures consist of a soft or crispy corn or wheat tortilla, folded or rolled around a delicious filling, creating a symphony of flavors and textures in every bite. The filling can vary widely, ranging from succulent meats such as seasoned beef, grilled chicken, or marinated pork, to seafood, beans, or grilled vegetables, allowing for endless customization to suit individual tastes. Toppings such as fresh salsa, guacamole, shredded cheese, lettuce, and cilantro add layers of freshness and complexity, enhancing the taco\'s overall appeal. Whether enjoyed from a street vendor\'s cart, a bustling taqueria, or homemade in the comfort of one\'s kitchen, tacos bring people together to savor the rich tapestry of Mexican culinary traditions. With their irresistible combination of savory, spicy, and tangy flavors, tacos transcend borders and cultures, delighting taste buds and igniting a passion for authentic and flavorful cuisine.', 'images/products/taco.jpg', '5.99$', 'Crispy Taco'),
    (6, 4, 'Sandwiches, a culinary staple cherished worldwide, offer a perfect blend of convenience and culinary delight. Constructed with creativity and care, sandwiches feature an array of fillings nestled between bread slices or within a single bun. From classic combinations like ham and cheese to gourmet variations with artisanal ingredients, the sandwich caters to diverse tastes and preferences. Its versatility allows for endless possibilities, whether served cold, grilled, or toasted, satisfying cravings for a quick meal on the go or a leisurely lunch. Beyond its practicality, the sandwich holds nostalgic significance, invoking memories of childhood lunches, picnics, and gatherings with loved ones. With its ability to adapt to any occasion and its universal appeal, the sandwich remains a timeless favorite, celebrated for its delicious flavors, comforting simplicity, and role as a beloved culinary icon.', 'images/products/sandwich.jpg', '9.79$', 'Sandwich'),
    (7, 2, 'A chocolate shake is a heavenly indulgence that delights the senses with its rich, creamy texture and decadent flavor. Crafted from a velvety blend of milk, ice cream, and chocolate syrup or cocoa powder, this classic beverage is a beloved treat enjoyed by people of all ages. Whether served in a frosty glass at a diner, whipped up at home, or savored from a fast-food joint, the chocolate shake offers a blissful escape into a world of sweet satisfaction. Its luscious consistency and intense chocolatey taste make it a comforting companion on a hot summer day or a delightful dessert after a hearty meal. Topped with whipped cream, chocolate shavings, or a cherry on top, the chocolate shake transforms into a luxurious indulgence that promises to satisfy even the most discerning sweet tooth. With its irresistible charm and timeless appeal, the chocolate shake continues to hold a special place in the hearts of dessert enthusiasts everywhere.\r\n\r\n\r\n\r\n\r\n', 'images/products/shake.jpg', '5.69$', 'Chocolate Shake'),
    (8, 3, 'Ramen, a Japanese culinary treasure, is a soul-warming bowl of noodles immersed in a flavorful broth, topped with an assortment of delectable ingredients. Originating from China but perfected in Japan, ramen has evolved into a beloved comfort food enjoyed worldwide. The heart of ramen lies in its broth, which can be rich and savory, clear and light, or fiery and spicy, infused with umami flavors derived from ingredients like pork, chicken, seafood, or vegetables. The noodles, typically made from wheat flour, are springy and slurp-worthy, providing a satisfying texture that complements the broth perfectly. Toppings such as tender slices of pork belly, marinated bamboo shoots, soft-boiled eggs, nori, and scallions add depth and complexity to the dish. Whether enjoyed at a bustling ramen shop or crafted at home with care and attention to detail, ramen promises a comforting and unforgettable culinary experience that nourishes both body and soul.', 'images/products/ramen.jpg', '13.99$', 'Spicy Ramen'),
    (12, 1, 'Pancakes, a beloved breakfast staple, are cherished for their fluffy texture and delightful taste. Made from a simple batter of flour, milk, eggs, and a hint of sweetness, pancakes offer a comforting indulgence that appeals to all ages. As the batter hits the hot griddle, it transforms into golden discs, each boasting a slightly crispy edge and a tender, melt-in-your-mouth center. The aroma of pancakes sizzling on the griddle fills the kitchen, evoking memories of lazy Sunday mornings and family gatherings. Whether served simply with a drizzle of maple syrup or adorned with a variety of toppings such as fresh berries, chocolate chips, or whipped cream, pancakes offer endless possibilities for customization. They are not only a delicious treat but also a canvas for creativity, making them a beloved breakfast option enjoyed by many around the world.', 'images/products/pancake.jpg', '23.99$', 'Pancake'),
    (13, 1, 'Waffles, a breakfast classic, offer a delightful fusion of crispy texture and fluffy interior. Crafted from a batter of flour, eggs, milk, and butter, waffles undergo a transformation in a specialized waffle iron, resulting in their iconic grid pattern. This unique cooking method imparts a delightful contrast—a crisp outer shell encasing a tender, airy center.Versatile in nature, waffles can be enjoyed with a myriad of toppings and accompaniments, catering to both sweet and savory preferences. Indulge in the traditional pairing of maple syrup, whipped cream, and fresh berries for a sweet treat, or opt for savory variations with toppings like fried chicken, bacon, or melted cheese.\r\nWhether served for breakfast, brunch, or dessert, the aroma of freshly cooked waffles evokes a sense of warmth and comfort. Loved by all ages, waffles continue to reign as a beloved comfort food, bringing joy and satisfaction to countless tables around the world.', 'images/products/waffle.jpg', '12.99$', 'Waffle'),
    (14, 2, 'A salad, the epitome of freshness and flavor, is a culinary masterpiece that tantalizes the senses with its vibrant colors and textures. Comprising a harmonious blend of crisp greens, ripe vegetables, and savory toppings, each bite offers a burst of wholesome goodness. Whether it\'s a classic Caesar salad with crunchy romaine lettuce, Parmesan cheese, and croutons tossed in creamy dressing, or a refreshing Greek salad featuring juicy tomatoes, cucumbers, olives, and feta cheese drizzled with olive oil and herbs, salads are endlessly customizable to suit individual tastes and dietary preferences. With the addition of protein-rich ingredients like grilled chicken, shrimp, or tofu, salads can transform into satisfying and nourishing meals that leave you feeling energized and satisfied. From simple side salads to hearty main courses, salads are a versatile and delicious option for any occasion, offering a healthy and delicious way to enjoy the bounties of nature.', 'images/products/salad.jpg', '9.99$', 'Salad'),
    (15, 2, 'Spaghetti, a quintessential Italian dish, is a beloved favorite around the globe for its simplicity, versatility, and comforting appeal. Made from long, thin strands of durum wheat pasta, spaghetti is often cooked al dente—firm to the bite—to retain its satisfying texture and ensure a perfect balance of tenderness and bite. Paired with a rich and flavorful tomato-based marinara sauce, spaghetti becomes a hearty and satisfying meal that delights the senses with its robust flavors and aroma. Toppings such as grated Parmesan cheese, fresh basil leaves, and a drizzle of extra-virgin olive oil elevate the dish, adding layers of complexity and depth to each forkful. Spaghetti also lends itself to a variety of other delicious preparations, including creamy Alfredo sauce, zesty carbonara, or spicy arrabbiata. Whether enjoyed as a simple weeknight dinner or as part of a festive gathering with friends and family, spaghetti embodies the essence of comfort food, bringing warmth and satisfaction to every plate.', 'images/products/spaghetti.jpg', '15.99$', 'Spaghetti'),
    (16, 3, 'Crafting a tantalizing tofu salad is an artful process that begins with selecting the right ingredients and flavors to create a balanced and satisfying dish. Start by marinating tofu in a flavorful blend of soy sauce, garlic, and spices to infuse it with delicious taste. Next, prepare a vibrant array of fresh vegetables such as crisp greens, crunchy cucumbers, and colorful bell peppers to add texture and nutrition. Consider incorporating cooked grains or legumes like quinoa or chickpeas for added protein and heartiness. Top the salad with toasted nuts or seeds for crunch and a creamy dressing for richness. Toss everything together gently to coat evenly and serve immediately for a refreshing and nourishing meal that\'s bursting with flavor and goodness. Whether enjoyed as a light lunch or a satisfying dinner, tofu salad is a versatile and delicious option for any occasion.', 'images/products/TofuSalad.jpg', '14.89$', 'Tofu Salad'),
    (17, 4, 'Samosas are a beloved Indian snack that has gained popularity worldwide for their crispy exterior and flavorful filling. These triangular pastries consist of a thin, flaky dough typically made from wheat flour or refined flour, known as maida, folded around a savory filling. The filling often features a mixture of spiced potatoes, peas, onions, and sometimes other ingredients like lentils, minced meat, or paneer (Indian cottage cheese). The filling is seasoned with a blend of aromatic spices such as cumin, coriander, turmeric, garam masala, and chili powder, which impart a rich and complex flavor to the samosas. Once filled, the pastries are deep-fried until golden brown and crispy, resulting in a delightful contrast of textures—crunchy on the outside and soft and savory on the inside. Samosas are typically served hot and accompanied by various chutneys or sauces for dipping, such as tamarind chutney, mint chutney, or spicy green chutney. They are enjoyed as a popular street food snack, appetizer, or part of a larger meal in Indian cuisine, and are loved by people of all ages for their irresistible taste and satisfying crunch.', 'images/products/samosa.jpg', '7.99$', 'Samosa'),
    (18, 4, 'A croissant is a classic French pastry renowned for its flaky, buttery layers and crescent shape. Made from a laminated dough composed of flour, water, yeast, salt, sugar, and butter, croissants undergo a labor-intensive process known as lamination, where layers of butter are folded and rolled into the dough multiple times to create the signature airy texture and delicate layers. The result is a pastry with a crisp, golden exterior that shatters upon biting into it, revealing a tender and airy interior. Croissants boast a rich buttery flavor with subtle hints of yeast and a touch of sweetness, making them a delectable treat for breakfast or brunch. Whether enjoyed plain, with a dusting of powdered sugar, or filled with sweet or savory fillings such as chocolate, almond paste, or ham and cheese, croissants are a beloved indulgence that brings a touch of elegance to any occasion. They are best served warm and fresh from the oven, accompanied by a steaming cup of coffee or tea, allowing you to savor every buttery bite.', 'images/products/croissant.jpg', '5.89$', 'Croissant'),
    (19, 3, 'Lasagna is a hearty and comforting Italian dish that layers pasta sheets with rich, flavorful fillings and cheese, baked to perfection. The traditional version features wide lasagna noodles, cooked until al dente, layered with a robust meat sauce made from ground beef, onions, garlic, tomatoes, and herbs like basil and oregano. In between the layers of pasta and meat sauce, creamy ricotta cheese mixed with beaten eggs adds richness and depth of flavor. Generous sprinklings of mozzarella and Parmesan cheese between the layers provide a gooey, melty texture and a savory, nutty taste. Once assembled, the lasagna is baked until bubbly and golden brown, allowing the flavors to meld together and the cheeses to become gooey and irresistible. The result is a comforting and satisfying meal that is perfect for feeding a crowd or enjoying as leftovers the next day. For those looking to switch things up, vegetarian versions of lasagna abound, featuring layers of roasted vegetables, spinach, mushrooms, and creamy béchamel sauce for a delicious meat-free alternative. Regardless of the variation, lasagna remains a beloved classic that never fails to impress with its hearty, comforting flavors and satisfying texture.', 'images/products/lasagna.jpg', '19.99$', 'Lasagna')");

    //inserting to users table...
    mysqli_query($connection,"INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `userType`) VALUES
    (1, 'Smeet', 'Parmar', 'smeet@gmail.com', '123456', 'User'),
    (2, 'Admin', 'Admin', 'admin@gmail.com', '123456', 'Admin'),
    (3, 'Test', 'User', 'test@gmail.com', '123456', 'User'),
    (4, 'Demo', 'User', 'demo@gmail.com', '123456', 'User'),
    (5, 'demo ', 'user', 'demoUser@gmail.com', '123456', 'User'),
    (6, 'Aneri', 'Patel', 'aneri@gmail.com', '123456', 'User'),
    (7, 'Nisarg', 'Ghevariya', 'nisarg@gmail.com', '123456', 'User'),
    (8, 'Demo', 'User', 'demo2@gmail.com', '123456', 'User')");

    echo "<script>alert('Data inserted successfully...')</script>";
}

?>