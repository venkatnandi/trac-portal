<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAC Portal - Data Visualization Platform</title>
    <meta name="description" content="TRAC Data Visualization Portal - Comprehensive health, education, nutrition, and WASH indicators across India">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css">
    
    <!-- Preload fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Theme detection script (prevents flash) -->
    <script>
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
        }
    </script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar">
    <div class="container navbar-content">
        <!-- Brand -->
        <a href="index.php" class="navbar-brand">
            <div class="brand-icon">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                </svg>
            </div>
            <span>TRAC Portal</span>
        </a>
        
        <!-- Navigation Links -->
        <div class="navbar-nav">
            <a href="education.php" class="nav-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                </svg>
                <span>Education</span>
            </a>
            <a href="health.php" class="nav-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8h2v8c0 1.1.9 2 2 2h8v2H8c-2.21 0-4-1.79-4-4V8z"/>
                </svg>
                <span>Health</span>
            </a>
            <a href="nutrition.php" class="nav-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                <span>Nutrition</span>
            </a>
            <a href="wash.php" class="nav-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 22c4.97 0 9-4.03 9-9-4.97 0-9 4.03-9 9zM5.6 10.25a1 1 0 001.4 0l1.01-1a1 1 0 000-1.42l-.71-.7a1 1 0 00-1.41 0l-.7.7a1 1 0 000 1.42l.41.42z"/>
                </svg>
                <span>WASH</span>
            </a>
            
            <!-- Theme Toggle -->
            <button id="themeToggle" class="theme-toggle" aria-label="Toggle theme">
                <svg id="lightIcon" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
                </svg>
                <svg id="darkIcon" width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="display: none;">
                    <path d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"/>
                </svg>
                <span id="themeText">Dark Mode</span>
            </button>
        </div>
    </div>
</nav>

<main>
