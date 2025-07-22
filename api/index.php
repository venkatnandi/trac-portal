<?php
// Sample dashboard data with dynamic elements
$totalIndicators = 156;
$activeStates = 28;
$lastUpdated = date('M d, Y');
$dataPoints = 12847;

// Sample trend data (in real app, this would come from database)
$trends = [
    [
        'title' => 'Education Progress',
        'value' => 78,
        'change' => '+12%',
        'trend' => 'up',
        'data' => [65, 68, 72, 75, 78],
        'color' => '#06b6d4'
    ],
    [
        'title' => 'Health Outcomes',
        'value' => 84,
        'change' => '+8%',
        'trend' => 'up',
        'data' => [76, 78, 80, 82, 84],
        'color' => '#ef4444'
    ],
    [
        'title' => 'Nutrition Status',
        'value' => 69,
        'change' => '+15%',
        'trend' => 'up',
        'data' => [54, 58, 62, 66, 69],
        'color' => '#f59e0b'
    ],
    [
        'title' => 'WASH Coverage',
        'value' => 91,
        'change' => '+6%',
        'trend' => 'up',
        'data' => [85, 86, 88, 89, 91],
        'color' => '#8b5cf6'
    ]
];

// Get database connection
include '../config.php';

// Fetch real data if database is available
if ($conn) {
    $result = $conn->query("SELECT COUNT(*) as total FROM indicators");
    if ($result) {
        $row = $result->fetch_assoc();
        $totalIndicators = $row['total'] ?? $totalIndicators;
    }
    
    $result = $conn->query("SELECT COUNT(DISTINCT state) as states FROM indicators WHERE state IS NOT NULL");
    if ($result) {
        $row = $result->fetch_assoc();
        $activeStates = $row['states'] ?? $activeStates;
    }
}
?>

<?php include '../includes/header.php'; ?>

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
        
        <!-- Hero Visual Cards -->
        <div class="hero-visual">
            <div class="floating-card" style="animation-delay: 0s;">
                <div class="card-header">
                    <span class="card-title">Live Metrics</span>
                    <div class="status-indicator"></div>
                </div>
                <div class="metric-value"><?= number_format($totalIndicators) ?></div>
                <div class="metric-label">Active Indicators</div>
            </div>
            
            <div class="floating-card" style="animation-delay: 0.2s;">
                <div class="card-header">
                    <span class="card-title">Coverage</span>
                    <div class="trend-indicator">↗</div>
                </div>
                <div class="metric-value"><?= $activeStates ?></div>
                <div class="metric-label">States & UTs</div>
            </div>
            
            <div class="floating-card mini-chart" style="animation-delay: 0.4s;">
                <canvas id="heroChart" width="80" height="40"></canvas>
                <div class="metric-label">Trend Analysis</div>
            </div>
        </div>
    </div>
    
    <!-- Animated Background Elements -->
    <div class="hero-bg-elements">
        <div class="bg-circle" style="top: 10%; left: 10%; animation-delay: 0s;"></div>
        <div class="bg-circle" style="top: 60%; right: 10%; animation-delay: 1s;"></div>
        <div class="bg-square" style="top: 30%; right: 20%; animation-delay: 2s;"></div>
    </div>
</section>

<!-- Stats Dashboard -->
<section id="stats" style="padding: var(--space-16) 0; background: var(--bg-secondary);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Dashboard Overview</h2>
            <p class="section-subtitle">Real-time insights from across India's development indicators</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card" data-animation="counter" data-target="<?= $totalIndicators ?>">
                <div class="card-bg-pattern"></div>
                <div class="stat-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
                    </svg>
                    <div class="icon-glow"></div>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">0</h3>
                    <p class="stat-label">Total Indicators</p>
                    <div class="stat-trend">
                        <span class="trend-up">↗ Active</span>
                    </div>
                </div>
                <div class="card-progress" style="--progress: 85%;"></div>
            </div>
            
            <div class="stat-card" data-animation="counter" data-target="<?= $activeStates ?>">
                <div class="card-bg-pattern"></div>
                <div class="stat-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                    </svg>
                    <div class="icon-glow"></div>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">0</h3>
                    <p class="stat-label">States & UTs</p>
                    <div class="stat-trend">
                        <span class="trend-up">↗ Connected</span>
                    </div>
                </div>
                <div class="card-progress" style="--progress: 93%;"></div>
            </div>
            
            <div class="stat-card" data-animation="counter" data-target="<?= $dataPoints ?>">
                <div class="card-bg-pattern"></div>
                <div class="stat-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M9 11H7v9h2v-9zm4-4h-2v13h2V7zm4-4h-2v17h2V3z"/>
                    </svg>
                    <div class="icon-glow"></div>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number">0</h3>
                    <p class="stat-label">Data Points</p>
                    <div class="stat-trend">
                        <span class="trend-up">↗ Updated</span>
                    </div>
                </div>
                <div class="card-progress" style="--progress: 78%;"></div>
            </div>
            
            <div class="stat-card">
                <div class="card-bg-pattern"></div>
                <div class="stat-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <div class="icon-glow"></div>
                </div>
                <div class="stat-content">
                    <h3 class="stat-number"><?= $lastUpdated ?></h3>
                    <p class="stat-label">Last Updated</p>
                    <div class="stat-trend">
                        <span class="trend-neutral">• Real-time</span>
                    </div>
                </div>
                <div class="card-progress" style="--progress: 100%;"></div>
            </div>
        </div>
    </div>
</section>

<!-- Trends Section -->
<section style="padding: var(--space-16) 0;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Performance Trends</h2>
            <p class="section-subtitle">Track progress across key development sectors with interactive analytics</p>
            
            <!-- Data Controls -->
            <div class="data-controls">
                <div class="control-group">
                    <label for="timeRange">Time Range:</label>
                    <select id="timeRange" class="control-select">
                        <option value="6m">Last 6 Months</option>
                        <option value="1y" selected>Last Year</option>
                        <option value="3y">Last 3 Years</option>
                        <option value="5y">Last 5 Years</option>
                    </select>
                </div>
                <div class="control-group">
                    <label for="dataType">Data Type:</label>
                    <select id="dataType" class="control-select">
                        <option value="percentage">Percentage</option>
                        <option value="absolute">Absolute Values</option>
                        <option value="normalized">Normalized</option>
                    </select>
                </div>
                <button class="refresh-btn" onclick="refreshData()">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/>
                    </svg>
                    Refresh Data
                </button>
            </div>
        </div>
        
        <div class="trends-grid">
            <?php foreach($trends as $index => $trend): ?>
            <div class="trend-card" data-sector="<?= strtolower(explode(' ', $trend['title'])[0]) ?>">
                <div class="trend-header">
                    <div class="trend-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="<?= $trend['color'] ?>">
                            <path d="M9 11H7v9h2v-9zm4-4h-2v13h2V7zm4-4h-2v17h2V3z"/>
                        </svg>
                    </div>
                    <div class="trend-info">
                        <h3><?= $trend['title'] ?></h3>
                        <div class="trend-status">
                            <span class="status-indicator <?= $trend['trend'] ?>"></span>
                            <span class="status-text"><?= $trend['trend'] === 'up' ? 'Improving' : 'Stable' ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="trend-stats">
                    <div class="main-value"><?= $trend['value'] ?>%</div>
                    <div class="change-value <?= $trend['trend'] ?>"><?= $trend['change'] ?></div>
                </div>
                
                <div class="chart-container" style="height: 60px; margin: var(--space-4) 0;">
                    <canvas id="trendChart<?= $index ?>" data-chart='<?= json_encode($trend['data']) ?>' data-color="<?= $trend['color'] ?>"></canvas>
                </div>
                
                <div class="data-points">
                    <?php foreach($trend['data'] as $pointIndex => $point): ?>
                    <div class="data-point" style="height: <?= ($point / max($trend['data'])) * 30 ?>px; background: <?= $trend['color'] ?>;">
                        <span class="point-value"><?= $point ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Sectors Navigation -->
<section id="sectors" style="padding: var(--space-16) 0; background: var(--bg-secondary);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Explore by Sector</h2>
            <p class="section-subtitle">Dive deep into specific development areas with comprehensive data analysis</p>
        </div>
        
        <div class="sectors-grid">
            <a href="/education" class="sector-card education">
                <div class="sector-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/>
                    </svg>
                </div>
                <div class="sector-content">
                    <h3>Education</h3>
                    <p>Literacy rates, enrollment, quality indicators, and educational infrastructure analysis</p>
                    <div class="sector-stats">
                        <div class="stat-item">
                            <span class="stat-number">72%</span>
                            <span class="stat-label">Literacy Rate</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">85%</span>
                            <span class="stat-label">Enrollment</span>
                        </div>
                    </div>
                </div>
                <div class="sector-arrow">→</div>
            </a>
            
            <a href="/health" class="sector-card health">
                <div class="sector-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 8h-2v3h-3v2h3v3h2v-3h3v-2h-3zM4 8h2v8c0 1.1.9 2 2 2h8v2H8c-2.21 0-4-1.79-4-4V8z"/>
                    </svg>
                </div>
                <div class="sector-content">
                    <h3>Health</h3>
                    <p>Maternal health, child mortality, immunization coverage, and healthcare access metrics</p>
                    <div class="sector-stats">
                        <div class="stat-item">
                            <span class="stat-number">32</span>
                            <span class="stat-label">IMR per 1000</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">85%</span>
                            <span class="stat-label">Immunization</span>
                        </div>
                    </div>
                </div>
                <div class="sector-arrow">→</div>
            </a>
            
            <a href="/nutrition" class="sector-card nutrition">
                <div class="sector-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                </div>
                <div class="sector-content">
                    <h3>Nutrition</h3>
                    <p>Child malnutrition, stunting, wasting, anemia prevalence, and dietary diversity indicators</p>
                    <div class="sector-stats">
                        <div class="stat-item">
                            <span class="stat-number">35%</span>
                            <span class="stat-label">Stunting Rate</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">65%</span>
                            <span class="stat-label">Breastfeeding</span>
                        </div>
                    </div>
                </div>
                <div class="sector-arrow">→</div>
            </a>
            
            <a href="/wash" class="sector-card wash">
                <div class="sector-icon">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 22c4.97 0 9-4.03 9-9-4.97 0-9 4.03-9 9zM5.6 10.25a1 1 0 001.4 0l1.01-1a1 1 0 000-1.42l-.71-.7a1 1 0 00-1.41 0l-.7.7a1 1 0 000 1.42l.41.42z"/>
                    </svg>
                </div>
                <div class="sector-content">
                    <h3>WASH</h3>
                    <p>Water access, sanitation facilities, hygiene practices, and open defecation elimination</p>
                    <div class="sector-stats">
                        <div class="stat-item">
                            <span class="stat-number">83%</span>
                            <span class="stat-label">Safe Water</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number">96%</span>
                            <span class="stat-label">ODF Status</span>
                        </div>
                    </div>
                </div>
                <div class="sector-arrow">→</div>
            </a>
        </div>
    </div>
</section>

<!-- Data Detail Modal -->
<div id="dataDetailOverlay" class="data-detail-overlay">
    <div class="data-detail-modal">
        <div class="modal-header">
            <h3 id="modalTitle">Data Details</h3>
            <button class="modal-close" onclick="closeDataModal()">&times;</button>
        </div>
        <div class="modal-content">
            <div id="modalContent">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/theme-toggle.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize charts for trends
    <?php foreach($trends as $index => $trend): ?>
    const ctx<?= $index ?> = document.getElementById('trendChart<?= $index ?>').getContext('2d');
    new Chart(ctx<?= $index ?>, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
            datasets: [{
                data: <?= json_encode($trend['data']) ?>,
                borderColor: '<?= $trend['color'] ?>',
                backgroundColor: '<?= $trend['color'] ?>20',
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
            }
        }
    });
    <?php endforeach; ?>
    
    // Hero mini chart
    const heroCtx = document.getElementById('heroChart').getContext('2d');
    new Chart(heroCtx, {
        type: 'line',
        data: {
            labels: ['', '', '', '', ''],
            datasets: [{
                data: [65, 72, 78, 85, 91],
                borderColor: '#06b6d4',
                backgroundColor: '#06b6d420',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 0
            }]
        },
        options: {
            responsive: false,
            plugins: { legend: { display: false } },
            scales: {
                x: { display: false },
                y: { display: false }
            }
        }
    });
    
    // Scroll to section function
    window.scrollToSection = function(sectionId) {
        document.getElementById(sectionId).scrollIntoView({
            behavior: 'smooth'
        });
    };
    
    // Refresh data function
    window.refreshData = function() {
        const refreshBtn = document.querySelector('.refresh-btn');
        const originalHTML = refreshBtn.innerHTML;
        
        refreshBtn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="animation: spin 1s linear infinite;"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>Refreshing...';
        
        setTimeout(() => {
            refreshBtn.innerHTML = originalHTML;
            // Add visual feedback
            document.querySelectorAll('.trend-card').forEach(card => {
                card.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    card.style.transform = 'scale(1)';
                }, 100);
            });
        }, 1500);
    };
    
    // Data modal functions
    window.closeDataModal = function() {
        document.getElementById('dataDetailOverlay').style.display = 'none';
    };
    
    // Close modal on overlay click
    document.getElementById('dataDetailOverlay').addEventListener('click', function(e) {
        if (e.target === this) {
            closeDataModal();
        }
    });
});

// Add spin animation for refresh button
const style = document.createElement('style');
style.textContent = `
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
`;
document.head.appendChild(style);
</script>

