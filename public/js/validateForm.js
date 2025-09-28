// Selectors for both forms
const hospitalForm = document.getElementById('hospital-form');
const patientForm = document.getElementById('patient-form');

// Function to get elements relative to a form
function getFormElements(formId) {
    const form = document.getElementById(formId);

    return {
        phoneInput: form.querySelector("#phone_number"),
        passwordInput: form.querySelector("#password"),
        confirmInput: form.querySelector("#password_confirmation"),

        passwordError: form.querySelector(".passwordError"),
        confirmError: form.querySelector(".confirmError")
    };
}

// Get elements for both forms
const hospitalElements = getFormElements('hospital-form');
const patientElements = getFormElements('patient-form');

const phonePattern = /^(?:\+2519\d{8}|9\d{8}|7\d{8})$/;

function showToast(message, type = "info", timer = 3000) {
    let container = document.querySelector("#notifyContainer");

    let notify = document.createElement("div");
    notify.className = "notify notify-" + type;
    notify.textContent = message;

    container.appendChild(notify);
    console.log("added", container.children);

    setTimeout(() => {
        notify.remove();
        console.log("removed");
    }, timer);}

function validatePhone(phoneInput) {
    let value = phoneInput.value.trim();
    return phonePattern.test(value);
}

function validatePassword(passwordInput, passwordError) {
    let value = passwordInput.value;
    if (value.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters!";
        passwordError.classList.add("text-danger");
        passwordInput.classList.add("is-invalid");
        passwordInput.classList.remove("is-valid");
        return false;
    } else if (!/[A-Z]/.test(value)) {
        passwordError.textContent = "Must contain an uppercase letter!";
        passwordInput.classList.add("is-invalid");
        passwordInput.classList.remove("is-valid");
        return false;
    } else if (!/[0-9]/.test(value)) {
        passwordError.textContent = "Must contain a number!";
        passwordInput.classList.add("is-invalid");
        passwordInput.classList.remove("is-valid");
        return false;
    } else {
        passwordError.textContent = "";
        passwordError.classList.remove("text-danger");
        passwordInput.classList.remove("is-invalid");
        passwordInput.classList.add("is-valid");
        return true;
    }
}

function validateConfirmPassword(confirmInput, passwordInput, confirmError) {
    if (confirmInput.value !== passwordInput.value || confirmInput.value === "") {
        confirmError.textContent = "Passwords do not match!";
        confirmError.classList.add("text-danger");
        confirmInput.classList.add("is-invalid");
        confirmInput.classList.remove("is-valid");
        return false;
    } else {
        confirmError.textContent = "";
        confirmInput.classList.add("is-valid");
        confirmInput.classList.remove("is-invalid");
        return true;
    }
}

// Event listeners for hospital form
hospitalElements.passwordInput.addEventListener("input", () => {
    validatePassword(hospitalElements.passwordInput, hospitalElements.passwordError);
    validateConfirmPassword(
        hospitalElements.confirmInput,
        hospitalElements.passwordInput,
        hospitalElements.confirmError
    );
});

hospitalElements.confirmInput.addEventListener("input", () => {
    validateConfirmPassword(
        hospitalElements.confirmInput,
        hospitalElements.passwordInput,
        hospitalElements.confirmError
    );
});

hospitalElements.phoneInput.addEventListener("input", () => {
    if (validatePhone(hospitalElements.phoneInput)) {
        hospitalElements.phoneInput.classList.add("is-valid");
        hospitalElements.phoneInput.classList.remove("is-invalid");
    } else {
        hospitalElements.phoneInput.classList.add("is-invalid");
        hospitalElements.phoneInput.classList.remove("is-valid");
    }
});

// Event listeners for patient form
patientElements.passwordInput.addEventListener("input", () => {
    validatePassword(patientElements.passwordInput, patientElements.passwordError);
    validateConfirmPassword(
        patientElements.confirmInput,
        patientElements.passwordInput,
        patientElements.confirmError
    );
});

patientElements.confirmInput.addEventListener("input", () => {
    validateConfirmPassword(
        patientElements.confirmInput,
        patientElements.passwordInput,
        patientElements.confirmError
    );
});

patientElements.phoneInput.addEventListener("input", () => {
    if (validatePhone(patientElements.phoneInput)) {
        patientElements.phoneInput.classList.add("is-valid");
        patientElements.phoneInput.classList.remove("is-invalid");
    } else {
        patientElements.phoneInput.classList.add("is-invalid");
        patientElements.phoneInput.classList.remove("is-valid");
    }
});

// Form submission handlers
function handleFormSubmit(elements, e) {
    let valid = validatePassword(elements.passwordInput, elements.passwordError) &&
                validateConfirmPassword(
                    elements.confirmInput,
                    elements.passwordInput,
                    elements.confirmError
                );

    if (!valid) {
        e.preventDefault();
        showToast("Passwords are invalid!", "error");
        return;
    }

    if (!validatePhone(elements.phoneInput)) {
        e.preventDefault();
        showToast("Invalid phone number format!", "error");
        return;
    }

    showToast(
        "Successfully registered! Wait till admin review and send approval",
        "success",
        5000
    );
}

hospitalForm.addEventListener("submit", (e) => handleFormSubmit(hospitalElements, e));
patientForm.addEventListener("submit", (e) => handleFormSubmit(patientElements, e));
