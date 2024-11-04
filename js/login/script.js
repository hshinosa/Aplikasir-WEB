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

        // Simulate form submission (replace with actual AJAX call if needed)
        alert('Login berhasil!\nUsername: ' + username + '\nPassword: ' + password);
        
        // Redirect to dashboard
        window.location.href = "../../html/maindashboard/index.html";
    });
});