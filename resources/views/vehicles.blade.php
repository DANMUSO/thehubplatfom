<x-ads-layout>
<section class="bg-accent s-space-custom fixed-menu-mt">
           <div class="container">
                <div class="row">
                    <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
                        <div class="gradient-wrapper item-mb">
                            <div class="gradient-title">
                                <div class="row">
                                    <div class="col-4">
                                        <h2>All Cars & Vehicles Ads</h2>
                                    </div>
                                    <div class="col-8">
                                        <div class="layout-switcher">
                                            <ul>
                                                <li>
                                                    <div class="page-controls-sorting">
                                                        <button class="sorting-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">Sort By<i class="fa fa-sort" aria-hidden="true"></i></button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="#">Date</a>
                                                            <a class="dropdown-item" href="#">Best Sale</a>
                                                            <a class="dropdown-item" href="#">Rating</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="active"><a href="#" data-type="category-grid-layout3" class="product-view-trigger"><i class="fa fa-th-large"></i></a></li>
                                                <li><a href="#" data-type="category-list-layout3" class="product-view-trigger"><i class="fa fa-list"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="category-view" class="category-grid-layout3 gradient-padding zoom-gallery">
                                <div class="row">
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
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                           <div style="max-width: 320px; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;" 
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                <img src="{{asset('Platform/img/product/2017-Lexus-RX-200t-F-Sport (1).webp')}}" 
                                                    style="width: 100%; height: 100%; object-fit: cover;" 
                                                    alt="Lexus RX 200T">
                                                
                                                <!-- Featured Badge -->
                                                <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                    Featured
                                                </div>
                                                
                                                <!-- Green Corner -->
                                                <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;">
                                                </div>
                                                <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 22px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
                                                    Lexus RX 200T
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-calendar" style="color: #9ca3af;"></i> 2017
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> Nairobi
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981;">
                                                        Kshs. 5,400,000<span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                </div>
                                                
                                                <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.2s ease;" 
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="window.location.href='single-product-layout1.html'">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                           <div style="max-width: 320px; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;" 
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                <img src="{{asset('Platform/img/product/2015-AUDI-A6-S-Line-Quattro-2.8-FSI-2-900x500.webp')}}" 
                                                    style="width: 100%; height: 100%; object-fit: cover;" 
                                                    alt="Lexus RX 200T">
                                                
                                                <!-- Featured Badge -->
                                                <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                    Featured
                                                </div>
                                                
                                                <!-- Green Corner -->
                                                <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;">
                                                </div>
                                                <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 22px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
                                                    2015 Audi A6 S-Line
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-calendar" style="color: #9ca3af;"></i> 2017
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> Nairobi
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981;">
                                                        KSh. 2,999,000<span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                </div>
                                                
                                                <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.2s ease;" 
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="window.location.href='single-product-layout1.html'">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                                             <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                           <div style="max-width: 320px; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;" 
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                <img src="{{asset('Platform/img/product/2016-Land-Rover-Discovery-1.webp')}}" 
                                                    style="width: 100%; height: 100%; object-fit: cover;" 
                                                    alt="Lexus RX 200T">
                                                
                                                <!-- Featured Badge -->
                                                <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                    Featured
                                                </div>
                                                
                                                <!-- Green Corner -->
                                                <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;">
                                                </div>
                                                <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 22px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
                                                 Land Rover Discovery - 2016
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-calendar" style="color: #9ca3af;"></i> 2017
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> Nairobi
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981;">
                                                        KSh. 6,500,000<span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                </div>
                                                
                                                <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.2s ease;" 
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="window.location.href='single-product-layout1.html'">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                           <div style="max-width: 320px; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;" 
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                <img src="{{asset('Platform/img/product/2019-Volkswagen-Tiguan-6.webp')}}" 
                                                    style="width: 100%; height: 100%; object-fit: cover;" 
                                                    alt="Lexus RX 200T">
                                                
                                                <!-- Featured Badge -->
                                                <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                    Featured
                                                </div>
                                                
                                                <!-- Green Corner -->
                                                <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;">
                                                </div>
                                                <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 22px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
                                                  Volkswagen Tiguan -  2019
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-calendar" style="color: #9ca3af;"></i> 2017
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> Nairobi
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981;">
                                                        Kshs. 3,400,000<span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                </div>
                                                
                                                <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.2s ease;" 
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="window.location.href='single-product-layout1.html'">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                           <div style="max-width: 320px; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;" 
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                <img src="{{asset('Platform/img/product/2008-TOYOTA-LANDCRUISER-PRADO-1.webp')}}" 
                                                    style="width: 100%; height: 100%; object-fit: cover;" 
                                                    alt="Lexus RX 200T">
                                                
                                                <!-- Featured Badge -->
                                                <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                    Featured
                                                </div>
                                                
                                                <!-- Green Corner -->
                                                <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;">
                                                </div>
                                                <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 22px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
                                               TOYOTAL ANDCRUISER PRADO - 2008
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-calendar" style="color: #9ca3af;"></i> 2017
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> Nairobi
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981;">
                                                        Kshs. 5,400,000<span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                </div>
                                                
                                                <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.2s ease;" 
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="window.location.href='single-product-layout1.html'">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                     <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                           <div style="max-width: 320px; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;" 
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                <img src="{{asset('Platform/img/product/2012-Subaru-XV-1.webp')}}" 
                                                    style="width: 100%; height: 100%; object-fit: cover;" 
                                                    alt="Lexus RX 200T">
                                                
                                                <!-- Featured Badge -->
                                                <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                    Featured
                                                </div>
                                                
                                                <!-- Green Corner -->
                                                <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;">
                                                </div>
                                                <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 22px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
                                               Subaru XV-1    2012-
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-calendar" style="color: #9ca3af;"></i> 2017
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> Nairobi
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981;">
                                                        Kshs. 5,400,000<span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                </div>
                                                
                                                <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.2s ease;" 
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="window.location.href='single-product-layout1.html'">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <div class="product-box item-mb zoom-gallery">
                                           <div style="max-width: 320px; background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.1); transition: all 0.3s ease; margin: 0 auto;" 
                                            onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 24px rgba(0,0,0,0.15)'" 
                                            onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,0,0,0.1)'">
                                            
                                            <!-- Image Container -->
                                            <div style="position: relative; height: 240px; background: #f8f9fa; overflow: hidden;">
                                                <img src="{{asset('Platform/img/product/2017-Lexus-RX-200t-F-Sport (1).webp')}}" 
                                                    style="width: 100%; height: 100%; object-fit: cover;" 
                                                    alt="Lexus RX 200T">
                                                
                                                <!-- Featured Badge -->
                                                <div style="position: absolute; top: 16px; right: 16px; background: linear-gradient(135deg, #ff6b35, #f7931e); color: white; padding: 6px 14px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 8px rgba(255,107,53,0.3);">
                                                    Featured
                                                </div>
                                                
                                                <!-- Green Corner -->
                                                <div style="position: absolute; top: 0; left: 0; width: 0; height: 0; border-left: 45px solid #10b981; border-bottom: 45px solid transparent;">
                                                </div>
                                                <div style="position: absolute; top: 12px; left: 12px; color: white; font-size: 16px;">
                                                    <i class="fa fa-bolt"></i>
                                                </div>
                                            </div>
                                            
                                            <!-- Content Container -->
                                            <div style="padding: 24px;">
                                                <h3 style="margin: 0 0 8px 0; font-size: 22px; font-weight: 700; color: #1f2937; letter-spacing: -0.025em;">
                                                    Lexus RX 200T
                                                </h3>
                                                
                                                <div style="display: flex; align-items: center; gap: 16px; margin: 12px 0; color: #6b7280; font-size: 13px;">
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-calendar" style="color: #9ca3af;"></i> 2017
                                                    </span>
                                                    <span style="display: flex; align-items: center; gap: 4px;">
                                                        <i class="fa fa-map-marker-alt" style="color: #9ca3af;"></i> Nairobi
                                                    </span>
                                                </div>
                                                <div style="display: flex; align-items: center; justify-content: space-between; margin-top: 20px;">
                                                    <div style="font-size: 15px; font-weight: 800; color: #10b981;">
                                                        Kshs. 5,400,000<span style="font-size: 16px; font-weight: 600;">/=</span>
                                                    </div>
                                                </div>
                                                
                                                <button style="width: 100%; background: linear-gradient(135deg, #3b82f6, #1d4ed8); color: white; border: none; padding: 12px 0; border-radius: 10px; font-size: 15px; font-weight: 600; cursor: pointer; margin-top: 20px; transition: all 0.2s ease;" 
                                                        onmouseover="this.style.transform='translateY(-1px)'; this.style.boxShadow='0 4px 12px rgba(59,130,246,0.4)'" 
                                                        onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='none'"
                                                        onclick="window.location.href='single-product-layout1.html'">
                                                    View Details
                                                </button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="gradient-wrapper mb-60">
                            <ul class="cp-pagination">
                                <li class="disabled"><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Previous</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">6</a></li>
                                <li><a href="#">Next<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                        <div class="row no-gutters">
                            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                                <div class="add-layout2-left d-flex align-items-center">
                                    <div>
                                        <h2>Do you Have Something To Sell?</h2>
                                        <h3>Post your ad on TheHub.com</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                                <div class="add-layout2-right d-flex align-items-center justify-content-end mb--sm">
                                    <a href="#" class="cp-default-btn-sm-primary">Post Your Ad Now!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>All Categories</h3>
                                </div>
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
                        <div class="sidebar-item-box">
                            <div class="gradient-wrapper">
                                <div class="gradient-title">
                                    <h3>Location</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</x-ads-layout>
