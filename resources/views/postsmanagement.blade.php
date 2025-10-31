<x-portal-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts Management') }}
        </h2>
    </x-slot>

    <main class="main-content">
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-left">
                <h1>Posts Management</h1>
                <p>Manage your classified listings and advertisements</p>
            </div>
            <div class="header-actions">
                <button class="action-btn filter-btn" onclick="toggleFilters()">
                    <i class="fas fa-filter"></i>
                    <span>Filters</span>
                </button>
                <button class="action-btn primary-btn" onclick="openCreateModal()">
                    <i class="fas fa-plus"></i>
                    <span>New Post</span>
                </button>
            </div>
        </div>

        <!-- Quick Stats -->
        <div class="quick-stats-grid">
            <div class="stat-card">
                <div class="stat-icon active">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="activeCount">24</div>
                    <div class="stat-label">Active Posts</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon pending">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="pendingCount">3</div>
                    <div class="stat-label">Pending Review</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon draft">
                    <i class="fas fa-edit"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="draftCount">7</div>
                    <div class="stat-label">Drafts</div>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon expired">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="stat-content">
                    <div class="stat-number" id="expiredCount">2</div>
                    <div class="stat-label">Expired</div>
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
                        <option value="expired">Expired</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Category</label>
                    <select class="filter-select" id="categoryFilter">
                        <option value="">All Categories</option>
                        <option value="electronics">Electronics</option>
                        <option value="vehicles">Vehicles</option>
                        <option value="real-estate">Real Estate</option>
                        <option value="services">Services</option>
                        <option value="fashion">Fashion</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Search</label>
                    <input type="text" class="filter-input" id="searchFilter" placeholder="Search posts...">
                </div>
                <div class="filter-actions">
                    <button class="filter-btn secondary" onclick="clearFilters()">Clear</button>
                    <button class="filter-btn primary" onclick="applyFilters()">Apply</button>
                </div>
            </div>
        </div>

        <!-- Posts Table Container -->
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
                            <option value="feature">Mark as Featured</option>
                        </select>
                        <button class="apply-bulk-btn" disabled onclick="applyBulkAction()">Apply</button>
                    </div>
                    <div class="table-info">
                        <span id="tableInfo">Showing 1-10 of 34 posts</span>
                    </div>
                </div>
            </div>

            <!-- HTML Table -->
            <div class="table-wrapper">
                <table class="posts-table" id="postsTable">
                    <thead>
                        <tr>
                            <th width="40">
                                <input type="checkbox" id="selectAllHeader" class="bulk-checkbox">
                            </th>
                            <th width="280">Post</th>
                            <th width="100">Category</th>
                            <th width="110">Price</th>
                            <th width="100">County</th>
                            <th width="90">Status</th>
                            <th width="70">Views</th>
                            <th width="80">Inquiries</th>
                            <th width="70">Images</th>
                            <th width="90">Date</th>
                            <th width="120">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="postsTableBody">
                        <!-- Posts will be loaded here via JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- Loading State -->
            <div class="loading-state" id="loadingState" style="display: none;">
                <div class="loading-spinner">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>
                <p>Loading posts...</p>
            </div>

            <!-- Empty State -->
            <div class="empty-state" id="emptyState" style="display: none;">
                <div class="empty-icon">
                    <i class="fas fa-inbox"></i>
                </div>
                <h3>No posts found</h3>
                <p>Create your first post to get started</p>
                <button class="action-btn primary-btn" onclick="openCreateModal()">
                    <i class="fas fa-plus"></i>
                    <span>Create Post</span>
                </button>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination-container">
            <div class="pagination-info">
                <span id="paginationInfo">Showing 1-10 of 34 posts</span>
            </div>
            <div class="pagination-controls" id="paginationControls">
                <!-- Pagination buttons will be generated by JavaScript -->
            </div>
        </div>

        <!-- Create/Edit Modal -->
<div class="modal-overlay" id="postModal">
    <div class="modal-container">
        <div class="modal-header">
            <h3 id="modalTitle">Create New Post</h3>
            <button class="modal-close" onclick="closeModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <form id="postForm">
                <input type="hidden" id="postId" name="id">
                
                <!-- Title and Category Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Title *</label>
                        <input type="text" id="postTitle" name="title" class="form-input" placeholder="Enter post title" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category *</label>
                        <select id="postCategory" name="category" class="form-select" required>
                            <option value="">Select Category</option>
                            <option value="electronics">Electronics</option>
                            <option value="vehicles">Vehicles</option>
                            <option value="real-estate">Real Estate</option>
                            <option value="phones">Phones</option>
                            <option value="services">Services</option>
                            <option value="fashion">Fashion</option>
                        </select>
                    </div>
                </div>
                
                <!-- Price and County Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Price (KES) *</label>
                        <input type="number" id="postPrice" name="price" class="form-input" placeholder="0" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">County *</label>
                        <select id="postCounty" name="county" class="form-select" required onchange="updateLocations()">
                            <option value="">Select County</option>
                        </select>
                    </div>
                </div>
                
                <!-- Location Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Specific Area*</label>
                        <select id="postLocation" name="location" class="form-select" required disabled>
                            <option value="">Select county first</option>
                        </select>
                    </div>
                </div>
                <!-- Location Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Business Location *</label>
                        <select id="postLocationId" name="location_id" class="form-select" required>
                            <option value="">Select location</option>
                            <!-- Locations will be loaded via JavaScript -->
                        </select>
                    </div>
                </div>
                
                <!-- Description -->
                <div class="form-group full-width">
                    <label class="form-label">Description *</label>
                    <textarea id="postDescription" name="description" class="form-textarea" rows="4" placeholder="Describe your item or service" required></textarea>
                </div>
                
                <!-- Photos -->
                <div class="form-group full-width">
                    <label class="form-label">Photos (Max 20 images, 5MB each)</label>
                    <input type="file" id="postPhotos" name="photos[]" class="form-input" multiple accept="image/*">
                    <small style="color: #6b7280; font-size: 0.75rem; margin-top: 4px; display: block;">
                        Upload up to 5 images (JPEG, PNG, JPG, GIF - Max 5MB each)
                    </small>
                </div>
                
                <!-- Status and Featured Row -->
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Status</label>
                        <select id="postStatus" name="status" class="form-select">
                            <option value="draft">Draft</option>
                            <option value="active">Active</option>
                            <option value="pending">Pending Review</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="checkbox-group">
                            <input type="checkbox" id="postFeatured" name="featured" class="form-checkbox">
                            <label for="postFeatured" class="checkbox-label">Mark as Featured</label>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button class="modal-btn secondary" onclick="closeModal()">Cancel</button>
            <button class="modal-btn primary" onclick="savePost()">
                <i class="fas fa-save"></i>
                <span id="saveButtonText">Save Post</span>
            </button>
        </div>
    </div>
</div>
<!-- Photo Viewer Modal -->
<div class="modal-overlay" id="photoViewerModal">
    <div class="modal-container" style="max-width: 900px;">
        <div class="modal-header">
            <h3 id="photoViewerTitle">Post Photos</h3>
            <button class="modal-close" onclick="closePhotoViewer()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="modal-body">
            <div id="photoGallery" class="photo-gallery"></div>
            <div id="photoEmpty" class="empty-state" style="display: none;">
                <div class="empty-icon"><i class="fas fa-image"></i></div>
                <p>No photos available</p>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox -->
<div class="lightbox-overlay" id="lightbox">
    <button class="lightbox-close" onclick="closeLightbox()">×</button>
    <button class="lightbox-nav prev" onclick="navigateLightbox(-1)">‹</button>
    <img id="lightboxImage" class="lightbox-image" src="" alt="">
    <button class="lightbox-nav next" onclick="navigateLightbox(1)">›</button>
</div>

    </main>

    <style>
        .photo-gallery {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 16px;
}

.photo-item {
    position: relative;
    border-radius: 12px;
    overflow: hidden;
    aspect-ratio: 1;
    cursor: pointer;
    transition: transform 0.3s;
}

.photo-item:hover { transform: scale(1.05); }

.photo-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.lightbox-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.95);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 2000;
}

.lightbox-overlay.show { display: flex; }

.lightbox-image {
    max-width: 90%;
    max-height: 90vh;
}

.lightbox-close, .lightbox-nav {
    position: absolute;
    background: rgba(255,255,255,0.2);
    border: none;
    color: white;
    border-radius: 50%;
    cursor: pointer;
    font-size: 24px;
}

.lightbox-close { top: 20px; right: 20px; width: 40px; height: 40px; }
.lightbox-nav { top: 50%; transform: translateY(-50%); width: 50px; height: 50px; }
.lightbox-nav.prev { left: 20px; }
.lightbox-nav.next { right: 20px; }
        /* Base Styling */
        .main-content {
            padding: 24px;
            background: #ffffff;
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1f2937;
        }

        /* Page Header */
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
            border-color: #d1d5db;
        }

        .primary-btn {
            background: #3b82f6;
            border-color: #3b82f6;
            color: #ffffff;
        }

        .primary-btn:hover {
            background: #2563eb;
            border-color: #2563eb;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Quick Stats */
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
            border-color: #d1d5db;
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
        .stat-icon.expired { background: #ef4444; }

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

        /* Filters Panel */
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
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
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
            border-color: #9ca3af;
        }

        /* Table Container */
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

        .table-info {
            font-size: 0.875rem;
            color: #6b7280;
        }

        /* HTML Table Styling */
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

        .post-preview {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .post-image {
            width: 48px;
            height: 48px;
            background: #f3f4f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #6b7280;
            font-size: 1.1rem;
        }

        .post-details h4 {
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 4px;
            color: #111827;
        }

        .post-details p {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .category-tag {
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .category-tag.electronics { background: rgba(16, 185, 129, 0.1); color: #059669; }
        .category-tag.vehicles { background: rgba(6, 182, 212, 0.1); color: #0891b2; }
        .category-tag.real-estate { background: rgba(245, 158, 11, 0.1); color: #d97706; }
        .category-tag.services { background: rgba(139, 92, 246, 0.1); color: #7c3aed; }
        .category-tag.fashion { background: rgba(236, 72, 153, 0.1); color: #be185d; }

        .status-badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-badge.active { background: rgba(16, 185, 129, 0.1); color: #059669; }
        .status-badge.pending { background: rgba(245, 158, 11, 0.1); color: #d97706; }
        .status-badge.draft { background: rgba(107, 114, 128, 0.1); color: #4b5563; }
        .status-badge.expired { background: rgba(239, 68, 68, 0.1); color: #dc2626; }
        .status-badge.featured { background: rgba(139, 92, 246, 0.1); color: #7c3aed; }

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
            border-color: #d1d5db;
        }

        .action-button.edit:hover {
            background: rgba(59, 130, 246, 0.1);
            color: #3b82f6;
            border-color: #3b82f6;
        }

        .action-button.delete:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
            border-color: #ef4444;
        }

        /* Loading & Empty States */
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

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
        }

        .pagination-info {
            font-size: 0.875rem;
            color: #6b7280;
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
            border-color: #d1d5db;
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

        /* Modal Styling */
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
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            width: 90%;
            max-width: 600px;
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
            min-height: 100px;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 24px;
        }

        .form-checkbox {
            width: 16px;
            height: 16px;
            accent-color: #3b82f6;
        }

        .checkbox-label {
            font-size: 0.875rem;
            color: #374151;
            cursor: pointer;
        }

        .modal-footer {
            padding: 24px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            background: #f9fafb;
        }@media (max-width: 768px) {
    .quick-stats-grid {
        grid-template-columns: 1fr;
    }
    
    .filters-content {
        grid-template-columns: 1fr;
    }
    
    .page-header {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }
    
    .header-actions {
        width: 100%;
        justify-content: space-between;
    }
    
    .table-controls {
        flex-direction: column;
        gap: 16px;
        align-items: stretch;
    }
    
    /* Hide less critical columns on mobile */
    .posts-table th:nth-child(5),  /* County */
    .posts-table th:nth-child(7),  /* Views */
    .posts-table th:nth-child(8),  /* Inquiries */
    .posts-table th:nth-child(9),  /* Images */
    .posts-table td:nth-child(5),
    .posts-table td:nth-child(7),
    .posts-table td:nth-child(8),
    .posts-table td:nth-child(9) {
        display: none;
    }
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
            border-color: #9ca3af;
        }

        /* Responsive Design */
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
                align-items: flex-start;
            }
            
            .header-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .table-controls {
                flex-direction: column;
                gap: 16px;
                align-items: stretch;
            }
            
            .posts-table th:nth-child(3),
            .posts-table th:nth-child(5),
            .posts-table th:nth-child(6),
            .posts-table td:nth-child(3),
            .posts-table td:nth-child(5),
            .posts-table td:nth-child(6) {
                display: none;
            }
        }
        .photo-item {
    position: relative;
}

.photo-delete-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    background: rgba(239, 68, 68, 0.9);
    color: white;
    border: none;
    border-radius: 50%;
    width: 32px;
    height: 32px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    z-index: 10;
}

.photo-item:hover .photo-delete-btn {
    opacity: 1;
}

.photo-delete-btn:hover {
    background: rgba(220, 38, 38, 1);
    transform: scale(1.1);
}
</style>
<script>
// ===== GLOBAL FUNCTIONS (Must be defined first) =====
function toggleFilters() {
    document.getElementById('filtersPanel').classList.toggle('show');
}

function clearFilters() {
    document.getElementById('statusFilter').value = '';
    document.getElementById('categoryFilter').value = '';
    document.getElementById('searchFilter').value = '';
    if (window.postsManager) {
        window.postsManager.filteredPosts = [...window.postsManager.posts];
        window.postsManager.currentPage = 1;
        window.postsManager.renderTable();
        window.postsManager.showNotification('Filters cleared');
    }
}

function applyFilters() { 
    if (window.postsManager) {
        window.postsManager.applyFilters(); 
    }
}

function openCreateModal() {
    if (window.postsManager) {
        window.postsManager.resetForm();
        window.postsManager.openModal();
    }
}

function closeModal() { 
    if (window.postsManager) {
        window.postsManager.closeModal(); 
    }
}

function savePost() {
    if (!window.postsManager || !window.postsManager.validateForm()) return;
    
    const postId = document.getElementById('postId').value;
    if (postId) {
        window.postsManager.updatePost();
    } else {
        window.postsManager.createPost();
    }
}

function applyBulkAction() {
    if (!window.postsManager) return;
    
    const action = document.getElementById('bulkActions').value;
    const selectedCount = window.postsManager.selectedPosts.size;
    
    if (!action || selectedCount === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'Notice',
            text: 'Please select posts and an action',
            confirmButtonColor: '#3b82f6'
        });
        return;
    }
    
    const actionTexts = {
        'activate': 'activate',
        'deactivate': 'deactivate',
        'delete': 'delete',
        'feature': 'mark as featured'
    };
    
    Swal.fire({
        title: `${actionTexts[action].charAt(0).toUpperCase() + actionTexts[action].slice(1)} ${selectedCount} posts?`,
        text: action === 'delete' ? "This action cannot be undone!" : `Are you sure you want to ${actionTexts[action]} ${selectedCount} selected posts?`,
        icon: action === 'delete' ? 'warning' : 'question',
        showCancelButton: true,
        confirmButtonColor: action === 'delete' ? '#ef4444' : '#3b82f6',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Yes, proceed!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Processing...',
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });
            
            window.postsManager.applyBulkActions(action);
            
            document.querySelectorAll('.row-checkbox, #selectAll, #selectAllHeader').forEach(cb => cb.checked = false);
            window.postsManager.selectedPosts.clear();
            window.postsManager.updateBulkButton();
            document.getElementById('bulkActions').value = '';
        }
    });
}

function closePhotoViewer() {
    document.getElementById('photoViewerModal').classList.remove('show');
}

function closeLightbox() {
    document.getElementById('lightbox').classList.remove('show');
}

function navigateLightbox(dir) {
    if (window.postsManager) {
        window.postsManager.navigateLightbox(dir);
    }
}

// ===== KENYA COUNTIES DATA =====
const kenyaCountiesData = {
    'Nairobi': ['CBD', 'Westlands', 'Kilimani', 'Parklands', 'Karen', 'Lavington', 'Eastleigh', 'Kasarani', 'Embakasi', 'Langata', 'Kileleshwa', 'South C', 'South B', 'Ngara', 'Pangani', 'Roysambu', 'Kahawa', 'Ruaka', 'Runda', 'Muthaiga', 'Huruma', 'Mathare', 'Umoja', 'Buruburu', 'Donholm'],
    
    'Mombasa': ['Mombasa Island', 'Nyali', 'Bamburi', 'Likoni', 'Changamwe', 'Kisauni', 'Old Town', 'Tudor', 'Shanzu', 'Diani', 'Kizingo', 'Ganjoni', 'Makupa', 'Jomvu', 'Mikindani', 'Buxton', 'Shimanzi', 'Miritini', 'Mtongwe', 'Port Reitz'],
    
    'Kisumu': ['Kisumu Central', 'Mamboleo', 'Milimani', 'Kondele', 'Nyalenda', 'Manyatta', 'Migosi', 'Dunga', 'Kibuye', 'Tom Mboya Estate', 'Nyamasaria', 'Kajulu', 'Ahero', 'Maseno', 'Kombewa', 'Otonglo', 'Railways', 'Bandani', 'Kisian', 'Awasi'],
    
    'Nakuru': ['Nakuru Town', 'Naivasha', 'Gilgil', 'Molo', 'Njoro', 'Lanet', 'Pipeline', 'Milimani', 'Kaptembwa', 'Bahati', 'Subukia', 'Rongai', 'London', 'Free Area', 'Section 58', 'Maai Mahiu', 'Elementaita', 'Karagita', 'Rhonda', 'Kivumbini'],
    
    'Kiambu': ['Thika', 'Ruiru', 'Kikuyu', 'Limuru', 'Kiambu Town', 'Juja', 'Karuri', 'Githunguri', 'Gatundu', 'Kiambaa', 'Kabete', 'Ruaka', 'Banana', 'Kahawa Wendani', 'Githurai', 'Tatu City', 'Ndenderu', 'Muguga', 'Tigoni', 'Lari'],
    
    'Machakos': ['Machakos Town', 'Athi River', 'Mlolongo', 'Syokimau', 'Kangundo', 'Matungulu', 'Mavoko', 'Tala', 'Mwala', 'Kathiani', 'Masinga', 'Yatta', 'Matuu', 'Kola', 'Mua Hills', 'Kalama', 'Mbiuni', 'Kyumvi', 'Mitaboni', 'Wamunyu'],
    
    'Kajiado': ['Kajiado Town', 'Ngong', 'Kitengela', 'Isinya', 'Ongata Rongai', 'Kiserian', 'Namanga', 'Bissil', 'Sultan Hamud', 'Mashuru', 'Kimana', 'Loitokitok', 'Magadi', 'Enkare Narok', 'Ngong Hills', 'Olkeri', 'Olooseos', 'Matasia', 'Empakasi', 'Kenyawa'],
    
    'Meru': ['Meru Town', 'Maua', 'Mikinduri', 'Timau', 'Kianjai', 'Nkubu', 'Githongo', 'Mitunguu', 'Igoji', 'Kionyo', 'Laare', 'Nchiru', 'Kiirua', 'Athiru Gaiti', 'Kaaga', 'Ruiri', 'Muthara', 'Mwimbi', 'Chuka', 'Ikuu'],
    
    'Uasin Gishu': ['Eldoret Town', 'Langas', 'Pioneer', 'West Indies', 'Kapsoya', 'Huruma', 'Kapseret', 'Ainabkoi', 'Burnt Forest', 'Turbo', 'Ziwa', 'Moi University', 'Kipkenyo', 'Elgon View', 'Kimumu', 'Cheptiret', 'Kaptagat', 'Sergoit', 'Moiben', 'Soy'],
    
    'Kakamega': ['Kakamega Town', 'Mumias', 'Butere', 'Malava', 'Lurambi', 'Shinyalu', 'Khayega', 'Shianda', 'Ikolomani', 'Likuyani', 'Lugari', 'Matete', 'Rosterman', 'Kabras', 'Musoli', 'Lumakanda', 'Shiatsala', 'Mahiakalo', 'Shinoyi', 'Mukhonje'],
    
    'Nyeri': ['Nyeri Town', 'Karatina', 'Othaya', 'Mukurweini', 'Tetu', 'Chaka', 'Gakere', 'Ruring\'u', 'Mahiga', 'Gatitu', 'Kiganjo', 'Nairutia', 'Gatarakwa', 'Magutu', 'Karima', 'Kamakwa', 'Gaikuyu', 'Wamagana', 'Iriaini', 'Mweiga'],
    
    'Embu': ['Embu Town', 'Runyenjes', 'Siakago', 'Kirimari', 'Mbeere', 'Ishiara', 'Makima', 'Kigari', 'Gachoka', 'Evurore', 'Nthawa', 'Ugweri', 'Kathanjuri', 'Kianjokoma', 'Kianjuki', 'Kagaari South', 'Mavuria', 'Mbeti North', 'Rianjeru', 'Gaturi'],
    
    'Kisii': ['Kisii Town', 'Ogembo', 'Keroka', 'Suneka', 'Nyamache', 'Keumbu', 'Masimba', 'Nyamarambe', 'Gesonso', 'Magena', 'Marani', 'Mosocho', 'Nyangusu', 'Tabaka', 'Tendere', 'Bobaracho', 'Kegogi', 'Riochanda', 'Kijauri', 'Bogichora'],
    
    'Bungoma': ['Bungoma Town', 'Webuye', 'Chwele', 'Kimilili', 'Malakisi', 'Bumula', 'Sirisia', 'Kanduyi', 'Khalaba', 'Mayanja', 'Kabuchai', 'Musikoma', 'Lwandanyi', 'Misikhu', 'Bokoli', 'Tongaren', 'Naitiri', 'Mihuu', 'Kamukuywa', 'Kibabii'],
    
    'Garissa': ['Garissa Town', 'Dadaab', 'Balambala', 'Ijara', 'Fafi', 'Lagdera', 'Hulugho', 'Modogashe', 'Masalani', 'Sangailu', 'Bura', 'Sankuri', 'Benane', 'Liboi', 'Dertu', 'Jarajilla', 'Hagadera', 'Korondile', 'Shanta Abak', 'Bilis Qooqani'],
    
    'Turkana': ['Lodwar', 'Kakuma', 'Kalokol', 'Lokitaung', 'Lokichar', 'Lokichoggio', 'Lokori', 'Kotaruk', 'Kaputir', 'Kerio', 'Lopur', 'Lorengippi', 'Katilu', 'Lokiriama', 'Kalobeyei', 'Napeitom', 'Lokangae', 'Lokwamosing', 'Lokichar', 'Kalapata'],
    
    'Mandera': ['Mandera Town', 'Rhamu', 'Elwak', 'Takaba', 'Arabia', 'Banissa', 'Fino', 'Lafey', 'Kutulo', 'Ashabito', 'Gither', 'Kiliwehiri', 'Shimbir Fatuma', 'Wargadud', 'Kotulo', 'Malka Mari', 'Dandu', 'Ahmednasir', 'Handaro', 'Neboi'],
    
    'Wajir': ['Wajir Town', 'Habaswein', 'Buna', 'Diff', 'Hadado', 'Griftu', 'Tarbaj', 'Eldas', 'Kutulo', 'Gurar', 'Danaba', 'Wagberi', 'Khorof Harar', 'Sarman', 'Batalu', 'Diif', 'Leheley', 'Ibrahim Ure', 'Lagboghol South', 'Barwago'],
    
    'Isiolo': ['Isiolo Town', 'Merti', 'Garbatulla', 'Kinna', 'Sericho', 'Ngaremara', 'Boji', 'Chari', 'Cherab', 'Garba Tulla', 'Oldonyiro', 'Kulamawe', 'Burat', 'Rapsu', 'Ngare Mara', 'Kom', 'Kipsing', 'Gambella', 'Gafarsa', 'Eldera'],
    
    'Marsabit': ['Marsabit Town', 'Moyale', 'Loiyangalani', 'North Horr', 'Sololo', 'Turbi', 'Maikona', 'Karare', 'Sagante', 'Bubisa', 'Uran', 'Laisamis', 'Korr', 'Logologo', 'Kargi', 'Ngurunit', 'Gas', 'Balesa', 'Illaut', 'Kituruni'],
    
    'Kitui': ['Kitui Town', 'Mutomo', 'Mwingi', 'Kabati', 'Migwani', 'Tseikuru', 'Nuu', 'Mumoni', 'Matinyani', 'Kyuso', 'Tharaka', 'Chuluni', 'Ikutha', 'Mutonguni', 'Mutha', 'Zombe', 'Endau', 'Ikanga', 'Tiva', 'Nguni'],
    
    'Makueni': ['Wote', 'Makindu', 'Kathonzweni', 'Sultan Hamud', 'Kibwezi', 'Mtito Andei', 'Emali', 'Nguu', 'Masongaleni', 'Ukia', 'Kikumbulyu', 'Kalawa', 'Kilungu', 'Nunguni', 'Mbitini', 'Kitise', 'Kambu', 'Waia', 'Kola', 'Ithumula'],
    
    'Nandi': ['Kapsabet', 'Nandi Hills', 'Mosoriot', 'Kabiyet', 'Kobujoi', 'Kapchorwa', 'Chemase', 'Lessos', 'Tindiret', 'Chepterwai', 'Kaptumo', 'Maraba', 'Kipkaren', 'Chepkunyuk', 'Kapsisiywa', 'Ol Lessos', 'Kapsengere', 'Serem', 'Songhor', 'Kabiyet'],
    
    'Baringo': ['Kabarnet', 'Marigat', 'Eldama Ravine', 'Mogotio', 'Kabartonjo', 'Maji Mazuri', 'Chemolingot', 'Kampi ya Samaki', 'Nginyang', 'Mukutani', 'Salawa', 'Kipcherere', 'Tenges', 'Kositei', 'Bartabwa', 'Koriema', 'Kapkuikui', 'Koibatek', 'Sacho', 'Kisanana'],
    
    'Laikipia': ['Nanyuki', 'Nyahururu', 'Rumuruti', 'Ol Joro Orok', 'Dol Dol', 'Sipili', 'Kinamba', 'Marmanet', 'Ol Moran', 'Mukogodo', 'Mutara', 'Segera', 'Lamuria', 'Endarasha', 'Umande', 'Githiga', 'Ngobit', 'Wiyumiririe', 'Githioro', 'Gichungo'],
    
    'Samburu': ['Maralal', 'Baragoi', 'Wamba', 'Archers Post', 'South Horr', 'Barsaloi', 'Ang\'ata Nanyekie', 'Lodokejek', 'Kisima', 'Nachola', 'Baawa', 'Lolmolog', 'Ndoto', 'Porro', 'Loosuk', 'Suguta Marmar', 'Marti', 'El Barta', 'Longewan', 'Lpartuk'],
    
    'Trans Nzoia': ['Kitale', 'Endebess', 'Kiminini', 'Cherangany', 'Matisi', 'Bidii', 'Kinyoro', 'Saboti', 'Matumbei', 'Sikhendu', 'Machewa', 'Kapomboi', 'Kwanza', 'Sitatunga', 'Moi\'s Bridge', 'Kesogon', 'Sinyerere', 'Makutano', 'Tuwan', 'Suwerwa'],
    
    'West Pokot': ['Kapenguria', 'Makutano', 'Chepareria', 'Sigor', 'Alale', 'Kasei', 'Ortum', 'Lomut', 'Kacheliba', 'Suam', 'Kongelai', 'Mnagei', 'Chesegon', 'Lelan', 'Tapach', 'Sekker', 'Riwo', 'Masool', 'Kakiteitei', 'Kamatira'],
    
    'Elgeyo Marakwet': ['Iten', 'Chepkorio', 'Kapsowar', 'Kapcherop', 'Tot', 'Chesoi', 'Kapyego', 'Sengwer', 'Tambach', 'Tunyo', 'Kapchemutwa', 'Arror', 'Metkei', 'Kaptarakwa', 'Kapkenda', 'Embobut', 'Kapcherop', 'Sambirir', 'Soy North', 'Kaptich'],
    
    'Nyandarua': ['Ol Kalou', 'Nyahururu', 'Engineer', 'Shamata', 'Ol Joro Orok', 'Wanjohi', 'Kaimbaga', 'Githioro', 'Kipipiri', 'Geta', 'Njabini', 'Ndathi', 'Murungaru', 'Leshau Pondo', 'Gatimu', 'Nyakio', 'Charagita', 'Karau', 'Kanjuiri', 'Gathara'],
    
    'Murang\'a': ['Murang\'a Town', 'Kenol', 'Makuyu', 'Kandara', 'Kangema', 'Kigumo', 'Gatanga', 'Maragua', 'Sabasaba', 'Kahuro', 'Gaturi', 'Kanyenya-ini', 'Kamahuha', 'Kimorori', 'Mugoiri', 'Ithiru', 'Igamba', 'Kahumbu', 'Mbiri', 'Gaichanjiru'],
    
    'Kirinyaga': ['Kerugoya', 'Kutus', 'Sagana', 'Baricho', 'Kagio', 'Kiine', 'Kimbimbi', 'Wanguru', 'Ngurubani', 'Murinduko', 'Kariti', 'Karia', 'Tebere', 'Inoi', 'Kiamutugu', 'Mutithi', 'Kiamaciri', 'Makutano', 'Karumandi', 'Ndia'],
    
    'Tharaka Nithi': ['Chuka', 'Marimanti', 'Kathwana', 'Chogoria', 'Magutuni', 'Karingani', 'Mukothima', 'Mariani', 'Tunyai', 'Nkondi', 'Gatunga', 'Muthambi', 'Ikuu', 'Nchiru', 'Chiakariga', 'Maara', 'Chogoria', 'Ganga', 'Kanjuki', 'Magumoni'],
    
    'Bomet': ['Bomet Town', 'Sotik', 'Longisa', 'Mulot', 'Silibwet', 'Ndanai', 'Kapkimolwa', 'Chebunyo', 'Merigi', 'Kembu', 'Kipreres', 'Chemagel', 'Sigor', 'Kiprsonoi', 'Mutarakwa', 'Kapletundo', 'Chemaner', 'Tegat', 'Kipsonoi', 'Singorwet'],
    
    'Kericho': ['Kericho Town', 'Litein', 'Londiani', 'Kipkelion', 'Sosiot', 'Kapsoit', 'Fort Ternan', 'Kedowa', 'Chepseon', 'Kapkatet', 'Chilchila', 'Ainamoi', 'Kapsuser', 'Chemosot', 'Chelilis', 'Sigowet', 'Kamasian', 'Tebesonik', 'Kapsaos', 'Kapkugerwet'],
    
    'Narok': ['Narok Town', 'Kilgoris', 'Suswa', 'Loita', 'Mau Narok', 'Ololulunga', 'Melelo', 'Lolgorian', 'Naikarra', 'Mosiro', 'Olokurto', 'Keekonyokie', 'Nkoben', 'Nairagie Enkare', 'Olorropil', 'Siana', 'Aitong', 'Lemek', 'Nkareta', 'Mara'],
    
    'Homa Bay': ['Homa Bay Town', 'Mbita', 'Ndhiwa', 'Oyugis', 'Kendu Bay', 'Rodi Kopany', 'Rangwe', 'Sindo', 'Homa Lime', 'Pala', 'Asego', 'Rakwaro', 'Wang\'chieng', 'Kanyikela', 'Kasewe', 'Kibiri', 'Kwabwai', 'Kabondo', 'Kosele', 'Kochia'],
    
    'Migori': ['Migori Town', 'Awendo', 'Rongo', 'Kehancha', 'Isebania', 'Suna', 'Uriri', 'Kuria', 'Mabera', 'Muhuru Bay', 'Nyatike', 'Karungu', 'Masara', 'Ntimaru', 'Ngodhe', 'Macalder', 'God Jope', 'Bukira', 'Muhuru', 'Osingo'],
    
    'Siaya': ['Siaya Town', 'Bondo', 'Ugunja', 'Yala', 'Ukwala', 'Usonga', 'Ugenya', 'Akala', 'Siaya Township', 'Mugoye', 'Sigomere', 'Sirembe', 'Ambira', 'Sega', 'Ngiya', 'Madiany', 'Usigu', 'Sidindi', 'Rarienga', 'Marenyo'],
    
    'Busia': ['Busia Town', 'Malaba', 'Butula', 'Bumala', 'Nambale', 'Funyula', 'Matayos', 'Mundika', 'Marachi', 'Amukura', 'Ang\'urai', 'Agenga', 'Namboboto', 'Bulemia', 'Port Victoria', 'Sio Port', 'Bukhayo', 'Busibwabo', 'Marachi West', 'Marachi Central'],
    
    'Vihiga': ['Mbale', 'Chavakali', 'Luanda', 'Majengo', 'Hamisi', 'Sabatia', 'Serem', 'Shamakhokho', 'Muhudu', 'Emabungo', 'Jepkoyai', 'Mago', 'Tambua', 'Wodanga', 'Gisambai', 'Lyaduywa', 'Busali', 'Wamuluma', 'Izava', 'Lukova'],
    
    'Kwale': ['Ukunda', 'Kinango', 'Msambweni', 'Lunga Lunga', 'Shimba Hills', 'Ramisi', 'Mwereni', 'Tiwi', 'Diani Beach', 'Gombato', 'Kinondo', 'Mkongani', 'Ngombeni', 'Puma', 'Kombani', 'Gazi', 'Chale', 'Tsimba', 'Jimbo', 'Vanga'],
    
    'Kilifi': ['Kilifi Town', 'Malindi', 'Watamu', 'Gede', 'Kaloleni', 'Mariakani', 'Mazeras', 'Mtwapa', 'Takaungu', 'Jaribuni', 'Vitengeni', 'Sokoke', 'Mnarani', 'Mambrui', 'Kakoneni', 'Magarini', 'Marafa', 'Bamba', 'Ganze', 'Rabai'],
    
    'Tana River': ['Hola', 'Garsen', 'Bura', 'Madogo', 'Kipini', 'Oda', 'Chewele', 'Wenje', 'Bangale', 'Mnazini', 'Hewani', 'Mikinduni', 'Sailoni', 'Hirimani', 'Minjila', 'Wayu', 'Onkolde', 'Chewani', 'Kinakomba', 'Gwano'],
    
    'Lamu': ['Lamu Island', 'Manda', 'Hindi', 'Mokowe', 'Witu', 'Mpeketoni', 'Mkunumbi', 'Faza', 'Kiunga', 'Siyu', 'Matondoni', 'Shela', 'Kipungani', 'Kizingitini', 'Tchundwa', 'Pate Island', 'Bargoni', 'Basuba', 'Pandanguo', 'Hongwe'],
    
    'Taita Taveta': ['Voi', 'Taveta', 'Wundanyi', 'Mwatate', 'Bura', 'Mbololo', 'Werugha', 'Kishushe', 'Mwandeti', 'Njukini', 'Challa', 'Mbale', 'Mackinnon Road', 'Kitobo', 'Maungu', 'Sagala', 'Mgange', 'Kasigau', 'Jipe', 'Chawia']
};

// Initialize counties dropdown
function initializeCounties() {
    const countySelect = document.getElementById('postCounty');
    if (!countySelect) return;
    
    const sortedCounties = Object.keys(kenyaCountiesData).sort();
    
    sortedCounties.forEach(county => {
        const option = document.createElement('option');
        option.value = county;
        option.textContent = county;
        countySelect.appendChild(option);
    });
}

// Update locations based on selected county
function updateLocations() {
    const countySelect = document.getElementById('postCounty');
    const locationSelect = document.getElementById('postLocation');
    if (!countySelect || !locationSelect) return;
    
    const selectedCounty = countySelect.value;
    
    locationSelect.innerHTML = '<option value="">Select location</option>';
    
    if (selectedCounty && kenyaCountiesData[selectedCounty]) {
        locationSelect.disabled = false;
        
        kenyaCountiesData[selectedCounty].forEach(location => {
            const option = document.createElement('option');
            option.value = location;
            option.textContent = location;
            locationSelect.appendChild(option);
        });
    } else {
        locationSelect.disabled = true;
    }
}

// Load business locations from database
function loadBusinessLocations() {
    fetch('/api/locations', {
        headers: {
            'Accept': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(response => response.json())
    .then(locations => {
        const locationSelect = document.getElementById('postLocationId');
        if (!locationSelect) return;
        
        locationSelect.innerHTML = '<option value="">Select business location</option>';
        
        locations.forEach(location => {
            const option = document.createElement('option');
            option.value = location.id;
            option.textContent = location.business_name;
            locationSelect.appendChild(option);
        });
    })
    .catch(error => {
        console.error('Error loading locations:', error);
    });
}

// ===== POSTS MANAGER CLASS =====
class PostsManager {
    constructor() {
        this.posts = [];
        this.filteredPosts = [];
        this.selectedPosts = new Set();
        this.currentPage = 1;
        this.itemsPerPage = 10;
        this.editingPost = null;
        this.currentPhotos = [];
        this.currentPhotoIndex = 0;
        this.currentPostId = null;
        this.init();
    }

    init() {
        this.setupEventListeners();
        this.loadPosts();
        this.loadStats();
    }

    setupEventListeners() {
        // Filters
        document.getElementById('statusFilter').addEventListener('change', () => this.applyFilters());
        document.getElementById('categoryFilter').addEventListener('change', () => this.applyFilters());
        document.getElementById('searchFilter').addEventListener('input', (e) => {
            clearTimeout(this.searchTimeout);
            this.searchTimeout = setTimeout(() => this.applyFilters(), 500);
        });

        // Bulk actions
        document.getElementById('selectAll').addEventListener('change', (e) => this.toggleSelectAll(e.target.checked));
        document.getElementById('selectAllHeader').addEventListener('change', (e) => this.toggleSelectAll(e.target.checked));
        document.getElementById('bulkActions').addEventListener('change', this.updateBulkButton.bind(this));

        // Modal events
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeModal();
            if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
                e.preventDefault();
                openCreateModal();
            }
        });
    }

    renderTable() {
        const tbody = document.getElementById('postsTableBody');
        const startIndex = (this.currentPage - 1) * this.itemsPerPage;
        const endIndex = startIndex + this.itemsPerPage;
        const pageData = this.filteredPosts.slice(startIndex, endIndex);

        if (pageData.length === 0 && this.filteredPosts.length === 0) {
            this.showEmptyState();
            return;
        }

        tbody.innerHTML = pageData.map(post => {
            const locationParts = post.location.split(', ');
            const county = locationParts[locationParts.length - 1];
            const imageCount = post.imageCount || 0;
            const featuredBadge = post.featured ? '<i class="fas fa-star" style="color: #f59e0b; margin-left: 4px;" title="Featured"></i>' : '';
            
            return `
                <tr data-post-id="${post.id}">
                    <td>
                        <input type="checkbox" class="row-checkbox" onchange="postsManager.togglePostSelection(${post.id}, this.checked)">
                    </td>
                    <td>
                        <div class="post-preview">
                            <div class="post-image">
                                <i class="fas ${post.icon}"></i>
                            </div>
                            <div class="post-details">
                                <h4>${post.title}${featuredBadge}</h4>
                                <p>${post.location}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span class="category-tag ${post.category}">${this.formatCategory(post.category)}</span>
                    </td>
                    <td>
                        <strong style="color: #059669; font-weight: 600;">KES ${post.price.toLocaleString()}</strong>
                    </td>
                    <td>
                        <span style="color: #6b7280; font-size: 0.875rem;">${county}</span>
                    </td>
                    <td>
                        <span class="status-badge ${post.status}">${this.formatStatus(post.status)}</span>
                    </td>
                    <td>${post.views.toLocaleString()}</td>
                    <td>${post.inquiries}</td>
                    <td>
                        <span style="display: flex; align-items: center; gap: 4px; color: #6b7280;">
                            <i class="fas fa-image"></i>
                            <span>${imageCount}</span>
                        </span>
                    </td>
                    <td>${this.formatDate(post.date)}</td>
                    <td>
                        <div class="action-buttons">
                        ${imageCount > 0 ? `<button class="action-button" onclick="postsManager.viewPhotos(${post.id})" title="View Photos"><i class="fas fa-images"></i></button>` : ''}
                        <button class="action-button edit" onclick="postsManager.editPost(${post.id})"><i class="fas fa-edit"></i></button>
                        <button class="action-button delete" onclick="postsManager.deletePost(${post.id})"><i class="fas fa-trash"></i></button>
                    </div>
                    </td>
                </tr>
            `;
        }).join('');

        this.updatePagination();
        this.updateTableInfo();
        document.getElementById('emptyState').style.display = 'none';
        document.querySelector('.table-wrapper').style.display = 'block';
    }

    showEmptyState() {
        document.querySelector('.table-wrapper').style.display = 'none';
        document.getElementById('emptyState').style.display = 'block';
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
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        };
        
        animate();
    }

    easeOutCubic(t) {
        return 1 - Math.pow(1 - t, 3);
    }

    applyFilters() {
        this.loadPosts();
    }

    toggleSelectAll(checked) {
        this.selectedPosts.clear();
        const checkboxes = document.querySelectorAll('.row-checkbox');
        
        checkboxes.forEach(checkbox => {
            checkbox.checked = checked;
            if (checked) {
                const postId = parseInt(checkbox.closest('tr').dataset.postId);
                this.selectedPosts.add(postId);
            }
        });

        this.updateBulkButton();
    }

    togglePostSelection(postId, checked) {
        if (checked) {
            this.selectedPosts.add(postId);
        } else {
            this.selectedPosts.delete(postId);
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
        const hasSelection = this.selectedPosts.size > 0;
        
        bulkSelect.disabled = !hasSelection;
        applyButton.disabled = !hasSelection || !bulkSelect.value;
    }

    createPost() {
        const form = document.getElementById('postForm');
        const formData = new FormData(form);
        
        const featured = document.getElementById('postFeatured').checked;
        formData.set('featured', featured ? '1' : '0');
        
        const fileInput = document.getElementById('postPhotos');
        if (fileInput && fileInput.files.length > 0) {
            formData.delete('photos');
            formData.delete('photos[]');
            
            for (let i = 0; i < fileInput.files.length; i++) {
                formData.append('photos[]', fileInput.files[i]);
            }
        }
        
        Swal.fire({
            title: 'Uploading...',
            text: 'Please wait while we upload your post',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        fetch('/posts', {
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
                    this.loadPosts();
                    this.loadStats();
                });
            } else {
                Swal.close();
                if (data.errors) {
                    const errorMessages = Object.values(data.errors).flat().join('<br>');
                    Swal.fire({
                        icon: 'error',
                        title: 'Validation Error',
                        html: errorMessages,
                        confirmButtonColor: '#3b82f6'
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: data.message || 'Error creating post',
                        confirmButtonColor: '#3b82f6'
                    });
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error creating post: ' + error.message,
                confirmButtonColor: '#3b82f6'
            });
        });
    }

    updatePost() {
        const formData = new FormData(document.getElementById('postForm'));
        const postId = document.getElementById('postId').value;
        
        const featured = document.getElementById('postFeatured').checked;
        formData.set('featured', featured ? '1' : '0');
        
        const fileInput = document.getElementById('postPhotos');
        if (fileInput && fileInput.files.length > 0) {
            formData.delete('photos');
            formData.delete('photos[]');
            
            for (let i = 0; i < fileInput.files.length; i++) {
                formData.append('photos[]', fileInput.files[i]);
            }
        }
        
        Swal.fire({
            title: 'Updating...',
            text: 'Please wait while we update your post',
            allowOutsideClick: false,
            allowEscapeKey: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        
        fetch(`/posts/${postId}`, {
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
                    this.loadPosts();
                    this.loadStats();
                });
            } else {
                Swal.close();
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: data.message || 'Error updating post',
                    confirmButtonColor: '#3b82f6'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error updating post',
                confirmButtonColor: '#3b82f6'
            });
        });
    }

    editPost(id) {
        const post = this.posts.find(p => p.id === id);
        if (!post) return;

        this.editingPost = post;
        
        document.getElementById('postId').value = post.id;
        document.getElementById('postTitle').value = post.title;
        document.getElementById('postCategory').value = post.category;
        document.getElementById('postPrice').value = post.price;
        
        const locationParts = post.location.split(', ');
        const county = locationParts[locationParts.length - 1];
        const location = locationParts.slice(0, -1).join(', ');
        
        document.getElementById('postCounty').value = county;
        updateLocations();
        setTimeout(() => {
            document.getElementById('postLocation').value = location;
        }, 100);
        
        document.getElementById('postLocationId').value = post.location_id;
        document.getElementById('postDescription').value = post.description;
        document.getElementById('postStatus').value = post.status;
        document.getElementById('postFeatured').checked = post.featured;

        document.getElementById('modalTitle').textContent = 'Edit Post';
        document.getElementById('saveButtonText').textContent = 'Update Post';

        this.openModal();
    }

    deletePost(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Deleting...',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });
                
                fetch(`/posts/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
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
                        this.loadPosts();
                        this.loadStats();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: data.message || 'Error deleting post',
                            confirmButtonColor: '#3b82f6'
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error deleting post',
                        confirmButtonColor: '#3b82f6'
                    });
                });
            }
        });
    }

    loadPosts() {
        const statusFilter = document.getElementById('statusFilter').value;
        const categoryFilter = document.getElementById('categoryFilter').value;
        const searchFilter = document.getElementById('searchFilter').value;
        
        const params = new URLSearchParams({
            page: this.currentPage,
            status: statusFilter,
            category: categoryFilter,
            search: searchFilter
        });
        
        return fetch(`/posts/data?${params}`, {
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.posts = data.data.map(post => {
                    let photos = [];
                    if (post.photos) {
                        photos = typeof post.photos === 'string' ? JSON.parse(post.photos) : post.photos;
                    }
                    
                    return {
                        ...post,
                        location: `${post.location}, ${post.county}`,
                        date: new Date(post.created_at),
                        icon: this.getCategoryIcon(post.category),
                        photos: photos,
                        imageCount: photos.length
                    };
                });
                
                this.filteredPosts = this.posts;
                this.pagination = data.pagination;
                this.renderTable();
            }
            return data;
        })
        .catch(error => {
            console.error('Error loading posts:', error);
            this.showNotification('Error loading posts', 'error');
            throw error;
        });
    }

    loadStats() {
        fetch('/posts/stats', {
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.animateNumber(document.getElementById('activeCount'), data.data.active);
                this.animateNumber(document.getElementById('pendingCount'), data.data.pending);
                this.animateNumber(document.getElementById('draftCount'), data.data.draft);
                this.animateNumber(document.getElementById('expiredCount'), data.data.expired);
            }
        })
        .catch(error => {
            console.error('Error loading stats:', error);
        });
    }

    validateForm() {
        const title = document.getElementById('postTitle').value.trim();
        const category = document.getElementById('postCategory').value;
        const price = document.getElementById('postPrice').value;
        const locationId = document.getElementById('postLocationId').value;
        const description = document.getElementById('postDescription').value.trim();

        if (!title) {
            this.showNotification('Title is required', 'error');
            return false;
        }
        if (!category) {
            this.showNotification('Category is required', 'error');
            return false;
        }
        if (!price || price < 0) {
            this.showNotification('Valid price is required', 'error');
            return false;
        }
        if (!locationId) {
            this.showNotification('Business location is required', 'error');
            return false;
        }
        if (!description || description.length < 10) {
            this.showNotification('Description must be at least 10 characters', 'error');
            return false;
        }

        return true;
    }

    openModal() {
        const modal = document.getElementById('postModal');
        modal.classList.add('show');
        document.body.style.overflow = 'hidden';
    }

    closeModal() {
        const modal = document.getElementById('postModal');
        modal.classList.remove('show');
        document.body.style.overflow = '';
        this.resetForm();
        this.editingPost = null;
    }

   resetForm() {
    // Reset the form
    document.getElementById('postForm').reset();
    
    // CRITICAL: Clear the hidden postId field
    document.getElementById('postId').value = '';
    
    // Reset location dropdowns
    document.getElementById('postLocation').innerHTML = '<option value="">Select county first</option>';
    document.getElementById('postLocation').disabled = true;
    
    // Clear file input
    const fileInput = document.getElementById('postPhotos');
    if (fileInput) {
        fileInput.value = '';
    }
    
    // Reset modal title and button text
    document.getElementById('modalTitle').textContent = 'Create New Post';
    document.getElementById('saveButtonText').textContent = 'Save Post';
    
    // Reset editing state
    this.editingPost = null;
}

    updatePagination() {
        const totalPages = Math.ceil(this.filteredPosts.length / this.itemsPerPage);
        const controls = document.getElementById('paginationControls');
        
        let html = `
            <button class="page-btn" onclick="postsManager.changePage(${this.currentPage - 1})" ${this.currentPage === 1 ? 'disabled' : ''}>
                <i class="fas fa-chevron-left"></i>
            </button>
        `;

        for (let i = 1; i <= totalPages; i++) {
            if (totalPages <= 7 || i <= 3 || i > totalPages - 3 || Math.abs(i - this.currentPage) <= 1) {
                html += `
                    <button class="page-btn ${i === this.currentPage ? 'active' : ''}" onclick="postsManager.changePage(${i})">
                        ${i}
                    </button>
                `;
            } else if (i === 4 || i === totalPages - 3) {
                html += `<span class="page-ellipsis">...</span>`;
            }
        }

        html += `
            <button class="page-btn" onclick="postsManager.changePage(${this.currentPage + 1})" ${this.currentPage === totalPages || totalPages === 0 ? 'disabled' : ''}>
                <i class="fas fa-chevron-right"></i>
            </button>
        `;

        controls.innerHTML = html;
    }

    updateTableInfo() {
        const startIndex = (this.currentPage - 1) * this.itemsPerPage + 1;
        const endIndex = Math.min(startIndex + this.itemsPerPage - 1, this.filteredPosts.length);
        const total = this.filteredPosts.length;
        
        const infoText = total > 0 ? `Showing ${startIndex}-${endIndex} of ${total} posts` : 'No posts found';
        document.getElementById('tableInfo').textContent = infoText;
        document.getElementById('paginationInfo').textContent = infoText;
    }

    changePage(page) {
        const totalPages = Math.ceil(this.filteredPosts.length / this.itemsPerPage);
        if (page >= 1 && page <= totalPages) {
            this.currentPage = page;
            this.renderTable();
        }
    }

    applyBulkActions(action) {
        const selectedIds = Array.from(this.selectedPosts);
        
        fetch('/posts/bulk-action', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: action,
                post_ids: selectedIds
            })
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
                this.loadPosts();
                this.loadStats();
                this.selectedPosts.clear();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: data.message || 'Error applying bulk action',
                    confirmButtonColor: '#3b82f6'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'Error applying bulk action',
                confirmButtonColor: '#3b82f6'
            });
        });
    }

    formatCategory(category) {
        return category.charAt(0).toUpperCase() + category.slice(1).replace('-', ' ');
    }

    formatStatus(status) {
        if (status === 'featured') return 'Featured';
        return status.charAt(0).toUpperCase() + status.slice(1);
    }

    formatDate(date) {
        const dateObj = typeof date === 'string' ? new Date(date) : date;
        
        if (!(dateObj instanceof Date) || isNaN(dateObj)) {
            return 'Invalid date';
        }
        
        const now = new Date();
        const diff = now - dateObj;
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        
        if (days === 0) return 'Today';
        if (days === 1) return '1 day ago';
        if (days < 7) return `${days} days ago`;
        if (days < 14) return '1 week ago';
        if (days < 30) return `${Math.floor(days / 7)} weeks ago`;
        return dateObj.toLocaleDateString();
    }

    getCategoryIcon(category) {
        const icons = {
            'electronics': 'fa-laptop',
            'vehicles': 'fa-car',
            'real-estate': 'fa-home',
            'phones': 'fa-mobile-alt',
            'services': 'fa-tools',
            'fashion': 'fa-tshirt'
        };
        return icons[category] || 'fa-tag';
    }

    showNotification(message, type = 'success') {
        const icons = {
            success: 'success',
            error: 'error',
            warning: 'warning',
            info: 'info'
        };
        
        Swal.fire({
            icon: icons[type],
            title: type === 'success' ? 'Success!' : type === 'error' ? 'Error!' : 'Notice',
            text: message,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    }

    viewPhotos(postId) {
        const post = this.posts.find(p => p.id === postId);
        if (!post) return;
        
        let photos = post.photos || [];
        if (typeof photos === 'string') photos = JSON.parse(photos);
        
        if (photos.length === 0) {
            Swal.fire({ icon: 'info', title: 'No Photos', text: 'This post has no photos' });
            return;
        }
        
        this.currentPhotos = photos;
        this.currentPostId = postId;
        document.getElementById('photoViewerTitle').textContent = `${post.title} - Photos`;
        document.getElementById('photoGallery').innerHTML = photos.map((photo, i) => `
            <div class="photo-item">
                <img src="${photo}" alt="Photo ${i + 1}" loading="lazy" onclick="postsManager.openLightbox(${i})">
                <button class="photo-delete-btn" onclick="postsManager.deletePhoto(${postId}, ${i})" title="Delete photo">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        `).join('');
        
        document.getElementById('photoViewerModal').classList.add('show');
    }

    openLightbox(index) {
        this.currentPhotoIndex = index;
        document.getElementById('lightboxImage').src = this.currentPhotos[index];
        document.getElementById('lightbox').classList.add('show');
    }

    navigateLightbox(direction) {
        this.currentPhotoIndex = (this.currentPhotoIndex + direction + this.currentPhotos.length) % this.currentPhotos.length;
        document.getElementById('lightboxImage').src = this.currentPhotos[this.currentPhotoIndex];
    }

    deletePhoto(postId, photoIndex) {
        Swal.fire({
            title: 'Delete Photo?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(`/posts/${postId}/photo`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ photo_index: photoIndex })
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
                        
                        this.loadPosts().then(() => {
                            if (data.remaining_count > 0) {
                                this.viewPhotos(postId);
                            } else {
                                closePhotoViewer();
                            }
                        });
                    } else {
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
                        text: 'Error deleting photo',
                        confirmButtonColor: '#3b82f6'
                    });
                });
            }
        });
    }
}

// ===== INITIALIZATION =====
document.addEventListener('DOMContentLoaded', () => {
    initializeCounties();
    loadBusinessLocations();
    window.postsManager = new PostsManager();
    
    // Modal close on outside click
    document.getElementById('postModal').addEventListener('click', (e) => {
        if (e.target.classList.contains('modal-overlay')) closeModal();
    });
});
</script>
</x-portal-layout>