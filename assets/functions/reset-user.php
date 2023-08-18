<?php

if(!isset($_COOKIE["user"] )){
    header("Location: login.php");
}
elseif($_COOKIE["type"] != "admin"){
    header("Location: home.php");

}

include('../includes/db.php');
// if($_COOKIE["type"] == "admin"){

// }

$login = $_GET["id"];

$query = "SELECT * FROM user WHERE login = '$login'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seawind Billing Desk</title>
</head>
<link rel="stylesheet" href="../css/styles.css">
<link rel="stylesheet" href="../css/create-user.css">
<body>
    <nav class="nav">
        <div class="logo">Seawind Shipping and Logistics</div>
        <div class="links">
            <ul class="nav-links">
            <div class="nav-link"><a href="../../admin-dashboard.php">Dashboard</a></div>
                
                <li class="nav-link active"><a href="#">Create User</a></li>
                <li class="nav-link"><a href="../../user-data.php">User Data</a></li>
                <li class="nav-link"><a href="../../admin-job-data.php">Job Data</a></li>
            </ul>
        </div>
        <form action="admin-logout.php">
                <button class="logout" type="submit">Logout</button>    
            </form>
    
    </nav>

    <div class="container">
        <form action="reset-user-data.php" method="post">

            <div class="form-input">
                <label for="name">Employee Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row["name"] ?>" disabled>
                <input type="hidden" name="name" value="<?php echo $row["name"] ?>">
            </div>
            <div class="form-input">
                <label for="login">Login ID:</label>
                <input type="text" id="login" name="login" value="<?php echo $row["login"] ?>" disabled>
                <input type="hidden" name="login" value="<?php echo $row["login"] ?>">
            </div>
            <div class="form-input">
                <label for="password">Password:</label>
                <input type="text" id="password" name="password">
            </div>
            <div class="form-input">
                <button type="submit">Create</button>
            </div>
            
        </form>
    </div>

</body>
</html>