function showToast(message, type = "info", timmer = 5000) {
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


function showNotify(message, type = "info", timer = 5000) {
    let container = document.querySelector("#notifyContainer");

    let notify = document.createElement("div");
    notify.className = "notify notify-" + type;
    notify.innerHTML = message;  // Use innerHTML to render HTML content

    container.appendChild(notify);
    console.log("added", container.children);

    setTimeout(() => {
        notify.remove();
        console.log("removed");
    }, timer);
}
