<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thunders Inspired Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background: url('Team_Thunders.jpg');
            background-size: cover;
            color: #ffffff;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 30px;
            background: #202020;
            position: sticky;
            top: 0;
            z-index: 1000;
            border-bottom: 2px solid #cd1111;
        }

        .logo img {
            width: 140px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        .navbar ul li a {
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        .navbar ul li a:hover {
            color: #cd1111;
        }

        /* Hero Section */
        .hero {
            background-image: url('hero.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.6);
        }

        .hero-text {
            position: relative;
            z-index: 1;
            max-width: 700px;
            color: #ffffff;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            text-shadow: 2px 2px 8px #000;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 30px;
            line-height: 1.5;
        }

        .cta {
            display: inline-block;
            padding: 12px 25px;
            background: #cd1111;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            font-size: 1.2rem;
            transition: background 0.3s ease;
        }

        .cta:hover {
            background: #a40d0d;
        }

        /* Featured Content */
        .featured-content {
            padding: 60px 30px;
            background: #181818;
        }

        .featured-content h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 2rem;
            font-weight: 700;
            color: #cd1111;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }

        .grid article {
            background: #202020;
            border: 1px solid #333;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .grid article:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.8);
        }

        .grid article img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .grid article h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #ffffff;
        }

        .grid article p {
            font-size: 1rem;
            line-height: 1.5;
            color: #aaaaaa;
        }

        /* Footer */
        footer {
            padding: 20px 30px;
            text-align: center;
            background: #121212;
            border-top: 2px solid #cd1111;
        }

        .social-media a {
            color: #cd1111;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1.2rem;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .social-media a:hover {
            color: #a40d0d;
        }

        footer p {
            font-size: 0.9rem;
            color: #aaaaaa;
            margin-top: 10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }

            .hero p {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="logo">
            <img src="logo.png" alt="Thunders Logo">
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="#news">News</a></li>
                <li><a href="#videos">Videos</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-text">
            <h1>Thunders Inspired Design</h1>
            <p>Empowering the next generation of excellence through design.</p>
            <a href="homepage.php" class="cta">Get Started</a>
        </div>
    </section>

    <!-- Featured Content -->
    <section class="featured-content" id="news">
        <h2>Latest News</h2>
        <div class="grid">
            <article>
                <img src="news1.jpg" alt="News 1">
                <h3>Victory at Thunder Cup</h3>
                <p>Read about our latest achievement in the Thunder Cup Finals.</p>
            </article>
            <article>
                <img src="news2.jpg" alt="News 2">
                <h3>Team Expansion</h3>
                <p>We’re excited to welcome new talent to our growing team.</p>
            </article>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="social-media">
            <a href="https://www.facebook.com/KVSepang/?locale=ms_MY">Facebook</a>
            <a href="https://www.tiktok.com/@kv.sepang.official">Tiktok</a>
            <a href="https://www.instagram.com/kvsepang_official/?hl=en">Instagram</a>
        </div>
        <p>&copy; 2024 THUNDERS. All rights reserved.</p>
    </footer>
</body>
</html>
