<x-portal-layout>
    <main class="main-content">
        <!-- Pricing Plan Area Start Here -->
        <section class="pricing-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <center> 
                            <h4>Start Earning From Things You Don't Need Anymore</h4> <br>
                            <p>Choose your category and select the perfect plan</p>
                            <br>
                            
                            <!-- Category Selection with Icons -->
                            <div class="category-selector">
                                <button class="category-btn active" data-category="vehicles">
                                    <i class="fas fa-car"></i>
                                    <span>Car & Vehicles</span>
                                </button>
                                <button class="category-btn" data-category="realestate">
                                    <i class="fas fa-home"></i>
                                    <span>Real Estate</span>
                                </button>
                                <button class="category-btn" data-category="others">
                                    <i class="fas fa-th"></i>
                                    <span>Others</span>
                                </button>
                                <br>
                                <!-- Billing Toggle -->
                                <div class="billing-toggle">
                                    <span class="toggle-label active" id="monthlyLabel">Monthly</span>
                                    <label class="switch">
                                        <input type="checkbox" id="billingToggle">
                                        <span class="slider"></span>
                                    </label>
                                    <span class="toggle-label" id="yearlyLabel">Yearly <span class="discount-badge">Save 20%</span></span>
                                </div>
                            </div>
                            
                        </center>
                    </div> 
                </div>
                
                <!-- Vehicles Pricing -->
                <div class="pricing-grid category-content active" data-category="vehicles">
                    <!-- Free Package -->
                    <div class="pricing-card">
                        <div class="card-header">
                            <span class="plan-badge free">Free Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="0" data-yearly="0">0</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Basic Listing</h3>
                            <p class="plan-description">Perfect for selling personal vehicles</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Up to 3 vehicle ads/month</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>5 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>30 days listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Basic visibility</li>
                                <li class="excluded"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>No featured placement</li>
                            </ul>
                            
                            <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="vehicles" 
                                    data-plan="free" 
                                    data-amount="0">
                                Select Plan
                            </button>
                        </div>
                    </div>

                    <!-- Basic Package -->
                    <div class="pricing-card">
                        <div class="card-header">
                            <span class="plan-badge basic">Basic Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="149" data-yearly="1,430">149</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Enhanced Visibility</h3>
                            <p class="plan-description">Get more views for your vehicles</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Up to 10 vehicle ads/month</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>15 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>45 days listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Priority in search results</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Vehicle history badge</li>
                            </ul>
                            
                            <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="vehicles" 
                                    data-plan="basic" 
                                    data-amount="149">
                                Select Plan
                            </button>
                        </div>
                    </div>

                    <!-- Premium Package -->
                    <div class="pricing-card featured">
                        <div class="popular-badge">Most Popular</div>
                        <div class="card-header">
                            <span class="plan-badge premium">Premium Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="299" data-yearly="2,870">299</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Featured Vehicles</h3>
                            <p class="plan-description">Maximum exposure for dealers</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Unlimited vehicle ads</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>25 photos + video per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>60 days listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Top featured placement</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Verified dealer badge</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Performance analytics</li>
                            </ul>
                            
                            <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="vehicles" 
                                    data-plan="premium" 
                                    data-amount="299">
                                Select Plan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Real Estate Pricing -->
                <div class="pricing-grid category-content" data-category="realestate">
                    <!-- Free Package -->
                    <div class="pricing-card">
                        <div class="card-header">
                            <span class="plan-badge free">Free Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="0" data-yearly="0">0</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Basic Listing</h3>
                            <p class="plan-description">Perfect for individual property owners</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Up to 2 property ads/month</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>8 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>45 days listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Basic visibility</li>
                                <li class="excluded"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>No featured placement</li>
                            </ul>
                            
                            <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="realestate" 
                                    data-plan="free" 
                                    data-amount="0">
                                Select Plan
                            </button>
                        </div>
                    </div>

                    <!-- Basic Package -->
                    <div class="pricing-card">
                        <div class="card-header">
                            <span class="plan-badge basic">Basic Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="199" data-yearly="1,910">199</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Enhanced Visibility</h3>
                            <p class="plan-description">Ideal for landlords & sellers</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Up to 8 property ads/month</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>20 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>60 days listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Priority in search results</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Virtual tour support</li>
                            </ul>
                             <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="realestate" 
                                    data-plan="basic" 
                                    data-amount="199">
                                Select Plan
                            </button>
                        </div>
                    </div>

                    <!-- Premium Package -->
                    <div class="pricing-card featured">
                        <div class="popular-badge">Most Popular</div>
                        <div class="card-header">
                            <span class="plan-badge premium">Premium Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="499" data-yearly="4,790">499</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Agent & Developer</h3>
                            <p class="plan-description">Maximum exposure for professionals</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Top featured placement</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Verified agent badge</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Floor plans included</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Lead management tools</li>
                            </ul>
                             <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="realestate" 
                                    data-plan="premium" 
                                    data-amount="499">
                                Select Plan
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Others Category Pricing -->
                <div class="pricing-grid category-content" data-category="others">
                    <!-- Free Package -->
                    <div class="pricing-card">
                        <div class="card-header">
                            <span class="plan-badge free">Free Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="0" data-yearly="0">0</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Basic Listing</h3>
                            <p class="plan-description">Perfect for getting started</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Up to 5 ads per month</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>5 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>30 days listing duration</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Basic ad visibility</li>
                                <li class="excluded"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/></svg>No featured placement</li>
                            </ul>
                              <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="others" 
                                    data-plan="free" 
                                    data-amount="0">
                                Select Plan
                            </button>
                        </div>
                    </div>

                    <!-- Basic Package -->
                    <div class="pricing-card">
                        <div class="card-header">
                            <span class="plan-badge basic">Basic Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="99" data-yearly="950">99</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Enhanced Visibility</h3>
                            <p class="plan-description">Get more views with priority listing</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Up to 15 ads per month</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>10 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>45 days listing duration</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Priority ad visibility</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Basic analytics</li>
                            </ul>
                             <button type="button" class="btn-submit btn-select-plan featured" 
                                    data-category="others" 
                                    data-plan="basic" 
                                    data-amount="99">
                                Select Plan
                            </button>
                        </div>
                    </div>

                    <!-- Premium Package -->
                    <div class="pricing-card featured">
                        <div class="popular-badge">Most Popular</div>
                        <div class="card-header">
                            <span class="plan-badge premium">Premium Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="199" data-yearly="1,910">199</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Featured Ad Posting</h3>
                            <p class="plan-description">Stand out with featured placement</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Unlimited ads per month</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>15 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>60 days listing duration</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Featured placement</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Priority support</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Advanced analytics</li>
                            </ul>
                            <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="others" 
                                      data-plan="premium" 
                                    data-amount="199">
                                Select Plan
                            </button>
                        </div>
                    </div>

                    <!-- Business Package -->
                    <div class="pricing-card">
                        <div class="card-header">
                            <span class="plan-badge business">Business Post</span>
                            <div class="price-wrapper">
                                <span class="currency">KES</span>
                                <span class="amount" data-monthly="399" data-yearly="3,830">399</span>
                                <span class="period">/mo</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="plan-title">Enterprise Solution</h3>
                            <p class="plan-description">Maximum exposure for your business</p>
                            <ul class="features-list">
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Unlimited ads</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>20 photos per listing</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>90 days listing duration</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Top featured placement</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>24/7 premium support</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Full analytics dashboard</li>
                                <li class="included"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg>Custom branding</li>
                            </ul>
                            <button type="button" class="btn-submit btn-select-plan" 
                                    data-category="others" 
                                    data-plan="business" 
                                    data-amount="399">
                                Select Plan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- Payment Modal - Add BEFORE closing </section> tag -->
<div id="paymentModal" class="payment-modal">
    <div class="modal-content">
        <span class="close-modal">&times;</span>
        <h2>Complete Your Subscription</h2>
        
        <div id="planDetails" class="plan-details">
            <p><strong>Category:</strong> <span id="selectedCategory"></span></p>
            <p><strong>Plan:</strong> <span id="selectedPlan"></span></p>
            <p><strong>Billing:</strong> <span id="selectedBilling"></span></p>
            <p class="total-amount"><strong>Total:</strong> KES <span id="selectedAmount"></span></p>
        </div>

        <form id="paymentForm">
            @csrf
            <input type="hidden" name="category" id="hiddenCategory">
            <input type="hidden" name="plan_type" id="hiddenPlan">
            <input type="hidden" name="billing_cycle" id="hiddenBilling">

            <div class="form-group">
                <label for="payment_method">Payment Method *</label>
                <select name="payment_method" id="payment_method" class="form-control" required>
                    <option value="">Select Payment Method</option>
                    <option value="mpesa">M-Pesa</option>
                    <option value="card">Credit/Debit Card</option>
                </select>
            </div>

            <div class="form-group" id="phoneGroup" style="display: none;">
                <label for="phone_number">M-Pesa Phone Number *</label>
                <input type="tel" name="phone_number" id="phone_number" 
                       class="form-control" placeholder="254712345678"
                       pattern="254[0-9]{9}">
                <small class="form-text">Format: 254XXXXXXXXX</small>
            </div>

            <div id="paymentError" class="alert alert-danger" style="display: none;"></div>
            <div id="paymentSuccess" class="alert alert-success" style="display: none;"></div>

            <button type="submit" id="submitPayment" class="btn-payment">
                <span class="btn-text">Proceed to Payment</span>
                <span class="btn-loader" style="display: none;">
                    <i class="fas fa-spinner fa-spin"></i> Processing...
                </span>
            </button>
        </form>
    </div>
</div>

<!-- Add Payment Modal Styles INSIDE your existing <style> tag -->
<style>
/* Payment Modal Styles */
.payment-modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    overflow-y: auto;
    backdrop-filter: blur(3px);
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 40px;
    border-radius: 16px;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 10px 50px rgba(0, 0, 0, 0.3);
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.close-modal {
    color: #aaa;
    float: right;
    font-size: 32px;
    font-weight: bold;
    cursor: pointer;
    line-height: 1;
    transition: color 0.3s;
}

.close-modal:hover {
    color: #000;
}

.modal-content h2 {
    margin: 0 0 25px 0;
    color: #212529;
    font-size: 1.75rem;
}

.plan-details {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 25px;
}

.plan-details p {
    margin: 8px 0;
    font-size: 0.95rem;
    color: #495057;
}

.plan-details .total-amount {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 2px solid #dee2e6;
    font-size: 1.1rem;
    color: #212529;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #495057;
    font-size: 0.9rem;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e9ecef;
    border-radius: 8px;
    font-size: 0.95rem;
    transition: all 0.3s;
}

.form-control:focus {
    outline: none;
    border-color: #FF6B35;
    box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
}

.form-text {
    display: block;
    margin-top: 5px;
    font-size: 0.85rem;
    color: #6c757d;
}

.alert {
    padding: 12px 15px;
    border-radius: 8px;
    margin-bottom: 20px;
    font-size: 0.9rem;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.btn-payment {
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, #FF6B35 0%, #28A745 100%);
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
}

.btn-payment:hover:not(:disabled) {
    transform: translateY(-2px);
    box-shadow: 0 5px 20px rgba(255, 107, 53, 0.4);
}

.btn-payment:disabled {
    opacity: 0.7;
    cursor: not-allowed;
}

.btn-payment .btn-loader {
    display: none;
}

.btn-payment.loading .btn-text {
    display: none;
}

.btn-payment.loading .btn-loader {
    display: inline-block;
}

@media (max-width: 768px) {
    .modal-content {
        margin: 10% auto;
        padding: 30px 20px;
        width: 95%;
    }
    
    .modal-content h2 {
        font-size: 1.5rem;
    }
}
</style>

<!-- Add Payment JavaScript INSIDE your existing <script> tag -->
<script>
// REPLACE YOUR PAYMENT JAVASCRIPT WITH THIS FIXED VERSION

document.addEventListener('DOMContentLoaded', function() {
    // Billing toggle functionality
    const toggle = document.getElementById('billingToggle');
    const monthlyLabel = document.getElementById('monthlyLabel');
    const yearlyLabel = document.getElementById('yearlyLabel');
    const amounts = document.querySelectorAll('.amount');
    const periods = document.querySelectorAll('.period');
    
    monthlyLabel.classList.add('active');
    
    toggle.addEventListener('change', function() {
        const isYearly = this.checked;
        
        if (isYearly) {
            monthlyLabel.classList.remove('active');
            yearlyLabel.classList.add('active');
        } else {
            monthlyLabel.classList.add('active');
            yearlyLabel.classList.remove('active');
        }
        
        amounts.forEach(amount => {
            const monthly = amount.getAttribute('data-monthly');
            const yearly = amount.getAttribute('data-yearly');
            amount.textContent = isYearly ? yearly : monthly;
        });
        
        periods.forEach(period => {
            period.textContent = isYearly ? '/year' : '/mo';
        });
    });
    
    const categoryBtns = document.querySelectorAll('.category-btn');
    const categoryContents = document.querySelectorAll('.category-content');
    
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            categoryBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            
            categoryContents.forEach(content => {
                content.classList.remove('active');
            });
            
            const activeContent = document.querySelector(`.category-content[data-category="${category}"]`);
            if (activeContent) {
                activeContent.classList.add('active');
            }
        });
    });

    // PAYMENT CODE
    const modal = document.getElementById('paymentModal');
    const closeModal = document.querySelector('.close-modal');
    const paymentMethodSelect = document.getElementById('payment_method');
    const phoneGroup = document.getElementById('phoneGroup');
    const paymentForm = document.getElementById('paymentForm');
    const submitBtn = document.getElementById('submitPayment');
    
    // Open modal when plan is selected
    document.querySelectorAll('.btn-select-plan').forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.dataset.category;
            const plan = this.dataset.plan;
            const billing = document.getElementById('billingToggle').checked ? 'yearly' : 'monthly';
            
            // Get the price from the card's amount element
            const card = this.closest('.pricing-card');
            const amountElement = card.querySelector('.amount');
            const monthlyAmount = amountElement.getAttribute('data-monthly');
            const yearlyAmount = amountElement.getAttribute('data-yearly');
            
            // Use the correct amount based on billing cycle
            const amount = billing === 'yearly' ? yearlyAmount : monthlyAmount;
            
            // Update modal content
            document.getElementById('selectedCategory').textContent = category.charAt(0).toUpperCase() + category.slice(1);
            document.getElementById('selectedPlan').textContent = plan.charAt(0).toUpperCase() + plan.slice(1);
            document.getElementById('selectedBilling').textContent = billing.charAt(0).toUpperCase() + billing.slice(1);
            document.getElementById('selectedAmount').textContent = amount;
            
            // Update hidden form fields
            document.getElementById('hiddenCategory').value = category;
            document.getElementById('hiddenPlan').value = plan;
            document.getElementById('hiddenBilling').value = billing;
            
            // Show modal
            modal.style.display = 'block';
            document.body.style.overflow = 'hidden';
        });
    });
    
    // Close modal
    closeModal.addEventListener('click', function() {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });
    
    window.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
    
    // Show/hide phone number field
    paymentMethodSelect.addEventListener('change', function() {
        if (this.value === 'mpesa') {
            phoneGroup.style.display = 'block';
            document.getElementById('phone_number').required = true;
        } else {
            phoneGroup.style.display = 'none';
            document.getElementById('phone_number').required = false;
        }
    });
    
    // Handle form submission
    paymentForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        const errorDiv = document.getElementById('paymentError');
        const successDiv = document.getElementById('paymentSuccess');
        
        // Hide previous messages
        errorDiv.style.display = 'none';
        successDiv.style.display = 'none';
        
        // Show loading state
        submitBtn.disabled = true;
        submitBtn.classList.add('loading');
        
        try {
            const response = await fetch('/payment/initiate', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                },
                body: formData
            });
            
            const data = await response.json();
            
            if (data.success) {
                successDiv.textContent = data.message;
                successDiv.style.display = 'block';
                
                // Redirect after success
                setTimeout(() => {
                    if (data.data && data.data.payment_url) {
                        window.location.href = data.data.payment_url;
                    } else {
                        window.location.reload();
                    }
                }, 2000);
            } else {
                errorDiv.textContent = data.message || 'Payment failed. Please try again.';
                errorDiv.style.display = 'block';
                submitBtn.disabled = false;
                submitBtn.classList.remove('loading');
            }
        } catch (error) {
            errorDiv.textContent = 'An error occurred. Please try again.';
            errorDiv.style.display = 'block';
            submitBtn.disabled = false;
            submitBtn.classList.remove('loading');
        }
    });
});
</script>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.pricing-section {
    background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
    padding: 60px 20px;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
}

.container {
    max-width: 1400px;
    margin: 0 auto;
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header h4 {
    font-size: 2.5rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 15px;
    line-height: 1.2;
}

.section-header p {
    font-size: 1.1rem;
    color: #6c757d;
    font-weight: 400;
    margin-bottom: 30px;
}

/* Category Selector */
.category-selector {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.category-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 8px;
    padding: 15px 25px;
    background: white;
    border: 2px solid #e9ecef;
    border-radius: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    min-width: 140px;
}

.category-btn i {
    font-size: 32px;
    color: #495057;
    transition: all 0.3s ease;
}

.category-btn span {
    font-size: 14px;
    font-weight: 600;
    color: #495057;
    transition: all 0.3s ease;
}

.category-btn:hover {
    border-color: #FF6B35;
    transform: translateY(-3px);
    box-shadow: 0 4px 12px rgba(0, 123, 255, 0.15);
}

.category-btn.active {
    background: linear-gradient(135deg, #FF6B35 0%, #28A745 100%);
    border-color: #FF6B35;
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
}

.category-btn.active span {
    color: white;
}

.category-btn.active i {
    color: white;
}

/* Billing Toggle */
.billing-toggle {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 15px;
    margin-top: 30px;
}

.toggle-label {
    font-size: 1rem;
    font-weight: 600;
    color: #6c757d;
    transition: color 0.3s ease;
}

.toggle-label.active {
    color: #FF6B35;
}

.discount-badge {
    display: inline-block;
    background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    color: white;
    padding: 3px 8px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 600;
    margin-left: 6px;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.switch {
    position: relative;
    display: inline-block;
    width: 56px;
    height: 28px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: 0.3s;
    border-radius: 28px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: 0.3s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #FF6B35;
}

input:checked + .slider:before {
    transform: translateX(28px);
}

/* Category Content */
.category-content {
    display: none;
}

.category-content.active {
    display: grid;
}

/* Pricing Grid */
.pricing-grid {
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
    max-width: 1300px;
    margin: 0 auto;
}

/* Pricing Card */
.pricing-card {
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    position: relative;
    display: flex;
    flex-direction: column;
}

.pricing-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
}

.pricing-card.featured {
    border: 3px solid #FF6B35;
    transform: scale(1.05);
}

.pricing-card.featured:hover {
    transform: scale(1.05) translateY(-8px);
}

.popular-badge {
    position: absolute;
    top: 20px;
    right: 20px;
    background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
    color: white;
    padding: 6px 16px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    z-index: 10;
    box-shadow: 0 2px 8px rgba(255, 152, 0, 0.3);
}

.card-header {
    background: linear-gradient(135deg, #FF6B35 0%, #28A745 100%);
    padding: 35px 30px;
    text-align: center;
}

.pricing-card.featured .card-header {
    background: linear-gradient(135deg, #FF6B35 0%, #28A745 100%);
}

.plan-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.25);
    color: white;
    padding: 6px 18px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    margin-bottom: 20px;
    backdrop-filter: blur(10px);
}

.price-wrapper {
    display: flex;
    align-items: baseline;
    justify-content: center;
    gap: 5px;
    color: white;
}

.currency {
    font-size: 1.2rem;
    font-weight: 600;
}

.amount {
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1;
    transition: all 0.3s ease;
}

.period {
    font-size: 1rem;
    opacity: 0.9;
}

.card-body {
    padding: 35px 30px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.plan-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 12px;
}

.plan-description {
    color: #6c757d;
    font-size: 0.95rem;
    margin-bottom: 25px;
    line-height: 1.5;
}

.features-list {
    list-style: none;
    margin-bottom: 30px;
    flex: 1;
}

.features-list li {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 0;
    font-size: 0.95rem;
    color: #495057;
    border-bottom: 1px solid #f1f3f5;
}

.features-list li:last-child {
    border-bottom: none;
}

.features-list li svg {
    flex-shrink: 0;
}

.features-list li.included svg {
    color: #28a745;
}

.features-list li.excluded {
    color: #adb5bd;
}

.features-list li.excluded svg {
    color: #dc3545;
}

.btn-submit {
    display: block;
    width: 100%;
    padding: 15px 30px;
    background: linear-gradient(135deg, #FF6B35 0%, #28A745 100%);
    color: white;
    text-align: center;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    font-size: 1rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
}

.btn-submit:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
}

.btn-submit.featured {
    background: linear-gradient(135deg, #FF6B35 0%, #28A745 100%);
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
}

.btn-submit.featured:hover {
    box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .pricing-grid {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .pricing-card.featured {
        transform: scale(1);
    }
    
    .pricing-card.featured:hover {
        transform: translateY(-8px);
    }
}

@media (max-width: 768px) {
    .section-header h4 {
        font-size: 2rem;
    }
    
    .category-selector {
        gap: 10px;
    }
    
    .category-btn {
        min-width: 110px;
        padding: 12px 15px;
    }
    
    .category-btn i {
        font-size: 28px;
    }
    
    .category-btn span {
        font-size: 13px;
    }
    
    .pricing-grid {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .billing-toggle {
        flex-wrap: wrap;
    }
    
    .popular-badge {
        top: 15px;
        right: 15px;
        font-size: 11px;
        padding: 5px 12px;
    }
    
    .amount {
        font-size: 3rem;
    }
}

@media (max-width: 480px) {
    .pricing-section {
        padding: 40px 15px;
    }
    
    .section-header h4 {
        font-size: 1.6rem;
    }
    
    .section-header p {
        font-size: 1rem;
    }
    
    .category-selector {
        gap: 8px;
    }
    
    .category-btn {
        min-width: 100px;
        padding: 10px 12px;
    }
    
    .category-btn i {
        font-size: 24px;
    }
    
    .category-btn span {
        font-size: 12px;
    }
    
    .billing-toggle {
        gap: 10px;
    }
    
    .toggle-label {
        font-size: 0.9rem;
    }
    
    .card-header {
        padding: 25px 20px;
    }
    
    .card-body {
        padding: 25px 20px;
    }
    
    .amount {
        font-size: 2.5rem;
    }
    
    .plan-title {
        font-size: 1.3rem;
    }
    
    .features-list li {
        font-size: 0.9rem;
        padding: 10px 0;
    }
    
    .btn-submit {
        padding: 12px 20px;
        font-size: 0.95rem;
    }
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.pricing-card {
    animation: fadeInUp 0.6s ease forwards;
}

.pricing-card:nth-child(1) {
    animation-delay: 0.1s;
}

.pricing-card:nth-child(2) {
    animation-delay: 0.2s;
}

.pricing-card:nth-child(3) {
    animation-delay: 0.3s;
}

.pricing-card:nth-child(4) {
    animation-delay: 0.4s;
}
/* Updated Pricing Section - More Compact */
.pricing-section {
    background: linear-gradient(135deg, #f5f7fa 0%, #e9ecef 100%);
    padding: 40px 20px 50px;
}

/* Compact Header */
.section-header h4 {
    font-size: 1.75rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 8px;
    line-height: 1.3;
}

.section-header p {
    font-size: 0.95rem;
    color: #6c757d;
    margin-bottom: 20px;
}

/* Compact Category Buttons */
.category-selector {
    gap: 12px;
    margin-bottom: 20px;
}

.category-btn {
    padding: 12px 20px;
    border-radius: 10px;
    min-width: 120px;
    gap: 6px;
}

.category-btn i {
    font-size: 24px;
}

.category-btn span {
    font-size: 13px;
}

/* Compact Toggle */
.billing-toggle {
    gap: 12px;
    margin-top: 20px;
}

.toggle-label {
    font-size: 0.9rem;
}

.discount-badge {
    padding: 2px 8px;
    font-size: 10px;
    margin-left: 5px;
}

.switch {
    width: 48px;
    height: 24px;
}

.slider:before {
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
}

input:checked + .slider:before {
    transform: translateX(24px);
}

/* Compact Pricing Grid */
.pricing-grid {
    gap: 20px;
    margin-top: 30px;
}

/* Compact Pricing Cards */
.pricing-card {
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
}

.pricing-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
}

.pricing-card.featured {
    transform: scale(1.02);
}

.pricing-card.featured:hover {
    transform: scale(1.02) translateY(-4px);
}

/* Compact Popular Badge */
.popular-badge {
    top: 12px;
    right: 12px;
    padding: 4px 12px;
    font-size: 10px;
    border-radius: 16px;
}

/* Compact Card Header */
.card-header {
    padding: 24px 20px;
}

.plan-badge {
    padding: 4px 14px;
    font-size: 11px;
    margin-bottom: 12px;
}

.price-wrapper {
    gap: 4px;
}

.currency {
    font-size: 1rem;
}

.amount {
    font-size: 2.5rem;
}

.period {
    font-size: 0.9rem;
}

/* Compact Card Body */
.card-body {
    padding: 24px 20px;
}

.plan-title {
    font-size: 1.25rem;
    margin-bottom: 8px;
}

.plan-description {
    font-size: 0.85rem;
    margin-bottom: 18px;
}

/* Compact Features List */
.features-list {
    margin-bottom: 20px;
}

.features-list li {
    padding: 8px 0;
    font-size: 0.85rem;
    gap: 10px;
}

.features-list li svg {
    width: 14px;
    height: 14px;
}

/* Compact Submit Button */
.btn-submit {
    padding: 12px 24px;
    font-size: 0.9rem;
    border-radius: 8px;
}

/* Responsive - Even More Compact on Mobile */
@media (max-width: 768px) {
    .pricing-section {
        padding: 30px 15px 40px;
    }
    
    .section-header h4 {
        font-size: 1.5rem;
    }
    
    .section-header p {
        font-size: 0.9rem;
        margin-bottom: 16px;
    }
    
    .category-selector {
        gap: 8px;
        margin-bottom: 16px;
    }
    
    .category-btn {
        min-width: 100px;
        padding: 10px 16px;
    }
    
    .category-btn i {
        font-size: 20px;
    }
    
    .category-btn span {
        font-size: 12px;
    }
    
    .pricing-grid {
        gap: 16px;
        margin-top: 24px;
    }
    
    .card-header {
        padding: 20px 16px;
    }
    
    .card-body {
        padding: 20px 16px;
    }
    
    .amount {
        font-size: 2.25rem;
    }
    
    .plan-title {
        font-size: 1.15rem;
    }
    
    .features-list li {
        font-size: 0.8rem;
        padding: 7px 0;
    }
    
    .btn-submit {
        padding: 10px 20px;
        font-size: 0.85rem;
    }
}

@media (max-width: 480px) {
    .section-header h4 {
        font-size: 1.35rem;
    }
    
    .amount {
        font-size: 2rem;
    }
    
    .plan-title {
        font-size: 1.1rem;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Billing toggle functionality
    const toggle = document.getElementById('billingToggle');
    const monthlyLabel = document.getElementById('monthlyLabel');
    const yearlyLabel = document.getElementById('yearlyLabel');
    const amounts = document.querySelectorAll('.amount');
    const periods = document.querySelectorAll('.period');
    
    // Set initial state
    monthlyLabel.classList.add('active');
    
    toggle.addEventListener('change', function() {
        const isYearly = this.checked;
        
        // Update label styles
        if (isYearly) {
            monthlyLabel.classList.remove('active');
            yearlyLabel.classList.add('active');
        } else {
            monthlyLabel.classList.add('active');
            yearlyLabel.classList.remove('active');
        }
        
        // Update prices
        amounts.forEach(amount => {
            const monthly = amount.getAttribute('data-monthly');
            const yearly = amount.getAttribute('data-yearly');
            amount.textContent = isYearly ? yearly : monthly;
        });
        
        // Update period text
        periods.forEach(period => {
            period.textContent = isYearly ? '/year' : '/mo';
        });
    });
    
    // Category switching functionality
    const categoryBtns = document.querySelectorAll('.category-btn');
    const categoryContents = document.querySelectorAll('.category-content');
    
    categoryBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            
            // Remove active class from all buttons
            categoryBtns.forEach(b => b.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Hide all category content
            categoryContents.forEach(content => {
                content.classList.remove('active');
            });
            
            // Show selected category content
            const activeContent = document.querySelector(`.category-content[data-category="${category}"]`);
            if (activeContent) {
                activeContent.classList.add('active');
            }
        });
    });
});
</script>
    </main>
</x-portal-layout>