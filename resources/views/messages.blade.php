<x-portal-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts Management') }}
        </h2>
    </x-slot>

    <main class="main-content">
 <!-- Messages Section with Vertical Tabs -->
<section class="messages-section">
    <div class="container-fluid">
        <div class="breadcrumbs-area">
            <ul>
                <li><a href="#">Home</a></li>
                <li class="separator">-</li>
                <li class="active">Messages</li>
            </ul>
        </div>

        <div class="page-header">
            <h1>Conversations</h1>
            <p>Manage your client messages</p>
        </div>

        <div class="messages-layout">
            <!-- Vertical Tabs - Client List -->
            <div class="clients-tabs-sidebar">
                <div class="sidebar-header">
                    <div class="search-box">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                        <input type="text" placeholder="Search clients..." id="searchClients">
                    </div>
                    <div class="filter-options">
                        <select class="filter-select">
                            <option value="all">All Messages</option>
                            <option value="unread">Unread</option>
                            <option value="important">Important</option>
                            <option value="archived">Archived</option>
                        </select>
                    </div>
                </div>

                <div class="clients-list" id="clientsList">
                    <!-- Client Tab Items (30 Clients) -->
                    <div class="client-tab active" data-client-id="1" onclick="showClientMessages(1)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=1" alt="John Doe">
                            <span class="status-online"></span>
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>John Doe</h4>
                                <span class="time">2m ago</span>
                            </div>
                            <p class="last-msg">Hi, is the iPhone still available?</p>
                            <span class="unread-count">3</span>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="2" onclick="showClientMessages(2)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=2" alt="Sarah Wilson">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Sarah Wilson</h4>
                                <span class="time">15m ago</span>
                            </div>
                            <p class="last-msg">Thanks for the quick response!</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="3" onclick="showClientMessages(3)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=3" alt="Michael Chen">
                            <span class="status-online"></span>
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Michael Chen</h4>
                                <span class="time">1h ago</span>
                            </div>
                            <p class="last-msg">Can we meet tomorrow?</p>
                            <span class="unread-count">1</span>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="4" onclick="showClientMessages(4)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=4" alt="Emily Rodriguez">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Emily Rodriguez</h4>
                                <span class="time">3h ago</span>
                            </div>
                            <p class="last-msg">What's your best price?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="5" onclick="showClientMessages(5)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=5" alt="David Kim">
                            <span class="status-online"></span>
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>David Kim</h4>
                                <span class="time">5h ago</span>
                            </div>
                            <p class="last-msg">I'm interested in this ad</p>
                            <span class="unread-count">2</span>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="6" onclick="showClientMessages(6)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=6" alt="Lisa Anderson">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Lisa Anderson</h4>
                                <span class="time">Yesterday</span>
                            </div>
                            <p class="last-msg">Perfect! I'll take it</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="7" onclick="showClientMessages(7)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=7" alt="James Miller">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>James Miller</h4>
                                <span class="time">Yesterday</span>
                            </div>
                            <p class="last-msg">Could you send more photos?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="8" onclick="showClientMessages(8)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=8" alt="Maria Garcia">
                            <span class="status-online"></span>
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Maria Garcia</h4>
                                <span class="time">2 days ago</span>
                            </div>
                            <p class="last-msg">Is delivery available?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="9" onclick="showClientMessages(9)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=9" alt="Robert Taylor">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Robert Taylor</h4>
                                <span class="time">2 days ago</span>
                            </div>
                            <p class="last-msg">Thanks, I'll think about it</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="10" onclick="showClientMessages(10)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=10" alt="Jennifer Lee">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Jennifer Lee</h4>
                                <span class="time">3 days ago</span>
                            </div>
                            <p class="last-msg">What's the condition?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="11" onclick="showClientMessages(11)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=11" alt="William Brown">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>William Brown</h4>
                                <span class="time">3 days ago</span>
                            </div>
                            <p class="last-msg">Can I inspect it first?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="12" onclick="showClientMessages(12)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=12" alt="Amanda White">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Amanda White</h4>
                                <span class="time">4 days ago</span>
                            </div>
                            <p class="last-msg">Great deal! Thanks</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="13" onclick="showClientMessages(13)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=13" alt="Daniel Martinez">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Daniel Martinez</h4>
                                <span class="time">5 days ago</span>
                            </div>
                            <p class="last-msg">Where are you located?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="14" onclick="showClientMessages(14)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=14" alt="Nicole Johnson">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Nicole Johnson</h4>
                                <span class="time">5 days ago</span>
                            </div>
                            <p class="last-msg">Do you accept payment plans?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="15" onclick="showClientMessages(15)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=15" alt="Christopher Davis">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Christopher Davis</h4>
                                <span class="time">1 week ago</span>
                            </div>
                            <p class="last-msg">I'm ready to buy now</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="16" onclick="showClientMessages(16)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=16" alt="Jessica Wilson">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Jessica Wilson</h4>
                                <span class="time">1 week ago</span>
                            </div>
                            <p class="last-msg">Can you hold it for me?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="17" onclick="showClientMessages(17)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=17" alt="Matthew Thomas">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Matthew Thomas</h4>
                                <span class="time">1 week ago</span>
                            </div>
                            <p class="last-msg">Does it come with warranty?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="18" onclick="showClientMessages(18)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=18" alt="Ashley Moore">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Ashley Moore</h4>
                                <span class="time">1 week ago</span>
                            </div>
                            <p class="last-msg">Interested! Let me know</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="19" onclick="showClientMessages(19)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=19" alt="Joshua Jackson">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Joshua Jackson</h4>
                                <span class="time">2 weeks ago</span>
                            </div>
                            <p class="last-msg">What payment methods?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="20" onclick="showClientMessages(20)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=20" alt="Stephanie Harris">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Stephanie Harris</h4>
                                <span class="time">2 weeks ago</span>
                            </div>
                            <p class="last-msg">Still available?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="21" onclick="showClientMessages(21)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=21" alt="Andrew Martin">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Andrew Martin</h4>
                                <span class="time">2 weeks ago</span>
                            </div>
                            <p class="last-msg">Let me check with my wife</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="22" onclick="showClientMessages(22)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=22" alt="Brittany Thompson">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Brittany Thompson</h4>
                                <span class="time">3 weeks ago</span>
                            </div>
                            <p class="last-msg">Looks good!</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="23" onclick="showClientMessages(23)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=23" alt="Ryan Clark">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Ryan Clark</h4>
                                <span class="time">3 weeks ago</span>
                            </div>
                            <p class="last-msg">Can you ship to Mombasa?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="24" onclick="showClientMessages(24)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=24" alt="Megan Lewis">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Megan Lewis</h4>
                                <span class="time">3 weeks ago</span>
                            </div>
                            <p class="last-msg">How old is it?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="25" onclick="showClientMessages(25)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=25" alt="Kevin Walker">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Kevin Walker</h4>
                                <span class="time">1 month ago</span>
                            </div>
                            <p class="last-msg">Thanks for the info</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="26" onclick="showClientMessages(26)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=26" alt="Lauren Hall">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Lauren Hall</h4>
                                <span class="time">1 month ago</span>
                            </div>
                            <p class="last-msg">Any defects?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="27" onclick="showClientMessages(27)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=27" alt="Brandon Young">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Brandon Young">
                                <span class="time">1 month ago</span>
                            </div>
                            <p class="last-msg">Will contact you soon</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="28" onclick="showClientMessages(28)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=28" alt="Rachel King">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Rachel King</h4>
                                <span class="time">1 month ago</span>
                            </div>
                            <p class="last-msg">Price too high for me</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="29" onclick="showClientMessages(29)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=29" alt="Justin Wright">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Justin Wright</h4>
                                <span class="time">1 month ago</span>
                            </div>
                            <p class="last-msg">Negotiable?</p>
                        </div>
                    </div>

                    <div class="client-tab" data-client-id="30" onclick="showClientMessages(30)">
                        <div class="client-avatar">
                            <img src="https://i.pravatar.cc/150?img=30" alt="Samantha Lopez">
                        </div>
                        <div class="client-info">
                            <div class="client-header">
                                <h4>Samantha Lopez</h4>
                                <span class="time">1 month ago</span>
                            </div>
                            <p class="last-msg">Thank you!</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Messages Content Area -->
            <div class="messages-content">
                <!-- Client Header -->
                <div class="messages-header">
                    <div class="client-details">
                        <div class="client-avatar-large">
                            <img src="https://i.pravatar.cc/150?img=1" alt="John Doe">
                            <span class="status-online"></span>
                        </div>
                        <div>
                            <h2>John Doe</h2>
                            <span class="status-text">Active now</span>
                        </div>
                    </div>
                    <div class="message-actions">
                        <button class="action-btn" title="Mark as important">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                            </svg>
                        </button>
                        <button class="action-btn" title="Archive conversation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </button>
                        <button class="action-btn" title="Delete conversation">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                            </svg>
                        </button>
                        <button class="action-btn" title="More options">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Ad Reference Card -->
                <div class="ad-reference-card">
                    <div class="ad-thumb">
                        <img src="https://via.placeholder.com/80" alt="Ad">
                    </div>
                    <div class="ad-info">
                        <h4>iPhone 14 Pro Max - 256GB Space Black</h4>
                        <div class="ad-meta">
                            <span class="price">KES 85,000</span>
                            <span class="separator">•</span>
                            <span class="location">Nairobi, Kenya</span>
                            <span class="separator">•</span>
                            <span class="date">Posted 2 days ago</span>
                        </div>
                    </div>
                    <a href="#" class="btn-view-ad-small">View Ad</a>
                </div>

                <!-- Messages Thread -->
                <div class="messages-thread" id="messagesThread">
                    <!-- Date Divider -->
                    <div class="date-divider">
                        <span>Today</span>
                    </div>

                    <!-- Received Message -->
                    <div class="message received">
                        <div class="msg-avatar">
                            <img src="https://i.pravatar.cc/150?img=1" alt="John Doe">
                        </div>
                        <div class="msg-content">
                            <div class="msg-bubble">
                                <p>Hi! I'm interested in your iPhone 14 Pro Max. Is it still available for sale?</p>
                            </div>
                            <span class="msg-time">10:30 AM</span>
                        </div>
                    </div>

                    <!-- Sent Message -->
                    <div class="message sent">
                        <div class="msg-content">
                            <div class="msg-bubble">
                                <p>Hello John! Yes, the iPhone is still available. It's in excellent condition with all original accessories included.</p>
                            </div>
                            <span class="msg-time">10:32 AM</span>
                        </div>
                    </div>

                    <!-- Received Message -->
                    <div class="message received">
                        <div class="msg-avatar">
                            <img src="https://i.pravatar.cc/150?img=1" alt="John Doe">
                        </div>
                        <div class="msg-content">
                            <div class="msg-bubble">
                                <p>That's great! Can you share more photos? Also, is the price negotiable?</p>
                            </div>
                            <span class="msg-time">10:35 AM</span>
                        </div>
                    </div>

                    <!-- Sent Message with Images -->
                    <div class="message sent">
                        <div class="msg-content">
                            <div class="msg-bubble">
                                <p>Sure! Here are some additional photos from different angles. The price is slightly negotiable depending on when you can pick it up.</p>
                                <div class="msg-images">
                                    <img src="https://via.placeholder.com/150" alt="Photo 1">
                                    <img src="https://via.placeholder.com/150" alt="Photo 2">
                                    <img src="https://via.placeholder.com/150" alt="Photo 3">
                                </div>
                            </div>
                            <span class="msg-time">10:38 AM</span>
                        </div>
                    </div>

                    <!-- Received Message -->
                    <div class="message received">
                        <div class="msg-avatar">
                            <img src="https://i.pravatar.cc/150?img=1" alt="John Doe">
                        </div>
                        <div class="msg-content">
                            <div class="msg-bubble">
                                <p>Perfect! The phone looks amazing. Would you accept KES 80,000? I can pick it up tomorrow.</p>
                            </div>
                            <span class="msg-time">10:42 AM</span>
                        </div>
                    </div>

                    <!-- Typing Indicator -->
                    <div class="typing-indicator">
                        <div class="msg-avatar">
                            <img src="https://i.pravatar.cc/150?img=1" alt="John Doe">
                        </div>
                        <div class="typing-dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>

                <!-- Reply Area -->
                <div class="reply-area">
                    <form class="reply-form" onsubmit="sendReply(event)">
                        <div class="reply-tools">
                            <button type="button" class="tool-btn" title="Attach image" onclick="document.getElementById('imageUpload').click()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                </svg>
                            </button>
                            <button type="button" class="tool-btn" title="Attach file" onclick="document.getElementById('fileUpload').click()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                                </svg>
                            </button>
                            <button type="button" class="tool-btn" title="Quick reply templates">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793V2zm5 4a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm4 0a1 1 0 1 0-2 0 1 1 0 0 0 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                </svg>
                            </button>
                            <input type="file" id="imageUpload" style="display: none;" accept="image/*" multiple>
                            <input type="file" id="fileUpload" style="display: none;">
                        </div>
                        <div class="reply-input-wrapper">
                            <textarea 
                                id="replyInput" 
                                placeholder="Type your reply..." 
                                rows="1"
                                onkeydown="handleReplyKeyPress(event)"></textarea>
                        </div>
                        <button type="submit" class="btn-send-reply">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                            </svg>
                            Send
                        </button>
                    </form>
                </div>
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

.messages-section {
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
    margin-bottom: 25px;
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

/* Main Layout */
.messages-layout {
    display: grid;
    grid-template-columns: 380px 1fr;
    gap: 0;
    background: white;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.08);
    height: calc(100vh - 180px);
    min-height: 600px;
}

/* Clients Tabs Sidebar */
.clients-tabs-sidebar {
    border-right: 1px solid #e9ecef;
    display: flex;
    flex-direction: column;
    background: #fafbfc;
}

.sidebar-header {
    padding: 20px;
    border-bottom: 1px solid #e9ecef;
    background: white;
}

.search-box {
    position: relative;
    margin-bottom: 15px;
}

.search-box svg {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #adb5bd;
}

.search-box input {
    width: 100%;
    padding: 10px 15px 10px 40px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    transition: border-color 0.2s;
}

.search-box input:focus {
    border-color: #007bff;
}

.filter-select {
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    cursor: pointer;
    background: white;
}

/* Clients List */
.clients-list {
    flex: 1;
    overflow-y: auto;
}

.client-tab {
    display: flex;
    gap: 12px;
    padding: 15px 20px;
    cursor: pointer;
    border-bottom: 1px solid #f1f3f5;
    transition: all 0.2s;
    position: relative;
}

.client-tab:hover {
    background: #f8f9fa;
}

.client-tab.active {
    background: linear-gradient(90deg, #e7f3ff 0%, #f8f9fa 100%);
    border-left: 4px solid #007bff;
}

.client-avatar {
    position: relative;
    flex-shrink: 0;
}

.client-avatar img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.status-online {
    position: absolute;
    bottom: 2px;
    right: 2px;
    width: 12px;
    height: 12px;
    background: #28a745;
    border: 2px solid white;
    border-radius: 50%;
}

.client-info {
    flex: 1;
    min-width: 0;
}

.client-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 5px;
}

.client-header h4 {
    font-size: 15px;
    font-weight: 600;
    color: #212529;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.client-header .time {
    font-size: 12px;
    color: #adb5bd;
    flex-shrink: 0;
}

.last-msg {
    font-size: 14px;
    color: #6c757d;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    margin: 0;
}

.unread-count {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #007bff;
    color: white;
    font-size: 11px;
    font-weight: 600;
    padding: 3px 8px;
    border-radius: 12px;
    min-width: 20px;
    text-align: center;
}

/* Messages Content Area */
.messages-content {
    display: flex;
    flex-direction: column;
    background: white;
}

/* Messages Header */
.messages-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 30px;
    border-bottom: 1px solid #e9ecef;
    background: white;
}

.client-details {
    display: flex;
    align-items: center;
    gap: 15px;
}

.client-avatar-large {
    position: relative;
}

.client-avatar-large img {
    width: 55px;
    height: 55px;
    border-radius: 50%;
    object-fit: cover;
}

.client-details h2 {
    font-size: 1.3rem;
    font-weight: 700;
    color: #212529;
    margin-bottom: 3px;
}

.status-text {
    font-size: 13px;
    color: #28a745;
    font-weight: 500;
}

.message-actions {
    display: flex;
    gap: 10px;
}

.action-btn {
    width: 40px;
    height: 40px;
    border: 1px solid #dee2e6;
    background: white;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    color: #6c757d;
}

.action-btn:hover {
    background: #f8f9fa;
    border-color: #007bff;
    color: #007bff;
}

/* Ad Reference Card */
.ad-reference-card {
    display: flex;
    align-items: center;
    gap: 15px;
    padding: 15px 30px;
    background: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
}

.ad-thumb img {
    width: 80px;
    height: 80px;
    border-radius: 10px;
    object-fit: cover;
}

.ad-info {
    flex: 1;
    min-width: 0;
}

.ad-info h4 {
    font-size: 15px;
    font-weight: 600;
    color: #212529;
    margin-bottom: 8px;
}

.ad-meta {
    display: flex;
    gap: 10px;
    align-items: center;
    font-size: 13px;
    flex-wrap: wrap;
}

.ad-meta .price {
    color: #28a745;
    font-weight: 700;
    font-size: 14px;
}

.ad-meta .location,
.ad-meta .date {
    color: #6c757d;
}

.ad-meta .separator {
    color: #dee2e6;
}

.btn-view-ad-small {
    padding: 10px 20px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    transition: all 0.2s;
    white-space: nowrap;
}

.btn-view-ad-small:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

/* Messages Thread */
.messages-thread {
    flex: 1;
    overflow-y: auto;
    padding: 30px;
    background: #fafbfc;
}

.date-divider {
    text-align: center;
    margin: 25px 0;
    position: relative;
}

.date-divider span {
    background: #fafbfc;
    padding: 5px 20px;
    color: #adb5bd;
    font-size: 13px;
    font-weight: 600;
    position: relative;
    z-index: 1;
    border-radius: 20px;
}

.date-divider::before {
    content: '';
    position: absolute;
    left: 0;
    right: 0;
    top: 50%;
    height: 1px;
    background: #dee2e6;
}

/* Message */
.message {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
}

.message.sent {
    flex-direction: row-reverse;
}

.msg-avatar img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}

.msg-content {
    max-width: 65%;
}

.message.sent .msg-content {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.msg-bubble {
    padding: 14px 18px;
    border-radius: 18px;
    word-wrap: break-word;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.message.received .msg-bubble {
    background: white;
    border: 1px solid #e9ecef;
    border-bottom-left-radius: 4px;
}

.message.sent .msg-bubble {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-bottom-right-radius: 4px;
}

.msg-bubble p {
    font-size: 14.5px;
    line-height: 1.6;
    margin: 0;
}

.msg-images {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
    margin-top: 12px;
}

.msg-images img {
    width: 100%;
    height: 120px;
    object-fit: cover;
    border-radius: 10px;
    cursor: pointer;
    transition: transform 0.2s;
}

.msg-images img:hover {
    transform: scale(1.05);
}

.msg-time {
    font-size: 12px;
    color: #adb5bd;
    margin-top: 6px;
    display: inline-block;
}

/* Typing Indicator */
.typing-indicator {
    display: flex;
    gap: 12px;
    margin-bottom: 20px;
}

.typing-dots {
    background: white;
    border: 1px solid #e9ecef;
    border-radius: 18px;
    border-bottom-left-radius: 4px;
    padding: 14px 18px;
    display: flex;
    gap: 5px;
    align-items: center;
}

.typing-dots span {
    width: 8px;
    height: 8px;
    background: #adb5bd;
    border-radius: 50%;
    animation: typing 1.4s infinite;
}

.typing-dots span:nth-child(2) {
    animation-delay: 0.2s;
}

.typing-dots span:nth-child(3) {
    animation-delay: 0.4s;
}

@keyframes typing {
    0%, 60%, 100% {
        transform: translateY(0);
    }
    30% {
        transform: translateY(-8px);
    }
}

/* Reply Area */
.reply-area {
    padding: 20px 30px;
    border-top: 1px solid #e9ecef;
    background: white;
}

.reply-form {
    display: flex;
    align-items: flex-end;
    gap: 12px;
}

.reply-tools {
    display: flex;
    gap: 8px;
}

.tool-btn {
    width: 42px;
    height: 42px;
    border: 1px solid #dee2e6;
    background: white;
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
    color: #6c757d;
}

.tool-btn:hover {
    background: #f8f9fa;
    border-color: #007bff;
    color: #007bff;
}

.reply-input-wrapper {
    flex: 1;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 12px;
    padding: 12px 18px;
}

.reply-input-wrapper textarea {
    width: 100%;
    border: none;
    background: transparent;
    outline: none;
    resize: none;
    font-size: 14.5px;
    font-family: inherit;
    line-height: 1.5;
    max-height: 120px;
    color: #212529;
}

.reply-input-wrapper textarea::placeholder {
    color: #adb5bd;
}

.btn-send-reply {
    padding: 12px 24px;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 10px;
    color: white;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    transition: all 0.3s;
    white-space: nowrap;
}

.btn-send-reply:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
}

/* Scrollbar Styling */
.clients-list::-webkit-scrollbar,
.messages-thread::-webkit-scrollbar {
    width: 6px;
}

.clients-list::-webkit-scrollbar-track,
.messages-thread::-webkit-scrollbar-track {
    background: #f8f9fa;
}

.clients-list::-webkit-scrollbar-thumb,
.messages-thread::-webkit-scrollbar-thumb {
    background: #dee2e6;
    border-radius: 3px;
}

.clients-list::-webkit-scrollbar-thumb:hover,
.messages-thread::-webkit-scrollbar-thumb:hover {
    background: #adb5bd;
}

/* Responsive Design */
@media (max-width: 1024px) {
    .messages-layout {
        grid-template-columns: 320px 1fr;
    }
}

@media (max-width: 768px) {
    .messages-layout {
        grid-template-columns: 1fr;
    }
    
    .clients-tabs-sidebar {
        display: none;
    }
    
    .clients-tabs-sidebar.mobile-active {
        display: flex;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        z-index: 100;
    }
    
    .msg-content {
        max-width: 80%;
    }
    
    .messages-header {
        padding: 15px 20px;
    }
    
    .ad-reference-card {
        padding: 12px 20px;
        flex-wrap: wrap;
    }
    
    .btn-view-ad-small {
        width: 100%;
        text-align: center;
    }
    
    .messages-thread {
        padding: 20px;
    }
    
    .reply-area {
        padding: 15px 20px;
    }
    
    .reply-tools {
        flex-direction: column;
    }
}

@media (max-width: 480px) {
    .page-header h1 {
        font-size: 1.5rem;
    }
    
    .messages-layout {
        height: calc(100vh - 150px);
    }
    
    .client-details h2 {
        font-size: 1.1rem;
    }
    
    .message-actions {
        gap: 5px;
    }
    
    .action-btn {
        width: 36px;
        height: 36px;
    }
    
    .msg-images {
        grid-template-columns: repeat(2, 1fr);
    }
    
    .reply-form {
        flex-wrap: wrap;
    }
    
    .btn-send-reply {
        width: 100%;
        justify-content: center;
    }
}
</style>

<script>
// Show client messages when tab is clicked
function showClientMessages(clientId) {
    // Remove active class from all tabs
    document.querySelectorAll('.client-tab').forEach(tab => {
        tab.classList.remove('active');
    });
    
    // Add active class to clicked tab
    event.currentTarget.classList.add('active');
    
    // Load messages for this client (AJAX call)
    console.log('Loading messages for client:', clientId);
    
    // Scroll to bottom of messages thread
    setTimeout(() => {
        scrollToBottom();
    }, 100);
}

// Send reply
function sendReply(event) {
    event.preventDefault();
    
    const input = document.getElementById('replyInput');
    const message = input.value.trim();
    
    if (message) {
        console.log('Sending reply:', message);
        
        // Add message to thread (example)
        addMessageToThread(message, true);
        
        // Clear input
        input.value = '';
        autoResizeTextarea(input);
        
        // Scroll to bottom
        scrollToBottom();
    }
}

// Handle Enter key in reply input
function handleReplyKeyPress(event) {
    if (event.key === 'Enter' && !event.shiftKey) {
        event.preventDefault();
        sendReply(event);
    }
}

// Auto-resize textarea
function autoResizeTextarea(textarea) {
    textarea.style.height = 'auto';
    textarea.style.height = Math.min(textarea.scrollHeight, 120) + 'px';
}

// Add event listener for textarea auto-resize
document.getElementById('replyInput')?.addEventListener('input', function() {
    autoResizeTextarea(this);
});

// Scroll to bottom of messages
function scrollToBottom() {
    const thread = document.getElementById('messagesThread');
    if (thread) {
        thread.scrollTop = thread.scrollHeight;
    }
}

// Add message to thread (example function)
function addMessageToThread(message, isSent) {
    const thread = document.getElementById('messagesThread');
    const messageDiv = document.createElement('div');
    messageDiv.className = `message ${isSent ? 'sent' : 'received'}`;
    
    const now = new Date();
    const time = now.toLocaleTimeString('en-US', { hour: 'numeric', minute: '2-digit', hour12: true });
    
    if (isSent) {
        messageDiv.innerHTML = `
            <div class="msg-content">
                <div class="msg-bubble">
                    <p>${message}</p>
                </div>
                <span class="msg-time">${time}</span>
            </div>
        `;
    } else {
        messageDiv.innerHTML = `
            <div class="msg-avatar">
                <img src="https://i.pravatar.cc/150?img=1" alt="Client">
            </div>
            <div class="msg-content">
                <div class="msg-bubble">
                    <p>${message}</p>
                </div>
                <span class="msg-time">${time}</span>
            </div>
        `;
    }
    
    // Remove typing indicator if exists
    const typingIndicator = thread.querySelector('.typing-indicator');
    if (typingIndicator) {
        typingIndicator.remove();
    }
    
    thread.appendChild(messageDiv);
}

// Search clients
document.getElementById('searchClients')?.addEventListener('input', function(e) {
    const query = e.target.value.toLowerCase();
    const clients = document.querySelectorAll('.client-tab');
    
    clients.forEach(client => {
        const name = client.querySelector('h4').textContent.toLowerCase();
        const message = client.querySelector('.last-msg').textContent.toLowerCase();
        
        if (name.includes(query) || message.includes(query)) {
            client.style.display = 'flex';
        } else {
            client.style.display = 'none';
        }
    });
});

// Filter messages
document.querySelector('.filter-select')?.addEventListener('change', function(e) {
    const filter = e.target.value;
    console.log('Filter changed to:', filter);
    // Implement filtering logic based on selected filter
});

// Handle file uploads
document.getElementById('imageUpload')?.addEventListener('change', function(e) {
    const files = Array.from(e.target.files);
    console.log('Images selected:', files);
    // Handle image upload
});

document.getElementById('fileUpload')?.addEventListener('change', function(e) {
    const file = e.target.files[0];
    console.log('File selected:', file);
    // Handle file upload
});

// Initialize: Scroll to bottom on page load
window.addEventListener('load', function() {
    scrollToBottom();
});
</script>
    </main>

</x-portal-layout>