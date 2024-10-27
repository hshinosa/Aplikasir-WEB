const transactions = Array.from({ length: 50 }, (_, i) => ({
    id: i + 1,
    user: 'Admin',
    activity: 'Menambahkan data pengguna baru',
    description: 'Kode Makanan : KM0001, Nama Makanan : Oreoreo, Informasi Gizi : Satu porsi terisi',
    timestamp: '06/07/2024, 18:44:00'
}));

// Pagination settings
const itemsPerPage = 4;
let currentPage = 1;

// Function to render table data
function renderTable() {
    const tableBody = document.getElementById('tableBody');
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const paginatedData = transactions.slice(start, end);

    tableBody.innerHTML = '';
    paginatedData.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.user}</td>
            <td>${item.activity}</td>
            <td>${item.description}</td>
            <td>${item.timestamp}</td>
        `;
        tableBody.appendChild(row);
    });
}

// Function to render pagination
function renderPagination() {
    const pagination = document.getElementById('pagination');
    const pageCount = Math.ceil(transactions.length / itemsPerPage);
    
    pagination.innerHTML = '';
    
    // Previous button
    const prevButton = document.createElement('button');
    prevButton.innerHTML = '←';
    prevButton.onclick = () => {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
            renderPagination();
        }
    };
    pagination.appendChild(prevButton);

    // First few pages
    for (let i = 1; i <= Math.min(2, pageCount); i++) {
        const button = document.createElement('button');
        button.innerHTML = i;
        if (i === currentPage) {
            button.classList.add('active');
        }
        button.onclick = () => {
            currentPage = i;
            renderTable();
            renderPagination();
        };
        pagination.appendChild(button);
    }

    // Ellipsis
    if (pageCount > 5) {
        const ellipsis = document.createElement('span');
        ellipsis.innerHTML = '...';
        ellipsis.className = 'ellipsis';
        pagination.appendChild(ellipsis);
    }

    // Last page
    const lastButton = document.createElement('button');
    lastButton.innerHTML = '5';
    if (5 === currentPage) {
        lastButton.classList.add('active');
    }
    lastButton.onclick = () => {
        currentPage = 5;
        renderTable();
        renderPagination();
    };
    pagination.appendChild(lastButton);

    // Next button
    const nextButton = document.createElement('button');
    nextButton.innerHTML = '→';
    nextButton.onclick = () => {
        if (currentPage < pageCount) {
            currentPage++;
            renderTable();
            renderPagination();
        }
    };
    pagination.appendChild(nextButton);
}

// Initial render
renderTable();
renderPagination();