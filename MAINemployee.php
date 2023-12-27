<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>User Type</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="maincss/MAINselect.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <a href="index.php"><img src="main-asset/LOGO_STUDIO8.svg" class="logo_MAIN"></a>
            <form action="" class="search-btn">
                <input type="text" placeholder="Search Here!" name="q">
                <button type="submit"><img src="icon/searchIcon.png"></button>
            </form>
        </div>
        <div class="selectemployeepg">
            <form action="customer/Customer.php" class="userselectbtn" align="center">
                <button type="submit" align="center">
                    <img src="icon/SignIcon.png" align="center">
                    <h2>CustomerInfo</h2>
                </button>
            </form>
            <form action="employee/Employeeform.php" class="userselectbtn" align="center">
                <button type="submit" align="center">
                    <img src="icon/SignIcon.png" align="center">
                    <h2>EmployeeInfo</h2>
                </button>
            </form>
            <form action="order/orderform.php" class="userselectbtn" align="center">
                <button type="submit" align="center">
                    <img src="icon/bookIcon.png" align="center">
                    <h2>Order</h2>
                </button>
            </form>
            <form action="product/Form_Stock.php" class="userselectbtn" align="center">
                <button type="submit" align="center">
                    <img src="icon/ProductIcon.png" align="center">
                    <h2>Product</h2>
                </button>
            </form>
            <form action="delivery/deliveryform.php" class="userselectbtn" align="center">
                <button type="submit" align="center">
                    <img src="icon/DeliveryIcon.png" align="center">
                    <h2>Delivery</h2>
                </button>
            </form>
            <form action="MAINanalysis.php" class="userselectbtn" align="center">
                <button type="submit" align="center">
                    <img src="icon/bookIcon.png" align="center">
                    <h2>Analysis Report</h2>
                </button>
            </form>
        </div>
    </div>
</body>
</html>