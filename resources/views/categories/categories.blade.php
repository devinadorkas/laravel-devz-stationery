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
    <link rel="icon" href="{{asset ('../assets/logo.png')}}" />
    <link rel="stylesheet" href="{{asset ('../css/admin.css')}}" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>devz admin : categories</title>
</head>

<body>
<div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-book-bookmark"></i>
            <span class="logo_name">devz</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="{{asset '(../admin.php')}}" class="active">
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
            <h3>Categories</h3>
            <button type="button" class="btn btn-tambah">
                <a href="categories-entry.php">Tambah Data</a>
            </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th scope="col" style="width: 20%">Photo</th>
                        <th>Categories</th>
                        <th scope="col" style="width: 15%">Price</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../koneksi.php';
                    $sql = "SELECT * FROM categories";
                    $result = mysqli_query($koneksi, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo "
                        <tr>
                            <td colspan='5' align='center'>Data Kosong</td>
                        </tr>
                        ";
                    } else {
                        while ($data = mysqli_fetch_assoc($result)) {
                            echo "
                            <tr>
                                <td>
                                    <img src='../img_categories/$data[photo_categories]' width='200px'>
                                </td>
                                <td>$data[name_categories]</td>
                                <td>$data[price]</td>
                                <td>$data[description]</td>
                                <td>
                                    <a class='btn-edit' href='categories-edit.php?id=$data[id_categories]'>
                                        Edit
                                    </a> | 
                                    <a class='btn-delete' href='categories-hapus.php?id=$data[id_categories]'>
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <script>
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
