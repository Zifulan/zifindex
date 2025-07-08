<?php
// Basic PHP configuration
$site_title = "Fatahillah Rachman - CV";
$site_description = "IT Programmer & Website Officer specializing in PHP development, healthcare IT, and regional digital platforms.";
$site_url = "https://zif.my.id";
$contact_email = "fatahillah.rachman14@gmail.com";
$linkedin_url = "https://linkedin.com/in/fatahillah-rachman";

// Handle contact form submission
$message_sent = false;
$error_message = "";

if ($_POST && isset($_POST['contact_form'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    if ($name && $email && $subject && $message) {
        // In a real implementation, you would send an email here
        // For now, we'll just show a success message
        $message_sent = true;
    } else {
        $error_message = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $site_title; ?></title>
    <meta name="description" content="<?php echo $site_description; ?>">
    <meta name="keywords" content="PHP Developer, IT Programmer, Website Officer, Healthcare IT, ASEAN, Data Analysis, Python">
    <meta name="author" content="Fatahillah Rachman">
    
    <!-- Open Graph Tags -->
    <meta property="og:title" content="<?php echo $site_title; ?>">
    <meta property="og:description" content="<?php echo $site_description; ?>">
    <meta property="og:url" content="<?php echo $site_url; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo $site_url; ?>/assets/img/profile-og.jpg">
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $site_title; ?>">
    <meta name="twitter:description" content="<?php echo $site_description; ?>">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Source+Code+Pro:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- AOS Animation -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #667eea;
            --secondary-color: #764ba2;
            --accent-color: #f093fb;
            --text-primary: #2d3748;
            --text-secondary: #4a5568;
            --text-light: #718096;
            --bg-primary: #ffffff;
            --bg-secondary: #f7fafc;
            --bg-card: #ffffff;
            --border-color: #e2e8f0;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        [data-theme="dark"] {
            --text-primary: #f7fafc;
            --text-secondary: #e2e8f0;
            --text-light: #a0aec0;
            --bg-primary: #1a202c;
            --bg-secondary: #2d3748;
            --bg-card: #2d3748;
            --border-color: #4a5568;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background-color: var(--bg-primary);
            transition: all 0.3s ease;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            z-index: 1000;
            transition: all 0.3s ease;
            border-bottom: 1px solid var(--border-color);
        }
        
        [data-theme="dark"] header {
            background: rgba(26, 32, 44, 0.95);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        .nav-menu a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }
        
        .nav-menu a:hover {
            color: var(--primary-color);
        }
        
        .nav-menu a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            transition: width 0.3s ease;
        }
        
        .nav-menu a:hover::after {
            width: 100%;
        }
        
        .theme-toggle {
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 1.2rem;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .theme-toggle:hover {
            color: var(--primary-color);
        }
        
        /* Mobile Menu */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 1.5rem;
            cursor: pointer;
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
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
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%" r="50%"><stop offset="0%" stop-color="rgba(255,255,255,0.1)"/><stop offset="100%" stop-color="rgba(255,255,255,0)"/></radialGradient></defs><circle cx="200" cy="300" r="100" fill="url(%23a)"/><circle cx="800" cy="700" r="150" fill="url(%23a)"/><circle cx="600" cy="200" r="80" fill="url(%23a)"/></svg>');
            opacity: 0.1;
        }
        
        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            z-index: 1;
        }
        
        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.2;
        }
        
        .hero-text .subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .hero-text .description {
            font-size: 1.1rem;
            margin-bottom: 2rem;
            opacity: 0.8;
            line-height: 1.7;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .btn-primary {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }
        
        .btn-secondary {
            background: transparent;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }
        
        .hero-image {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .profile-image {
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.2), rgba(255, 255, 255, 0.1));
            border: 3px solid rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 8rem;
            color: rgba(255, 255, 255, 0.7);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        
        /* Section Styles */
        .section {
            padding: 5rem 0;
        }
        
        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 3rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: var(--text-light);
            margin-bottom: 3rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        /* About Section */
        .about-content {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 3rem;
            align-items: center;
        }
        
        .about-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }
        
        .stat-item {
            text-align: center;
            padding: 1.5rem;
            background: var(--bg-card);
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        .about-text {
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-secondary);
        }
        
        /* Experience Section */
        .experience-timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .experience-timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
            transform: translateX(-50%);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 3rem;
            width: 50%;
        }
        
        .timeline-item:nth-child(odd) {
            left: 0;
            padding-right: 2rem;
        }
        
        .timeline-item:nth-child(even) {
            left: 50%;
            padding-left: 2rem;
        }
        
        .timeline-content {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
            position: relative;
        }
        
        .timeline-item:nth-child(odd) .timeline-content::after {
            content: '';
            position: absolute;
            right: -10px;
            top: 20px;
            width: 0;
            height: 0;
            border-left: 10px solid var(--bg-card);
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }
        
        .timeline-item:nth-child(even) .timeline-content::after {
            content: '';
            position: absolute;
            left: -10px;
            top: 20px;
            width: 0;
            height: 0;
            border-right: 10px solid var(--bg-card);
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
        }
        
        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 20px;
            width: 16px;
            height: 16px;
            background: var(--primary-color);
            border-radius: 50%;
            transform: translateX(-50%);
            border: 3px solid var(--bg-primary);
            z-index: 1;
        }
        
        .experience-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .experience-company {
            font-size: 1.1rem;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        
        .experience-duration {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        
        .experience-description {
            color: var(--text-secondary);
            line-height: 1.6;
        }
        
        .experience-highlights {
            list-style: none;
            margin-top: 1rem;
        }
        
        .experience-highlights li {
            position: relative;
            padding-left: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--text-secondary);
        }
        
        .experience-highlights li::before {
            content: '▸';
            position: absolute;
            left: 0;
            color: var(--primary-color);
        }
        
        /* Skills Section */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .skill-category {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .skill-category h3 {
            font-size: 1.3rem;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .skill-items {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }
        
        .skill-item {
            background: var(--bg-secondary);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
        }
        
        /* Education Section */
        .education-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 2rem;
        }
        
        .education-item {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .education-degree {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }
        
        .education-school {
            font-size: 1.1rem;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }
        
        .education-year {
            color: var(--text-light);
            font-size: 0.9rem;
        }
        
        /* Contact Section */
        .contact {
            background: var(--bg-secondary);
        }
        
        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }
        
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }
        
        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: var(--bg-card);
            border-radius: 8px;
            border: 1px solid var(--border-color);
        }
        
        .contact-item i {
            font-size: 1.5rem;
            color: var(--primary-color);
            width: 30px;
            text-align: center;
        }
        
        .contact-item-info h4 {
            margin-bottom: 0.25rem;
            color: var(--text-primary);
        }
        
        .contact-item-info p {
            color: var(--text-secondary);
            margin: 0;
        }
        
        .contact-form {
            background: var(--bg-card);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-primary);
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background: var(--bg-primary);
            color: var(--text-primary);
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }
        
        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }
        
        .success-message {
            background: #10b981;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .error-message {
            background: #ef4444;
            color: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        /* Footer */
        footer {
            background: var(--text-primary);
            color: white;
            text-align: center;
            padding: 2rem 0;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }
        
        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-2px);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-menu {
                display: none;
            }
            
            .mobile-menu-toggle {
                display: block;
            }
            
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }
            
            .hero-text h1 {
                font-size: 2.5rem;
            }
            
            .about-content {
                grid-template-columns: 1fr;
            }
            
            .about-stats {
                grid-template-columns: 1fr 1fr;
            }
            
            .experience-timeline::before {
                left: 0;
            }
            
            .timeline-item {
                width: 100%;
                left: 0 !important;
                padding-left: 2rem !important;
                padding-right: 0 !important;
            }
            
            .timeline-dot {
                left: 0;
                transform: translateX(-50%);
            }
            
            .timeline-item .timeline-content::after {
                display: none;
            }
            
            .contact-content {
                grid-template-columns: 1fr;
            }
            
            .skills-grid {
                grid-template-columns: 1fr;
            }
            
            .education-grid {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .container {
                padding: 0 15px;
            }
            
            .hero-text h1 {
                font-size: 2rem;
            }
            
            .hero-text .subtitle {
                font-size: 1.2rem;
            }
            
            .profile-image {
                width: 200px;
                height: 200px;
                font-size: 5rem;
            }
            
            .about-stats {
                grid-template-columns: 1fr;
            }
        }
        
        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }
        
        /* Loading animation */
        .loading {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        
        .loading.loaded {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">FR</div>
                <nav>
                    <ul class="nav-menu">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#experience">Experience</a></li>
                        <li><a href="#education">Education</a></li>
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
                <div class="header-actions">
                    <button class="theme-toggle" id="theme-toggle">
                        <i class="fas fa-moon"></i>
                    </button>
                    <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text" data-aos="fade-right">
                    <h1>Fatahillah Rachman</h1>
                    <p class="subtitle">IT Programmer & Website Officer</p>
                    <p class="description">
                        Experienced IT professional with 3+ years in healthcare technology and regional digital platforms. 
                        Specializing in PHP development, database management, and system optimization with a focus on 
                        improving organizational efficiency through technology.
                    </p>
                    <div class="hero-buttons">
                        <a href="#contact" class="btn btn-primary">
                            <i class="fas fa-envelope"></i>
                            Get In Touch
                        </a>
                        <a href="#" class="btn btn-secondary" onclick="alert('PDF CV will be available for download')">
                            <i class="fas fa-download"></i>
                            Download CV
                        </a>
                    </div>
                </div>
                <div class="hero-image" data-aos="fade-left">
                    <div class="profile-image">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">About Me</h2>
            <div class="about-content">
                <div class="about-stats" data-aos="fade-right">
                    <div class="stat-item">
                        <div class="stat-number">3+</div>
                        <div class="stat-label">Years Experience</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">22+</div>
                        <div class="stat-label">ASEAN Collaboration Areas</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">3</div>
                        <div class="stat-label">Hospital Systems</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">5+</div>
                        <div class="stat-label">Programming Languages</div>
                    </div>
                </div>
                <div class="about-text" data-aos="fade-left">
                    <p>
                        I'm an IT Programmer & Application Support Specialist with extensive experience in healthcare technology 
                        and regional digital platforms. Currently serving as a Website Officer at the ASEAN Secretariat, I manage 
                        the ASEAN Plus Three (APT) website supporting over 22 areas of regional collaboration.
                    </p>
                    <p>
                        My technical expertise spans PHP development, SQL database management, Python data analysis, and system 
                        maintenance. I've successfully modernized legacy applications, implemented system upgrades, and created 
                        comprehensive reporting solutions that drive organizational decision-making.
                    </p>
                    <p>
                        I'm passionate about leveraging technology to improve processes and create meaningful impact, whether it's 
                        enhancing healthcare IT systems or supporting regional digital governance initiatives.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Work Experience</h2>
            <div class="experience-timeline">
                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3 class="experience-title">ASEAN Plus Three (APT) Website Officer</h3>
                        <div class="experience-company">ASEAN Secretariat</div>
                        <div class="experience-duration">June 2025 - Present</div>
                        <div class="experience-description">
                            <p>Appointed to manage the ASEAN Plus Three (APT) website, a key digital platform supporting more than 22 areas of regional collaboration.</p>
                            <ul class="experience-highlights">
                                <li>Oversee daily operation, content management, and technical maintenance of APT website for member-state stakeholders</li>
                                <li>Maintain CMS infrastructure, optimize UI/UX for user-friendliness, and debug site components</li>
                                <li>Update plug-ins, implement SEO strategies, and support multimedia content development</li>
                                <li>Analyze website statistics using Python libraries to generate performance reports for stakeholder communications</li>
                                <li>Provide interim reports and technical documentation to ensure platform continuity</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3 class="experience-title">IT Core Application Developer Staff</h3>
                        <div class="experience-company">Premier Hospital Group</div>
                        <div class="experience-duration">April 2025 - May 2025 (2 months)</div>
                        <div class="experience-description">
                            <p>Promoted to corporate IT team to take over development and maintenance of core PHP-based application used across all three RS Premier hospitals.</p>
                            <ul class="experience-highlights">
                                <li>Focused on stabilizing the PHP application and fixing urgent issues as sole developer during critical transition period</li>
                                <li>Ensured operational continuity across RS Premier Bintaro, Jatinegara, and Surabaya hospitals</li>
                                <li>Created comprehensive application documentation for future development teams</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3 class="experience-title">IT Programmer & Application Support</h3>
                        <div class="experience-company">Premier Bintaro Hospital</div>
                        <div class="experience-duration">March 2023 - April 2025 (2 years, 2 months)</div>
                        <div class="experience-description">
                            <p>Supported day-to-day technical operations and digital transformation projects within the hospital IT department.</p>
                            <ul class="experience-highlights">
                                <li>Assisted in TrakCare HIS upgrade from 2012 version to 2023 release during planning, testing, deployment, and post-go-live support</li>
                                <li>Modernized legacy internal PHP 5.0 applications to PHP 8.1, deployed to new server environment with optimized performance</li>
                                <li>Created operational and clinical reports using JReport, Crystal Report, and DBeaver by connecting to TrakCare databases via ODBC</li>
                                <li>Used Python libraries such as pandas, numpy, matplotlib and scikit-learn to analyze data retrieved from TrakCare databases</li>
                                <li>Collaborated with corporate development team to build new PHP-based program supporting three hospitals within the group</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="timeline-item" data-aos="fade-up">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3 class="experience-title">Application Developer & Tech Support (Internship)</h3>
                        <div class="experience-company">Premier Bintaro Hospital</div>
                        <div class="experience-duration">February 2022 - February 2023 (1 year, 1 month)</div>
                        <div class="experience-description">
                            <p>Built web-based internal application to help improve hospital processes while learning healthcare IT fundamentals.</p>
                            <ul class="experience-highlights">
                                <li>Developed web-based internal app to improve hospital processes</li>
                                <li>Learned about hospital's core TrakCare system and its connection with day-to-day operations</li>
                                <li>Provided IT support tasks including fixing hardware issues and assisting users</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Education</h2>
            <div class="education-grid">
                <div class="education-item" data-aos="fade-up">
                    <h3 class="education-degree">Master Degree in Information Management System</h3>
                    <div class="education-school">Bina Nusantara University (Online Class)</div>
                    <div class="education-year">July 2024 - March 2026</div>
                </div>
                <div class="education-item" data-aos="fade-up">
                    <h3 class="education-degree">Bachelor Degree in Computer Science</h3>
                    <div class="education-school">Bina Nusantara University</div>
                    <div class="education-year">September 2019 - March 2024</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Skills & Certifications</h2>
            <div class="skills-grid">
                <div class="skill-category" data-aos="fade-up">
                    <h3><i class="fas fa-code"></i> Programming</h3>
                    <div class="skill-items">
                        <span class="skill-item">PHP</span>
                        <span class="skill-item">Laravel</span>
                        <span class="skill-item">Python</span>
                        <span class="skill-item">JavaScript</span>
                        <span class="skill-item">HTML/CSS</span>
                    </div>
                </div>
                
                <div class="skill-category" data-aos="fade-up">
                    <h3><i class="fas fa-database"></i> Database & Analytics</h3>
                    <div class="skill-items">
                        <span class="skill-item">SQL Server</span>
                        <span class="skill-item">MySQL</span>
                        <span class="skill-item">InterSystems IRIS SQL</span>
                        <span class="skill-item">pandas</span>
                        <span class="skill-item">numpy</span>
                        <span class="skill-item">matplotlib</span>
                        <span class="skill-item">scikit-learn</span>
                    </div>
                </div>
                
                <div class="skill-category" data-aos="fade-up">
                    <h3><i class="fas fa-chart-bar"></i> Reporting Tools</h3>
                    <div class="skill-items">
                        <span class="skill-item">Crystal Report</span>
                        <span class="skill-item">PowerBI</span>
                        <span class="skill-item">JReport</span>
                        <span class="skill-item">DBeaver</span>
                    </div>
                </div>
                
                <div class="skill-category" data-aos="fade-up">
                    <h3><i class="fas fa-network-wired"></i> Infrastructure & Networking</h3>
                    <div class="skill-items">
                        <span class="skill-item">Windows Server</span>
                        <span class="skill-item">Active Directory</span>
                        <span class="skill-item">DHCP</span>
                        <span class="skill-item">Radius Server</span>
                        <span class="skill-item">Cloud Infrastructure</span>
                        <span class="skill-item">Network Cabling</span>
                        <span class="skill-item">Fiber Optic</span>
                    </div>
                </div>
                
                <div class="skill-category" data-aos="fade-up">
                    <h3><i class="fas fa-tools"></i> Development Tools</h3>
                    <div class="skill-items">
                        <span class="skill-item">Git</span>
                        <span class="skill-item">ODBC Configuration</span>
                        <span class="skill-item">Server Configuration</span>
                        <span class="skill-item">CMS Management</span>
                        <span class="skill-item">SEO Optimization</span>
                    </div>
                </div>
                
                <div class="skill-category" data-aos="fade-up">
                    <h3><i class="fas fa-certificate"></i> Certifications</h3>
                    <div class="skill-items">
                        <span class="skill-item">R Fundamental for Data Science - DQLab</span>
                        <span class="skill-item">Fundamental SQL Using SELECT - DQLab</span>
                        <span class="skill-item">Python Fundamental for Data Statement - DQLab</span>
                        <span class="skill-item">TOEFL Score: 567 - Englishvit</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section contact">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">Get In Touch</h2>
            <p class="section-subtitle" data-aos="fade-up">
                I'm always open to discussing new opportunities and interesting projects. Let's connect!
            </p>
            
            <div class="contact-content">
                <div class="contact-info" data-aos="fade-right">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div class="contact-item-info">
                            <h4>Email</h4>
                            <p><?php echo $contact_email; ?></p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fab fa-linkedin"></i>
                        <div class="contact-item-info">
                            <h4>LinkedIn</h4>
                            <p>linkedin.com/in/fatahillah-rachman</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="contact-item-info">
                            <h4>Location</h4>
                            <p>Jakarta, Indonesia</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <i class="fas fa-briefcase"></i>
                        <div class="contact-item-info">
                            <h4>Status</h4>
                            <p>Open to opportunities</p>
                        </div>
                    </div>
                </div>
                
                <div class="contact-form" data-aos="fade-left">
                    <?php if ($message_sent): ?>
                        <div class="success-message">
                            <i class="fas fa-check-circle"></i>
                            Thank you for your message! I'll get back to you soon.
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($error_message): ?>
                        <div class="error-message">
                            <i class="fas fa-exclamation-triangle"></i>
                            <?php echo $error_message; ?>
                        </div>
                    <?php endif; ?>
                    
                    <form method="POST" action="#contact">
                        <input type="hidden" name="contact_form" value="1">
                        
                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i>
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="social-links">
                <a href="<?php echo $linkedin_url; ?>" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="mailto:<?php echo $contact_email; ?>">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="https://github.com/fatahillah-rachman" target="_blank" rel="noopener noreferrer">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <p>&copy; <?php echo date('Y'); ?> Fatahillah Rachman. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Theme Toggle
        const themeToggle = document.getElementById('theme-toggle');
        const body = document.body;
        const themeIcon = themeToggle.querySelector('i');

        // Check for saved theme preference
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            body.setAttribute('data-theme', savedTheme);
            updateThemeIcon(savedTheme);
        }

        themeToggle.addEventListener('click', () => {
            const currentTheme = body.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            body.setAttribute('data-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateThemeIcon(newTheme);
        });

        function updateThemeIcon(theme) {
            themeIcon.className = theme === 'dark' ? 'fas fa-sun' : 'fas fa-moon';
        }

        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.98)';
                header.style.boxShadow = '0 2px 20px rgba(0, 0, 0, 0.1)';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.boxShadow = 'none';
            }
        });

        // Mobile menu toggle (basic implementation)
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const navMenu = document.querySelector('.nav-menu');

        mobileMenuToggle.addEventListener('click', () => {
            navMenu.style.display = navMenu.style.display === 'flex' ? 'none' : 'flex';
        });

        // Loading animation
        window.addEventListener('load', () => {
            document.querySelectorAll('.loading').forEach(element => {
                element.classList.add('loaded');
            });
        });

        // Form validation
        const contactForm = document.querySelector('form');
        if (contactForm) {
            contactForm.addEventListener('submit', (e) => {
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                const subject = document.getElementById('subject').value.trim();
                const message = document.getElementById('message').value.trim();

                if (!name || !email || !subject || !message) {
                    e.preventDefault();
                    alert('Please fill in all required fields.');
                    return;
                }

                // Basic email validation
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    e.preventDefault();
                    alert('Please enter a valid email address.');
                    return;
                }
            });
        }

        // Scroll to top functionality
        const scrollToTop = () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };

        // Add scroll to top button (optional)
        const createScrollToTopButton = () => {
            const button = document.createElement('button');
            button.innerHTML = '<i class="fas fa-chevron-up"></i>';
            button.className = 'scroll-to-top';
            button.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                background: var(--primary-color);
                color: white;
                border: none;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                cursor: pointer;
                opacity: 0;
                transition: opacity 0.3s ease;
                z-index: 1000;
            `;
            
            button.addEventListener('click', scrollToTop);
            document.body.appendChild(button);

            window.addEventListener('scroll', () => {
                if (window.scrollY > 500) {
                    button.style.opacity = '1';
                } else {
                    button.style.opacity = '0';
                }
            });
        };

        // Initialize scroll to top button
        createScrollToTopButton();
    </script>
</body>
</html>
