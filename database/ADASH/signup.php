<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/signup.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="img">
            <img class="logo" src="./IMAGES/LOGO (1).png" alt="">
            <img class="lap" src="./IMAGES/images__6_-removebg-preview 1.png" alt="">
            <h2>Let financial technology WORK FOR YOU!</h2>
        </div>
        <div class="details">
            <h2>PLEASE FILL IN THE FOLLOWING INFORMATION BELOW TO PROCEED</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="text" name="fname">
                <label for="fname">Fullname</label>
                <input type="text" name="address">
                <label for="address">Address</label>
                <?php echo $email_err ?>
                <input type="email" name="email">
                <label for="email">EMAIL</label>
                <input type="number" name="phoneNumber">
                <label for="phoneNumber">Phone Number</label>
                <?php echo $password_err ?>
                <input type="password" name="password" required>
                <label for="password">Password</label>
                <?php echo $confirm_err?>
                <input type="password" name="confirm" required>
                <label for="confirm">confirm password</label>
            </form>
            <button>Create Account</button>
        </div>
    </div>
</body>
</html>