<x-ads-layout>
    <!-- PROFESSIONAL WIDE POPUP - Replace existing popup HTML -->
<div id="promo-popup-overlay" style="position:fixed;top:0;left:0;width:100vw;height:100vh;background:rgba(15,23,42,0.8);backdrop-filter:blur(4px);z-index:999999;display:none;justify-content:center;align-items:center;font-family:'Segoe UI',system-ui,-apple-system,sans-serif;">
    <div style="background:white;border-radius:16px;max-width:720px;width:92%;position:relative;box-shadow:0 20px 40px rgba(0,0,0,0.2),0 0 0 1px rgba(255,255,255,0.1);overflow:hidden;transform:translateY(-20px);animation:slideUp 0.4s ease-out forwards;">
        
        <!-- Close Button -->
        <button onclick="closePopup()" style="position:absolute;top:16px;right:20px;background:rgba(0,0,0,0.1);border:none;width:28px;height:28px;border-radius:50%;font-size:16px;cursor:pointer;z-index:10;color:#64748b;transition:all 0.2s;display:flex;align-items:center;justify-content:center;" 
        onmouseover="this.style.background='rgba(0,0,0,0.2)'" 
        onmouseout="this.style.background='rgba(0,0,0,0.1)'">&times;</button>
        
        <!-- Main Content Layout -->
        <div style="display:flex;align-items:center;min-height:280px;">
            
            <!-- Left Side - CHANGED: Teal/Green gradient instead of blue -->
            <div style="background:linear-gradient(135deg,#10b981 0%,#059669 50%,#047857 100%);color:white;padding:40px 35px;flex:0 0 250px;height:100%;display:flex;flex-direction:column;justify-content:center;">
                <div style="background:rgba(255,255,255,0.15);width:48px;height:48px;border-radius:12px;margin:0 0 20px 0;display:flex;align-items:center;justify-content:center;">
                    <svg width="24" height="24" fill="white" viewBox="0 0 24 24">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                    </svg>
                </div>
                <h2 style="margin:0 0 8px 0;font-size:16px;font-weight:700;letter-spacing:-0.3px;line-height:1.2;">Exclusive Launch Offer</h2>
                <p style="margin:0;opacity:0.9;font-size:14px;">Limited time - First 1000 users only</p>
                
                <!-- Trust Indicators -->
                <div style="margin-top:25px;padding-top:20px;border-top:1px solid rgba(255,255,255,0.2);">
                    <div style="display:flex;align-items:center;gap:6px;margin-bottom:6px;">
                        <div style="display:flex;">
                            <!-- CHANGED: Orange stars instead of yellow -->
                            <span style="color:#f59e0b;font-size:14px;">★</span>
                            <span style="color:#f59e0b;font-size:14px;">★</span>
                            <span style="color:#f59e0b;font-size:14px;">★</span>
                            <span style="color:#f59e0b;font-size:14px;">★</span>
                            <span style="color:#f59e0b;font-size:14px;">★</span>
                        </div>
                        <span style="color:rgba(255,255,255,0.9);font-size:12px;font-weight:500;">4.9/5 rating</span>
                    </div>
                    <p style="color:rgba(255,255,255,0.8);font-size:12px;margin:0;">Trusted by 10,000+ sellers</p>
                </div>
            </div>
            
            <!-- Right Side - Content -->
            <div style="padding:40px 35px;flex:1;">
                <h3 style="margin:0 0 12px 0;color:#1e293b;font-size:20px;font-weight:600;">Get Premium Features FREE</h3>
                <p style="color:#64748b;margin:0 0 16px 0;font-size:15px;line-height:1.4;">Launch your marketplace journey with premium visibility worth KES 5,000 at no cost.</p>
                
                <!-- Benefits List - Horizontal Layout -->
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;margin:16px 0 28px 0;">
                    <div style="display:flex;align-items:center;">
                        <div style="background:#10b981;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                            <svg width="12" height="12" fill="white" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                            </svg>
                        </div>
                        <span style="color:#374151;font-size:14px;font-weight:500;">Featured listing 30 days</span>
                    </div>
                    <div style="display:flex;align-items:center;">
                        <div style="background:#10b981;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                            <svg width="12" height="12" fill="white" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                            </svg>
                        </div>
                        <span style="color:#374151;font-size:14px;font-weight:500;">5x more visibility</span>
                    </div>
                    <div style="display:flex;align-items:center;">
                        <div style="background:#10b981;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                            <svg width="12" height="12" fill="white" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                            </svg>
                        </div>
                        <span style="color:#374151;font-size:14px;font-weight:500;">Priority support</span>
                    </div>
                    <div style="display:flex;align-items:center;">
                        <div style="background:#10b981;width:20px;height:20px;border-radius:50%;display:flex;align-items:center;justify-content:center;margin-right:12px;flex-shrink:0;">
                            <svg width="12" height="12" fill="white" viewBox="0 0 24 24">
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41L9 16.17z"/>
                            </svg>
                        </div>
                        <span style="color:#374151;font-size:14px;font-weight:500;">Analytics dashboard</span>
                    </div>
                </div>
                
                <!-- CHANGED: Orange gradient CTA button instead of blue -->
                <button onclick="claimOffer()" style="width:100%;background:linear-gradient(135deg,#f59e0b,#d97706);color:white;border:none;padding:14px 16px;font-size:16px;font-weight:600;border-radius:10px;cursor:pointer;transition:all 0.2s;box-shadow:0 4px 12px rgba(245,158,11,0.3);"
                onmouseover="this.style.transform='translateY(-1px)';this.style.boxShadow='0 6px 20px rgba(245,158,11,0.4)'"
                onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 12px rgba(245,158,11,0.3)'">
                    Claim Your Free Premium Features
                </button>
                
                <p style="color:#9ca3af;font-size:12px;margin:12px 0 0 0;text-align:center;">No credit card required • Instant activation</p>
            </div>
        </div>
        
        <!-- CHANGED: Orange progress bar instead of blue -->
        <div id="popup-progress" style="position:absolute;bottom:0;left:0;width:100%;height:3px;background:rgba(245,158,11,0.1);">
            <div id="popup-progress-bar" style="height:100%;background:linear-gradient(90deg,#f59e0b,#d97706);width:0%;transition:width 0.1s linear;"></div>
        </div>
    </div>
</div>
<section class="bg-accent s-space-custom fixed-menu-mt">
            <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 mb--sm">
                        <div class="section-title-left-dark title-bar mb-40">
                            <h2>Featured Product</h2>
                        </div>
                        <div class="compact-container">
                        <div class="row category-grid-layout3 zoom-gallery">
                                                            @foreach($posts as $post)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="product-box item-mb zoom-gallery">
                                        <div style="max-width: 320px; min-height: 420px; display: flex; flex-direction: column; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;"
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                @if(!empty($post->photos) && count($post->photos) > 0)
                                                    <img src="{{ $post->photos[0] }}" 
                                                        style="width: 100%; height: 100%; object-fit: cover;" 
                                                        alt="{{ $post->title }}">
                                                @else
                                                    <img src="{{ asset('Platform/img/product/default.jpg') }}" 
                                                        style="width: 100%; height: 100%; object-fit: cover;" 
                                                        alt="No image">
                                                @endif
                                                
                                                <!-- Featured Badge -->
                                                @if($post->featured)
                                                    <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                        Featured
                                                    </div>
                                                @endif
                                                
                                                <!-- Status Badge -->
                                                @if($post->status == 'active')
                                                    <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;"></div>
                                                    <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                        <i class="fa fa-bolt"></i>
                                                    </div>
                                                @endif
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px; flex: 1; display: flex; flex-direction: column;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 20px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em; height: 56px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                                                    {{ Str::limit($post->title, 45) }}
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-tag" style="color: #9ca3af;"></i> 
                                                        {{ ucfirst($post->category) }}
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> 
                                                        {{ $post->county }}
                                                    </span>
                                                </div>
                                                
                                                <div style="margin-top: auto;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981; margin-bottom: 20px;">
                                                        KSh {{ number_format($post->price, 0) }}
                                                        <span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                    
                                                    <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; transition: all 0.2s ease;" 
                                                            onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                            onclick="window.location.href='{{ url('/post/' . $post->id) }}'">
                                                        View Details
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        </div>
                    </div>
                    <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="category-menu-layout1" id="category-menu-area">
                            <h3 class="sidebar-ctg-title">Categories</h3>
                             <ul class="sidebar-category-list">
                                    <li>
                                        <a href="{{url('electronics')}}"><img src="{{asset('Platform/img/product/electronics.png')}}" alt="category" class="img-fluid">Electronics<span>(50)</span></a>
                                    </li>
                                    <li>
                                        <a href="{{url('vehicles')}}"><img src="{{asset('Platform/img/product/ctg3.png')}}" alt="category" class="img-fluid">Car &amp; Vehicles<span>(50)</span></a>
                                    </li>
                                    <li>
                                        <a href="{{url('realestate')}}"><img src="{{asset('Platform/img/product/ctg7.png')}}" alt="category" class="img-fluid">Real Estate<span>(90)</span></a>
                                    </li>
                                     <li>
                                        <a href="{{url('phones')}}"><img src="{{asset('Platform/img/product/ctg1.png')}}" alt="category" class="img-fluid">Phones<span>(90)</span></a>
                                    </li>
                                </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-ads-layout>
