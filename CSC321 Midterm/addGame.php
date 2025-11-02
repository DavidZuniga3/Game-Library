
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add game</title>
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


        <form method="post">
            <label>Title:</label><br>
            <input type="text" name="title" required><br><br>

            <label>Description:</label><br>
            <textarea name="description" required></textarea><br><br>

            <label>Image URL:</label><br>
            <input type="text" name="image" required><br><br>

            <input type="submit" value="Submit">
        </form>

        <?php 
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $fName = "games.json";
            $json = file_get_contents($fName);

            $gamesList = json_decode($json, true);

            $newGame = ["id" => end($gamesList)["id"] + 1, 
                        "title" => $_POST["title"],
                        "description" => $_POST["description"],
                        "image" => $_POST["image"]
                    ];

            array_push($gamesList, $newGame);

            file_put_contents($fName, json_encode($gamesList, JSON_PRETTY_PRINT));

            echo "<p>Game added!</p>";
        }

        ?>
</body>
</html>