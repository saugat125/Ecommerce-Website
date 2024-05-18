document.getElementById('cover-photo-input').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('cover-photo').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});

document.getElementById('profile-picture-input').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-picture').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});

document.getElementById('edit-info').addEventListener('click', function() {
    const storeName = document.getElementById('store-name');
    const email = document.getElementById('email-input').value;
    const number = document.getElementById('number-input').value;

    storeName.textContent = document.getElementById('store-name-input').value;

    alert('Information saved!');
});



document.getElementById('edit-info').addEventListener('click', function() {
    const storeName = document.getElementById('store-name');
    const emailInput = document.getElementById('email-input').value;
    const numberInput = document.getElementById('number-input').value;

    storeName.textContent = document.getElementById('store-name-input').value;
    // Consider adding these lines to update email and number if they are displayed somewhere.
    document.getElementById('email-display').textContent = emailInput;
    document.getElementById('number-display').textContent = numberInput;

    alert('Information saved!');
});


// Change event for cover photo input
document.getElementById('cover-photo-input').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('cover-photo').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});

// Change event for profile picture input
document.getElementById('profile-picture-input').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('profile-picture').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});

// Prevent form submission and handle save action
document.getElementById('trader-info-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const storeName = document.getElementById('store-name');
    const email = document.getElementById('email-input').value;
    const number = document.getElementById('number-input').value;

    storeName.textContent = document.getElementById('store-name-input').value;

    alert('Information saved!');
});
