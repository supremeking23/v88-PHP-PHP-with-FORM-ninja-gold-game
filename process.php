<?php 
session_start();

date_default_timezone_set('Asia/Manila');

if(!isset($_POST["submit"])){
    header("Location: index.php");
}else {

    if(isset($_SESSION["score"])){ 
        $_SESSION["score"];
    }else {  
        $_SESSION["score"] = 0;
    }

    if(isset($_SESSION["activities"])){
        $activities = $_SESSION["activities"];
    }else {
        $activities = array();
    }
   
    
    $curr_date = date("F jS Y H:i:s a",time());

    $building = $_POST["building"];
  
    switch($building){
        case "farm":
            $random_score =  rand(11,20);
            $_SESSION["score"] = $_SESSION["score"] + $random_score;
            array_push($activities, "<p class=\"add-points\">You entered a farm and earned {$random_score} golds ($curr_date)</p>");
        break;
        case "cave":
            $random_score =  rand(6,10);
            $_SESSION["score"] = $_SESSION["score"] + $random_score;
            array_push($activities, "<p class=\"add-points\">You entered a cave and earned {$random_score} golds ($curr_date)</p>");
        break;
        case "house":
            $random_score = rand(2,5);
            $_SESSION["score"] = $_SESSION["score"] + $random_score;
            array_push($activities, "<p class=\"add-points\">You entered a house and earned {$random_score} golds ($curr_date)</p>");
        break;
        case "casino":
            $random_score = rand(0,50);
            $add_or_deduct = rand(0,1);
            if($add_or_deduct === 0){
                $_SESSION["score"] = $_SESSION["score"] - rand(0,50);
                array_push($activities, "<p class=\"deduct-points\">You entered a casino and lost {$random_score} golds... Ouch ($curr_date)</p>");
            }else{
                $_SESSION["score"] = $_SESSION["score"] + rand(0,50);
                array_push($activities, "<p class=\"add-points\">You entered a casino and earned {$random_score} golds ($curr_date)</p>");
            }
            
        break;

    }

    $_SESSION["activities"] = $activities;

    header("Location: index.php");
}

?>