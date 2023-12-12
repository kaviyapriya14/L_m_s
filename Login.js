function validateForm(event) {
    event.preventDefault();
    var errorMessages = document.getElementsByClassName('error-message');
    for (var i = 0; i < errorMessages.length; i++) {
        errorMessages[i].textContent = '';
    }

    var email = document.getElementById('email').value;
    var emailformat = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!email.trim() || !emailformat.test(email)) {
        displayError('Please enter a valid Email address', 'email_error');
        return false;
    }

    var password = document.getElementById('password').value;
    if (password.length < 8) {
        displayError('Password must be at least 8 characters long', 'password_error');
        return false;
    }

    alert('Logged in');
}

function displayError(message, containerId) {
    var container = document.getElementById(containerId);
    var errorElement = document.createElement('div');
    errorElement.className = 'error-message';
    errorElement.textContent = message;
    container.appendChild(errorElement);
}


