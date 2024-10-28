$(document).ready(function() {
    // Sample data
    const users = [
        {
            no: 1,
            pelanggan: "aplikasir pengguna",
            username: "sinta",
            telp: "087336523465",
            email: "sintaf123@gmail.com"
        }
    ];

    // Create 11 rows of data
    const userData = Array.from({ length: 11 }, (_, i) => ({
        no: i + 1,
        pelanggan: "aplikasir pengguna",
        username: "sinta",
        telp: "087336523465",
        email: "sintaf123@gmail.com"
    }));

    // Populate table
    function populateTable(data) {
        const tbody = $('#userData');
        tbody.empty();

        data.forEach(user => {
            tbody.append(`
                <tr>
                    <td>${user.no}</td>
                    <td>${user.pelanggan}</td>
                    <td>${user.username}</td>
                    <td>${user.telp}</td>
                    <td>${user.email}</td>
                    <td class="action-icons">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-trash"></i>
                    </td>
                </tr>
            `);
        });
    }

    // Initialize table
    populateTable(userData);

    // Pagination click handlers
    $('.page-btn').click(function() {
        $('.page-btn').removeClass('active');
        $(this).addClass('active');
    });

    // Previous/Next button handlers
    $('.prev-btn, .next-btn').click(function() {
        // Add pagination logic here
        console.log('Navigation clicked');
    });

    // Edit and Delete handlers
    $(document).on('click', '.fa-edit', function() {
        const row = $(this).closest('tr');
        const id = row.find('td:first').text();
        console.log('Edit clicked for ID:', id);
    });

    $(document).on('click', '.fa-trash', function() {
        const row = $(this).closest('tr');
        const id = row.find('td:first').text();
        console.log('Delete clicked for ID:', id);
    });
});