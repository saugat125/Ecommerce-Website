function showToast(message) {
    // Create the toast element
    const toast = document.createElement("div");
    toast.className = "toast";
    toast.textContent = message;

    // Add the toast to the body
    document.body.appendChild(toast);

    // Show the toast
    toast.classList.add("show");

    // After 3 seconds, remove the toast from the document
    setTimeout(() => {
        toast.classList.remove("show");
        setTimeout(() => toast.remove(), 600); // wait for animation to finish
    }, 3000);
}
