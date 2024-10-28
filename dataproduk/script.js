$(document).ready(function() {
    // Sample data - memastikan path menggunakan slash
    const userData = Array.from({ length: 11 }, (_, i) => ({
        no: i + 1,
        gambar: "C:/Users/ASUS/Downloads/Aplikasir-WEB-main/dataproduk/images/barang.jpg",
        namaproduk: "Gula pasir",
        harga: "Rp 30.000,00",
        stok: "200"
    }));

    // Populate table
    function populateTable(data) {
        const tbody = $('#userData');
        tbody.empty();

        data.forEach(user => {
            tbody.append(`
                <tr>
                    <td>${user.no}</td>
                    <td><img src="${user.gambar}" alt="Product Image" width="50" height="50"/></td>
                    <td>${user.namaproduk}</td>
                    <td>${user.harga}</td>
                    <td>${user.stok}</td>
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
