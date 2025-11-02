


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Remove game</title>
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
            <label>Game Title:</label><br>
            <input type="text" name="title" required><br><br>

            <input type="submit" value="Submit">
        </form>

        <?php 
        if($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $fName = "games.json";
            $json = file_get_contents($fName);

            $gamesList = json_decode($json, true);

            $deleteTitle = strtolower(trim($_POST["title"]));


            $found = false;

            foreach ($gamesList as $i => $game) {
                if (strtolower($game["title"]) === $deleteTitle) {
                    unset($gamesList[$i]);
                    $found = true;
                    break;
                }
            }

            if ($found) {
                $gamesList = array_values($gamesList); 
                file_put_contents($fName, json_encode($gamesList, JSON_PRETTY_PRINT));
                echo "<p>Game deleted!</p>";
            } else {
                echo "<p>Game not found.</p>";
            }
        }
// $fName = "games.json";
// $json = file_get_contents($fName);

// //id of game to delete
// $id = 2;

// //reads json file, gets list
// $gamesList = json_decode($json, true);

// //updated list with removed game
// $updateList = array_filter($gamesList, fn($game) => $game['id'] != $id);

// //Updates json file
// file_put_contents($fName, json_encode(array_values($updateList), JSON_PRETTY_PRINT));

// echo "Deleted from file";

 ?>
</body>
</html>