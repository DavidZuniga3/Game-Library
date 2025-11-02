<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Search</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            $fName = "games.json";
            $json = file_get_contents($fName);

            $found = null;
            
            if(isset($_GET["searchGame"]))
            {
                $search = strtolower(trim($_GET["searchGame"]));

                $gameslist = json_decode($json, true);

                foreach($gameslist as $game)
                {
                    if(strtolower($game["title"]) === $search)
                    {
                        $found = $game;
                    }
                }
            }

            if($found)
            {
                $id = $found["id"];
                header("Location: gameDesc.html?id=$id");
            }
            else
            {
                echo "<h3>Game not Found. <a href='HomePage.html'>Home</a><h3>";
            }
        ?>
    </body>
</html>