function navigateToIndex() {
    window.location.href = "index.html";
}

// Function to change the placeholder based on user input
function updatePlaceholder(input) {
    const defaultText = input.getAttribute('data-default');
    if (input.value.trim() === '') {
        input.placeholder = defaultText; // Reset to default if input is empty
    } else {
        input.placeholder = input.value; // Set placeholder to current input value
    }
}

// Function to save input values into placeholders
function saveInputs() {
    inputs.forEach(input => {
        if (input.value.trim() !== '') {
            input.setAttribute('data-default', input.value); // Update the data-default with the current value
            input.placeholder = input.value; // Change placeholder to show saved input
        }
    });
}

// Function to reset inputs to default values
function resetInputs() {
    inputs.forEach(input => {
        const defaultText = input.getAttribute('data-default');
        input.value = ''; // Clear the input field
        input.placeholder = defaultText; // Reset placeholder to default value
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

saveButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent form submission
    saveInputs(); // Call save function
});

resetButton.addEventListener('click', (event) => {
    event.preventDefault(); // Prevent form submission
    resetInputs(); // Call reset function
});
