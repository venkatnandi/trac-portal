<?php
// Sample nutrition data
$nutritionData = [
    ['indicator' => 'Child Stunting', 'value' => 35, 'unit' => '%', 'state' => 'All India'],
    ['indicator' => 'Child Wasting', 'value' => 17, 'unit' => '%', 'state' => 'All India'],
    ['indicator' => 'Underweight Children', 'value' => 32, 'unit' => '%', 'state' => 'All India'],
    ['indicator' => 'Anemia in Women', 'value' => 53, 'unit' => '%', 'state' => 'All India'],
    ['indicator' => 'Anemia in Children', 'value' => 58, 'unit' => '%', 'state' => 'All India'],
    ['indicator' => 'Exclusive Breastfeeding', 'value' => 65, 'unit' => '%', 'state' => 'All India']
];

$chartTypes = ['bar' => 'Bar Chart', 'line' => 'Line Chart', 'pie' => 'Pie Chart'];
?>

<?php include '../includes/header.php'; ?>

<!-- Page Header -->
<section class="hero-section" style="padding: var(--space-16) 0; background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
    <div class="container">
        <div class="hero-content">
            <div class="hero-badge">
                <div style="width: 8px; height: 8px; background: #10b981; border-radius: 50%; animation: pulse 2s infinite;"></div>
                <span>Nutrition Analytics</span>
            </div>
            
            <h1 class="hero-title" style="margin-bottom: var(--space-4);">
                Nutrition Indicators
            </h1>
            
            <p class="hero-description">
                Monitoring child growth, malnutrition rates, and nutritional outcomes to improve dietary health across all age groups in India.
            </p>
        </div>
    </div>
</section>

<!-- Controls Section -->
<section style="padding: var(--space-8) 0; background: var(--bg-secondary);">
    <div class="container">
        <div class="data-controls">
            <div class="control-group">
                <label for="stateFilter">Filter by State:</label>
                <select id="stateFilter" class="control-select">
                    <option value="all">All India</option>
                    <option value="kerala">Kerala</option>
                    <option value="punjab">Punjab</option>
                    <option value="tamilnadu">Tamil Nadu</option>
                    <option value="gujarat">Gujarat</option>
                </select>
            </div>
            <div class="control-group">
                <label for="chartType">Chart Type:</label>
                <select id="chartType" class="control-select">
                    <?php foreach($chartTypes as $key => $type): ?>
                        <option value="<?= $key ?>" <?= $key === 'bar' ? 'selected' : '' ?>><?= $type ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button class="refresh-btn" onclick="refreshNutritionData()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/>
                </svg>
                Refresh Data
            </button>
        </div>
    </div>
</section>

<!-- Data Table Section -->
<section style="padding: var(--space-12) 0;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Key Nutrition Indicators</h2>
            <p class="section-subtitle">Critical nutritional metrics tracking child growth and dietary health outcomes</p>
        </div>
        
        <div style="background: var(--bg-primary); border: 1px solid var(--border-color); border-radius: var(--radius-2xl); overflow: hidden; box-shadow: var(--shadow-lg);">
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead style="background: var(--bg-secondary);">
                        <tr>
                            <th style="padding: var(--space-4); text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 1px solid var(--border-color);">#</th>
                            <th style="padding: var(--space-4); text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 1px solid var(--border-color);">Indicator</th>
                            <th style="padding: var(--space-4); text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 1px solid var(--border-color);">Value</th>
                            <th style="padding: var(--space-4); text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 1px solid var(--border-color);">Unit</th>
                            <th style="padding: var(--space-4); text-align: left; font-weight: 600; color: var(--text-primary); border-bottom: 1px solid var(--border-color);">State</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($nutritionData as $index => $data): ?>
                        <tr style="border-bottom: 1px solid var(--border-color); transition: background-color var(--transition-fast);" 
                            onmouseover="this.style.backgroundColor='var(--bg-secondary)'" 
                            onmouseout="this.style.backgroundColor='transparent'">
                            <td style="padding: var(--space-4); color: var(--text-secondary);"><?= $index + 1 ?></td>
                            <td style="padding: var(--space-4); font-weight: 500; color: var(--text-primary);"><?= $data['indicator'] ?></td>
                            <td style="padding: var(--space-4); font-weight: 700; color: var(--primary-600);"><?= $data['value'] ?></td>
                            <td style="padding: var(--space-4); color: var(--text-secondary);"><?= $data['unit'] ?></td>
                            <td style="padding: var(--space-4); color: var(--text-secondary);"><?= $data['state'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Chart Section -->
<section style="padding: var(--space-12) 0; background: var(--bg-secondary);">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Nutrition Data Visualization</h2>
            <p class="section-subtitle">Interactive charts showing nutritional trends and malnutrition patterns</p>
        </div>
        
        <div style="background: var(--bg-primary); border: 1px solid var(--border-color); border-radius: var(--radius-2xl); padding: var(--space-8); box-shadow: var(--shadow-lg);">
            <div style="height: 400px; position: relative;">
                <canvas id="nutritionChart" style="width: 100%; height: 100%;"></canvas>
            </div>
        </div>
    </div>
</section>

<!-- Key Insights Section -->
<section style="padding: var(--space-12) 0;">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Key Insights</h2>
            <p class="section-subtitle">Important findings and trends from nutrition data analysis</p>
        </div>
        
        <div class="insights-panel">
            <div class="insight-card">
                <div class="insight-icon">🍼</div>
                <div class="insight-content">
                    <h4>Early Nutrition</h4>
                    <p>Exclusive breastfeeding rates have improved to 65%, supporting better infant nutrition outcomes.</p>
                </div>
            </div>
            <div class="insight-card">
                <div class="insight-icon">📏</div>
                <div class="insight-content">
                    <h4>Growth Monitoring</h4>
                    <p>Child stunting rates are decreasing, with targeted nutrition programs showing positive impact.</p>
                </div>
            </div>
            <div class="insight-card">
                <div class="insight-icon">🩸</div>
                <div class="insight-content">
                    <h4>Anemia Prevention</h4>
                    <p>Iron supplementation programs are addressing anemia in both children and women of reproductive age.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/theme-toggle.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const nutritionChartData = {
        labels: <?= json_encode(array_column($nutritionData, 'indicator')) ?>,
        values: <?= json_encode(array_column($nutritionData, 'value')) ?>
    };
    
    const ctx = document.getElementById('nutritionChart').getContext('2d');
    let nutritionChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nutritionChartData.labels,
            datasets: [{
                label: 'Nutrition Indicators',
                data: nutritionChartData.values,
                backgroundColor: 'rgba(245, 158, 11, 0.8)',
                borderColor: 'rgb(245, 158, 11)',
                borderWidth: 2,
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.1)' } },
                x: { grid: { display: false } }
            }
        }
    });
    
    document.getElementById('chartType').addEventListener('change', function() {
        const newType = this.value;
        nutritionChart.destroy();
        
        nutritionChart = new Chart(ctx, {
            type: newType,
            data: {
                labels: nutritionChartData.labels,
                datasets: [{
                    label: 'Nutrition Indicators',
                    data: nutritionChartData.values,
                    backgroundColor: newType === 'pie' ? [
                        'rgba(245, 158, 11, 0.8)', 'rgba(34, 197, 94, 0.8)', 'rgba(59, 130, 246, 0.8)',
                        'rgba(239, 68, 68, 0.8)', 'rgba(168, 85, 247, 0.8)', 'rgba(236, 72, 153, 0.8)'
                    ] : 'rgba(245, 158, 11, 0.8)',
                    borderColor: 'rgb(245, 158, 11)',
                    borderWidth: 2,
                    borderRadius: newType === 'bar' ? 8 : 0,
                    tension: newType === 'line' ? 0.4 : 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: newType === 'pie' } },
                scales: newType === 'pie' ? {} : {
                    y: { beginAtZero: true, grid: { color: 'rgba(0, 0, 0, 0.1)' } },
                    x: { grid: { display: false } }
                }
            }
        });
    });
    
    window.refreshNutritionData = function() {
        const refreshBtn = document.querySelector('.refresh-btn');
        refreshBtn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" style="animation: spin 1s linear infinite;"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>Refreshing...';
        setTimeout(() => {
            refreshBtn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.65 6.35C16.2 4.9 14.21 4 12 4c-4.42 0-7.99 3.58-7.99 8s3.57 8 7.99 8c3.73 0 6.84-2.55 7.73-6h-2.08c-.82 2.33-3.04 4-5.65 4-3.31 0-6-2.69-6-6s2.69-6 6-6c1.66 0 3.14.69 4.22 1.78L13 11h7V4l-2.35 2.35z"/></svg>Refresh Data';
            nutritionChart.update();
        }, 1000);
    };
});

const style = document.createElement('style');
style.textContent = `
    @keyframes spin { from { transform: rotate(0deg); } to { transform: rotate(360deg); } }
    @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: 0.5; } }
`;
document.head.appendChild(style);
</script>

