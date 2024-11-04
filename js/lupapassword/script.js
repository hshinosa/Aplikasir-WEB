$(document).ready(function() {
    $('#saveButton').on('click', function(event) {
        // Prevent form from submitting
        event.preventDefault();

        const newPassword = $('#newPassword').val().trim();
        const confirmPassword = $('#confirmPassword').val().trim();

        if (!newPassword || !confirmPassword) {
            alert('Kata sandi harus diisi.');
            return;
        }

        if (newPassword !== confirmPassword) {
            alert('Kata sandi tidak cocok. Silakan coba lagi.');
            return;
        }

        alert('Kata sandi berhasil diubah!');

        window.location.href = "../../html/login/index.html";
    });
});