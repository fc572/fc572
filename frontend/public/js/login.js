async function login() {
document.addEventListener('DOMContentLoaded', function () {
    const demo = document.getElementById("demo");
    const timer = document.getElementById('timer');

    document.getElementById('loginBtn').addEventListener('click', function (e) {
        e.preventDefault();
        const uname = document.getElementById('field_uname').value.trim();
        const pwd = document.getElementById('field_pwd').value.trim();

        if (uname === 'Neo' && pwd === 'redpill') {
            window.location.href = '../loggedInPage.html';
        } else {
            demo.innerHTML = 'Please enter the correct user name and password';
        }
    });
});
}
login();

async function reset() {
    document.getElementById('resetBtn').addEventListener('click', function () {
        document.getElementById("loginForm").reset();
        demo.innerHTML = '';
    });    
}
reset();