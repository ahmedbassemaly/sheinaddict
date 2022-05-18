<link rel="stylesheet" href="<?php echo URLROOT . 'css/sidebar.css'; ?>">
<script src="https://kit.fontawesome.com/a8598e67d0.js" crossorigin="anonymous"></script>
<div class="sidebar">
    <h1>Shein Addict</h1><br><br>
    <hr>
    <div class="links-container">
        <ul style="list-style: none;">
            <li>
                <a class="active" href="<?php echo URLROOT . 'pages/adminDashboard'; ?> "><i class="fa-solid fa-gauge"></i> Dashboard</a>
            </li>
            <br>
            <li>
                <a href="<?php echo URLROOT . 'pages/viewProducts'; ?> "><i class="fa-solid fa-shirt"></i> Products</a>
            </li>
            <br>
            <li>
                <!-- <a href="#"><i class="fa-solid fa-truck-front"></i> Orders</a> -->
                 <!---------------- Orders here untill i have the dashboard ---------------->
                <link rel="stylesheet" href="<?php echo URLROOT . 'css/orders.css'; ?>">
                <div class="dropdown">
                <button class="dropbtn"><i class="fa-solid fa-truck-front"></i> Orders</button>
                <div class="dropdown-content">
                  <a href=<?php echo URLROOT . 'pages/orders'; ?> style="color: black">Egypt</a>
                  <a href=<?php echo URLROOT . 'pages/orders'; ?> style="color: black">Saudi Arabia</a>
                </div>
                </div>
                <!---------------------------- End of orders -------------------------------->

            </li>
            <br>
            <li>
                <a href="<?php echo URLROOT . 'pages/viewCustomers'; ?>"><i class="fa-solid fa-user"></i> Customers</a><br>
            </li>
            <li>
                <a href="<?php echo URLROOT . 'pages/editContact'; ?>"><i class="fa-solid fa-phone"></i> Edit Contact Us</a>
            </li>
            <br>
            <li>
                <a href="<?php echo URLROOT . 'pages/editFAQ'; ?>"><i class="fa-solid fa-circle-question"></i> Edit FAQ</a>
            </li>
        </ul>
    </div>
</div>