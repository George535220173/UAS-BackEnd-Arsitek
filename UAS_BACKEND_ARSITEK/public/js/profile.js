document.addEventListener('DOMContentLoaded', function () {
    const changeUsernameBtn = document.getElementById('change-username-btn');
    const changeEmailBtn = document.getElementById('change-email-btn');
    const changePasswordBtn = document.getElementById('change-password-btn');
    const popupModal = document.getElementById('popup-modal');
    const closeBtn = document.getElementsByClassName('close-btn')[0];
    const popupTitle = document.getElementById('popup-title');
    const popupInputs = document.getElementById('popup-inputs');
    let countdownInterval;

    function getCSRFToken() {
        const tokenElement = document.querySelector('meta[name="csrf-token"]');
        return tokenElement ? tokenElement.getAttribute('content') : '';
    }

    function showError(element, message) {
        const errorElement = document.createElement('div');
        errorElement.className = 'error-message';
        errorElement.innerText = message;
        element.parentElement.appendChild(errorElement);
    }

    function clearErrors() {
        document.querySelectorAll('.error-message').forEach(el => el.remove());
    }

    function formatPhoneNumber(value) {
        return value.replace(/\D/g, '').replace(/(\d{4})(?=\d)/g, '$1-');
    }

    function openPopup(title, inputsHTML, formAction, authCodeRoute = null) {
        popupTitle.innerText = title;
        popupInputs.innerHTML = inputsHTML;
        document.getElementById('popup-form').action = formAction;
        popupModal.style.display = 'block';

        const sendCodeBtn = document.getElementById('send-code-btn');
        if (sendCodeBtn && authCodeRoute) {
            sendCodeBtn.onclick = function () {
                fetch(authCodeRoute, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': getCSRFToken()
                    },
                }).then(response => response.json()).then(data => {
                    alert(data.message);
                    startCountdown(30, sendCodeBtn);
                }).catch(error => {
                    console.error('Error:', error);
                });
            };
        }

        const confirmBtn = document.getElementById('confirm-btn');
        confirmBtn.onclick = function (event) {
            clearErrors();
            const password = document.getElementById('password');
            const newValue = document.getElementById('new-value') || document.getElementById('new-username') || document.getElementById('new-email') || document.getElementById('new-password');
            const authCode = document.getElementById('auth-code');
            let hasError = false;

            if (newValue && newValue.name === 'new_value' && newValue.type === 'text' && formAction.includes('phone')) {
                const numericPhone = newValue.value.replace(/-/g, '');
                if (isNaN(numericPhone) || numericPhone.length > 16) {
                    showError(newValue, 'Phone number must be numeric and not exceed 16 digits.');
                    hasError = true;
                } else {
                    newValue.value = formatPhoneNumber(numericPhone);
                }
            }

            if (!password.value) {
                showError(password, 'Password is required.');
                hasError = true;
            }

            if (!newValue.value) {
                showError(newValue, 'New value is required.');
                hasError = true;
            }

            if (authCode && !authCode.value) {
                showError(authCode, 'Authentication code is required.');
                hasError = true;
            }

            if (hasError) {
                event.preventDefault();
                return;
            }

            let requestBody = {
                password: password.value
            };
            requestBody[newValue.name] = newValue.value.replace(/-/g, ''); // Memberikan angka numerik ke server
            if (authCode) {
                requestBody.auth_code = authCode.value;
            }

            fetch(document.getElementById('popup-form').action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': getCSRFToken()
                },
                body: JSON.stringify(requestBody)
            }).then(response => {
                console.log('Response status:', response.status);
                return response.text();
            }).then(data => {
                console.log('Response data:', data);
                try {
                    const jsonData = JSON.parse(data);
                    if (jsonData.success) {
                        location.reload();
                    } else {
                        if (jsonData.errors && jsonData.errors.password) {
                            showError(password, jsonData.errors.password);
                        }
                        if (jsonData.errors && jsonData.errors.new_value) {
                            showError(newValue, jsonData.errors.new_value);
                        }
                        if (jsonData.errors && jsonData.errors.auth_code) {
                            showError(authCode, jsonData.errors.auth_code);
                        }
                    }
                } catch (e) {
                    console.error('Parsing error:', e);
                    alert('An error occurred. Please try again.');
                }
            }).catch(error => {
                console.error('Error:', error);
                alert('An error occurred. Please try again.');
            });

            event.preventDefault();
        };
    }

    function closePopup() {
        popupModal.style.display = 'none';
        clearErrors();
    }

    changeUsernameBtn.onclick = function () {
        const routeChangeUsername = changeUsernameBtn.getAttribute('data-route-change-username');
        const routeSendAuthCode = changeUsernameBtn.getAttribute('data-route-send-auth-code');
        openPopup('Change Username', `
            <div class="form-group">
                <label for="new-username">New Username</label>
                <input type="text" id="new-username" name="new_username" required>
            </div>
            <div class="form-group">
                <label for="auth-code">Authentication Code</label>
                <input type="text" id="auth-code" name="auth_code" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="button" id="send-code-btn" class="btn btn-secondary">Send Code</button>
            <button type="submit" id="confirm-btn" class="btn btn-primary">Confirm</button>
        `, routeChangeUsername, routeSendAuthCode);
    };

    changeEmailBtn.onclick = function () {
        const routeChangeEmail = changeEmailBtn.getAttribute('data-route-change-email');
        const routeSendAuthCode = changeEmailBtn.getAttribute('data-route-send-auth-code');
        openPopup('Change Email', `
            <div class="form-group">
                <label for="new-email">New Email</label>
                <input type="email" id="new-email" name="new_email" required>
            </div>
            <div class="form-group">
                <label for="auth-code">Authentication Code</label>
                <input type="text" id="auth-code" name="auth_code" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="button" id="send-code-btn" class="btn btn-secondary">Send Code</button>
            <button type="submit" id="confirm-btn" class="btn btn-primary">Confirm</button>
        `, routeChangeEmail, routeSendAuthCode);
    };

    changePasswordBtn.onclick = function () {
        const routeChangePassword = changePasswordBtn.getAttribute('data-route-change-password');
        const routeSendAuthCode = changePasswordBtn.getAttribute('data-route-send-auth-code');
        openPopup('Change Password', `
            <div class="form-group">
                <label for="new-password">New Password</label>
                <input type="password" id="new-password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="auth-code">Authentication Code</label>
                <input type="text" id="auth-code" name="auth_code" required>
            </div>
            <button type="button" id="send-code-btn" class="btn btn-secondary">Send Code</button>
            <button type="submit" id="confirm-btn" class="btn btn-primary">Confirm</button>
        `, routeChangePassword, routeSendAuthCode);
    };

    document.getElementById('change-phone-btn').onclick = function () {
        openPopup('Change Phone', `
            <div class="form-group">
                <label for="new-value">New Phone</label>
                <input type="text" id="new-value" name="new_value" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" id="confirm-btn" class="btn btn-primary">Confirm</button>
        `, this.getAttribute('data-route-change-phone'));
    };

    document.getElementById('change-address-btn').onclick = function () {
        openPopup('Change Address', `
            <div class="form-group">
                <label for="new-value">New Address</label>
                <input type="text" id="new-value" name="new_value" required>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" id="confirm-btn" class="btn btn-primary">Confirm</button>
        `, this.getAttribute('data-route-change-address'));
    };

    document.getElementById('change-gender-btn').onclick = function () {
        openPopup('Change Gender', `
            <div class="form-group">
                <label for="new-value">New Gender</label>
                <select id="new-value" name="new_value" required>
                    <option value="" selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Confirm Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" id="confirm-btn" class="btn btn-primary">Confirm</button>
        `, this.getAttribute('data-route-change-gender'));
    };

    closeBtn.onclick = function () {
        closePopup();
    };

    window.onclick = function (event) {
        if (event.target == popupModal) {
            closePopup();
        }
    };

    function startCountdown(seconds, sendCodeBtn) {
        let remainingTime = seconds;
        sendCodeBtn.disabled = true;
        sendCodeBtn.textContent = `Resend code in ${remainingTime}s`;

        countdownInterval = setInterval(() => {
            remainingTime -= 1;
            sendCodeBtn.textContent = `Resend code in ${remainingTime}s`;

            if (remainingTime <= 0) {
                clearInterval(countdownInterval);
                sendCodeBtn.disabled = false;
                sendCodeBtn.textContent = 'Send Code';
            }
        }, 1000);
    }
});
