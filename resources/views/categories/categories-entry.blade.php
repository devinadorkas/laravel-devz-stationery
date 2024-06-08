<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header('location:../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/logo.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>devz admin : categories entry</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-book-bookmark"></i>
            <span class="logo_name">devz</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../admin.php" class="active">
                    <i class="bx bx-home-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../categories/categories.php">
                    <i class="bx bx-shopping-bag"></i>
                    <span class="links_name">Categories</span>
                </a>
            </li>
            <li>
                <a href="../transaction/transaction.php">
                    <i class="bx bx-dollar-circle"></i>
                    <span class="links_name">Transaction</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="bx bx-log-out-circle"></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">devz admin</span>
            </div>
        </nav>
        <div class="home-content">
            <h3>Input Categories</h3>
            <div class="form-login">
			<form action="categories-proses.php" method="post" enctype="multipart/form-data">
				<label for="categories">Categories</label>
				<input class="input" type="text" name="name_categories" id="categories" placeholder="Categories" required />
				
				<label for="price">Price</label>
				<input class="input" type="text" name="price" id="price" placeholder="Price" required />
				
				<label for="description">Description</label>
				<input class="input" type="text" name="description" id="description" placeholder="Description" required />
				
				<label for="photo">Photo</label>
				<input type="file" name="photo" id="photo" style="margin-bottom: 20px" required />
				
				<button type="submit" class="btn btn-simpan" name="simpan">Simpan</button>
			</form>

            </div>
        </div>
    </section>
    <script>
        function validateForm() {
            let categories = document.getElementById("name_categories").value;
            let price = document.getElementById("price").value;
            let description = document.getElementById("description").value;
            let photo = document.getElementById("photo").value;

            if (categories === "" || price === "" || description === "" || photo === "") {
                alert("Pastikan Anda Mengisi Semua Data");
                return false;
            }

            return true;
        }

        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        };
    </script>
</body>

</html>
