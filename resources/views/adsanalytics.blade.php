<x-portal-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts Management') }}
        </h2>
    </x-slot>

    <main class="main-content">
 <!-- Analytics Dashboard for Classified Ads -->
<section class="analytics-dashboard">
    <div class="container-fluid">
        <!-- Breadcrumbs -->
        <div class="breadcrumbs-area">
            <ul>
                <li><a href="#">Home</a></li>
                <li class="separator">-</li>
                <li><a href="#">Dashboard</a></li>
                <li class="separator">-</li>
                <li class="active">Analytics</li>
            </ul>
        </div>

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1>Ads Analytics</h1>
                <p>Track your classified ads performance and insights</p>
            </div>
            <div class="header-actions">
                <select class="period-select">
                    <option value="7">Last 7 days</option>
                    <option value="30" selected>Last 30 days</option>
                    <option value="90">Last 90 days</option>
                    <option value="365">Last year</option>
                </select>
                <button class="btn-export">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                    </svg>
                    Export Report
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon total-ads">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3>Total Ads</h3>
                    <div class="stat-value">24</div>
                    <div class="stat-change positive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                        </svg>
                        <span>12% from last month</span>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon views">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3>Total Views</h3>
                    <div class="stat-value">8,547</div>
                    <div class="stat-change positive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                        </svg>
                        <span>24% from last month</span>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon messages">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3>Messages</h3>
                    <div class="stat-value">156</div>
                    <div class="stat-change positive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                        </svg>
                        <span>18% from last month</span>
                    </div>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon favorites">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                        <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                    </svg>
                </div>
                <div class="stat-content">
                    <h3>Favorites</h3>
                    <div class="stat-value">342</div>
                    <div class="stat-change positive">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
                        </svg>
                        <span>8% from last month</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="charts-row">
            <!-- Views Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Views Overview</h3>
                    <select class="chart-filter">
                        <option>Daily</option>
                        <option>Weekly</option>
                        <option selected>Monthly</option>
                    </select>
                </div>
                <div class="chart-container">
                    <canvas id="viewsChart"></canvas>
                </div>
            </div>

            <!-- Performance Chart -->
            <div class="chart-card">
                <div class="chart-header">
                    <h3>Engagement Metrics</h3>
                    <select class="chart-filter">
                        <option>This Week</option>
                        <option selected>This Month</option>
                        <option>This Year</option>
                    </select>
                </div>
                <div class="chart-container">
                    <canvas id="engagementChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Ads Performance Table -->
        <div class="performance-section">
            <div class="section-header">
                <h2>Your Ads Performance</h2>
                <div class="table-actions">
                    <div class="search-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <input type="text" placeholder="Search ads..." id="searchAds">
                    </div>
                    <select class="filter-select">
                        <option>All Status</option>
                        <option>Active</option>
                        <option>Pending</option>
                        <option>Expired</option>
                        <option>Sold</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="performance-table">
                    <thead>
                        <tr>
                            <th>Ad Title</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Views</th>
                            <th>Messages</th>
                            <th>Favorites</th>
                            <th>Status</th>
                            <th>Posted</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="adsTableBody">
                        <!-- Dynamic rows will be inserted here -->
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="pagination">
                <button class="page-btn" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    Previous
                </button>
                <div class="page-numbers">
                    <button class="page-number active">1</button>
                    <button class="page-number">2</button>
                    <button class="page-number">3</button>
                    <span>...</span>
                    <button class="page-number">10</button>
                </div>
                <button class="page-btn">
                    Next
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Top Performing Ads -->
        <div class="top-ads-section">
            <h2>Top Performing Ads</h2>
            <div class="top-ads-grid" id="topAdsGrid">
                <!-- Dynamic cards will be inserted here -->
            </div>
        </div>
    </div>
</section>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.analytics-dashboard {
    background: #f5f7fa;
    min-height: 100vh;
    padding: 30px 20px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}

.container-fluid {
    max-width: 1600px;
    margin: 0 auto;
}

/* Breadcrumbs */
.breadcrumbs-area {
    margin-bottom: 20px;
}

.breadcrumbs-area ul {
    list-style: none;
    display: flex;
    gap: 8px;
    align-items: center;
}

.breadcrumbs-area li {
    font-size: 14px;
    color: #6c757d;
}

.breadcrumbs-area a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumbs-area a:hover {
    color: #0056b3;
}

.separator {
    color: #dee2e6;
}

/* Page Header */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 20px;
}

.page-header h1 {
    font-size: 2rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 5px;
}

.page-header p {
    color: #6c757d;
    font-size: 0.95rem;
}

.header-actions {
    display: flex;
    gap: 12px;
    align-items: center;
}

.period-select,
.chart-filter,
.filter-select {
    padding: 10px 15px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    cursor: pointer;
    background: white;
    color: #495057;
}

.btn-export {
    padding: 10px 20px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-export:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

/* Stats Grid */
.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    display: flex;
    gap: 20px;
    align-items: center;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    transition: all 0.3s;
}

.stat-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    width: 60px;
    height: 60px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.stat-icon.total-ads {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
}

.stat-icon.views {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    color: white;
}

.stat-icon.messages {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    color: white;
}

.stat-icon.favorites {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
    color: white;
}

.stat-content {
    flex: 1;
}

.stat-content h3 {
    font-size: 14px;
    font-weight: 500;
    color: #6c757d;
    margin-bottom: 8px;
}

.stat-value {
    font-size: 2rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 8px;
}

.stat-change {
    display: flex;
    align-items: center;
    gap: 5px;
    font-size: 13px;
}

.stat-change.positive {
    color: #28a745;
}

.stat-change.negative {
    color: #dc3545;
}

/* Charts Row */
.charts-row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Reduced from 500px */
    gap: 20px;
    margin-bottom: 30px;
}

.chart-card {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
}

.chart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.chart-header h3 {
    font-size: 1.1rem;
    font-weight: 700;
    color: #212529;
}

.chart-container {
    height: 300px;
    position: relative;
}

/* Performance Section */
.performance-section {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
    margin-bottom: 30px;
}

.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    flex-wrap: wrap;
    gap: 15px;
}

.section-header h2 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #212529;
}

.table-actions {
    display: flex;
    gap: 12px;
}

.search-box {
    position: relative;
}

.search-box svg {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #adb5bd;
}

.search-box input {
    padding: 10px 15px 10px 40px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    width: 250px;
}

.search-box input:focus {
    border-color: #007bff;
}

/* Table */
.table-responsive {
    overflow-x: auto;
    margin-bottom: 20px;
}

.performance-table {
    width: 100%;
    border-collapse: collapse;
}

.performance-table thead {
    background: #f8f9fa;
}

.performance-table th {
    padding: 15px;
    text-align: left;
    font-size: 13px;
    font-weight: 600;
    color: #495057;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    border-bottom: 2px solid #e9ecef;
}

.performance-table td {
    padding: 15px;
    border-bottom: 1px solid #f1f3f5;
    font-size: 14px;
    color: #495057;
}

.performance-table tbody tr {
    transition: background 0.2s;
}

.performance-table tbody tr:hover {
    background: #f8f9fa;
}

.ad-title-cell {
    display: flex;
    align-items: center;
    gap: 12px;
}

.ad-thumb {
    width: 50px;
    height: 50px;
    border-radius: 8px;
    object-fit: cover;
    flex-shrink: 0;
}

.ad-title-text {
    font-weight: 600;
    color: #212529;
}

.status-badge {
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.status-badge.active {
    background: #d4edda;
    color: #155724;
}

.status-badge.pending {
    background: #fff3cd;
    color: #856404;
}

.status-badge.expired {
    background: #f8d7da;
    color: #721c24;
}

.status-badge.sold {
    background: #d1ecf1;
    color: #0c5460;
}

.metric-value {
    font-weight: 600;
    color: #212529;
}

.table-actions-btn {
    display: flex;
    gap: 8px;
}

.action-icon-btn {
    width: 32px;
    height: 32px;
    border: 1px solid #dee2e6;
    background: white;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    color: #6c757d;
}

.action-icon-btn:hover {
    background: #f8f9fa;
    border-color: #007bff;
    color: #007bff;
}

/* Pagination */
.pagination {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 15px;
}

.page-btn {
    padding: 10px 16px;
    border: 1px solid #dee2e6;
    background: white;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #495057;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.2s;
}

.page-btn:hover:not(:disabled) {
    background: #f8f9fa;
    border-color: #007bff;
    color: #007bff;
}

.page-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.page-numbers {
    display: flex;
    gap: 8px;
    align-items: center;
}

.page-number {
    width: 40px;
    height: 40px;
    border: 1px solid #dee2e6;
    background: white;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    color: #495057;
    cursor: pointer;
    transition: all 0.2s;
}

.page-number:hover {
    background: #f8f9fa;
    border-color: #007bff;
    color: #007bff;
}

.page-number.active {
    background: #007bff;
    color: white;
    border-color: #007bff;
}

/* Top Ads Section */
.top-ads-section {
    background: white;
    border-radius: 16px;
    padding: 25px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
}

.top-ads-section h2 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 20px;
}

.top-ads-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 20px;
}

.top-ad-card {
    border: 1px solid #e9ecef;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s;
    cursor: pointer;
}

.top-ad-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

.top-ad-image {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.top-ad-content {
    padding: 15px;
}

.top-ad-title {
    font-size: 15px;
    font-weight: 600;
    color: #212529;
    margin-bottom: 10px;
}

.top-ad-price {
    font-size: 18px;
    font-weight: 700;
    color: #28a745;
    margin-bottom: 12px;
}

.top-ad-stats {
    display: flex;
    justify-content: space-between;
    padding-top: 12px;
    border-top: 1px solid #f1f3f5;
}

.top-ad-stat {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
}

.top-ad-stat-label {
    font-size: 11px;
    color: #6c757d;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.top-ad-stat-value {
    font-size: 16px;
    font-weight: 700;
    color: #212529;
}

/* Responsive Design */
@media (max-width: 1200px) {
    .charts-row {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .page-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .header-actions {
        flex-direction: row; /* Keep horizontal on mobile */
        width: 100%;
    }
    
    .stats-grid {
         grid-template-columns: repeat(2, 1fr);
    }
    
    .table-responsive {
        font-size: 12px;
    }
    
    .performance-table th,
    .performance-table td {
        padding: 10px;
    }
   .section-header {
    flex-direction: row; /* Keep horizontal */
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
}
    .table-actions {
        width: 100%;
        flex-direction: column;
    }
    
    .search-box input {
        width: 100%;
    }
    
    .top-ads-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 480px) {
    .period-select {
        font-size: 13px;
        padding: 8px 12px;
    }
    .btn-export {
        padding: 10px 15px;
        font-size: 13px;
    }
    
    .btn-export svg {
        width: 14px;
        height: 14px;
    }
    .stats-grid {
        grid-template-columns: 1fr; /* Single column on very small screens */
    }
    .page-header h1 {
        font-size: 1.5rem;
    }
    
    .stat-value {
        font-size: 1.5rem;
    }
    
    .stat-icon {
        width: 50px;
        height: 50px;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Sample ads data
const adsData = [
    {
        id: 1,
        title: 'iPhone 14 Pro Max - 256GB Space Black',
        category: 'Electronics',
        price: 'KES 85,000',
        views: 1247,
        messages: 34,
        favorites: 89,
        status: 'active',
        posted: '2 days ago',
        image: 'https://via.placeholder.com/50'
    },
    {
        id: 2,
        title: 'Toyota Corolla 2020 - Excellent Condition',
        category: 'Vehicles',
        price: 'KES 1,850,000',
        views: 2156,
        messages: 56,
        favorites: 142,
        status: 'active',
        posted: '5 days ago',
        image: 'https://via.placeholder.com/50'
    },
    {
        id: 3,
        title: '3BR Apartment - Westlands, Nairobi',
        category: 'Real Estate',
        price: 'KES 55,000/mo',
        views: 876,
        messages: 23,
        favorites: 67,
        status: 'active',
        posted: '1 week ago',
        image: 'https://via.placeholder.com/50'
    },
    {
        id: 4,
        title: 'Samsung 55" 4K Smart TV',
        category: 'Electronics',
        price: 'KES 45,000',
        views: 543,
        messages: 12,
        favorites: 34,
        status: 'sold',
        posted: '3 days ago',
        image: 'https://via.placeholder.com/50'
    },
    {
        id: 5,
        title: 'MacBook Pro 16" 2023 M2',
        category: 'Electronics',
        price: 'KES 280,000',
        views: 1543,
        messages: 45,
        favorites: 112,
        status: 'active',
        posted: 'Yesterday',
        image: 'https://via.placeholder.com/50'
    },
    {
        id: 6,
        title: 'Honda CR-V 2019',
        category: 'Vehicles',
        price: 'KES 2,100,000',
        views: 965,
        messages: 28,
        favorites: 76,
        status: 'pending',
        posted: '4 days ago',
        image: 'https://via.placeholder.com/50'
    },
    {
        id: 7,
        title: 'Office Space - CBD, 200 sqm',
        category: 'Real Estate',
        price: 'KES 120,000/mo',
        views: 432,
        messages: 15,
        favorites: 45,
        status: 'active',
        posted: '1 week ago',
        image: 'https://via.placeholder.com/50'
    },
    {
        id: 8,
        title: 'PlayStation 5 with 2 Controllers',
        category: 'Electronics',
        price: 'KES 65,000',
        views: 789,
        messages: 21,
        favorites: 58,
        status: 'expired',
        posted: '2 weeks ago',
        image: 'https://via.placeholder.com/50'
    }
];

// Initialize dashboard
function initializeDashboard() {
    renderAdsTable();
    renderTopAds();
    initializeCharts();
}

// Render ads table
function renderAdsTable() {
    const tbody = document.getElementById('adsTableBody');
    tbody.innerHTML = '';
    
    adsData.forEach(ad => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>
                <div class="ad-title-cell">
                    <img src="${ad.image}" alt="${ad.title}" class="ad-thumb">
                    <span class="ad-title-text">${ad.title}</span>
                </div>
            </td>
            <td>${ad.category}</td>
            <td><strong>${ad.price}</strong></td>
            <td><span class="metric-value">${ad.views.toLocaleString()}</span></td>
            <td><span class="metric-value">${ad.messages}</span></td>
            <td><span class="metric-value">${ad.favorites}</span></td>
            <td><span class="status-badge ${ad.status}">${ad.status}</span></td>
            <td>${ad.posted}</td>
            <td>
                <div class="table-actions-btn">
                    <button class="action-icon-btn" title="View">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </button>
                    <button class="action-icon-btn" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                        </svg>
                    </button>
                    <button class="action-icon-btn" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </button>
                </div>
            </td>
        `;
        tbody.appendChild(row);
    });
}

// Render top ads
function renderTopAds() {
    const grid = document.getElementById('topAdsGrid');
    grid.innerHTML = '';
    
    const topAds = adsData.slice(0, 4);
    
    topAds.forEach(ad => {
        const card = document.createElement('div');
        card.className = 'top-ad-card';
        card.innerHTML = `
            <img src="https://via.placeholder.com/300x180" alt="${ad.title}" class="top-ad-image">
            <div class="top-ad-content">
                <h4 class="top-ad-title">${ad.title}</h4>
                <div class="top-ad-price">${ad.price}</div>
                <div class="top-ad-stats">
                    <div class="top-ad-stat">
                        <span class="top-ad-stat-label">Views</span>
                        <span class="top-ad-stat-value">${ad.views.toLocaleString()}</span>
                    </div>
                    <div class="top-ad-stat">
                        <span class="top-ad-stat-label">Messages</span>
                        <span class="top-ad-stat-value">${ad.messages}</span>
                    </div>
                    <div class="top-ad-stat">
                        <span class="top-ad-stat-label">Favorites</span>
                        <span class="top-ad-stat-value">${ad.favorites}</span>
                    </div>
                </div>
            </div>
        `;
        grid.appendChild(card);
    });
}

// Initialize charts
function initializeCharts() {
    // Views Chart
    const viewsCtx = document.getElementById('viewsChart').getContext('2d');
    new Chart(viewsCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Views',
                data: [1200, 1900, 3000, 2500, 3200, 4100, 3800, 4500, 5200, 6100, 7200, 8547],
                borderColor: '#667eea',
                backgroundColor: 'rgba(102, 126, 234, 0.1)',
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointBackgroundColor: '#667eea',
                pointBorderColor: '#fff',
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#212529',
                    padding: 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f3f5'
                    },
                    ticks: {
                        color: '#6c757d'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d'
                    }
                }
            }
        }
    });
    
    // Engagement Chart
    const engagementCtx = document.getElementById('engagementChart').getContext('2d');
    new Chart(engagementCtx, {
        type: 'bar',
        data: {
            labels: ['Views', 'Messages', 'Favorites', 'Clicks', 'Shares'],
            datasets: [{
                label: 'Engagement',
                data: [8547, 156, 342, 1234, 89],
                backgroundColor: [
                    'rgba(102, 126, 234, 0.8)',
                    'rgba(79, 172, 254, 0.8)',
                    'rgba(67, 233, 123, 0.8)',
                    'rgba(245, 87, 108, 0.8)',
                    'rgba(248, 147, 251, 0.8)'
                ],
                borderRadius: 8,
                barThickness: 40
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: '#212529',
                    padding: 12,
                    titleColor: '#fff',
                    bodyColor: '#fff',
                    displayColors: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f1f3f5'
                    },
                    ticks: {
                        color: '#6c757d'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        color: '#6c757d'
                    }
                }
            }
        }
    });
}

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchAds');
    if (searchInput) {
        searchInput.addEventListener('input', function(e) {
            const query = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#adsTableBody tr');
            
            rows.forEach(row => {
                const title = row.querySelector('.ad-title-text').textContent.toLowerCase();
                const category = row.cells[1].textContent.toLowerCase();
                
                if (title.includes(query) || category.includes(query)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});

// Initialize dashboard when DOM is ready
document.addEventListener('DOMContentLoaded', initializeDashboard);
</script>
    </main>

</x-portal-layout>