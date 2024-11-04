// Sample transactions data
const transactions = Array.from({ length: 50 }, (_, i) => ({
    id: i + 1,
    user: 'Admin',
    activity: 'Menambahkan data pengguna baru',
    description: 'Kode Makanan : KM0001, Nama Makanan : Oreoreo',
    timestamp: '06/07/2024, 18:44:00'
}));

// Pagination settings
const itemsPerPage = 4;
let currentPage = 1;

// Function to render table data
function renderTable() {
    const $tableBody = $('#tableBody');
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedData = transactions.slice(start, end);

    $tableBody.empty(); // Clear previous rows
    paginatedData.forEach(item => {
        const $row = $(`
            <tr>
                <td>${item.id}</td>
                <td>${item.user}</td>
                <td>${item.activity}</td>
                <td>${item.description}</td>
                <td>${item.timestamp}</td>
            </tr>
        `);
        $tableBody.append($row);
    });
}

// Function to render pagination
function renderPagination() {
    const $pagination = $('#pagination');
    const pageCount = Math.ceil(transactions.length / itemsPerPage);
    $pagination.empty(); // Clear previous pagination buttons

    // Previous button
    const $prevButton = $('<button>').html('←').on('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
            renderPagination();
        }
    });
    $pagination.append($prevButton);

    // Page buttons
    for (let i = 1; i <= pageCount; i++) {
        // Display the first 3 pages, last page, and ellipsis as needed
        if (i <= 3 || i === pageCount || i === currentPage) {
            const $button = $('<button>').html(i);
            if (i === currentPage) {
                $button.addClass('active');
            }
            $button.on('click', () => {
                currentPage = i;
                renderTable();
                renderPagination();
            });
            $pagination.append($button);
        } else if (i === 4) {
            // Add ellipsis after the third page if more pages exist
            $pagination.append($('<span>').html('...').addClass('ellipsis'));
        }
    }

    // Next button
    const $nextButton = $('<button>').html('→').on('click', () => {
        if (currentPage < pageCount) {
            currentPage++;
            renderTable();
            renderPagination();
        }
    });
    $pagination.append($nextButton);
}

// Initial render
$(document).ready(() => {
    renderTable();
    renderPagination();
});