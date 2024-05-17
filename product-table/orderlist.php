<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Listing</title>
    <link rel="stylesheet" href="orderlist.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <header>
        <nav>
            <div class="nav-icons">
                <span class="icons"><i class="fa fa-bars" aria-hidden="true">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProducts  &nbsp >   &nbsp Product List</i></span>
                <span class="user"><i class="fa fa-user-circle" aria-hidden="true"> Harefields fam</i></span>
            </div>
        </nav>
    </header>

    <div class="flex-page">

    <div class="sidebar">
        <?php include ('../sidebar/sidebar.html')?>
    </div>
    <main>
        <h1>Products</h1>
        <div class="search-bar">
            <input type="text" placeholder="Search">
            <select name="filter">
                <option value="all">All</option>
                <!-- Add more options as needed -->
            </select>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>PRODUCT IMAGE</th>
                        <th>PRODUCT NAME</th>
                        <th>STOCK</th>
                        <th>PRICE(£)</th>
                        <th>ALLERGY INFO</th>
                        <th>MAX ORDER</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td><button>Delete</button></td>
                        <td><button><a href="../updateproduct/UpdateProduct.php">Edit</a></button></td>
                    </tr>
                    <!-- Add more rows as needed -->
                    <tr>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td><button>Delete</button></td>
                        <td><button><a href="../updateproduct/UpdateProduct.php">Edit</a></button></td>
                    </tr>
                    <tr>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td><button>Delete</button></td>
                        <td><button><a href="../updateproduct/UpdateProduct.php">Edit</a></button></td>
                    </tr>
                    <tr>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td><button>Delete</button></td>
                        <td><button><a href="../updateproduct/UpdateProduct.php">Edit</a></button></td>
                    </tr>
                    <tr>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>****</td>
                        <td>xxxx</td>
                        <td>xxxx</td>
                        <td><button>Delete</button></td>
                        <td><button><a href="../updateproduct/UpdateProduct.php">Edit</a></button></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="add-btn">
            <button class="add-product"><a href="../addproduct/AddProdcut.php">ADD PRODUCT</a></button>
        </div>
        
    </main>
    </div>
</body>
</html>
