
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign in</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!--Navigation Bar-->
        <ul id="navBar">
            <li><a href="HomePage.html">Home</a></li>
            <li style="float:right"><a class="account" href="signIn.php">Account</a></li>
            <!--Search Bar-->
            <li style="float:right; border:none;">
                <form id="search" method="get" action="search.php" style="margin:0; padding:10px;">
                    <input type="text" name="searchGame" placeholder="Search for games..." required>
                    <button type="submit">Search</button>
                </form>
            </li>
        </ul>
    
    <?php 
    $error = "";
    session_start();
    
    //Regex
    $emailRegex = '/[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/';
    $unameRegex = '/^[a-zA-Z0-9._-]{3,15}$/';
    $passRegex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,15}$/';

    // Initially hide logout button
    echo "<script>document.getElementById(\"logout\").style.display=\"none\";</script>";

    function SignupForm($error = "")
    {
        echo '
            <form method="post">
                <div class="error">'. $error . '</div> 
                <label for="email">Email:</label><br>
                <input type="text" id="email" name="email" required><br>

                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" required><br>

                <input type="submit" value="Submit">
            </form>';
    }

    // Only show logout button if logged in
    if (isset($_SESSION["login"]) && $_SESSION["login"] === true) {
        echo '<form id="logout" action="signOut.php" method="post">
                <input type="submit" value="Sign Out">
              </form>';
    }
    // Handle form submission
    else 
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") 
        {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["password"] = $_POST["password"];
            $_SESSION["login"] = false;

            $email = $_SESSION["email"];
            $password = $_SESSION["password"];

                if (preg_match($emailRegex, $email)) {
                    if (preg_match($passRegex, $password)) {
                            $_SESSION["login"] = true;
                            echo "<script>document.getElementById(\"logout\").style.display=\"block\";</script>";
                            header("Location: HomePage.html");
                            exit();
                    } else {
                        $error = "*Invalid password: Must be 8–15 characters long, include a capital letter and a number";
                        SignupForm($error);
                    }
                } else {
                    $error = "*Invalid email</span>";
                    SignupForm($error);
                }
        } 
    else{
        SignupForm($error);
    }
}

    ?>
</body>
</html>