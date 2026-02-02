<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor-Allied AI Academy - AI-Powered Learning</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background: rgba(255, 255, 255, 0.95);
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 40px;
            border-radius: 10px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #667eea;
        }
        
        nav a {
            margin-left: 30px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav a:hover {
            color: #667eea;
        }
        
        .hero {
            background: white;
            border-radius: 15px;
            padding: 60px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            margin-bottom: 40px;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #667eea;
        }
        
        .hero p {
            font-size: 20px;
            margin-bottom: 30px;
            color: #666;
        }
        
        .cta-button {
            display: inline-block;
            padding: 15px 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 30px;
            font-weight: bold;
            font-size: 18px;
            transition: transform 0.3s, box-shadow 0.3s;
            margin: 10px;
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .feature-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-card h3 {
            color: #667eea;
            margin-bottom: 15px;
            font-size: 24px;
        }
        
        .feature-icon {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        footer {
            background: rgba(255, 255, 255, 0.95);
            padding: 30px;
            text-align: center;
            border-radius: 10px;
            margin-top: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-content">
                <div class="logo">🎓 Tutor-Allied AI Academy</div>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="courses.php">Courses</a>
                    <a href="about.php">About</a>
                    <a href="login.php">Login</a>
                </nav>
            </div>
        </header>
        
        <div class="hero">
            <h1>Welcome to the Future of Learning</h1>
            <p>Experience personalized education powered by advanced AI technology</p>
            <a href="register.php" class="cta-button">Get Started Free</a>
            <a href="courses.php" class="cta-button">Browse Courses</a>
        </div>
        
        <div class="features">
            <div class="feature-card">
                <div class="feature-icon">🤖</div>
                <h3>AI-Powered Tutoring</h3>
                <p>Get instant, personalized help from our advanced AI tutors available 24/7 to guide your learning journey.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📚</div>
                <h3>Adaptive Learning</h3>
                <p>Our platform adjusts to your learning pace and style, ensuring optimal comprehension and retention.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Progress Tracking</h3>
                <p>Monitor your achievements with detailed analytics and insights into your learning progress.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Interactive Content</h3>
                <p>Engage with multimedia lessons, quizzes, and hands-on exercises designed for effective learning.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🏆</div>
                <h3>Certifications</h3>
                <p>Earn recognized certificates upon course completion to showcase your newly acquired skills.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🌍</div>
                <h3>Learn Anywhere</h3>
                <p>Access your courses from any device, anywhere in the world, at your own convenience.</p>
            </div>
        </div>
        
        <footer>
            <p>&copy; 2026 Tutor-Allied AI Academy. All rights reserved.</p>
            <p>Building the future of education with AI ❤️</p>
        </footer>
    </div>
</body>
</html>
