<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Real Estate Management</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FF758C, #FF9B5F);
            background-image: url('images/home.jpg');
            color: #333;
            overflow-x: hidden;
            backdrop-filter: blur(30px);
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            color: black;
            padding: 60px 20px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            backdrop-filter: blur(30px);
            margin-top: 50px;
        }

        .header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            color: black;
        }

        .header p {
            font-size: 1.2rem;
            color: white;
        }

        .mission {
            margin: 50px 0;
            background: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 15px;
            backdrop-filter: blur(50px);
        }

        .mission h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: black;
        }

        .mission p {
            color: black;
        }

        .team {
            margin: 50px 0;
        }

        .team h2 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 30px;
            color: black;
        }

        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .team-member {
            text-align: center;
            flex: 1 1 calc(33.333% - 20px);
            max-width: calc(33.333% - 20px);
            background: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 15px;
            backdrop-filter: blur(50px);
        }

        .team-member img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 10px;
            border: 3px solid white;
        }

        .team-member h3 {
            margin: 10px 0 5px;
            color:white;
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
        }

        .back-to-home {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #5EB934;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .back-to-home:hover {
            background: #77E29B;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header h1 {
                font-size: 2.5rem;
            }

            .header p {
                font-size: 1rem;
            }

            .mission h2 {
                font-size: 1.8rem;
            }

            .team-member {
                flex: 1 1 calc(50% - 20px);
                max-width: calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 2rem;
            }

            .header p {
                font-size: 0.9rem;
            }

            .mission h2 {
                font-size: 1.5rem;
            }

            .team-member {
                flex: 1 1 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>About Us</h1>
            <p>Your trusted partner in property management and real estate solutions.</p>
        </div>
    </header>

    <main>
        <section class="mission">
            <div class="container">
                <h2>Our Mission</h2>
                <b><p>At RealEstatePro, we aim to simplify the process of finding, managing, and listing properties. Our platform combines innovative technology with unparalleled expertise to help our clients make informed decisions.</p></b>
            </div>
        </section>

        <section class="team">
            <div class="container">
                <h2>Meet Our Team</h2>
                <div class="team-members">
                    <div class="team-member">
                        <img src="images/profile.jpg" alt="Kamal Perera">
                        <h3>Kamal Perera</h3>
                        <b><p>CEO & Founder</p></b>
                    </div>
                    <div class="team-member">
                        <img src="images/profile.jpg" alt="Nimali Fernando">
                        <h3>Nimali Fernando</h3>
                        <b><p>Head of Marketing</p></b>
                    </div>
                    <div class="team-member">
                        <img src="images/profile.jpg" alt="Sachintha Jayasuriya">
                        <h3>Sachintha Jayasuriya</h3>
                        <b><p>Lead Developer</p></b>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <a href="home.php" class="back-to-home">Back to Home</a>
        </div>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 RealEstatePro. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
