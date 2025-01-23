const tabButtons = document.querySelectorAll('.tab-button');
const loginForm = document.getElementById('login-form');
const signupForm = document.getElementById('signup-form');

tabButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        tabButtons.forEach(btn => btn.classList.remove('active'));
        button.classList.add('active');
        
        if (index === 0) {
            loginForm.style.display = 'block';
            signupForm.style.display = 'none';
        } else {
            loginForm.style.display = 'none';
            signupForm.style.display = 'block';
        }
    });
});