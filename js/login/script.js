$(document).ready(function() {
    $('#loginButton').on('click', function(event) {
        // Prevent default form submission
        event.preventDefault();
        
        // Get username and password values
        const username = $('#username').val().trim();
        const password = $('#password').val().trim();
        
        // Basic validation
        if (!username || !password) {
            alert('Nama Pengguna dan Kata Sandi harus diisi.');
            return;
        }

        if (username !== password) {
            alert('Username atau Kata Sandi tidak cocok. Silakan coba lagi.');
            return;
        }

        alert('Login berhasil!');
        
        window.location.href = "../../html/maindashboard/index.html";
    });
});