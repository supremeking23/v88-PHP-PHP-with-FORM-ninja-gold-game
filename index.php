<?php 
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Gold Game</title>

    <style>
        body * {
            /* outline:1px dashed red; */
        }

        body {
            font-family:helvetica;
        }

        .container {
            width:1200px;
            margin:40px auto 0;
            padding:20px;
            border: 1px solid #808080;
            -webkit-box-shadow: 1px -1px 5px 13px rgba(94,94,94,1);
            -moz-box-shadow: 1px -1px 5px 13px rgba(94,94,94,1);
            box-shadow: 1px -1px 5px 13px rgba(94,94,94,1);
        }

        h1 span {
            border:1px solid #808080;
            padding:10px;
           
        }

        form {
            border:2px solid #000;
            width:24%;
            display:inline-block;
            margin-bottom:10px;
            padding-bottom:10px;
            text-align:center;
        }

        form input[type="submit"]{
            padding:10px;
        }

        .activities {
            overflow-y:scroll;
            height:200px;
            border: 1px solid #808080;
            padding:10px;
        }

       
        .add-points{
            color:green;
        }

        .deduct-points {
            color:red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Gold: <span><?= (isset($_SESSION["score"])) ? $_SESSION["score"] : 0; ?></span></h1>

        <form action="process.php" method="POST">
            <h2>Farm</h2>
            <h3>earns 10 - 20 golds</h3>
            <input type="hidden" name="building" value="farm" />
            <input type="submit" name="submit" value="Find Gold!"/>
        </form>

        <form action="process.php" method="POST">
            <h2>Cave</h2>
            <h3>earns 5 - 10 golds</h3>
            <input type="hidden" name="building" value="cave" />
            <input type="submit" name="submit" value="Find Gold!"/>
        </form>

        <form action="process.php" method="POST">
            <h2>House</h2>
            <h3>earns 2 - 5 golds</h3>
            <input type="hidden" name="building" value="house" />
            <input type="submit" name="submit" value="Find Gold!"/>
        </form>
        <form action="process.php" method="POST">
            <h2>Casino!</h2>
            <h3>earns/takes 0 - 50 golds</h3>
            <input type="hidden" name="building" value="casino" />
            <input type="submit" name="submit" value="Find Gold!"/>
        </form>


        <div class="activities">
        <?php 
        if(isset($_SESSION["activities"])){
            foreach(array_reverse($_SESSION["activities"]) as $activity){ ?>
                <?= $activity;?>
        <?php    }
        }

        ?>
            <!-- <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</?>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p>
            <p>You entered a farm and earned 15 golds (September 3rd 2013 6:15pm)</p> -->
        </div>
    </div>
    
</body>
</html>