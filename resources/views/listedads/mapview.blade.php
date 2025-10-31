<x-ads-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business Locations Map') }}
        </h2>
    </x-slot>

    <main class="main-content">
        <br><br><br><br><br><br><br><br>
        <!-- Header Section -->
        <div class="page-header">
            <div class="header-left">
                <h1>Business Locations</h1>
            </div>
        </div>

        <!-- Full Width Map Container -->
        <div class="map-container">
            <div id="allLocationsMap" class="full-map"></div>
           
        </div>
    </main>

    <style>
        .main-content {
            padding: 24px;
            background: #ffffff;
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            color: #1f2937;
        }

        .page-header {
            margin-bottom: 24px;
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

        .map-container {
            position: relative;
            background: #ffffff;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .full-map {
            width: 100%;
            height: calc(100vh - 180px);
            min-height: 600px;
        }

        .map-legend {
            position: absolute;
            top: 20px;
            right: 20px;
            background: white;
            border-radius: 12px;
            padding: 16px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            min-width: 200px;
            z-index: 10;
        }

        .legend-title {
            font-size: 0.875rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .legend-items {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .legend-dot {
            width: 14px;
            height: 14px;
            border-radius: 50%;
            border: 2px solid white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .legend-dot.active {
            background: #10b981;
        }

        .legend-dot.pending {
            background: #f59e0b;
        }

        .legend-dot.draft {
            background: #6b7280;
        }

        .legend-label {
            font-size: 0.875rem;
            color: #374151;
            font-weight: 500;
        }

        .legend-count {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .legend-count strong {
            color: #111827;
            font-weight: 600;
        }

        .legend-count span {
            color: #3b82f6;
            font-weight: 700;
            margin-left: 8px;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            display: inline-block;
        }

        .status-badge.active {
            background: rgba(16, 185, 129, 0.1);
            color: #059669;
        }

        .status-badge.pending {
            background: rgba(245, 158, 11, 0.1);
            color: #d97706;
        }

        .status-badge.draft {
            background: rgba(107, 114, 128, 0.1);
            color: #4b5563;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                padding: 16px;
            }

            .full-map {
                height: calc(100vh - 160px);
                min-height: 400px;
            }

            .map-legend {
                top: 10px;
                right: 10px;
                padding: 12px;
                min-width: 160px;
            }

            .legend-title {
                font-size: 0.75rem;
            }

            .legend-label {
                font-size: 0.75rem;
            }
        }
    </style>

    <!-- Google Maps API -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap" async defer></script>

    <script>
        let allLocationsMap, allLocationMarkers = [], allLocationInfoWindows = [];
        let locations = [];

        function initMap() {
            // Initialize with Kenya center (Nairobi)
            const kenyaCenter = { lat: -1.286389, lng: 36.817223 };
            
            allLocationsMap = new google.maps.Map(document.getElementById('allLocationsMap'), {
                center: kenyaCenter,
                zoom: 10,
                styles: [
                    {
                        featureType: "poi",
                        elementType: "labels",
                        stylers: [{ visibility: "off" }]
                    }
                ]
            });

            // Load locations data
            loadLocations();
        }

        function loadLocations() {
            fetch('/locations/alldata', {
                headers: { 'Accept': 'application/json' }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    locations = data.data.filter(loc => loc.latitude && loc.longitude);
                    displayLocationsOnMap();
                }
            })
            .catch(error => {
                console.error('Error loading locations:', error);
            });
        }

        function displayLocationsOnMap() {
            // Clear existing markers
            allLocationMarkers.forEach(marker => marker.setMap(null));
            allLocationMarkers = [];
            allLocationInfoWindows.forEach(infoWindow => infoWindow.close());
            allLocationInfoWindows = [];

            if (locations.length === 0) {
                document.getElementById('mapLocationCount').textContent = '0';
                return;
            }

            // Calculate map bounds
            const bounds = new google.maps.LatLngBounds();
            
            locations.forEach(location => {
                const lat = parseFloat(location.latitude);
                const lng = parseFloat(location.longitude);
                bounds.extend(new google.maps.LatLng(lat, lng));
            });

            // Fit bounds to show all markers
            allLocationsMap.fitBounds(bounds);

            // Marker colors based on status
            const markerColors = {
                'active': '#10b981',
                'pending': '#f59e0b',
                'draft': '#6b7280'
            };

            // Add markers for each location
            locations.forEach(location => {
                const lat = parseFloat(location.latitude);
                const lng = parseFloat(location.longitude);
                const position = new google.maps.LatLng(lat, lng);

                // Create custom marker icon
                const markerIcon = {
                    path: google.maps.SymbolPath.BACKWARD_CLOSED_ARROW,
                    scale: 10,
                    fillColor: markerColors[location.status] || '#3b82f6',
                    fillOpacity: 1,
                    strokeColor: '#ffffff',
                    strokeWeight: 3,
                    rotation: 180,
                    anchor: new google.maps.Point(0, 8)
                };

                const marker = new google.maps.Marker({
                    position: position,
                    map: allLocationsMap,
                    title: location.business_name,
                    icon: markerIcon,
                    animation: google.maps.Animation.DROP,
                    optimized: false
                });

                // Add bounce animation on hover
                marker.addListener('mouseover', () => {
                    marker.setAnimation(google.maps.Animation.BOUNCE);
                    setTimeout(() => marker.setAnimation(null), 750);
                });

                // Get posts for this location
                const posts = location.posts || [];
                const postsHtml = posts.length > 0 ? `
                    <div style="margin-top: 12px; padding-top: 12px; border-top: 1px solid #e5e7eb;">
                        <strong style="color: #374151; font-size: 0.875rem;">Posts (${posts.length}):</strong>
                        <div style="max-height: 150px; overflow-y: auto; margin-top: 8px;">
                            ${posts.slice(0, 5).map(post => `
                                <div style="display: flex; gap: 8px; padding: 6px; background: #f9fafb; border-radius: 6px; margin-bottom: 6px;">
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
                        <div style="margin-top: 8px; padding-top: 8px; border-top: 1px solid #e5e7eb;">
                            <div style="font-size: 0.75rem; color: #6b7280;">
                                <strong>Coordinates:</strong><br>
                                ${lat.toFixed(6)}, ${lng.toFixed(6)}
                            </div>
                        </div>
                        ${postsHtml}
                        <div style="margin-top: 12px;">
                            <button onclick="window.open('https://www.google.com/maps?q=${lat},${lng}', '_blank')" 
                                    style="width: 100%; padding: 8px 12px; background: #10b981; color: white; border: none; border-radius: 6px; cursor: pointer; font-size: 0.875rem; font-weight: 500;">
                                <i class="fas fa-directions"></i> Get Directions
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
    </script>
</x-ads-layout>