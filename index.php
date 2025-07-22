<?php
// Database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'trac_portal';

// Sample data for demonstration
$totalIndicators = 456;
$totalStates = 36;
$totalSectors = 4;
$latestYear = 2025;

// Trend data for charts
$healthTrend = [65, 72, 78, 85, 91];
$educationTrend = [58, 64, 71, 79, 84];
$nutritionTrend = [52, 61, 68, 76, 88];
$washTrend = [45, 53, 62, 73, 82];
?>

<?php include 'includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <div class="hero-content">
      <div class="hero-badge">
        <div style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; animation: pulse 2s infinite;"></div>
        <span>Live Data Portal</span>
      </div>
      
      <h1 class="hero-title">
        TRAC Data Visualization Portal
      </h1>
      
      <p class="hero-subtitle">
        Transforming Raw Data into Actionable Insights
      </p>
      
      <p class="hero-description">
        Explore comprehensive health, education, nutrition, and WASH indicators across India with 
        real-time analytics and interactive visualizations powered by advanced data science.
      </p>
      
      <div class="hero-actions">
        <a href="#stats" class="btn btn-primary" onclick="scrollToSection('stats')">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
          </svg>
          Explore Dashboard
        </a>
        <a href="#sectors" class="btn btn-secondary" onclick="scrollToSection('sectors')">
          View Insights
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Stats Overview -->
<section id="stats">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Platform Overview</h2>
      <p class="section-subtitle">
        Comprehensive metrics from our nationwide data collection and analysis platform
      </p>
    </div>
    
    <div class="stats-grid">
      <div class="stat-card loading">
        <div class="stat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
          </svg>
        </div>
        <div class="stat-number" data-target="<?= $totalIndicators ?>">0</div>
        <div class="stat-label">Total Indicators</div>
        <div class="stat-description">Across all sectors</div>
      </div>
      
      <div class="stat-card loading">
        <div class="stat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
          </svg>
        </div>
        <div class="stat-number" data-target="<?= $totalStates ?>">0</div>
        <div class="stat-label">States & UTs</div>
        <div class="stat-description">Pan-India coverage</div>
      </div>
      
      <div class="stat-card loading">
        <div class="stat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
          </svg>
        </div>
        <div class="stat-number" data-target="<?= $totalSectors ?>">0</div>
        <div class="stat-label">Key Sectors</div>
        <div class="stat-description">Development areas</div>
      </div>
      
      <div class="stat-card loading">
        <div class="stat-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
          </svg>
        </div>
        <div class="stat-number" data-target="<?= $latestYear ?>">0</div>
        <div class="stat-label">Latest Data</div>
        <div class="stat-description">Up-to-date insights</div>
      </div>
    </div>
  </div>
</section>

<!-- Trends Section -->
<section>
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Sector Performance Trends</h2>
      <p class="section-subtitle">
        Interactive data visualization showing progress and growth patterns across key development sectors
      </p>
    </div>
    
    <div class="trends-grid">
      <div class="trend-card loading">
        <div class="trend-header">
          <h3 class="trend-title">Health Indicators</h3>
          <div class="trend-value">+13.2% ↗</div>
        </div>
        <div class="chart-container">
          <canvas id="healthChart" width="100" height="50"></canvas>
        </div>
        <div style="font-size: 0.875rem; color: var(--text-muted);">
          Maternal and child health metrics showing consistent improvement
        </div>
      </div>
      
      <div class="trend-card loading">
        <div class="trend-header">
          <h3 class="trend-title">Education Progress</h3>
          <div class="trend-value">+8.7% ↗</div>
        </div>
        <div class="chart-container">
          <canvas id="educationChart" width="100" height="50"></canvas>
        </div>
        <div style="font-size: 0.875rem; color: var(--text-muted);">
          Enrollment and literacy rates across all age groups
        </div>
      </div>
      
      <div class="trend-card loading">
        <div class="trend-header">
          <h3 class="trend-title">Nutrition Impact</h3>
          <div class="trend-value">+15.1% ↗</div>
        </div>
        <div class="chart-container">
          <canvas id="nutritionChart" width="100" height="50"></canvas>
        </div>
        <div style="font-size: 0.875rem; color: var(--text-muted);">
          Malnutrition reduction and dietary improvement programs
        </div>
      </div>
      
      <div class="trend-card loading">
        <div class="trend-header">
          <h3 class="trend-title">WASH Coverage</h3>
          <div class="trend-value">+11.4% ↗</div>
        </div>
        <div class="chart-container">
          <canvas id="washChart" width="100" height="50"></canvas>
        </div>
        <div style="font-size: 0.875rem; color: var(--text-muted);">
          Water, sanitation, and hygiene access improvements
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sectors Section -->
<section id="sectors">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Explore by Sector</h2>
      <p class="section-subtitle">
        Deep dive into specific development areas with comprehensive data analysis and insights
      </p>
    </div>
    
    <div class="sectors-grid">
      <a href="education.php" class="sector-card loading">
        <div class="sector-icon education">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
          </svg>
        </div>
        <h3 class="sector-title">Education</h3>
        <p class="sector-description">
          Comprehensive analysis of enrollment rates, literacy levels, and educational outcomes across all states and age groups.
        </p>
        <div class="sector-stats">
          <div class="sector-stat">
            <span class="sector-stat-value">85%</span>
            <span class="sector-stat-label">Enrollment</span>
          </div>
          <div class="sector-stat">
            <span class="sector-stat-value">120+</span>
            <span class="sector-stat-label">Indicators</span>
          </div>
        </div>
      </a>
      
      <a href="health.php" class="sector-card loading">
        <div class="sector-icon health">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8h2v8c0 1.1.9 2 2 2h8v2H8c-2.21 0-4-1.79-4-4V8z"/>
          </svg>
        </div>
        <h3 class="sector-title">Health</h3>
        <p class="sector-description">
          Maternal, child, and public health indicators including immunization coverage, disease prevention, and healthcare access.
        </p>
        <div class="sector-stats">
          <div class="sector-stat">
            <span class="sector-stat-value">78%</span>
            <span class="sector-stat-label">Coverage</span>
          </div>
          <div class="sector-stat">
            <span class="sector-stat-value">95+</span>
            <span class="sector-stat-label">Indicators</span>
          </div>
        </div>
      </a>
      
      <a href="nutrition.php" class="sector-card loading">
        <div class="sector-icon nutrition">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
          </svg>
        </div>
        <h3 class="sector-title">Nutrition</h3>
        <p class="sector-description">
          Child growth monitoring, malnutrition rates, dietary patterns, and nutrition program effectiveness across regions.
        </p>
        <div class="sector-stats">
          <div class="sector-stat">
            <span class="sector-stat-value">62%</span>
            <span class="sector-stat-label">Improvement</span>
          </div>
          <div class="sector-stat">
            <span class="sector-stat-value">80+</span>
            <span class="sector-stat-label">Indicators</span>
          </div>
        </div>
      </a>
      
      <a href="wash.php" class="sector-card loading">
        <div class="sector-icon wash">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 22c4.97 0 9-4.03 9-9-4.97 0-9 4.03-9 9zM5.6 10.25a1 1 0 001.4 0l1.01-1a1 1 0 000-1.42l-.71-.7a1 1 0 00-1.41 0l-.7.7a1 1 0 000 1.42l.41.42z"/>
          </svg>
        </div>
        <h3 class="sector-title">WASH</h3>
        <p class="sector-description">
          Water access, sanitation facilities, and hygiene practices monitoring across urban and rural populations.
        </p>
        <div class="sector-stats">
          <div class="sector-stat">
            <span class="sector-stat-value">72%</span>
            <span class="sector-stat-label">Access</span>
          </div>
          <div class="sector-stat">
            <span class="sector-stat-label">60+</span>
            <span class="sector-stat-label">Indicators</span>
          </div>
        </div>
      </a>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="js/theme-toggle.js"></script>

<script>
// Initialize charts and animations
document.addEventListener('DOMContentLoaded', function() {
  // Animate stats on scroll
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.remove('loading');
        entry.target.classList.add('loaded');
        
        // Animate counters
        const counter = entry.target.querySelector('[data-target]');
        if (counter) {
          animateCounter(counter);
        }
        
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  
  document.querySelectorAll('.loading').forEach(el => {
    observer.observe(el);
  });
  
  // Counter animation
  function animateCounter(element) {
    const target = parseInt(element.getAttribute('data-target'));
    let current = 0;
    const increment = target / 60;
    
    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(timer);
      }
      element.textContent = Math.floor(current);
    }, 30);
  }
  
  // Smooth scroll
  window.scrollToSection = function(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
      const headerHeight = 64; // navbar height
      const targetPosition = element.offsetTop - headerHeight;
      
      window.scrollTo({
        top: targetPosition,
        behavior: 'smooth'
      });
    }
  };
  
  // Initialize charts
  const chartData = {
    health: <?= json_encode($healthTrend) ?>,
    education: <?= json_encode($educationTrend) ?>,
    nutrition: <?= json_encode($nutritionTrend) ?>,
    wash: <?= json_encode($washTrend) ?>
  };
  
  Object.keys(chartData).forEach(sector => {
    const canvas = document.getElementById(sector + 'Chart');
    if (canvas) {
      const ctx = canvas.getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['2019', '2020', '2021', '2022', '2023'],
          datasets: [{
            data: chartData[sector],
            borderColor: '#6366f1',
            backgroundColor: 'rgba(99, 102, 241, 0.1)',
            borderWidth: 2,
            fill: true,
            tension: 0.4,
            pointRadius: 0,
            pointHoverRadius: 4
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          scales: {
            x: { display: false },
            y: { display: false }
          },
          interaction: { intersect: false }
        }
      });
    }
  });
});
</script>

<style>
@keyframes pulse {
  0%, 100% { opacity: 1; }
  50% { opacity: 0.5; }
}
</style>
