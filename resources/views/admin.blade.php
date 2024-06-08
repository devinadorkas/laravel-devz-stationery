<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:login.php');
		exit();
	}

	include '../koneksi.php';

	// Query untuk mendapatkan jumlah data dari tabel categories
	$sql_categories = "SELECT COUNT(*) AS count FROM categories";
	$result_categories = mysqli_query($koneksi, $sql_categories);
	$count_categories = mysqli_fetch_assoc($result_categories)['count'];

	// Query untuk mendapatkan jumlah data dari tabel transaction
	$sql_transaction = "SELECT COUNT(*) AS count FROM transaction";
	$result_transaction = mysqli_query($koneksi, $sql_transaction);
	$count_transaction = mysqli_fetch_assoc($result_transaction)['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="../assets/logo.png" />
	<link rel="stylesheet" href="css/admin.css" />
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>devz stationery : admin</title>
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
   		<h2 id="text"></h2>
   		<h3 id="date"></h3>
		
		<!-- Widget untuk menampilkan jumlah data pada tabel categories -->
		<div class="widget">
			<h4>Total Categories</h4>
			<p><?= $count_categories; ?></p>
		</div>

		<!-- Widget untuk menampilkan jumlah data pada tabel transaction -->
		<div class="widget">
			<h4>Total Transactions</h4>
			<p><?= $count_transaction; ?></p>
		</div>
	</div>
	</section>
	<script>
   let sidebar = document.querySelector(".sidebar");
   let sidebarBtn = document.querySelector(".sidebarBtn");
   sidebarBtn.onclick = function () {
	sidebar.classList.toggle("active");
	   if (sidebar.classList.contains("active")) {
		sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
	   } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
   };
   function myFunction() {
      const months = ["January", "February", "March", "April", "May",
			   "June", "July", "August", "September", "October",
			   "November", "Desember"];
      const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday",
                   "Friday", "Saturday"];
      let date = new Date();
      jam = date.getHours();
	tanggal = date.getDate();
	hari = days[date.getDay()];
	bulan = months[date.getMonth()];
	tahun = date.getFullYear();

	let m = date.getMinutes();
	let s = date.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById("date").innerHTML = `${hari}, 
      ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
	requestAnimationFrame(myFunction);
   }
   function checkTime(i) {
	if (i < 10) {
	   i = "0" + i;
	}
	return i;
   }
   window.onload = function () {
	let nama = prompt("Input Your Name : ", "Admin");
	let jam = new Date().getHours();
	if (nama != null) {
	   if (jam >= 4 && jam <= 10) {
		document.getElementById("text").innerHTML = `Good Morning ${nama}`;
	   } else if (jam >= 11 && jam <= 15) {
		document.getElementById("text").innerHTML = `Good Afternoon ${nama}`;
	   } else if (jam >= 16 && jam <= 18) {
		document.getElementById("text").innerHTML = `Good Evening ${nama}`;
	   } else {
		document.getElementById("text").innerHTML = `Good Night ${nama}`;
	   }
		}
 	myFunction();
	};
</script>

</body>

</html>
