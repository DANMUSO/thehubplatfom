@php
    $user = auth()->user();
@endphp

<x-portal-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Profile') }}
        </h2>
    </x-slot>

    <style>
        /* Profile Page Professional Styling */
        .profile-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 24px;
        }

        .profile-header {
            margin-bottom: 48px;
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .profile-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 32px;
            font-weight: bold;
            flex-shrink: 0;
        }

        .profile-info h3 {
            font-size: 28px;
            font-weight: 700;
            color: #111827;
            margin: 0 0 4px 0;
        }

        .profile-info p {
            font-size: 16px;
            color: #6b7280;
            margin: 0;
        }

        /* Tabs Styling */
        .tabs-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .tabs-header {
            display: flex;
            border-bottom: 2px solid #e5e7eb;
            background: #f9fafb;
        }

        .tab-button {
            flex: 1;
            padding: 16px 24px;
            font-size: 15px;
            font-weight: 500;
            color: #6b7280;
            background: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .tab-button svg {
            width: 20px;
            height: 20px;
        }

        .tab-button:hover {
            color: #374151;
            background: #f3f4f6;
        }

        .tab-button.active {
            color: #3b82f6;
            background: white;
            border-bottom-color: #3b82f6;
        }

        .tab-content {
            display: none;
            padding: 32px;
            animation: fadeIn 0.3s ease;
        }

        .tab-content.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.15s ease;
            box-sizing: border-box;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-input.error {
            border-color: #dc2626;
        }

        .form-input-icon {
            position: relative;
        }

        .form-input-icon input {
            padding-left: 48px;
        }

        .form-input-icon svg {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            color: #9ca3af;
            pointer-events: none;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        @media (min-width: 640px) {
            .form-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        .form-hint {
            display: block;
            margin-top: 6px;
            font-size: 13px;
            color: #6b7280;
        }

        .form-error {
            display: block;
            margin-top: 6px;
            font-size: 14px;
            color: #dc2626;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 24px;
            font-size: 15px;
            font-weight: 500;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.15s ease;
            border: none;
            text-decoration: none;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .btn svg {
            width: 20px;
            height: 20px;
            margin-right: 8px;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
        }

        .btn-primary:hover:not(:disabled) {
            background: #2563eb;
        }

        .btn-primary:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #374151;
            border: 1px solid #d1d5db;
        }

        .btn-secondary:hover:not(:disabled) {
            background: #f9fafb;
        }

        .btn-secondary:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .btn-group {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-top: 24px;
        }

        .success-message {
            font-size: 14px;
            color: #059669;
            font-weight: 500;
            display: none;
        }

        .success-message.show {
            display: block;
        }

        .verified-badge {
            padding: 16px;
            background: #f0fdf4;
            border: 1px solid #86efac;
            border-radius: 8px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }

        .verified-badge svg {
            width: 24px;
            height: 24px;
            color: #16a34a;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .verified-content {
            flex: 1;
        }

        .verified-content .status {
            font-size: 14px;
            font-weight: 600;
            color: #166534;
            margin-bottom: 8px;
        }

        .verified-content .phone {
            font-size: 18px;
            font-weight: 600;
            color: #111827;
            margin-bottom: 4px;
        }

        .verified-content .date {
            font-size: 13px;
            color: #6b7280;
        }

        .info-box {
            padding: 16px;
            background: #eff6ff;
            border: 1px solid #93c5fd;
            border-radius: 8px;
            margin-bottom: 20px;
            display: none;
        }

        .info-box.show {
            display: block;
        }

        .info-box-header {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin-bottom: 16px;
        }

        .info-box-header svg {
            width: 20px;
            height: 20px;
            color: #2563eb;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-box-header p {
            font-size: 14px;
            color: #1e40af;
            margin: 0;
        }

        .verification-code-input {
            text-align: center;
            font-size: 24px;
            letter-spacing: 8px;
            font-family: 'Courier New', monospace;
            font-weight: 600;
        }

        .space-y-6 > * + * {
            margin-top: 24px;
        }

        .loading-spinner {
            display: inline-block;
            width: 16px;
            height: 16px;
            border: 2px solid #ffffff;
            border-radius: 50%;
            border-top-color: transparent;
            animation: spin 0.6s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 640px) {
            .profile-container {
                padding: 24px 16px;
            }
            
            .profile-header {
                margin-bottom: 32px;
            }
            
            .tab-content {
                padding: 24px;
            }

            .tabs-header {
                flex-direction: column;
            }
            
            .tab-button {
                border-bottom: 1px solid #e5e7eb;
                border-left: 3px solid transparent;
                justify-content: flex-start;
                padding-left: 20px;
            }

            .tab-button.active {
                border-bottom-color: #e5e7eb;
                border-left-color: #3b82f6;
            }
            
            .btn-group {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn {
                width: 100%;
            }
        }
        .warning-message {
    font-size: 14px;
    color: #d97706;
    font-weight: 500;
    display: none;
}

.warning-message.show {
    display: block;
}
    </style>

    <main class="main-content">
        <div class="profile-container">
            
            <!-- Profile Header -->
            <div class="profile-header">
                <div class="profile-avatar">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
                <div class="profile-info">
                    <h3 id="userName">{{ $user->name }}</h3>
                    <p id="userEmail">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Tabs Container -->
            <div class="tabs-container">
                <!-- Tabs Header -->
                <div class="tabs-header">
                    <button class="tab-button active" onclick="switchTab(event, 'profile')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </button>
                    <button class="tab-button" onclick="switchTab(event, 'phone')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        Phone Verification
                    </button>
                    <button class="tab-button" onclick="switchTab(event, 'password')">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                        </svg>
                        Password
                    </button>
                </div>

                <!-- Tab Content: Profile Information -->
                <div id="profile" class="tab-content active">
                    <form id="profileForm" onsubmit="updateProfile(event)">
                        <div class="form-grid">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name</label>
                                <input id="name" name="name" type="text" 
                                    value="{{ $user->name }}"
                                    class="form-input"
                                    required autofocus />
                                <span id="nameError" class="form-error"></span>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address</label>
                                <input id="email" name="email" type="email" 
                                    value="{{ $user->email }}"
                                    class="form-input"
                                    readonly />
                                <span id="emailError" class="form-error"></span>
                            </div>
                            <!-- Email -->
                              <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <div class="form-input-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <input id="phone_number" name="phone" type="tel" 
                                        value="{{ $user->phone ?? '' }}"
                                        placeholder="+254700000000"
                                        class="form-input"
                                        required />
                                </div>
                                <span class="form-hint">Include country code (e.g., +254 for Kenya)</span>
                                <span id="phoneError" class="form-error"></span>
                            </div>
                            
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary" id="profileSubmitBtn">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                <span>Save Changes</span>
                            </button>
                            
                            <span id="profileSuccess" class="success-message">✓ Saved successfully!</span>
                            <span id="phoneChangedWarning" class="warning-message">⚠ Phone changed - Please verify it!</span>
                        </div>
                    </form>
                </div>

                <!-- Tab Content: Phone Verification -->
                <div id="phone" class="tab-content">
                    <div id="phoneVerifiedSection" style="display: none;">
                        <!-- Verified State -->
                        <div class="verified-badge">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="verified-content">
                                <p class="status">Phone Number Verified</p>
                                <p class="phone" id="verifiedPhone"></p>
                                <p class="date" id="verifiedDate"></p>
                            </div>
                        </div>
                        
                        <button type="button" class="btn btn-secondary" onclick="changePhoneNumber()">
                            Change Phone Number
                        </button>
                    </div>

                    <div id="phoneUnverifiedSection">
                        <!-- Unverified State -->
                        <form id="phoneForm" onsubmit="sendVerificationCode(event)" class="space-y-6">
                            <div class="form-group">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <div class="form-input-icon">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <input id="phone_number" name="phone" type="tel" 
                                        value="{{ $user->phone ?? '' }}"
                                        placeholder="+1234567890"
                                        class="form-input"
                                        required />
                                </div>
                                <span class="form-hint">Include country code (e.g., +1 for US, +254 for Kenya)</span>
                                <span id="phoneError" class="form-error"></span>
                            </div>

                            <div id="verificationCodeSection" class="info-box">
                                <div class="info-box-header">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <p>We've sent a 6-digit verification code to your phone. Please enter it below.</p>
                                </div>
                                
                                <div class="form-group">
                                    <label for="verification_code" class="form-label">Verification Code</label>
                                    <input id="verification_code" name="verification_code" 
                                        type="text" maxlength="6"
                                        placeholder="000000"
                                        class="form-input verification-code-input" />
                                    <span id="codeError" class="form-error"></span>
                                </div>
                            </div>

                            <div class="btn-group">
                                <button type="button" id="verifyCodeBtn" class="btn btn-primary" onclick="verifyCode()" style="display: none;">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span>Verify Code</span>
                                </button>
                                <button type="button" id="resendCodeBtn" class="btn btn-secondary" onclick="sendVerificationCode(event)" style="display: none;">
                                    Resend Code
                                </button>
                                <button type="submit" id="sendCodeBtn" class="btn btn-primary">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                    </svg>
                                    <span>Send Verification Code</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tab Content: Password Update -->
                <div id="password" class="tab-content">
                    <form id="passwordForm" onsubmit="updatePassword(event)">
                        <div class="space-y-6">
                            <!-- Current Password -->
                            <div class="form-group">
                                <label for="current_password" class="form-label">Current Password</label>
                                <input id="current_password" name="current_password" type="password" 
                                    class="form-input"
                                    autocomplete="current-password" />
                                <span id="currentPasswordError" class="form-error"></span>
                            </div>

                            <div class="form-grid">
                                <!-- New Password -->
                                <div class="form-group">
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input id="new_password" name="password" type="password" 
                                        class="form-input"
                                        autocomplete="new-password" />
                                    <span id="newPasswordError" class="form-error"></span>
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password" 
                                        class="form-input"
                                        autocomplete="new-password" />
                                    <span id="confirmPasswordError" class="form-error"></span>
                                </div>
                            </div>
                        </div>

                        <div class="btn-group">
                            <button type="submit" class="btn btn-primary" id="passwordSubmitBtn">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                <span>Update Password</span>
                            </button>
                            
                            <span id="passwordSuccess" class="success-message">✓ Password updated!</span>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>

    <script>
        // CSRF Token
        const csrfToken = '{{ csrf_token() }}';

        // Tab Switching
        function switchTab(event, tabId) {
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.remove('active');
            });
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('active');
            });
            
            document.getElementById(tabId).classList.add('active');
            event.currentTarget.classList.add('active');
        }

        // Clear Error Messages
        function clearErrors() {
            document.querySelectorAll('.form-error').forEach(error => {
                error.textContent = '';
            });
            document.querySelectorAll('.form-input').forEach(input => {
                input.classList.remove('error');
            });
        }

        // Show Loading State
        function setButtonLoading(button, loading) {
            const span = button.querySelector('span');
            if (loading) {
                button.disabled = true;
                span.innerHTML = '<span class="loading-spinner"></span>';
            } else {
                button.disabled = false;
                span.textContent = button.dataset.originalText || span.textContent;
            }
        }

       
        // Update Profile Function - Corrected to match input IDs


       

        // Change Phone Number
        function changePhoneNumber() {
            document.getElementById('phoneVerifiedSection').style.display = 'none';
            document.getElementById('phoneUnverifiedSection').style.display = 'block';
            document.getElementById('verificationCodeSection').classList.remove('show');
            document.getElementById('sendCodeBtn').style.display = 'inline-flex';
            document.getElementById('verifyCodeBtn').style.display = 'none';
            document.getElementById('resendCodeBtn').style.display = 'none';
            document.getElementById('verification_code').value = '';
        }

        // Update Password
        async function updatePassword(event) {
            event.preventDefault();
            clearErrors();

            const button = document.getElementById('passwordSubmitBtn');
            const successMsg = document.getElementById('passwordSuccess');
            button.dataset.originalText = button.querySelector('span').textContent;
            setButtonLoading(button, true);

            const formData = new FormData(event.target);
            formData.append('_method', 'PUT');

            try {
                const response = await fetch('/password', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json',
                    },
                    body: formData
                });

                const data = await response.json();

                if (response.ok) {
                    // Clear form and show success
                    event.target.reset();
                    successMsg.classList.add('show');
                    setTimeout(() => successMsg.classList.remove('show'), 3000);
                } else {
                    // Show validation errors
                    if (data.errors) {
                        if (data.errors.current_password) {
                            document.getElementById('currentPasswordError').textContent = data.errors.current_password[0];
                            document.getElementById('current_password').classList.add('error');
                        }
                        if (data.errors.password) {
                            document.getElementById('newPasswordError').textContent = data.errors.password[0];
                            document.getElementById('new_password').classList.add('error');
                        }
                        if (data.errors.password_confirmation) {
                            document.getElementById('confirmPasswordError').textContent = data.errors.password_confirmation[0];
                            document.getElementById('password_confirmation').classList.add('error');
                        }
                    }
                }
            } catch (error) {
                alert('An error occurred. Please try again.');
            } finally {
                setButtonLoading(button, false);
            }
        }

        // Initialize - Check if phone is verified on load
        @if($user->phone_verified_at)
            document.getElementById('phoneUnverifiedSection').style.display = 'none';
            document.getElementById('phoneVerifiedSection').style.display = 'block';
            document.getElementById('verifiedPhone').textContent = '{{ $user->phone }}';
            document.getElementById('verifiedDate').textContent = 'Verified on {{ $user->phone_verified_at->format('F j, Y') }}';
        @endif
        // Update Profile Function - Modified to handle phone updates
// Update Profile - Keep ONLY this version
async function updateProfile(event) {
    event.preventDefault();
    clearErrors();

    const button = document.getElementById('profileSubmitBtn');
    const successMsg = document.getElementById('profileSuccess');
    const phoneWarning = document.getElementById('phoneChangedWarning');
    button.dataset.originalText = button.querySelector('span').textContent;
    setButtonLoading(button, true);

    const formData = new FormData(event.target);
    formData.append('_method', 'PATCH');

    try {
        const response = await fetch('/profile', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
            },
            body: formData
        });

        const data = await response.json();

        if (response.ok) {
            // Update header info
            document.getElementById('userName').textContent = formData.get('name');
            document.getElementById('userEmail').textContent = formData.get('email');
            
            // Show success message
            successMsg.classList.add('show');
            setTimeout(() => successMsg.classList.remove('show'), 3000);

            // Check if phone was changed
            if (data.phone_changed) {
                // Show warning about phone verification
                phoneWarning.classList.add('show');
                setTimeout(() => phoneWarning.classList.remove('show'), 5000);

                // Update phone verification section
                if (!data.phone_verified) {
                    document.getElementById('phoneVerifiedSection').style.display = 'none';
                    document.getElementById('phoneUnverifiedSection').style.display = 'block';
                    
                    // Update both phone fields (profile and verification tabs)
                    document.querySelectorAll('input[name="phone"]').forEach(field => {
                        field.value = formData.get('phone');
                    });
                }
            }
        } else {
            // Show validation errors
            if (data.errors) {
                if (data.errors.name) {
                    document.getElementById('nameError').textContent = data.errors.name[0];
                    document.getElementById('name').classList.add('error');
                }
                if (data.errors.email) {
                    document.getElementById('emailError').textContent = data.errors.email[0];
                    document.getElementById('email').classList.add('error');
                }
                if (data.errors.phone) {
                    // Show phone error in the profile tab
                    const phoneErrorSpan = document.querySelector('#profile #phoneError');
                    if (phoneErrorSpan) {
                        phoneErrorSpan.textContent = data.errors.phone[0];
                    }
                    document.querySelectorAll('input[name="phone"]')[0].classList.add('error');
                }
            }
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    } finally {
        setButtonLoading(button, false);
    }
}

// Send Verification Code - Fixed to get phone from correct field
async function sendVerificationCode(event) {
    event.preventDefault();
    clearErrors();

    const button = document.getElementById('sendCodeBtn');
    button.dataset.originalText = button.querySelector('span').textContent;
    setButtonLoading(button, true);

    // Get phone from the verification tab (phoneUnverifiedSection)
    const phoneInput = document.querySelector('#phoneUnverifiedSection input[name="phone"]');
    const phone = phoneInput ? phoneInput.value : '';

    try {
        const response = await fetch('/profile/phone/send-code', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ phone: phone })
        });

        const data = await response.json();

        if (response.ok) {
            // Show verification code section
            document.getElementById('verificationCodeSection').classList.add('show');
            document.getElementById('sendCodeBtn').style.display = 'none';
            document.getElementById('verifyCodeBtn').style.display = 'inline-flex';
            document.getElementById('resendCodeBtn').style.display = 'inline-flex';
        } else {
            if (data.errors && data.errors.phone) {
                const phoneErrorSpan = document.querySelector('#phoneUnverifiedSection #phoneError');
                if (phoneErrorSpan) {
                    phoneErrorSpan.textContent = data.errors.phone[0];
                }
                if (phoneInput) {
                    phoneInput.classList.add('error');
                }
            }
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    } finally {
        setButtonLoading(button, false);
    }
}

// Verify Code - Fixed to get phone from correct field
async function verifyCode() {
    clearErrors();

    const button = document.getElementById('verifyCodeBtn');
    button.dataset.originalText = button.querySelector('span').textContent;
    setButtonLoading(button, true);

    const phoneInput = document.querySelector('#phoneUnverifiedSection input[name="phone"]');
    const phone = phoneInput ? phoneInput.value : '';
    const code = document.getElementById('verification_code').value;

    try {
        const response = await fetch('/profile/phone/verify', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ 
                phone: phone,
                verification_code: code 
            })
        });

        const data = await response.json();

        if (response.ok) {
            // Show verified state
            document.getElementById('phoneUnverifiedSection').style.display = 'none';
            document.getElementById('phoneVerifiedSection').style.display = 'block';
            document.getElementById('verifiedPhone').textContent = phone;
            document.getElementById('verifiedDate').textContent = 'Verified on ' + new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
            
            // Update profile tab phone field to show verified phone
            document.querySelectorAll('input[name="phone"]').forEach(field => {
                field.value = phone;
            });
        } else {
            if (data.errors && data.errors.verification_code) {
                document.getElementById('codeError').textContent = data.errors.verification_code[0];
                document.getElementById('verification_code').classList.add('error');
            }
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred. Please try again.');
    } finally {
        setButtonLoading(button, false);
    }
}
    </script>
</x-portal-layout>