<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Profile</title>
    <link rel="stylesheet" href="traderinfo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <div class="nav-icons">
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp &nbsp SHOP</i></span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"> Harefields fam</i></span>
            </div>
        </nav>
    </header>


    <div class="flex-page">

    <div class="sidebar">
        <?php include ('../sidebar/sidebar.html')?>
    </div>

    <div class="shop">
    <div class="profile-container">
        <div class="cover-photo">
            <input type="file" id="cover-photo-input" accept="image/*">
            <img src="cover-photo.jpg" alt="Cover Photo" id="cover-photo">
        </div>
        <div class="profile-info">
            <div class="profile-picture">
                <input type="file" id="profile-picture-input" accept="image/*">
                <img src="profile-picture.jpg" alt="Profile Picture" id="profile-picture">
            </div>
            <h1 id="store-name">Harefields Farm</h1>
            <p id="description">For veggies</p>
            <button id="edit-info">Edit Info</button>
        </div>
    </div>
    <div class="trader-info">
        <h2>Shop Information</h2>
        <form id="trader-info-form">
            <label for="store-name-input">Shop Name:</label>
            <input type="text" id="store-name-input" >
            <label for="email-input">Email:</label>
            <input type="email" id="email-input">
            <label for="number-input">Number:</label>
            <input type="text" id="number-input">
            <button type="submit">Save</button>
        </form>
    </div>
    </div>
    </div>
    <script src="traderinfo.js"></script>
</body>
</html>
