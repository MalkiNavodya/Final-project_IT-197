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
            background-image: url('images/home.jpg'); /* Set background image */
            color: #333;
            overflow-x: hidden;
            backdrop-filter: blur(30px);
        }

         

        .container {
            width: 80%;
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
        .mission p{
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
            color: #004d99;
        }

        .footer {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 50px;
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
                <p>At RealEstatePro, we aim to simplify the process of finding, managing, and listing properties. Our platform combines innovative technology with unparalleled expertise to help our clients make informed decisions.</p>
            </div>
        </section>

        <section class="team">
            <div class="container">
                <h2>Meet Our Team</h2>
                <div class="team-members">
                    <div class="team-member">
                        <img src="images/profile.jpg" alt="Kamal Perera">
                        <h3>Kamal Perera</h3>
                        <p>CEO & Founder</p>
                    </div>
                    <div class="team-member">
                        <img src="images/profile.jpg" alt="Nimali Fernando">
                        <h3>Nimali Fernando</h3>
                        <p>Head of Marketing</p>
                    </div>
                    <div class="team-member">
                        <img src="images/profile.jpg" alt="Sachintha Jayasuriya">
                        <h3>Sachintha Jayasuriya</h3>
                        <p>Lead Developer</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 RealEstatePro. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
