//---------------Hide/Show Password using Eye icon---------------//

// New Password
const togglePassword = document.querySelector('#toggleNewPassword');
const password = document.querySelector('#id_NewPassword');
togglePassword.addEventListener('click', function() {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('zmdi-eye');
});

// Repeat Password
const togglePassword2 = document.querySelector('#toggleRepeatPassword');
const password2 = document.querySelector('#id_RepeatPassword');
togglePassword2.addEventListener('click', function() {
    // toggle the type attribute
    const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
    password2.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('zmdi-eye');
});

// Current Password
const togglePassword0 = document.querySelector('#toggleCurrentPassword');
const password0 = document.querySelector('#id_CurrentPassword');
togglePassword0.addEventListener('click', function() {
    // toggle the type attribute
    const type = password0.getAttribute('type') === 'password' ? 'text' : 'password';
    password0.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('zmdi-eye');
});
