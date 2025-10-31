<x-portal-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Locations Management') }}
        </h2>
    </x-slot>

    <main class="main-content">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-left">
                <h1>Business Locations</h1>
                <p>Manage your business locations with Google Maps integration</p>
            </div>
             <div class="header-actions">
                <button class="action-btn filter-btn" onclick="toggleFilters()">
                    <i class="fas fa-filter"></i>
                    <span>Filters</span>
                </button>
                <button class="action-btn" onclick="openAllLocationsMap()">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>View All on Map</span>
                </button>
                <button class="action-btn primary-btn" onclick="openCreateModal()">
                    <i class="fas fa-plus"></i>
                    <span>New Location</span>
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="quick-stats-grid">
            <div class="stat-card">
                <div class="stat-icon active">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="activeCount">0</div>
                    <div class="stat-label">Active Locations</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="pendingCount">0</div>
                    <div class="stat-label">Pending Review</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon draft">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="draftCount">0</div>
                    <div class="stat-label">Drafts</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon expired">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="totalCount">0</div>
                    <div class="stat-label">Total Locations</div>
                </div>
            </div>
        </div>

        <!-- Filters Panel -->
        <div class="filters-panel" id="filtersPanel">
            <div class="filters-content">
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select class="filter-select" id="statusFilter">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="pending">Pending Review</option>
                        <option value="draft">Draft</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Search</label>
                    <input type="text" class="filter-input" id="searchFilter" placeholder="Search locations...">
                </div>
                <div class="filter-actions">
                    <button class="filter-btn secondary" onclick="clearFilters()">Clear</button>
                    <button class="filter-btn primary" onclick="applyFilters()">Apply</button>
                </div>
            </div>
        </div>

        <!-- Locations Table Container -->
        <div class="table-container">
            <div class="table-header">
                <div class="table-controls">
                    <div class="bulk-actions">
                        <input type="checkbox" id="selectAll" class="bulk-checkbox">
                        <select class="bulk-select" id="bulkActions" disabled>
                            <option value="">Bulk Actions</option>
                            <option value="activate">Activate</option>
                            <option value="deactivate">Deactivate</option>
                            <option value="delete">Delete</option>
                        </select>
                        <button class="apply-bulk-btn" disabled onclick="applyBulkAction()">Apply</button>
                    </div>
                    <div class="table-info">
                        <span id="tableInfo">Loading...</span>
                    </div>
                </div>
            </div>

            <!-- HTML Table -->
            <div class="table-wrapper">
                <table class="posts-table" id="locationsTable">
                    <thead>
                        <tr>
                            <th width="40">
                                <input type="checkbox" id="selectAllHeader" class="bulk-checkbox">
                            </th>
                            <th width="280">Business Name</th>  
                            <th width="120">Latitude</th>
                            <th width="120">Longitude</th>
                            <th width="90">Status</th>
                            <th width="90">Date</th>
                            <th width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="locationsTableBody">
                        <!-- Locations will be loaded here via JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- Loading State -->
            <div class="loading-state" id="loadingState" style="display: none;">
                <div class="loading-spinner">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
                <p>Loading locations...</p>
            </div>

            <!-- Empty State -->
            <div class="empty-state" id="emptyState" style="display: none;">
                <div class="empty-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>No locations found</h3>
                <p>Add your first business location to get started</p>
                <button class="action-btn primary-btn" onclick="openCreateModal()">
                    <i class="fas fa-plus"></i>
                    <span>Add Location</span>
                </button>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <div class="pagination-info">
                <span id="paginationInfo">Loading...</span>
            </div>
            <div class="pagination-controls" id="paginationControls">
                <!-- Pagination buttons will be generated by JavaScript -->
            </div>
        </div>

        <!-- Create/Edit Modal -->
        <div class="modal-overlay" id="locationModal">
            <div class="modal-container" style="max-width: 900px;">
                <div class="modal-header">
                    <h3 id="modalTitle">Add New Location</h3>
                    <button class="modal-close" onclick="closeModal()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="locationForm">
                        <input type="hidden" id="locationId" name="id">
                        
                        <!-- Business Name -->
                        <div class="form-group full-width">
                            <label class="form-label">Business Name *</label>
                            <input type="text" id="businessName" name="business_name" class="form-input" placeholder="Enter business name" required>
                        </div>
                    
                        
                        <!-- Google Maps Location Picker -->
                        <div class="form-group full-width">
                            <label class="form-label">Pin Exact Location on Map *</label>
                            <input type="text" id="mapSearch" class="form-input" placeholder="Search for your business location or building...">
                            <div id="map" style="width: 100%; height: 400px; margin-top: 10px; border-radius: 8px; border: 1px solid #d1d5db;"></div>
                            <small style="color: #6b7280; font-size: 0.75rem; margin-top: 8px; display: block;">
                                <i class="fas fa-info-circle"></i> Click on the map, drag the marker, or search to set your exact business location
                            </small>
                        </div>

                        <!-- Coordinates Display -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Latitude</label>
                                <input type="text" id="latitude" name="latitude" class="form-input" readonly placeholder="Auto-filled from map">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Longitude</label>
                                <input type="text" id="longitude" name="longitude" class="form-input" readonly placeholder="Auto-filled from map">
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <div class="form-group full-width">
                            <label class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-textarea" rows="3" placeholder="Additional details about this location"></textarea>
                        </div>
                        
                        <!-- Status -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Status</label>
                                <select id="locationStatus" name="status" class="form-select">
                                    <option value="draft">Draft</option>
                                    <option value="active">Active</option>
                                    <option value="pending">Pending Review</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="modal-btn secondary" onclick="closeModal()">Cancel</button>
                    <button class="modal-btn primary" onclick="saveLocation()">
                        <i class="fas fa-save"></i>
                        <span id="saveButtonText">Save Location</span>
                    </button>
                </div>
            </div>
        </div>
         <!-- All Locations Map Modal -->
        <div class="modal-overlay" id="allLocationsMapModal">
            <div class="modal-container" style="max-width: 1200px;">
                <div class="modal-header">
                    <h3>All Business Locations</h3>
                    <button class="modal-close" onclick="closeAllLocationsMap()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="allLocationsMap" style="width: 100%; height: 600px; border-radius: 8px;"></div>
                    <div style="margin-top: 16px; padding: 16px; background: #f9fafb; border-radius: 8px;">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <strong style="color: #374151;">Total Locations:</strong>
                                <span id="mapLocationCount" style="color: #6b7280; margin-left: 8px;">0</span>
                            </div>
                            <div style="display: flex; gap: 16px; align-items: center;">
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <span style="width: 12px; height: 12px; background: #10b981; border-radius: 50%;"></span>
                                    <span style="color: #6b7280; font-size: 0.875rem;">Active</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <span style="width: 12px; height: 12px; background: #f59e0b; border-radius: 50%;"></span>
                                    <span style="color: #6b7280; font-size: 0.875rem;">Pending</span>
                                </div>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <span style="width: 12px; height: 12px; background: #6b7280; border-radius: 50%;"></span>
                                    <span style="color: #6b7280; font-size: 0.875rem;">Draft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Map View Modal -->
        <div class="modal-overlay" id="mapViewModal">
            <div class="modal-container" style="max-width: 900px;">
                <div class="modal-header">
                    <h3 id="mapViewTitle">Location Map</h3>
                    <button class="modal-close" onclick="closeMapView()">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="viewMap" style="width: 100%; height: 500px; border-radius: 8px;"></div>
                    <div style="margin-top: 16px; padding: 16px; background: #f9fafb; border-radius: 8px;">
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div>
                                <strong style="color: #374151;">Coordinates:</strong>
                                <p id="viewCoords" style="color: #6b7280; margin-top: 4px;"></p>
                            </div>
                            <div>
                                <strong style="color: #374151;">Address:</strong>
                                <p id="viewAddress" style="color: #6b7280; margin-top: 4px;"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <style>
        .map-view-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            border-color: #10b981;
            color: #ffffff;
            position: relative;
            overflow: hidden;
        }

        .map-view-btn:hover {
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
            border-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(16, 185, 129, 0.3);
        }

        .map-view-btn i {
            font-size: 1.1rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.15);
            }
        }

        .map-view-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .map-view-btn:hover::before {
            width: 300px;
            height: 300px;
        }
        .main-content {
            padding: 24px;
            background: #ffffff;
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1f2937;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 32px;
        }

        .header-left h1 {
            font-size: 1.875rem;
            font-weight: 700;
            margin-bottom: 8px;
            color: #111827;
        }

        .header-left p {
            color: #6b7280;
            font-size: 1rem;
        }

        .header-actions {
            display: flex;
            gap: 12px;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            color: #374151;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .action-btn:hover {
            background: #f9fafb;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .primary-btn {
            background: #3b82f6;
            border-color: #3b82f6;
            color: #ffffff;
        }

        .primary-btn:hover {
            background: #2563eb;
            border-color: #2563eb;
        }

        .quick-stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .stat-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            color: white;
        }

        .stat-icon.active { background: #10b981; }
        .stat-icon.pending { background: #f59e0b; }
        .stat-icon.draft { background: #6b7280; }
        .stat-icon.expired { background: #3b82f6; }

        .stat-number {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 4px;
            color: #111827;
        }

        .stat-label {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .filters-panel {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            display: none;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        .filters-panel.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .filters-content {
            display: grid;
            grid-template-columns: repeat(3, 1fr) auto;
            gap: 20px;
            align-items: end;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .filter-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .filter-select, .filter-input {
            padding: 10px 14px;
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            color: #374151;
            font-size: 0.875rem;
        }

        .filter-select:focus, .filter-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .filter-actions {
            display: flex;
            gap: 8px;
        }

        .filter-btn {
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #ffffff;
        }

        .filter-btn.primary {
            background: #3b82f6;
            color: white;
            border-color: #3b82f6;
        }

        .filter-btn.primary:hover {
            background: #2563eb;
        }

        .filter-btn.secondary {
            background: #ffffff;
            color: #6b7280;
        }

        .filter-btn.secondary:hover {
            background: #f9fafb;
        }

        .table-container {
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .table-header {
            padding: 20px 24px;
            border-bottom: 1px solid #e5e7eb;
            background: #f9fafb;
        }

        .table-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .bulk-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .bulk-select {
            padding: 8px 12px;
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            color: #374151;
            font-size: 0.875rem;
        }

        .apply-bulk-btn {
            padding: 8px 16px;
            background: #10b981;
            border: none;
            border-radius: 6px;
            color: white;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .apply-bulk-btn:hover:not(:disabled) {
            background: #059669;
        }

        .apply-bulk-btn:disabled {
            background: #d1d5db;
            color: #9ca3af;
            cursor: not-allowed;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .posts-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .posts-table th {
            background: #f9fafb;
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            border-bottom: 1px solid #e5e7eb;
        }

        .posts-table td {
            padding: 16px;
            border-bottom: 1px solid #f3f4f6;
            vertical-align: middle;
        }

        .posts-table tbody tr {
            transition: all 0.2s ease;
        }

        .posts-table tbody tr:hover {
            background: #f9fafb;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-badge.active { background: rgba(16, 185, 129, 0.1); color: #059669; }
        .status-badge.pending { background: rgba(245, 158, 11, 0.1); color: #d97706; }
        .status-badge.draft { background: rgba(107, 114, 128, 0.1); color: #4b5563; }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-button {
            padding: 6px 8px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            color: #6b7280;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.75rem;
        }

        .action-button:hover {
            background: #f9fafb;
        }

        .action-button.view:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            border-color: #3b82f6;
        }

        .action-button.edit:hover {
            background: rgba(16, 185, 129, 0.1);
            color: #10b981;
            border-color: #10b981;
        }

        .action-button.delete:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border-color: #ef4444;
        }

        .loading-state, .empty-state {
            padding: 60px;
            text-align: center;
            color: #6b7280;
        }

        .loading-spinner {
            font-size: 2rem;
            margin-bottom: 16px;
            color: #3b82f6;
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            color: #d1d5db;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 8px;
            color: #111827;
        }

        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .pagination-controls {
            display: flex;
            gap: 4px;
        }

        .page-btn {
            padding: 8px 12px;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            color: #374151;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .page-btn:hover:not(:disabled) {
            background: #f9fafb;
        }

        .page-btn.active {
            background: #3b82f6;
            border-color: #3b82f6;
            color: white;
        }

        .page-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            transition: all 0.3s ease;
        }

        .modal-overlay.show {
            display: flex;
            opacity: 1;
        }

        .modal-container {
            background: #ffffff;
            border-radius: 16px;
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow-y: auto;
            transform: scale(0.9);
            transition: all 0.3s ease;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .modal-overlay.show .modal-container {
            transform: scale(1);
        }

        .modal-header {
            padding: 24px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
        }

        .modal-close {
            background: none;
            border: none;
            color: #6b7280;
            font-size: 1.2rem;
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .modal-close:hover {
            background: #f3f4f6;
            color: #374151;
        }

        .modal-body {
            padding: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
        }

        .form-input, .form-select, .form-textarea {
            padding: 12px 16px;
            background: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            color: #374151;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .form-input:focus, .form-select:focus, .form-textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-textarea {
            resize: vertical;
            min-height: 80px;
        }

        .modal-footer {
            padding: 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            background: #f9fafb;
        }

        .modal-btn {
            padding: 10px 16px;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .modal-btn.primary {
            background: #3b82f6;
            border: 1px solid #3b82f6;
            color: white;
        }

        .modal-btn.primary:hover {
            background: #2563eb;
        }

        .modal-btn.secondary {
            background: #ffffff;
            border: 1px solid #d1d5db;
            color: #374151;
        }

        .modal-btn.secondary:hover {
            background: #f9fafb;
        }

        @media (max-width: 1024px) {
            .quick-stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .filters-content {
                grid-template-columns: 1fr 1fr auto;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .quick-stats-grid {
                grid-template-columns: 1fr;
            }
            
            .filters-content {
                grid-template-columns: 1fr;
            }
            
            .page-header {
                flex-direction: column;
                gap: 16px;
            }
            
            .header-actions {
                width: 100%;
            }
        }
    </style>

    <!-- Google Maps API -->
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let map, marker, geocoder, autocomplete, viewMap, viewMarker;
    const kenyaBounds = {
        north: 5.0,
        south: -5.0,
        east: 42.0,
        west: 33.5
    };

    function initMap() {
        // Initialize the map when Google Maps API is loaded
        const kenyaCenter = { lat: -1.286389, lng: 36.817223 }; // Nairobi
        
        map = new google.maps.Map(document.getElementById('map'), {
            center: kenyaCenter,
            zoom: 12,
            restriction: {
                latLngBounds: kenyaBounds,
                strictBounds: false
            }
        });

        marker = new google.maps.Marker({
            map: map,
            draggable: true,
            animation: google.maps.Animation.DROP
        });

        geocoder = new google.maps.Geocoder();

        // Search autocomplete
        const searchInput = document.getElementById('mapSearch');
        autocomplete = new google.maps.places.Autocomplete(searchInput, {
            bounds: new google.maps.LatLngBounds(
                new google.maps.LatLng(kenyaBounds.south, kenyaBounds.west),
                new google.maps.LatLng(kenyaBounds.north, kenyaBounds.east)
            ),
            strictBounds: true,
            componentRestrictions: { country: 'ke' }
        });

        autocomplete.addListener('place_changed', function() {
            const place = autocomplete.getPlace();
            if (place.geometry) {
                map.setCenter(place.geometry.location);
                map.setZoom(15);
                marker.setPosition(place.geometry.location);
                updateCoordinates(place.geometry.location);
            }
        });

        // Click on map to set marker
        map.addListener('click', function(e) {
            marker.setPosition(e.latLng);
            updateCoordinates(e.latLng);
        });

        // Drag marker
        marker.addListener('dragend', function(e) {
            updateCoordinates(e.latLng);
        });
    }

    function updateCoordinates(latLng) {
        document.getElementById('latitude').value = latLng.lat().toFixed(6);
        document.getElementById('longitude').value = latLng.lng().toFixed(6);
    }

    class LocationsManager {
        constructor() {
            this.locations = [];
            this.filteredLocations = [];
            this.selectedLocations = new Set();
            this.currentPage = 1;
            this.itemsPerPage = 10;
            this.editingLocation = null;
            this.init();
        }

        init() {
            this.setupEventListeners();
            this.loadLocations();
            this.loadStats();
        }

        setupEventListeners() {
            document.getElementById('statusFilter').addEventListener('change', () => this.applyFilters());
            document.getElementById('searchFilter').addEventListener('input', (e) => {
                clearTimeout(this.searchTimeout);
                this.searchTimeout = setTimeout(() => this.applyFilters(), 500);
            });

            document.getElementById('selectAll').addEventListener('change', (e) => this.toggleSelectAll(e.target.checked));
            document.getElementById('selectAllHeader').addEventListener('change', (e) => this.toggleSelectAll(e.target.checked));
            document.getElementById('bulkActions').addEventListener('change', this.updateBulkButton.bind(this));
        }

        loadLocations() {
            const statusFilter = document.getElementById('statusFilter').value;
            const searchFilter = document.getElementById('searchFilter').value;
            
            const params = new URLSearchParams({
                page: this.currentPage,
                status: statusFilter,
                search: searchFilter
            });
            
            return fetch(`/locations/data?${params}`, {
                headers: { 'Accept': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.locations = data.data.map(location => ({
                        ...location,
                        date: new Date(location.created_at)
                    }));
                    
                    this.filteredLocations = this.locations;
                    this.pagination = data.pagination;
                    this.renderTable();
                }
                return data;
            })
            .catch(error => {
                console.error('Error loading locations:', error);
                this.showNotification('Error loading locations', 'error');
            });
        }

        loadStats() {
            fetch('/locations/stats', {
                headers: { 'Accept': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    this.animateNumber(document.getElementById('activeCount'), data.data.active);
                    this.animateNumber(document.getElementById('pendingCount'), data.data.pending);
                    this.animateNumber(document.getElementById('draftCount'), data.data.draft);
                    this.animateNumber(document.getElementById('totalCount'), data.data.total);
                }
            })
            .catch(error => console.error('Error loading stats:', error));
        }

        renderTable() {
            const tbody = document.getElementById('locationsTableBody');
            const startIndex = (this.currentPage - 1) * this.itemsPerPage;
            const endIndex = startIndex + this.itemsPerPage;
            const pageData = this.filteredLocations.slice(startIndex, endIndex);

            if (pageData.length === 0 && this.filteredLocations.length === 0) {
                this.showEmptyState();
                return;
            }

            tbody.innerHTML = pageData.map(location => `
                <tr data-location-id="${location.id}">
                    <td>
                        <input type="checkbox" class="row-checkbox" onchange="locationsManager.toggleLocationSelection(${location.id}, this.checked)">
                    </td>
                    <td>
                        <strong style="color: #111827;">${location.business_name}</strong>
                    </td>
                    <td>
                        <code style="background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-size: 0.75rem;">
                            ${parseFloat(location.latitude).toFixed(6)}
                        </code>
                    </td>
                    <td>
                        <code style="background: #f3f4f6; padding: 2px 6px; border-radius: 4px; font-size: 0.75rem;">
                            ${parseFloat(location.longitude).toFixed(6)}
                        </code>
                    </td>
                    <td>
                        <span class="status-badge ${location.status}">${this.formatStatus(location.status)}</span>
                    </td>
                    <td>${this.formatDate(location.date)}</td>
                    <td>
                        <div class="action-buttons">
                            <button class="action-button view" onclick="locationsManager.viewOnMap(${location.id})" title="View on Map">
                                <i class="fas fa-map-marker-alt"></i>
                            </button>
                            <button class="action-button edit" onclick="locationsManager.editLocation(${location.id})" title="Edit">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="action-button delete" onclick="locationsManager.deleteLocation(${location.id})" title="Delete">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');

            this.updatePagination();
            this.updateTableInfo();
            document.getElementById('emptyState').style.display = 'none';
            document.querySelector('.table-wrapper').style.display = 'block';
        }

        showEmptyState() {
            document.querySelector('.table-wrapper').style.display = 'none';
            document.getElementById('emptyState').style.display = 'block';
        }

        createLocation() {
            const form = document.getElementById('locationForm');
            const formData = new FormData(form);
            
            Swal.fire({
                title: 'Saving...',
                text: 'Please wait',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
            
            fetch('/locations', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        closeModal();
                        this.loadLocations();
                        this.loadStats();
                    });
                } else {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        html: data.errors ? Object.values(data.errors).flat().join('<br>') : data.message,
                        confirmButtonColor: '#3b82f6'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error creating location',
                    confirmButtonColor: '#3b82f6'
                });
            });
        }

        updateLocation() {
            const formData = new FormData(document.getElementById('locationForm'));
            const locationId = document.getElementById('locationId').value;
            
            Swal.fire({
                title: 'Updating...',
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading()
            });
            
            fetch(`/locations/${locationId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    }).then(() => {
                        closeModal();
                        this.loadLocations();
                        this.loadStats();
                    });
                } else {
                    Swal.close();
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message,
                        confirmButtonColor: '#3b82f6'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Error updating location',
                    confirmButtonColor: '#3b82f6'
                });
            });
        }

        editLocation(id) {
            const location = this.locations.find(l => l.id === id);
            if (!location) return;

            this.editingLocation = location;
            
            document.getElementById('locationId').value = location.id;
            document.getElementById('businessName').value = location.business_name;
            document.getElementById('description').value = location.description || '';
            document.getElementById('locationStatus').value = location.status;
            document.getElementById('latitude').value = location.latitude;
            document.getElementById('longitude').value = location.longitude;

            if (location.latitude && location.longitude) {
                const latLng = new google.maps.LatLng(parseFloat(location.latitude), parseFloat(location.longitude));
                map.setCenter(latLng);
                map.setZoom(15);
                marker.setPosition(latLng);
            }

            document.getElementById('modalTitle').textContent = 'Edit Location';
            document.getElementById('saveButtonText').textContent = 'Update Location';
            
            this.openModal();
        }

        deleteLocation(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/locations/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Deleted!',
                                text: data.message,
                                showConfirmButton: false,
                                timer: 2000
                            });
                            this.loadLocations();
                            this.loadStats();
                        }
                    });
                }
            });
        }

        viewOnMap(id) {
            const location = this.locations.find(l => l.id === id);
            if (!location) return;

            document.getElementById('mapViewTitle').textContent = location.business_name;
            document.getElementById('viewCoords').textContent = `${parseFloat(location.latitude).toFixed(6)}, ${parseFloat(location.longitude).toFixed(6)}`;
            document.getElementById('viewAddress').textContent = location.business_name;

            const latLng = new google.maps.LatLng(parseFloat(location.latitude), parseFloat(location.longitude));
            
            viewMap = new google.maps.Map(document.getElementById('viewMap'), {
                center: latLng,
                zoom: 16
            });

            viewMarker = new google.maps.Marker({
                map: viewMap,
                position: latLng,
                animation: google.maps.Animation.DROP
            });

            document.getElementById('mapViewModal').classList.add('show');
        }

        validateForm() {
            const businessName = document.getElementById('businessName').value.trim();
            const latitude = document.getElementById('latitude').value;
            const longitude = document.getElementById('longitude').value;

            if (!businessName) {
                this.showNotification('Business name is required', 'error');
                return false;
            }
            if (!latitude || !longitude) {
                this.showNotification('Please pin location on map', 'error');
                return false;
            }

            return true;
        }

        applyFilters() {
            const statusFilter = document.getElementById('statusFilter').value;
            const searchFilter = document.getElementById('searchFilter').value.toLowerCase();

            this.filteredLocations = this.locations.filter(location => {
                let matches = true;

                if (statusFilter && location.status !== statusFilter) matches = false;
                if (searchFilter && !location.business_name.toLowerCase().includes(searchFilter)) matches = false;

                return matches;
            });

            this.currentPage = 1;
            this.renderTable();
        }

        toggleSelectAll(checked) {
            this.selectedLocations.clear();
            const checkboxes = document.querySelectorAll('.row-checkbox');
            
            checkboxes.forEach(checkbox => {
                checkbox.checked = checked;
                if (checked) {
                    const locationId = parseInt(checkbox.closest('tr').dataset.locationId);
                    this.selectedLocations.add(locationId);
                }
            });

            this.updateBulkButton();
        }

        toggleLocationSelection(locationId, checked) {
            if (checked) {
                this.selectedLocations.add(locationId);
            } else {
                this.selectedLocations.delete(locationId);
            }

            const totalCheckboxes = document.querySelectorAll('.row-checkbox').length;
            const checkedCheckboxes = document.querySelectorAll('.row-checkbox:checked').length;
            
            document.getElementById('selectAll').checked = totalCheckboxes === checkedCheckboxes;
            document.getElementById('selectAllHeader').checked = totalCheckboxes === checkedCheckboxes;

            this.updateBulkButton();
        }

        updateBulkButton() {
            const bulkSelect = document.getElementById('bulkActions');
            const applyButton = document.querySelector('.apply-bulk-btn');
            const hasSelection = this.selectedLocations.size > 0;
            
            bulkSelect.disabled = !hasSelection;
            applyButton.disabled = !hasSelection || !bulkSelect.value;
        }

        applyBulkActions(action) {
            const selectedIds = Array.from(this.selectedLocations);
            
            fetch('/locations/bulk-action', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ action, location_ids: selectedIds })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                    this.loadLocations();
                    this.loadStats();
                    this.selectedLocations.clear();
                }
            });
        }

        openModal() {
            document.getElementById('locationModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        closeModal() {
            document.getElementById('locationModal').classList.remove('show');
            document.body.style.overflow = '';
            this.resetForm();
            this.editingLocation = null;
        }

        resetForm() {
            document.getElementById('locationForm').reset();
            document.getElementById('latitude').value = '';
            document.getElementById('longitude').value = '';
            document.getElementById('modalTitle').textContent = 'Add New Location';
            document.getElementById('saveButtonText').textContent = 'Save Location';
            
            if (marker) {
                marker.setMap(null);
                marker = new google.maps.Marker({
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP
                });
                marker.addListener('dragend', function(e) {
                    updateCoordinates(e.latLng);
                });
            }
        }

        updatePagination() {
            const totalPages = Math.ceil(this.filteredLocations.length / this.itemsPerPage);
            const controls = document.getElementById('paginationControls');
            
            let html = `
                <button class="page-btn" onclick="locationsManager.changePage(${this.currentPage - 1})" ${this.currentPage === 1 ? 'disabled' : ''}>
                    <i class="fas fa-chevron-left"></i>
                </button>
            `;

            for (let i = 1; i <= totalPages; i++) {
                if (totalPages <= 7 || i <= 3 || i > totalPages - 3 || Math.abs(i - this.currentPage) <= 1) {
                    html += `
                        <button class="page-btn ${i === this.currentPage ? 'active' : ''}" onclick="locationsManager.changePage(${i})">
                            ${i}
                        </button>
                    `;
                } else if (i === 4 || i === totalPages - 3) {
                    html += `<span style="padding: 8px;">...</span>`;
                }
            }

            html += `
                <button class="page-btn" onclick="locationsManager.changePage(${this.currentPage + 1})" ${this.currentPage === totalPages || totalPages === 0 ? 'disabled' : ''}>
                    <i class="fas fa-chevron-right"></i>
                </button>
            `;

            controls.innerHTML = html;
        }

        updateTableInfo() {
            const startIndex = (this.currentPage - 1) * this.itemsPerPage + 1;
            const endIndex = Math.min(startIndex + this.itemsPerPage - 1, this.filteredLocations.length);
            const total = this.filteredLocations.length;
            
            const infoText = total > 0 ? `Showing ${startIndex}-${endIndex} of ${total} locations` : 'No locations found';
            document.getElementById('tableInfo').textContent = infoText;
            document.getElementById('paginationInfo').textContent = infoText;
        }

        changePage(page) {
            const totalPages = Math.ceil(this.filteredLocations.length / this.itemsPerPage);
            if (page >= 1 && page <= totalPages) {
                this.currentPage = page;
                this.renderTable();
            }
        }

        formatStatus(status) {
            return status.charAt(0).toUpperCase() + status.slice(1);
        }

        formatDate(date) {
            const dateObj = typeof date === 'string' ? new Date(date) : date;
            if (!(dateObj instanceof Date) || isNaN(dateObj)) return 'Invalid date';
            
            const now = new Date();
            const diff = now - dateObj;
            const days = Math.floor(diff / (1000 * 60 * 60 * 24));
            
            if (days === 0) return 'Today';
            if (days === 1) return '1 day ago';
            if (days < 7) return `${days} days ago`;
            if (days < 30) return `${Math.floor(days / 7)} weeks ago`;
            return dateObj.toLocaleDateString();
        }

        animateNumber(element, target) {
            const start = parseInt(element.textContent) || 0;
            const duration = 1000;
            const startTime = Date.now();
            
            const animate = () => {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);
                const current = Math.round(start + (target - start) * this.easeOutCubic(progress));
                
                element.textContent = current;
                
                if (progress < 1) requestAnimationFrame(animate);
            };
            
            animate();
        }

        easeOutCubic(t) {
            return 1 - Math.pow(1 - t, 3);
        }

        showNotification(message, type = 'success') {
            Swal.fire({
                icon: type,
                title: type === 'success' ? 'Success!' : 'Error!',
                text: message,
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        }
    }

    // Declare locationsManager globally
    let locationsManager;

    // Global functions - these need to check if locationsManager exists
    function toggleFilters() {
        document.getElementById('filtersPanel').classList.toggle('show');
    }

    function clearFilters() {
        if (!locationsManager) return;
        document.getElementById('statusFilter').value = '';
        document.getElementById('searchFilter').value = '';
        locationsManager.filteredLocations = [...locationsManager.locations];
        locationsManager.currentPage = 1;
        locationsManager.renderTable();
    }

    function applyFilters() {
        if (!locationsManager) return;
        locationsManager.applyFilters();
    }

    function openCreateModal() {
        if (!locationsManager) {
            console.error('LocationsManager not initialized yet');
            return;
        }
        locationsManager.resetForm();
        locationsManager.openModal();
    }

    function closeModal() {
        if (!locationsManager) return;
        locationsManager.closeModal();
    }

    function closeMapView() {
        document.getElementById('mapViewModal').classList.remove('show');
    }

    function saveLocation() {
        if (!locationsManager || !locationsManager.validateForm()) return;
        
        const locationId = document.getElementById('locationId').value;
        if (locationId) {
            locationsManager.updateLocation();
        } else {
            locationsManager.createLocation();
        }
    }

    function applyBulkAction() {
        if (!locationsManager) return;
        
        const action = document.getElementById('bulkActions').value;
        const selectedCount = locationsManager.selectedLocations.size;
        
        if (!action || selectedCount === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Notice',
                text: 'Please select locations and an action'
            });
            return;
        }
        
        const actionTexts = {
            'activate': 'activate',
            'deactivate': 'deactivate',
            'delete': 'delete'
        };
        
        Swal.fire({
            title: `${actionTexts[action].charAt(0).toUpperCase() + actionTexts[action].slice(1)} ${selectedCount} locations?`,
            text: action === 'delete' ? "This action cannot be undone!" : `Proceed with ${actionTexts[action]}?`,
            icon: action === 'delete' ? 'warning' : 'question',
            showCancelButton: true,
            confirmButtonColor: action === 'delete' ? '#ef4444' : '#3b82f6',
            confirmButtonText: 'Yes, proceed!'
        }).then((result) => {
            if (result.isConfirmed) {
                locationsManager.applyBulkActions(action);
                document.querySelectorAll('.row-checkbox, #selectAll, #selectAllHeader').forEach(cb => cb.checked = false);
                locationsManager.selectedLocations.clear();
                locationsManager.updateBulkButton();
                document.getElementById('bulkActions').value = '';
            }
        });
    }

let allLocationsMap, allLocationMarkers = [], allLocationInfoWindows = [];

    function openAllLocationsMap() {
        if (!locationsManager || locationsManager.locations.length === 0) {
            Swal.fire({
                icon: 'info',
                title: 'No Locations',
                text: 'No business locations to display on map'
            });
            return;
        }

        // Show modal
        document.getElementById('allLocationsMapModal').classList.add('show');
        document.body.style.overflow = 'hidden';

        // Initialize map after modal is shown
        setTimeout(() => {
            initAllLocationsMap();
        }, 100);
    }

    function initAllLocationsMap() {
        // Clear existing markers
        allLocationMarkers.forEach(marker => marker.setMap(null));
        allLocationMarkers = [];
        allLocationInfoWindows.forEach(infoWindow => infoWindow.close());
        allLocationInfoWindows = [];

        const locations = locationsManager.locations.filter(loc => loc.latitude && loc.longitude);
        
        if (locations.length === 0) return;

        // Calculate map center and bounds
        const bounds = new google.maps.LatLngBounds();
        
        locations.forEach(location => {
            const lat = parseFloat(location.latitude);
            const lng = parseFloat(location.longitude);
            bounds.extend(new google.maps.LatLng(lat, lng));
        });

        // Initialize map
        allLocationsMap = new google.maps.Map(document.getElementById('allLocationsMap'), {
            center: bounds.getCenter(),
            zoom: 12
        });

        // Fit bounds to show all markers
        allLocationsMap.fitBounds(bounds);

        // Add markers for each location
        locations.forEach(location => {
            const lat = parseFloat(location.latitude);
            const lng = parseFloat(location.longitude);
            const position = new google.maps.LatLng(lat, lng);

            // Marker color based on status
            const markerColors = {
                'active': '#10b981',
                'pending': '#f59e0b',
                'draft': '#6b7280'
            };

            
            // Create custom PIN marker icon - BIGGER & MORE VISIBLE
            const markerIcon = {
                path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                scale: 10,  // Increased from 6 to 10
                fillColor: markerColors[location.status] || '#3b82f6',
                fillOpacity: 1,
                strokeColor: '#ffffff',
                strokeWeight: 3,  // Increased from 2 to 3
                rotation: 180, // Points downward like a pin
                anchor: new google.maps.Point(0, 8)  // Adjusted anchor for bigger size
            };

            const marker = new google.maps.Marker({
                position: position,
                map: allLocationsMap,
                title: location.business_name,
                icon: markerIcon,
                animation: google.maps.Animation.DROP,
                optimized: false  // Better rendering for custom icons
            });

            // Add bounce animation on hover
            marker.addListener('mouseover', () => {
                marker.setAnimation(google.maps.Animation.BOUNCE);
                setTimeout(() => marker.setAnimation(null), 750);
            });

            // Create info window content
           // Get posts for this location
const posts = location.posts || [];
const postsHtml = posts.length > 0 ? `
    <div style="margin-top: 12px; padding-top: 12px; border-top: 1px solid #e5e7eb;">
        <strong style="color: #374151; font-size: 0.875rem;">Posts (${posts.length}):</strong>
        <div style="max-height: 150px; overflow-y: auto; margin-top: 8px;">
            ${posts.slice(0, 5).map(post => `
                <div style="display: flex; gap: 8px; padding: 6px; background: #f9fafb; border-radius: 6px; margin-bottom: 6px;">
                    ${post.photos && post.photos.length > 0 ? `
                    ` : ''}
                    <div style="flex: 1; min-width: 0;">
                        <div style="font-size: 0.75rem; font-weight: 500; color: #111827; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                            ${post.title}
                        </div>
                        <div style="font-size: 0.7rem; color: #10b981; font-weight: 600;">
                            KES ${parseFloat(post.price).toLocaleString()}
                        </div>
                    </div>
                </div>
            `).join('')}
            ${posts.length > 5 ? `<div style="font-size: 0.7rem; color: #6b7280; text-align: center; margin-top: 4px;">+${posts.length - 5} more</div>` : ''}
        </div>
    </div>
` : '';

// Create info window content
const infoWindowContent = `
    <div style="padding: 12px; min-width: 250px; max-width: 350px;">
        <h4 style="margin: 0 0 8px 0; color: #111827; font-size: 1rem; font-weight: 600;">
            ${location.business_name}
        </h4>
        <div style="margin-bottom: 8px;">
            <span class="status-badge ${location.status}" style="display: inline-block;">
                ${location.status.charAt(0).toUpperCase() + location.status.slice(1)}
            </span>
        </div>
        ${location.description ? `
            <p style="margin: 8px 0; color: #6b7280; font-size: 0.875rem;">
                ${location.description}
            </p>
        ` : ''}
        <div style="margin-top: 8px; padding-top: 8px; border-top: 1px solid #e5e7eb;">
            <div style="font-size: 0.75rem; color: #6b7280;">
                <strong>Coordinates:</strong><br>
                ${lat.toFixed(6)}, ${lng.toFixed(6)}
            </div>
        </div>
        ${postsHtml}
        <div style="margin-top: 12px; display: flex; gap: 8px;">
            <button onclick="locationsManager.editLocation(${location.id}); closeAllLocationsMap();" 
                    style="flex: 1; padding: 6px 12px; background: #3b82f6; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 0.75rem;">
                <i class="fas fa-edit"></i> Edit
            </button>
            <button onclick="window.open('https://www.google.com/maps?q=${lat},${lng}', '_blank')" 
                    style="flex: 1; padding: 6px 12px; background: #10b981; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 0.75rem;">
                <i class="fas fa-directions"></i> Directions
            </button>
        </div>
    </div>
`;

            const infoWindow = new google.maps.InfoWindow({
                content: infoWindowContent
            });

            marker.addListener('click', () => {
                // Close all other info windows
                allLocationInfoWindows.forEach(iw => iw.close());
                // Open this info window
                infoWindow.open(allLocationsMap, marker);
            });

            allLocationMarkers.push(marker);
            allLocationInfoWindows.push(infoWindow);
        });

        // Update location count
        document.getElementById('mapLocationCount').textContent = locations.length;
    }

    function closeAllLocationsMap() {
        document.getElementById('allLocationsMapModal').classList.remove('show');
        document.body.style.overflow = '';
    }
    // Initialize when DOM is ready
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize LocationsManager
        locationsManager = new LocationsManager();
        window.locationsManager = locationsManager;
        
        // Set up modal click-outside handlers
        document.getElementById('locationModal').addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                closeModal();
            }
        });
        
        document.getElementById('mapViewModal').addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                closeMapView();
            }
        });

                // Add this NEW code here ⬇️
        document.getElementById('allLocationsMapModal').addEventListener('click', (e) => {
            if (e.target.classList.contains('modal-overlay')) {
                closeAllLocationsMap();
            }
        });
    });
</script>
</x-portal-layout>