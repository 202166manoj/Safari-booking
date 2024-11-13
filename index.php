<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wild Safari Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Header section */
        header {
            background-color: #4CAF50;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: white;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        header nav ul li {
            margin-left: 20px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        header nav ul li a:hover {
            text-decoration: underline;
        }

        /* Image slider section */
        .slider {
            position: relative;
            max-width: 100%;
            height: 500px;
            overflow: hidden;
        }

        .slider img {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
        }

        .slider img.active {
            opacity: 1;
        }

        /* Main content */
        .main-content {
            padding: 20px;
            text-align: center;
        }

        .description {
            margin-top: 20px;
            font-size: 18px;
            color: #333;
        }

        /* Footer Section */
        footer {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        footer .footer-content {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        footer .footer-content div {
            margin: 10px;
            flex: 1 1 200px;
        }

        footer .footer-content h3 {
            margin-bottom: 10px;
        }

        footer .footer-content ul {
            list-style: none;
            padding: 0;
        }

        footer .footer-content ul li {
            margin-bottom: 10px;
        }

        footer .footer-content ul li a {
            color: white;
            text-decoration: none;
        }

        footer .footer-content ul li a:hover {
            text-decoration: underline;
        }

        footer .footer-info {
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="logo">
            <h1>Wild Safari Booking</h1>
        </div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="register.php">Booking</a></li>
                <li><a href="#profile">User Profile</a></li>
            </ul>
        </nav>
    </header>

    <!-- Image Slider Section -->
    <div class="slider" id="slider">
        <img src="img/safari1.jpg" alt="Safari 1" class="active">
        <img src="img/safari2.jpg" alt="Safari 2">
        <img src="img/safari3.jpg" alt="Safari 3">
        <img src="img/safari4.jpg" alt="Safari 4">
        <img src="img/safari5.jpg" alt="Safari 5">
        <img src="img/safari6.jpg" alt="Safari 6">
        <img src="img/safari7.jpg" alt="Safari 7">
        <img src="img/safari8.jpg" alt="Safari 8">
    </div>

    <!-- Main Content Section -->
    <div class="main-content">
        <h2>Welcome to the Wild Safari Booking System</h2>
        <p>Explore the wilderness and book your safari adventure today!</p>

        <!-- Additional Description about Sri Lanka -->
        <p class="description">
        <h3>Wildlife Tours in Sri Lanka by local wildlife specialists</h3>
We are a specialist in tailor made, wildlife tours in Sri Lanka. Our wildlife tours in Sri Lanka are designed by passionate local wildlife enthusiasts who are wildlife guides and wildlife photographers in Sri Lanka. We go all-out to offer an authentic wildlife experience by creating wildlife tours guided by knowledgeable local wildlife guides. To make the experience even more unique, we use wildlife lodges with a character such as tented safari camps, tree houses in the wild, off the beaten rustic wildlife safari lodges and small authentic wildlife hotels. As a local wildlife specialist in Sri Lanka, we possess local wildlife secrets, hence your wildlife tour in Sri Lanka will not be an off-the-shelf or one-for-all wildlife tour, but an expertly crafted true local wildlife experiential journey in Sri Lanka.

.
        </p>
    </div>

    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <div>
                <h3>Our Services</h3>
                <ul>
                    <li><a href="#safari">Safari Tours</a></li>
                    <li><a href="#jeeps">Jeep Rentals</a></li>
                    <li><a href="#booking">Booking & Reservations</a></li>
                    <li><a href="#guide">Expert Guides</a></li>
                </ul>
            </div>
            <div>
                <h3>Contact Us</h3>
                <ul>
                    <li>Email: contact@wildsafari.com</li>
                    <li>Phone: +94 123 456 789</li>
                    <li>Address: Colombo, Sri Lanka</li>
                </ul>
            </div>
            <div>
                <h3>Follow Us</h3>
                <ul>
                    <li><a href="https://facebook.com">Facebook</a></li>
                    <li><a href="https://instagram.com">Instagram</a></li>
                    <li><a href="https://twitter.com">Twitter</a></li>
                </ul>
            </div>
        </div>

        <!-- Footer Information -->
        <div class="footer-info">
            <p>&copy; 2024 Wild Safari Booking. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // JavaScript for Image Slider
        let sliderImages = document.querySelectorAll('.slider img');
        let currentImageIndex = 0;

        function changeImage() {
            sliderImages[currentImageIndex].classList.remove('active');
            currentImageIndex = (currentImageIndex + 1) % sliderImages.length;
            sliderImages[currentImageIndex].classList.add('active');
        }

        setInterval(changeImage, 3000); // Change image every 3 seconds
    </script>
</body>
</html>
