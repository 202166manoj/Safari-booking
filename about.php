<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Wild Safari Booking</title>
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

        /* About content section */
        .about-content {
            padding: 40px 20px;
            text-align: center;
            background-color: #f9f9f9;
        }

        .about-content h2 {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .about-content p {
            font-size: 18px;
            line-height: 1.6;
            color: #555;
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
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li> <!-- Link to About page -->
                <li><a href="#booking">Booking</a></li>
                <li><a href="#profile">User Profile</a></li>
            </ul>
        </nav>
    </header>

    <!-- About Content Section -->
    <div class="about-content">
        <h2>About Us</h2>
        <!-- Add an image -->
        <img src="img/safari_image.jpg" alt="Sri Lanka Safari" />
        <p>
            Wild Safari Booking is dedicated to offering unforgettable wildlife safari experiences in the heart of Sri Lanka’s national parks and reserves. 
            Our mission is to provide eco-friendly tours, guided by local experts, allowing you to experience the diverse flora and fauna of this beautiful island.
            Whether you’re looking to spot majestic elephants, leopards, or exotic bird species, our team will ensure you have a safe and exciting adventure. 
            Join us to explore the wild side of Sri Lanka!
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
</body>
</html>
