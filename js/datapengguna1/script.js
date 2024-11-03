$(document).ready(function() {    
    const sampleTransaction = {
        status: "Transaksi berhasil",
        produk: "Kode Makanan: KM0001,<br>Nama Makanan: Oreoreo",
        waktu: "06/07/2024, 18:44:00"
    };

    const transactions = Array.from({ length: 6 }, (_, i) => ({
        no: i + 1,
        status: sampleTransaction.status,
        produk: sampleTransaction.produk.replace("KM0001", `KM${String(i + 1).padStart(4, '0')}`),
        waktu: new Date(Date.now() - (i * 1000 * 60 * 60 * 24)).toLocaleString()
    }));

    function populateTransactionTable(data) {
        const tbody = $('#transactionData');
        tbody.empty();

        data.forEach(transaction => {
            tbody.append(`
                <tr>
                    <td>${transaction.no}</td>
                    <td>${transaction.status}</td>
                    <td>${transaction.produk}</td>
                    <td>${transaction.waktu}</td>
                </tr>
            `);
        });
    }

    populateTransactionTable(transactions);
});

// Function to change the placeholder based on user input
function updatePlaceholder(input) {
    const defaultText = input.getAttribute('data-default');
    if (input.value.trim() === '') {
        input.placeholder = defaultText;
    } else {
        input.placeholder = input.value;
    }
}

// Function to save input values into placeholders
function saveInputs() {
    inputs.forEach(input => {
        if (input.value.trim() !== '') {
            input.setAttribute('data-default', input.value);
            input.placeholder = input.value;
            input.value = '';
        }
    });
}

// Function to reset inputs to default values
function resetInputs() {
    inputs.forEach(input => {
        const defaultText = input.getAttribute('data-default');
        input.value = '';
        input.placeholder = defaultText;
    });
}

// Get all inputs in the form
const form = document.getElementById('userInfoForm');
const inputs = form.querySelectorAll('input');

// Add event listeners for each input
inputs.forEach(input => {
    input.addEventListener('input', () => updatePlaceholder(input));
});

// Get buttons and add click event listeners
const saveButton = document.querySelector('.btn-save');
const resetButton = document.querySelector('.btn-reset');

$('.btn-save').on('click', function(event) {
    event.preventDefault();
    if (window.confirm("Apakah anda yakin ingin mengubah info akun?")) {
        saveInputs();
    }
});

resetButton.addEventListener('click', (event) => {
    event.preventDefault();
    resetInputs();
});
