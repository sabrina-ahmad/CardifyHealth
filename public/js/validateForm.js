const form = document.querySelector("#form-id");
const phoneInput = document.querySelector("#phone_number");
const passwordInput = document.querySelector("#password");
const confirmInput = document.querySelector("#password_confirmation");

const passwordError = document.querySelector(".passwordError");
const confirmError = document.querySelector(".confirmError");

const phonePattern = /^(?:\+2519\d{8}|9\d{8}|7\d{8})$/;

// document.querySelector("header").remove()
function showToast(message, type = "info", timmer = 3000) {
    let container = document.querySelector("#notifyContainer");

    let notify = document.createElement("div");
    notify.className = "notify notify-" + type;
    notify.textContent = message;

    container.appendChild(notify);
    console.log("added", container.children);

    setTimeout(() => {
        notify.remove();
        console.log("removed");
    }, timmer);
}

function validatePhone() {
    let value = phoneInput.value.trim();

    if (!phonePattern.test(value)) {
        phoneInput.classList.add("is-invalid");
        phoneInput.classList.remove("is-valid");
        return false;
    } else {
        phoneInput.classList.add("is-valid");
        phoneInput.classList.remove("is-invalid");
        return true;
    }
}

function validatePassword() {
    let value = passwordInput.value;
    if (value.length < 8) {
        passwordError.textContent = "Password must be at least 8 characters!";
        passwordError.classList.add("text-danger");
        passwordInput.classlist.add("is-invalid");
        passwordInput.classlist.remove("is-valid");
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

function validateConfirmPassword() {
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

passwordInput.addEventListener("input", () => {
    validatePassword();
    validateConfirmPassword();
});
//
confirmInput.addEventListener("input", validateConfirmPassword);

phoneInput.addEventListener("input", validatePhone);

form.addEventListener("submit", function(e) {
    let valid = validatePassword() & validateConfirmPassword();

    if (valid) {
        confirmError.textContent = "";
        confirmInput.classList.add("is-valid");
        confirmInput.classList.remove("is-invalid");
    } else {
        confirmError.textContent = "Passwords do not match!";
        confirmInput.classList.add("is-invalid");
        confirmInput.classList.remove("is-valid");
        console.log("valid", valid);
        console.log("password:", validatePassword());
        console.log("confirm:", validateConfirmPassword());
        showToast("Passwords are valid and match!", "error");
        submitted = false;
    }
    if (validatePhone()) {
        phoneInput.classList.add("is-valid");
        phoneInput.classList.remove("is-invalid");
    } else {
        phoneInput.classList.add("is-invalid");
        phoneInput.classList.remove("is-valid");
        showToast("Please check your phone number!", "error");
        e.preventDefault();
    }
    console.log(e.defaultPrevented)
    if (!e.defaultPrevented) {
        showToast(
            "Successfully register wait till admin review and send approval",
            "success",
            5000,
        );
        // e.preventDefault();
    }
});
