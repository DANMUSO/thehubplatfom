<x-ads-layout>

  <section class="s-space-bottom-full bg-accent-shadow-body" style="padding-top: 20px;">
    <div class="container" style="margin-top: 0; padding-top: 10px;">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <h2>{{ $post->title }}</h2>
                            </div>
                            <div class="gradient-padding reduce-padding">
                            <div class="single-product-img-layout1 mb-50">
    <!-- Main Image Display -->
    <div class="tab-content">
        <span class="custom-price-tag">KSH {{ number_format($post->price, 0) }}</span>
        
        @foreach($post->photos as $index => $photo)
        <div class="tab-pane fade {{ $index === 0 ? 'active show' : '' }}" 
            id="related{{ $index + 1 }}">
            <a href="{{ $photo }}" class="zoom ex1">
                <img alt="{{ $post->title }} - Image {{ $index + 1 }}" 
                    src="{{ $photo }}" 
                    loading="{{ $index === 0 ? 'eager' : 'lazy' }}">
            </a>
        </div>
        @endforeach
    </div>
    
    <!-- Thumbnail Navigation (NOW BELOW) -->
    <ul class="nav tab-nav tab-nav-list">
        @foreach($post->photos as $index => $photo)
        <li class="nav-item">
            <a class="{{ $index === 0 ? 'active' : '' }}" 
            href="#related{{ $index + 1 }}" 
            data-toggle="tab" 
            aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                <img alt="Thumbnail {{ $index + 1 }}" 
                    src="{{ $photo }}" 
                    loading="lazy">
            </a>
        </li>
        @endforeach
    </ul>
</div>
                                <div class="section-title-left-dark child-size-xl title-bar item-mb">
                                    <h3>Product Details:</h3>
                                    <p class="text-medium-dark">
                                          {{ $post->description }}
                                    
                                    </p>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8 col-md-7 col-sm-12 col-12">
                                        <div class="section-title-left-primary child-size-xl">
                                            <h3>Specification:</h3>
                                        </div>
                                        <ul class="specification-layout2 mb-40">
                                        @php
                                            $specifications = explode("\n", $post->description);
                                            $specCount = 0;
                                        @endphp
                                        @foreach($specifications as $spec)
                                            @if(trim($spec) && $specCount < 9)
                                                <li>{{ trim($spec) }}</li>
                                                @php $specCount++; @endphp
                                            @endif
                                        @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-12 col-12 mb--sm">
                                        <div class="section-title-left-primary child-size-xl">
                                            <h3>Item Details:</h3>
                                        </div>
                                        <ul class="sidebar-item-details p-none">
                                            <li>Status:<span>{{ ucfirst($post->status) }}</span></li>
                                            <li>Category:<span>{{ ucfirst($post->category) }}</span></li>
                                            <li>Location:<span>
                                            {{$post->county}}
            
                                            @if(!empty($post->location->latitude) && !empty($post->location->longitude))
                                                @php
                                                    $lat = $post->location->latitude;
                                                    $lng = $post->location->longitude;
                                                    $businessName = urlencode($post->location->business_name ?? 'Location');
                                                    $directionsUrl = "https://www.google.com/maps/dir/?api=1&destination={$lat},{$lng}";
                                                @endphp
                                                <a href="{{ $directionsUrl }}" 
                                                target="_blank" 
                                                rel="noopener noreferrer"
                                                style="display: inline-flex; align-items: center; gap: 6px; margin-top: 8px; color: #3b82f6; text-decoration: none; font-size: 14px; font-weight: 600; padding: 6px 12px; background: #eff6ff; border-radius: 6px; transition: all 0.2s ease;"
                                                onmouseover="this.style.background='#dbeafe'; this.style.color='#2563eb'"
                                                onmouseout="this.style.background='#eff6ff'; this.style.color='#3b82f6'">
                                                    <i class="fa fa-map-marker" aria-hidden="true"></i> Get Directions
                                                </a>
                                            @endif
                                            </span></li>
                                            <li>
                                                <ul class="sidebar-social">
                                                    <li>Share:</li>
                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="item-actions border-top">
                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Save Ad</a></li>
                                    <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Share ad</a></li>
                                    <li><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 item-mb">
                         <!-- Seller Information Section - Works with your controller's $post variable -->
                    <div class="sidebar-item-box">
                        <div class="gradient-wrapper">
                            <div class="gradient-title">
                                <h3>Seller Information</h3>
                            </div>
                            <ul class="sidebar-seller-information">
                                <!-- Posted By -->
                                <li>
                                    <div class="media">
                                        <img src="{{ asset('Platform/img/user/user1.png') }}" alt="user" class="img-fluid pull-left">
                                        <div class="media-body">
                                            <span>Posted By</span>
                                            <h4>{{ $post->user->name ?? 'Anonymous Seller' }}</h4>
                                        </div>
                                    </div>
                                </li>

                                <li>
                        <div class="media">
                            <img src="{{ asset('Platform/img/user/user2.png') }}" alt="user" class="img-fluid pull-left">
                            <div class="media-body">
                                <span>Location</span>
                                <h4>{{$post->county}}</h4>
                                
                                @if(!empty($post->location->latitude) && !empty($post->location->longitude))
                                    @php
                                        $lat = $post->location->latitude;
                                        $lng = $post->location->longitude;
                                        $businessName = urlencode($post->location->business_name ?? 'Location');
                                        $directionsUrl = "https://www.google.com/maps/dir/?api=1&destination={$lat},{$lng}";
                                    @endphp
                                    <a href="{{ $directionsUrl }}" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    style="display: inline-flex; align-items: center; gap: 6px; margin-top: 8px; color: #3b82f6; text-decoration: none; font-size: 14px; font-weight: 600; padding: 6px 12px; background: #eff6ff; border-radius: 6px; transition: all 0.2s ease;"
                                    onmouseover="this.style.background='#dbeafe'; this.style.color='#2563eb'"
                                    onmouseout="this.style.background='#eff6ff'; this.style.color='#3b82f6'">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i> Get Directions
                                    </a>
                                @endif
                            </div>
                        </div>
                    </li>

            <!-- Contact Number -->
            <li>
                <div class="media">
                    <img src="{{ asset('Platform/img/user/user3.png') }}" alt="user" class="img-fluid pull-left">
                    <div class="media-body">
                        <span>Contact Number</span>
                        <h4>
                            @if(optional($post->user)->phone)
                                <a href="tel:{{ $post->user->phone }}" 
                                   style="color: #3b82f6; text-decoration: none; font-weight: 600;">
                                    <i class="fa fa-phone" aria-hidden="true"></i> {{ $post->user->phone }}
                                </a>
                            @else
                                <span style="color: #999;">Not Available</span>
                            @endif
                        </h4>
                    </div>
                </div>
            </li>

            <!-- WhatsApp Chat -->
            <li>
                <div class="media">
                    <img src="{{ asset('Platform/img/user/user4.png') }}" alt="user" class="img-fluid pull-left">
                    <div class="media-body">
                        <span>Want To Live Chat</span>
                        @if(optional($post->user)->phone)
                            @php
                                // Clean phone number (remove spaces, dashes, etc.)
                                $cleanPhone = preg_replace('/[^0-9+]/', '', $post->user->phone);
                                
                                // Format phone for WhatsApp (add country code if missing)
                                if (!str_starts_with($cleanPhone, '+')) {
                                    // Assuming Kenya (+254)
                                    if (str_starts_with($cleanPhone, '0')) {
                                        $cleanPhone = '+254' . substr($cleanPhone, 1);
                                    } else {
                                        $cleanPhone = '+254' . $cleanPhone;
                                    }
                                }
                                
                                // Create WhatsApp message with ad details
                                 $whatsappMessage = urlencode(
    "Hi {$post->user->name}, I'm interested in your ad:\n\n" .
    "*{$post->title}*\n" .
    "Price: KSh " . number_format($post->price, 0) . "\n" .
    "Location: {$post->county}\n\n" .
    "View Ad: " . url('/post/' . $post->id)
);
                                
                                $whatsappUrl = "https://wa.me/{$cleanPhone}?text={$whatsappMessage}";
                            @endphp
                            <h4>
                                <a href="{{ $whatsappUrl }}" 
                                   target="_blank" 
                                   rel="noopener noreferrer"
                                   style="color: #25D366; text-decoration: none; display: inline-flex; align-items: center; gap: 6px; font-weight: 600;">
                                    <i class="fa fa-whatsapp" aria-hidden="true" style="font-size: 18px;"></i> 
                                    Chat on WhatsApp
                                </a>
                            </h4>
                        @else
                            <h4 style="color: #999;">Chat Not Available</h4>
                        @endif
                    </div>
                </div>
            </li>

            <!-- User Type / Verification Status -->
            <li>
                <div class="media">
                    <img src="{{ asset('Platform/img/user/user5.png') }}" alt="user" class="img-fluid pull-left">
                    <div class="media-body">
                        <span>User Type</span>
                        <h4>
                            @if(optional($post->user)->verified)
                                <span style="color: #10b981; font-weight: 600;">
                                    <i class="fa fa-check-circle" aria-hidden="true"></i> Verified Seller
                                </span>
                            @else
                                Regular User
                            @endif
                        </h4>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Item Details</h3>
                                </div>
                                <ul class="sidebar-item-details">
                                    <li>Status:<span>{{ ucfirst($post->status) }}</span></li>
                                    <li>Category:<span>{{ ucfirst($post->category) }}</span></li>
                                    <li>Location:<span>
                                         {{$post->county}}
            
            @if(!empty($post->location->latitude) && !empty($post->location->longitude))
                @php
                    $lat = $post->location->latitude;
                    $lng = $post->location->longitude;
                    $businessName = urlencode($post->location->business_name ?? 'Location');
                    $directionsUrl = "https://www.google.com/maps/dir/?api=1&destination={$lat},{$lng}";
                @endphp
                <a href="{{ $directionsUrl }}" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   style="display: inline-flex; align-items: center; gap: 6px; margin-top: 8px; color: #3b82f6; text-decoration: none; font-size: 14px; font-weight: 600; padding: 6px 12px; background: #eff6ff; border-radius: 6px; transition: all 0.2s ease;"
                   onmouseover="this.style.background='#dbeafe'; this.style.color='#2563eb'"
                   onmouseout="this.style.background='#eff6ff'; this.style.color='#3b82f6'">
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Get Directions
                </a>
            @endif
                                    </span></li>
                                    <li>
                                        <ul class="sidebar-social">
                                            <li>Share:</li>
                                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Safety Tips for Buyers</h3>
                                </div>
                                <ul class="sidebar-safety-tips">
                                    <li>Meet seller at a public place</li>
                                    <li>Check The item before you buy</li>
                                    <li>Pay only after collecting The item</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gradient-wrapper">
                    <div class="gradient-title">
                        <h2>More Ads From {{ ucfirst($post->category) }} Category</h2>
                    </div>
                    <div class="gradient-padding">
                        <div class="cp-carousel nav-control-middle category-grid-layout1" data-loop="true" data-items="5" data-margin="30" data-autoplay="true" data-autoplay-timeout="5000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="3" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="4" data-r-medium-nav="true" data-r-medium-dots="false" data-r-Large="5" data-r-Large-nav="true" data-r-Large-dots="false">
                           @foreach($relatedPosts as $relatedPost)
                            <div class="product-box item-mb zoom-gallery">
                                <div style="max-width: 200px; min-height: 450px; display: flex; flex-direction: column; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;"
                                    onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 16px rgba(0,0,0,0.15)'" 
                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                    
                                    <!-- Image Container -->
                                    <div style="position: relative; height: 180px; background: #f8f9fa; overflow: hidden;">
                                        @if(!empty($relatedPost->photos) && count($relatedPost->photos) > 0)
                                        <img src="{{ $relatedPost->photos[0] }}" 
                                            style="width: 100%; height: 100%; object-fit: cover;" 
                                            alt="{{ $relatedPost->title }}">
                                        @else
                                        <img src="{{ asset('Platform/img/product/default.jpg') }}" 
                                            style="width: 100%; height: 100%; object-fit: cover;" 
                                            alt="No image">
                                        @endif
                                        
                                        @if($relatedPost->featured)
                                        <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                            Featured
                                        </div>
                                        @endif
                                        
                                        @if($relatedPost->status == 'active')
                                        <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;"></div>
                                        <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                            <i class="fa fa-bolt"></i>
                                        </div>
                                        @endif
                                    </div>
                                    
                                    <!-- Content Container -->
                                    <div style="padding: 16px; flex: 1; display: flex; flex-direction: column;">
                                        <h3 style="margin: 0 0 8px 0; font-size: 18px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em; height: 48px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                        {{ Str::limit($relatedPost->title, 35) }}
                                        </h3>
                                        
                                        <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                            <span style="display: flex; align-items: center; gap: 4px;">
                                                <i class="fa fa-tag" style="color: #9ca3af;"></i> {{ ucfirst($relatedPost->category) }}
                                            </span>
                                            <span style="display: flex; align-items: center; gap: 4px;">
                                                <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> {{ $relatedPost->county }}
                                            </span>
                                        </div>
                                        
                                        <div style="margin-top: auto;">
                                            <div style="font-size: 15px; font-weight: 800; color: #10b981; margin-bottom: 20px;">
                                                KSh {{ number_format($relatedPost->price, 0) }}<span style="font-size: 16px; font-weight: 600;">/=</span>
                                            </div>
                                            
                                            <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; transition: all 0.2s ease;" 
                                                    onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                    onclick="window.location.href='{{ url('/post/' . $relatedPost->id) }}'">
                                                View Details
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <style>
/* Image Gallery Styling - FORCE HORIZONTAL LAYOUT */
.single-product-img-layout1 {
    display: flex !important;
    flex-direction: column !important;
    gap: 15px !important;
    margin-bottom: 50px !important;
}

/* Thumbnail List - FORCE HORIZONTAL */
.tab-nav-list {
    display: flex !important;
    flex-direction: row !important;
    flex-wrap: nowrap !important;
    gap: 10px !important;
    width: 100% !important;
    overflow-x: auto !important;
    overflow-y: hidden !important;
    padding-bottom: 10px !important;
    margin: 0 !important;
    margin-right: 0 !important;
    list-style: none !important;
    align-items: center !important;
}

/* Override external stylesheet rules */
.single-product-img-layout1 ul.tab-nav-list {
    margin-right: 0 !important;
    display: flex !important;
    flex-direction: row !important;
    width: 100% !important;
}

/* Custom Scrollbar - Horizontal */
.tab-nav-list::-webkit-scrollbar {
    height: 6px !important;
    width: auto !important;
}

.tab-nav-list::-webkit-scrollbar-track {
    background: #f1f1f1 !important;
    border-radius: 3px !important;
}

.tab-nav-list::-webkit-scrollbar-thumb {
    background: #888 !important;
    border-radius: 3px !important;
}

.tab-nav-list::-webkit-scrollbar-thumb:hover {
    background: #555 !important;
}

/* Thumbnail Items - FORCE INLINE */
.tab-nav-list .nav-item {
    margin: 0 !important;
    margin-bottom: 0 !important;
    flex-shrink: 0 !important;
    display: inline-block !important;
    float: none !important;
}

.tab-nav-list .nav-item a {
    display: block !important;
    width: 100px !important;
    height: 80px !important;
    border: 2px solid #e5e7eb !important;
    border-radius: 8px !important;
    overflow: hidden !important;
    transition: all 0.3s ease !important;
    position: relative !important;
}

.tab-nav-list .nav-item a:hover,
.tab-nav-list .nav-item a.active {
    border-color: #3b82f6 !important;
    box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3) !important;
}

.tab-nav-list .nav-item a img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
}

/* Main Image Container */
.tab-content {
    width: 100% !important;
    position: relative !important;
    border-radius: 12px !important;
    overflow: hidden !important;
    background: #f8f9fa !important;
}

.tab-content .tab-pane {
    position: relative !important;
}

.tab-content .tab-pane a {
    display: block !important;
    width: 100% !important;
    height: 500px !important;
}

.tab-content .tab-pane img {
    width: 100% !important;
    height: 100% !important;
    object-fit: contain !important;
    object-position: center !important;
    background: #fff !important;
}

/* Price Tag */
.custom-price-tag {
    position: absolute !important;
    top: 20px !important;
    right: 20px !important;
    background: linear-gradient(135deg, #10b981, #059669) !important;
    color: white !important;
    padding: 12px 24px !important;
    border-radius: 25px !important;
    font-size: 24px !important;
    font-weight: 700 !important;
    z-index: 10 !important;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .tab-nav-list .nav-item a {
        width: 80px !important;
        height: 60px !important;
    }
    
    .tab-content .tab-pane a {
        height: 350px !important;
    }
    
    .custom-price-tag {
        font-size: 18px !important;
        padding: 8px 16px !important;
    }
}

/* Override any media query rules from external stylesheet */
@media only screen and (max-width: 767px) {
    .single-product-img-layout1 ul.tab-nav-list {
        width: 100% !important;
        flex-direction: row !important;
    }
    
    .single-product-img-layout1 ul.tab-nav-list li {
        width: auto !important;
    }
}

@media only screen and (max-width: 479px) {
    .single-product-img-layout1 ul.tab-nav-list {
        width: 100% !important;
        flex-direction: row !important;
    }
    
    .single-product-img-layout1 ul.tab-nav-list li {
        width: auto !important;
    }
}
</style>
</x-ads-layout>