<x-portal-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Overview') }}
        </h2>
    </x-slot>

    <main class="main-content">
        <!-- Header Bar -->
        <div class="dashboard-header">
            <div class="header-left">
                <h1>Dashboard Overview</h1>
                <span class="last-updated">Last updated: Sep 23, 2025 02:45 AM</span>
            </div>
            <div class="header-actions">
                <button class="refresh-btn" onclick="refreshData()">
                    <i class="fas fa-sync-alt"></i> Refresh
                </button>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Alert Banner -->
        <div class="alert-notification" id="alertBanner">
            <i class="fas fa-info-circle"></i>
            <span>2 messages</span>
            <button class="close-alert" onclick="closeAlert()">×</button>
        </div>

        <!-- 6 Metric Cards Grid (Exact Structure from Screenshot) -->
        <div class="metrics-six-grid">
            <div class="metric-box">
                <div class="metric-icon-circle teal-bg">
                    <i class="fas fa-search"></i>
                </div>
                <div class="metric-info">
                    <div class="metric-number" id="reviewedListings">54</div>
                    <div class="metric-text">Reviewed Listings</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon-circle pink-bg">
                    <i class="fas fa-store"></i>
                </div>
                <div class="metric-info">
                    <div class="metric-number" id="activeListings">104</div>
                    <div class="metric-text">Active Listings</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon-circle green-bg">
                    <i class="fas fa-handshake"></i>
                </div>
                <div class="metric-info">
                    <div class="metric-number" id="successfulSales">23</div>
                    <div class="metric-text">Successful Sales</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon-circle blue-bg">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="metric-info">
                    <div class="metric-number" id="featuredAds">5</div>
                    <div class="metric-text">Featured Ads</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon-circle orange-bg">
                    <i class="fas fa-users"></i>
                </div>
                <div class="metric-info">
                    <div class="metric-number" id="activeUsers">14</div>
                    <div class="metric-text">Active Users</div>
                </div>
            </div>

            <div class="metric-box">
                <div class="metric-icon-circle purple-bg">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="metric-info">
                    <div class="metric-number" id="totalRevenue">KES 24,997,724</div>
                    <div class="metric-text">Total Revenue</div>
                </div>
            </div>
        </div>

        <!-- Secondary Row (4 boxes) -->
        <div class="secondary-metrics-grid">
            <div class="secondary-metric">
                <div class="secondary-icon orange-bg">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="secondary-content">
                    <div class="secondary-number" id="electronicsSold">7</div>
                    <div class="secondary-label">Electronics sold</div>
                </div>
            </div>

            <div class="secondary-metric">
                <div class="secondary-icon green-bg">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="secondary-content">
                    <div class="secondary-number" id="vehiclesSold">3</div>
                    <div class="secondary-label">Vehicles sold</div>
                </div>
            </div>

            <div class="secondary-metric">
                <div class="secondary-icon cyan-bg">
                    <i class="fas fa-tools"></i>
                </div>
                <div class="secondary-content">
                    <div class="secondary-number" id="servicesSold">13</div>
                    <div class="secondary-label">Services sold</div>
                </div>
            </div>

            <div class="secondary-metric">
                <div class="secondary-icon blue-bg">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="secondary-content">
                    <div class="secondary-number" id="premiumLeads">3</div>
                    <div class="secondary-label">Premium Leads</div>
                    <div class="secondary-sub">82.35% conversion</div>
                </div>
            </div>
        </div>

        <!-- Bottom Analytics Section -->
        <div class="bottom-analytics">
            <!-- Monthly Chart -->
            <div class="monthly-chart-section">
                <div class="chart-header">
                    <h3>Monthly Listing Analysis</h3>
                    <div class="chart-toggle">
                        <button class="toggle-btn active" onclick="toggleChart('line')">Line</button>
                        <button class="toggle-btn" onclick="toggleChart('bar')">Bar</button>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="monthlyChart" width="600" height="250"></canvas>
                    <div id="chartTooltip" class="chart-tooltip"></div>
                </div>
            </div>

            <!-- Donut Chart -->
            <div class="donut-chart-section">
                <div class="chart-header">
                    <h3>Top Ad Categories</h3>
                    <div class="export-buttons">
                        <button class="export-btn" onclick="exportData('csv')">Export</button>
                        <button class="export-btn" onclick="exportData('pdf')">PDF</button>
                    </div>
                </div>
                <div class="donut-container">
                    <div class="donut-chart-wrapper">
                        <canvas id="donutChart" width="160" height="160"></canvas>
                        <div id="donutTooltip" class="donut-tooltip"></div>
                    </div>
                    <div class="donut-legend">
                        <div class="legend-row" data-category="electronics" onclick="toggleCategory('electronics')">
                            <div class="legend-left">
                                <div class="legend-dot electronics"></div>
                                <span class="legend-label">ELECTRONICS</span>
                            </div>
                            <span class="legend-value">24 units</span>
                        </div>
                        <div class="legend-row" data-category="vehicles" onclick="toggleCategory('vehicles')">
                            <div class="legend-left">
                                <div class="legend-dot vehicles"></div>
                                <span class="legend-label">VEHICLES</span>
                            </div>
                            <span class="legend-value">18 units</span>
                        </div>
                        <div class="legend-row" data-category="services" onclick="toggleCategory('services')">
                            <div class="legend-left">
                                <div class="legend-dot services"></div>
                                <span class="legend-label">SERVICES</span>
                            </div>
                            <span class="legend-value">15 units</span>
                        </div>
                        <div class="legend-row" data-category="real-estate" onclick="toggleCategory('real-estate')">
                            <div class="legend-left">
                                <div class="legend-dot real-estate"></div>
                                <span class="legend-label">REAL ESTATE</span>
                            </div>
                            <span class="legend-value">22 units</span>
                        </div>
                        <div class="legend-row" data-category="other" onclick="toggleCategory('other')">
                            <div class="legend-left">
                                <div class="legend-dot other"></div>
                                <span class="legend-label">OTHER</span>
                            </div>
                            <span class="legend-value">21 units</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        /* Reset and Base */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .main-content {
            padding: 20px;
            background: #f8fafc;
            min-height: 100vh;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* Dashboard Header */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            color: #1f2937;
        }

        .header-left h1 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .last-updated {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .header-actions {
            display: flex;
            gap: 10px;
        }

        .refresh-btn, .logout-btn {
            padding: 8px 16px;
            border: 1px solid #d1d5db;
            background: #3b82f6;
            color: white;
            border-radius: 6px;
            font-size: 0.875rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s;
        }

        .refresh-btn:hover {
            background: #2563eb;
        }

        .logout-btn {
            background: #ef4444;
        }

        .logout-btn:hover {
            background: #dc2626;
        }

        /* Alert */
        .alert-notification {
            background: #0891b2;
            color: white;
            padding: 12px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.3s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .close-alert {
            margin-left: auto;
            background: none;
            border: none;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 2px 6px;
            border-radius: 3px;
            transition: background-color 0.2s;
        }

        .close-alert:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* 6 Metrics Grid - Changed to White Background */
        .metrics-six-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .metric-box {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            color: #1f2937;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .metric-box:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .metric-icon-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: white;
        }

        .teal-bg { background: #0891b2; }
        .pink-bg { background: #ec4899; }
        .green-bg { background: #10b981; }
        .blue-bg { background: #3b82f6; }
        .orange-bg { background: #f97316; }
        .purple-bg { background: #8b5cf6; }

        .metric-number {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .metric-text {
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* Secondary Metrics - Changed to White Background */
        .secondary-metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .secondary-metric {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #1f2937;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .secondary-metric:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .secondary-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.1rem;
            color: white;
        }

        .cyan-bg { background: #06b6d4; }

        .secondary-number {
            font-size: 1.5rem;
            font-weight: 700;
        }

        .secondary-label {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .secondary-sub {
            font-size: 0.75rem;
            color: #10b981;
            margin-top: 2px;
        }

        /* Bottom Analytics - Minimal Clean Style */
        .bottom-analytics {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 20px;
        }

        .monthly-chart-section, .donut-chart-section {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 24px;
            color: #1f2937;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-header h3 {
            font-size: 1rem;
            font-weight: 500;
            color: #374151;
        }

        .chart-toggle, .export-buttons {
            display: flex;
            gap: 4px;
            background: #f8fafc;
            padding: 2px;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }

        .toggle-btn, .export-btn {
            padding: 6px 12px;
            border: none;
            background: transparent;
            color: #6b7280;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .toggle-btn:hover, .export-btn:hover {
            background: #e5e7eb;
            color: #374151;
        }

        .toggle-btn.active {
            background: #3b82f6;
            color: white;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Chart Container */
        .chart-container {
            position: relative;
            height: 280px;
            background: #fafbfc;
            border-radius: 8px;
            padding: 20px;
        }

        #monthlyChart {
            background: transparent;
        }

        /* Tooltip Styles */
        .chart-tooltip, .donut-tooltip {
            position: absolute;
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 500;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.2s ease;
            z-index: 1000;
            white-space: nowrap;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .chart-tooltip::after, .donut-tooltip::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
            border: 5px solid transparent;
            border-top-color: rgba(0, 0, 0, 0.9);
        }

        .chart-tooltip.show, .donut-tooltip.show {
            opacity: 1;
        }

        /* Donut Chart Section */
        .donut-container {
            display: flex;
            align-items: flex-start;
            gap: 40px;
            margin-top: 10px;
        }

        .donut-chart-wrapper {
            position: relative;
            flex-shrink: 0;
        }

        .donut-legend {
            display: flex;
            flex-direction: column;
            gap: 16px;
            flex: 1;
        }

        .legend-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 0;
            cursor: pointer;
            border-radius: 6px;
            transition: all 0.2s ease;
            position: relative;
        }

        .legend-row:hover {
            background: #f8fafc;
            transform: translateX(4px);
        }

        .legend-row.dimmed {
            opacity: 0.4;
        }

        .legend-row.highlighted {
            background: #f0f9ff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .legend-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .legend-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }

        .legend-row:hover .legend-dot {
            transform: scale(1.2);
        }

        .legend-dot.electronics { background: #10b981; }
        .legend-dot.vehicles { background: #06b6d4; }
        .legend-dot.services { background: #8b5cf6; }
        .legend-dot.real-estate { background: #f59e0b; }
        .legend-dot.other { background: #ef4444; }

        .legend-label {
            font-size: 0.875rem;
            color: #6b7280;
            text-transform: uppercase;
            font-weight: 500;
            letter-spacing: 0.025em;
        }

        .legend-value {
            font-size: 0.875rem;
            font-weight: 600;
            color: #1f2937;
        }

        /* Loading Animation */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        .refresh-btn.loading i {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Chart Animation */
        @keyframes chartFadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .chart-container canvas {
            animation: chartFadeIn 0.5s ease-out;
        }

        /* Responsive */
        @media (max-width: 1200px) {
            .metrics-six-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .secondary-metrics-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .metrics-six-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .secondary-metrics-grid {
                grid-template-columns: 1fr;
            }
            
            .bottom-analytics {
                grid-template-columns: 1fr;
            }
            
            .donut-container {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>

    <script>
        // Chart Type State
        let currentChartType = 'line';
        let hoveredBarIndex = -1;
        let hoveredSegmentIndex = -1;
        let hiddenCategories = new Set();
        
        // Sample data for charts
        const monthlyData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            values: [2000, 3000, 4000, 5000, 5500, 6000, 6500, 7000, 9000, 0, 0, 0]
        };

        const donutData = [
            { label: 'Electronics', value: 24, color: '#10b981', key: 'electronics' },
            { label: 'Vehicles', value: 18, color: '#06b6d4', key: 'vehicles' },
            { label: 'Services', value: 15, color: '#8b5cf6', key: 'services' },
            { label: 'Real Estate', value: 22, color: '#f59e0b', key: 'real-estate' },
            { label: 'Other', value: 21, color: '#ef4444', key: 'other' }
        ];

        // Initialize charts when page loads
        document.addEventListener('DOMContentLoaded', function() {
            setupChartInteractions();
            drawMonthlyChart();
            drawDonutChart();
        });

        // Setup Chart Interactions
        function setupChartInteractions() {
            const monthlyCanvas = document.getElementById('monthlyChart');
            const donutCanvas = document.getElementById('donutChart');
            
            // Monthly chart interactions
            monthlyCanvas.addEventListener('mousemove', handleMonthlyChartHover);
            monthlyCanvas.addEventListener('mouseleave', hideMonthlyTooltip);
            monthlyCanvas.addEventListener('click', handleMonthlyChartClick);
            
            // Donut chart interactions
            donutCanvas.addEventListener('mousemove', handleDonutChartHover);
            donutCanvas.addEventListener('mouseleave', hideDonutTooltip);
            donutCanvas.addEventListener('click', handleDonutChartClick);
        }

        // Monthly Chart Drawing Function with Interactivity
        function drawMonthlyChart() {
            const canvas = document.getElementById('monthlyChart');
            const ctx = canvas.getContext('2d');
            
            // Clear canvas
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            // Set canvas size to match container
            const rect = canvas.getBoundingClientRect();
            const dpr = window.devicePixelRatio || 1;
            canvas.width = rect.width * dpr;
            canvas.height = rect.height * dpr;
            canvas.style.width = rect.width + 'px';
            canvas.style.height = rect.height + 'px';
            ctx.scale(dpr, dpr);
            
            const width = rect.width;
            const height = rect.height;
            
            // Chart dimensions with more padding
            const padding = { left: 40, right: 20, top: 20, bottom: 40 };
            const chartWidth = width - padding.left - padding.right;
            const chartHeight = height - padding.top - padding.bottom;
            
            // Find max value and create nice scale
            const maxValue = Math.max(...monthlyData.values);
            const niceMax = Math.ceil(maxValue / 1000) * 1000;
            const steps = 5;
            const stepSize = niceMax / steps;
            
            // Draw grid lines (very subtle)
            ctx.strokeStyle = '#f1f5f9';
            ctx.lineWidth = 1;
            for (let i = 0; i <= steps; i++) {
                const y = padding.top + (chartHeight / steps) * i;
                ctx.beginPath();
                ctx.moveTo(padding.left, y);
                ctx.lineTo(width - padding.right, y);
                ctx.stroke();
            }
            
            // Draw Y-axis labels
            ctx.font = '11px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#9ca3af';
            ctx.textAlign = 'right';
            ctx.textBaseline = 'middle';
            for (let i = 0; i <= steps; i++) {
                const y = padding.top + (chartHeight / steps) * (steps - i);
                const value = (stepSize * i / 1000).toFixed(0) + 'K';
                ctx.fillText(value, padding.left - 8, y);
            }
            
            const barWidth = chartWidth / monthlyData.labels.length;
            
            if (currentChartType === 'bar') {
                // Draw bars with hover effects
                monthlyData.values.forEach((value, index) => {
                    if (value > 0) {
                        const barHeight = (value / niceMax) * chartHeight;
                        const x = padding.left + (barWidth * index) + barWidth * 0.3;
                        const y = height - padding.bottom - barHeight;
                        const actualBarWidth = barWidth * 0.4;
                        
                        // Bar color with hover effect
                        const isHovered = hoveredBarIndex === index;
                        let barColor;
                        if (isHovered) {
                            barColor = index === 8 ? '#1d4ed8' : '#059669'; // Darker on hover
                        } else {
                            barColor = index === 8 ? '#3b82f6' : '#10b981';
                        }
                        
                        // Add glow effect on hover
                        if (isHovered) {
                            ctx.shadowColor = barColor;
                            ctx.shadowBlur = 10;
                            ctx.shadowOffsetX = 0;
                            ctx.shadowOffsetY = 0;
                        }
                        
                        ctx.fillStyle = barColor;
                        
                        // Draw rounded rectangle with animation effect
                        ctx.beginPath();
                        ctx.roundRect(x, y, actualBarWidth, barHeight, [3, 3, 0, 0]);
                        ctx.fill();
                        
                        // Reset shadow
                        ctx.shadowBlur = 0;
                    }
                });
            } else {
                // Draw smooth line chart with hover effects
                const points = [];
                monthlyData.values.forEach((value, index) => {
                    if (value > 0) {
                        const x = padding.left + (barWidth * index) + barWidth / 2;
                        const y = height - padding.bottom - (value / niceMax) * chartHeight;
                        points.push({ x, y, value, index });
                    }
                });
                
                if (points.length > 1) {
                    // Draw line
                    ctx.strokeStyle = '#10b981';
                    ctx.lineWidth = 2.5;
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';
                    
                    ctx.beginPath();
                    ctx.moveTo(points[0].x, points[0].y);
                    
                    // Create smooth curve
                    for (let i = 1; i < points.length; i++) {
                        const prevPoint = points[i - 1];
                        const currentPoint = points[i];
                        
                        if (i === 1) {
                            ctx.lineTo(currentPoint.x, currentPoint.y);
                        } else {
                            const cpx = (prevPoint.x + currentPoint.x) / 2;
                            ctx.quadraticCurveTo(prevPoint.x, prevPoint.y, cpx, (prevPoint.y + currentPoint.y) / 2);
                            if (i === points.length - 1) {
                                ctx.quadraticCurveTo(cpx, (prevPoint.y + currentPoint.y) / 2, currentPoint.x, currentPoint.y);
                            }
                        }
                    }
                    ctx.stroke();
                    
                    // Draw dots with hover effects
                    points.forEach((point) => {
                        const isHovered = hoveredBarIndex === point.index;
                        const dotSize = isHovered ? 6 : (point.index === 8 ? 5 : 4);
                        
                        // Add glow effect on hover
                        if (isHovered) {
                            ctx.shadowColor = point.index === 8 ? '#3b82f6' : '#10b981';
                            ctx.shadowBlur = 8;
                            ctx.shadowOffsetX = 0;
                            ctx.shadowOffsetY = 0;
                        }
                        
                        ctx.fillStyle = point.index === 8 ? '#3b82f6' : '#10b981';
                        ctx.beginPath();
                        ctx.arc(point.x, point.y, dotSize, 0, 2 * Math.PI);
                        ctx.fill();
                        
                        // Add white border to dots
                        ctx.strokeStyle = '#ffffff';
                        ctx.lineWidth = 2;
                        ctx.stroke();
                        
                        // Reset shadow
                        ctx.shadowBlur = 0;
                    });
                }
            }
            
            // Draw X-axis labels
            ctx.font = '11px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#9ca3af';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'top';
            monthlyData.labels.forEach((label, index) => {
                const x = padding.left + (barWidth * index) + barWidth / 2;
                const y = height - padding.bottom + 12;
                
                // Highlight hovered month label
                if (hoveredBarIndex === index) {
                    ctx.fillStyle = '#1f2937';
                    ctx.font = 'bold 11px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
                } else {
                    ctx.fillStyle = '#9ca3af';
                    ctx.font = '11px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
                }
                
                ctx.fillText(label, x, y);
            });
        }

        // Donut Chart Drawing Function with Interactivity
        function drawDonutChart() {
            const canvas = document.getElementById('donutChart');
            const ctx = canvas.getContext('2d');
            
            // Set canvas size
            const size = 160;
            const dpr = window.devicePixelRatio || 1;
            canvas.width = size * dpr;
            canvas.height = size * dpr;
            canvas.style.width = size + 'px';
            canvas.style.height = size + 'px';
            ctx.scale(dpr, dpr);
            
            const centerX = size / 2;
            const centerY = size / 2;
            const radius = 55;
            const innerRadius = 35;
            
            let currentAngle = -Math.PI / 2; // Start at top
            
            // Calculate total for visible segments
            const visibleData = donutData.filter(segment => !hiddenCategories.has(segment.key));
            const total = visibleData.reduce((sum, segment) => sum + segment.value, 0);
            
            if (total === 0) {
                // Draw empty state
                ctx.fillStyle = '#e5e7eb';
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                ctx.arc(centerX, centerY, innerRadius, 0, 2 * Math.PI, true);
                ctx.fill();
                
                ctx.font = 'bold 14px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
                ctx.fillStyle = '#9ca3af';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText('No Data', centerX, centerY);
                return;
            }
            
            // Draw donut segments with hover effects
            visibleData.forEach((segment, index) => {
                const sliceAngle = (segment.value / total) * 2 * Math.PI;
                const isHovered = hoveredSegmentIndex === donutData.indexOf(segment);
                const segmentRadius = isHovered ? radius + 3 : radius;
                
                // Add glow effect on hover
                if (isHovered) {
                    ctx.save();
                    ctx.shadowColor = segment.color;
                    ctx.shadowBlur = 10;
                    ctx.shadowOffsetX = 0;
                    ctx.shadowOffsetY = 0;
                }
                
                // Outer arc
                ctx.beginPath();
                ctx.arc(centerX, centerY, segmentRadius, currentAngle, currentAngle + sliceAngle);
                ctx.arc(centerX, centerY, innerRadius, currentAngle + sliceAngle, currentAngle, true);
                ctx.closePath();
                
                // Segment color with opacity for hidden states
                let fillColor = segment.color;
                if (hiddenCategories.size > 0 && !hiddenCategories.has(segment.key)) {
                    // Make visible segments more prominent when others are hidden
                    ctx.globalAlpha = 1;
                } else if (hiddenCategories.has(segment.key)) {
                    ctx.globalAlpha = 0.3;
                } else {
                    ctx.globalAlpha = isHovered ? 1 : 0.9;
                }
                
                ctx.fillStyle = fillColor;
                ctx.fill();
                
                if (isHovered) {
                    ctx.restore();
                }
                
                ctx.globalAlpha = 1;
                currentAngle += sliceAngle;
            });
            
            // Draw center circle (white with subtle shadow)
            ctx.save();
            ctx.shadowColor = 'rgba(0,0,0,0.08)';
            ctx.shadowBlur = 8;
            ctx.shadowOffsetX = 0;
            ctx.shadowOffsetY = 2;
            
            ctx.beginPath();
            ctx.arc(centerX, centerY, innerRadius, 0, 2 * Math.PI);
            ctx.fillStyle = '#ffffff';
            ctx.fill();
            ctx.restore();
            
            // Draw center text
            const percentage = Math.round((total / donutData.reduce((sum, s) => sum + s.value, 0)) * 100);
            ctx.font = 'bold 18px -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif';
            ctx.fillStyle = '#1f2937';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(percentage + '%', centerX, centerY);
        }

        // Handle Monthly Chart Hover
        function handleMonthlyChartHover(event) {
            const canvas = document.getElementById('monthlyChart');
            const rect = canvas.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            const padding = { left: 40, right: 20, top: 20, bottom: 40 };
            const chartWidth = rect.width - padding.left - padding.right;
            const barWidth = chartWidth / monthlyData.labels.length;
            
            let newHoveredIndex = -1;
            
            // Check if hovering over a data point
            for (let i = 0; i < monthlyData.values.length; i++) {
                if (monthlyData.values[i] > 0) {
                    const barX = padding.left + (barWidth * i);
                    const barEndX = barX + barWidth;
                    
                    if (x >= barX && x <= barEndX && y >= padding.top && y <= rect.height - padding.bottom) {
                        newHoveredIndex = i;
                        break;
                    }
                }
            }
            
            if (newHoveredIndex !== hoveredBarIndex) {
                hoveredBarIndex = newHoveredIndex;
                drawMonthlyChart();
                
                if (hoveredBarIndex !== -1) {
                    showMonthlyTooltip(event, hoveredBarIndex);
                } else {
                    hideMonthlyTooltip();
                }
            }
        }

        // Handle Donut Chart Hover
        function handleDonutChartHover(event) {
            const canvas = document.getElementById('donutChart');
            const rect = canvas.getBoundingClientRect();
            const x = event.clientX - rect.left;
            const y = event.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            const radius = 55;
            const innerRadius = 35;
            
            const dx = x - centerX;
            const dy = y - centerY;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            let newHoveredIndex = -1;
            
            if (distance >= innerRadius && distance <= radius) {
                let angle = Math.atan2(dy, dx);
                if (angle < -Math.PI / 2) angle += 2 * Math.PI;
                angle += Math.PI / 2; // Adjust for starting position
                
                const visibleData = donutData.filter(segment => !hiddenCategories.has(segment.key));
                const total = visibleData.reduce((sum, segment) => sum + segment.value, 0);
                
                let currentAngle = 0;
                for (let i = 0; i < visibleData.length; i++) {
                    const segment = visibleData[i];
                    const sliceAngle = (segment.value / total) * 2 * Math.PI;
                    
                    if (angle >= currentAngle && angle <= currentAngle + sliceAngle) {
                        newHoveredIndex = donutData.indexOf(segment);
                        break;
                    }
                    currentAngle += sliceAngle;
                }
            }
            
            if (newHoveredIndex !== hoveredSegmentIndex) {
                hoveredSegmentIndex = newHoveredIndex;
                drawDonutChart();
                updateLegendHighlight();
                
                if (hoveredSegmentIndex !== -1) {
                    showDonutTooltip(event, hoveredSegmentIndex);
                } else {
                    hideDonutTooltip();
                }
            }
        }

        // Show Monthly Chart Tooltip
        function showMonthlyTooltip(event, index) {
            const tooltip = document.getElementById('chartTooltip');
            const value = monthlyData.values[index];
            const month = monthlyData.labels[index];
            
            tooltip.innerHTML = `<strong>${month}</strong><br>${value.toLocaleString()} listings`;
            tooltip.classList.add('show');
            
            const rect = document.getElementById('monthlyChart').getBoundingClientRect();
            tooltip.style.left = (event.clientX - rect.left - tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = (event.clientY - rect.top - tooltip.offsetHeight - 10) + 'px';
        }

        // Show Donut Chart Tooltip
        function showDonutTooltip(event, index) {
            const tooltip = document.getElementById('donutTooltip');
            const segment = donutData[index];
            const total = donutData.reduce((sum, s) => sum + s.value, 0);
            const percentage = ((segment.value / total) * 100).toFixed(1);
            
            tooltip.innerHTML = `<strong>${segment.label}</strong><br>${segment.value} units (${percentage}%)`;
            tooltip.classList.add('show');
            
            const rect = document.getElementById('donutChart').getBoundingClientRect();
            tooltip.style.left = (event.clientX - rect.left - tooltip.offsetWidth / 2) + 'px';
            tooltip.style.top = (event.clientY - rect.top - tooltip.offsetHeight - 10) + 'px';
        }

        // Hide Tooltips
        function hideMonthlyTooltip() {
            document.getElementById('chartTooltip').classList.remove('show');
        }

        function hideDonutTooltip() {
            document.getElementById('donutTooltip').classList.remove('show');
        }

        // Handle Chart Clicks
        function handleMonthlyChartClick(event) {
            if (hoveredBarIndex !== -1) {
                const month = monthlyData.labels[hoveredBarIndex];
                const value = monthlyData.values[hoveredBarIndex];
                alert(`Detailed view for ${month}: ${value.toLocaleString()} listings`);
            }
        }

        function handleDonutChartClick(event) {
            if (hoveredSegmentIndex !== -1) {
                const segment = donutData[hoveredSegmentIndex];
                alert(`Detailed view for ${segment.label}: ${segment.value} units`);
            }
        }

        // Toggle Category Visibility
        function toggleCategory(categoryKey) {
            if (hiddenCategories.has(categoryKey)) {
                hiddenCategories.delete(categoryKey);
            } else {
                hiddenCategories.add(categoryKey);
            }
            
            drawDonutChart();
            updateLegendHighlight();
        }

        // Update Legend Highlight
        function updateLegendHighlight() {
            document.querySelectorAll('.legend-row').forEach((row, index) => {
                const categoryKey = row.getAttribute('data-category');
                
                row.classList.remove('dimmed', 'highlighted');
                
                if (hiddenCategories.has(categoryKey)) {
                    row.classList.add('dimmed');
                } else if (hoveredSegmentIndex === index) {
                    row.classList.add('highlighted');
                } else if (hiddenCategories.size > 0) {
                    // Make visible items more prominent when some are hidden
                    row.style.opacity = '1';
                }
            });
        }

        // Toggle Chart Type with Animation
        function toggleChart(type) {
            if (type === currentChartType) return;
            
            currentChartType = type;
            hoveredBarIndex = -1; // Reset hover state
            
            // Update button states
            document.querySelectorAll('.toggle-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Add fade out animation
            const canvas = document.getElementById('monthlyChart');
            canvas.style.opacity = '0.5';
            
            setTimeout(() => {
                drawMonthlyChart();
                canvas.style.opacity = '1';
            }, 150);
        }

        // Refresh Data Function with Animation
        function refreshData() {
            const btn = document.querySelector('.refresh-btn');
            btn.classList.add('loading');
            
            // Simulate data refresh
            setTimeout(() => {
                // Update some random values with animation
                animateValueChange('reviewedListings', Math.floor(Math.random() * 20) + 50);
                animateValueChange('activeListings', Math.floor(Math.random() * 20) + 100);
                animateValueChange('successfulSales', Math.floor(Math.random() * 10) + 20);
                
                // Update chart data
                for (let i = 0; i < 9; i++) {
                    monthlyData.values[i] = Math.floor(Math.random() * 2000) + 3000;
                }
                
                // Update timestamp
                const now = new Date();
                document.querySelector('.last-updated').textContent = 
                    `Last updated: ${now.toLocaleDateString()} ${now.toLocaleTimeString()}`;
                
                btn.classList.remove('loading');
                
                // Redraw charts with animation
                setTimeout(() => {
                    drawMonthlyChart();
                    drawDonutChart();
                }, 200);
            }, 1500);
        }

        // Animate Value Change
        function animateValueChange(elementId, newValue) {
            const element = document.getElementById(elementId);
            const currentValue = parseInt(element.textContent);
            const difference = newValue - currentValue;
            const steps = 20;
            const stepValue = difference / steps;
            let currentStep = 0;
            
            const animation = setInterval(() => {
                currentStep++;
                const displayValue = Math.round(currentValue + (stepValue * currentStep));
                element.textContent = displayValue;
                
                if (currentStep >= steps) {
                    clearInterval(animation);
                    element.textContent = newValue;
                }
            }, 50);
        }

        // Close Alert
        function closeAlert() {
            const alert = document.getElementById('alertBanner');
            alert.style.animation = 'slideOut 0.3s ease-in';
            setTimeout(() => {
                alert.style.display = 'none';
            }, 300);
        }

        // Export Functions
        function exportData(type) {
            if (type === 'csv') {
                // Create CSV content
                let csvContent = "Month,Value\n";
                monthlyData.labels.forEach((month, index) => {
                    csvContent += `${month},${monthlyData.values[index]}\n`;
                });
                
                // Download CSV
                const blob = new Blob([csvContent], { type: 'text/csv' });
                const url = window.URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'dashboard-data.csv';
                a.click();
                window.URL.revokeObjectURL(url);
            } else if (type === 'pdf') {
                // Simulate PDF generation
                alert('PDF export functionality would be implemented with a PDF library like jsPDF');
            }
        }

        // Add slideOut animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideOut {
                from {
                    opacity: 1;
                    transform: translateY(0);
                }
                to {
                    opacity: 0;
                    transform: translateY(-20px);
                }
            }
        `;
        document.head.appendChild(style);

        // Animate metric boxes on load
        document.addEventListener('DOMContentLoaded', function() {
            const metricBoxes = document.querySelectorAll('.metric-box, .secondary-metric');
            metricBoxes.forEach((box, index) => {
                box.style.opacity = '0';
                box.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    box.style.transition = 'all 0.5s ease';
                    box.style.opacity = '1';
                    box.style.transform = 'translateY(0)';
                }, index * 100);
            });
        });
    </script>
</x-portal-layout>