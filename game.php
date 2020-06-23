<?php
    if(isset($_GET["name"])){
    $name = $_GET["name"];
//    echo $name;
    }
    else die("Name parameter missing");

    if(isset($_POST['logout'])) header('Location: index.php');

    if(isset($_POST["playButton"])) $human = $_POST["play"];
    else $human = 'select';

    $output="Please select a strategy and press Play";

    $moves = array('rock', 'paper', 'scissors');
    shuffle($moves);
    $computer=$moves[0];

    /*echo "Human ".$human."\n";
    echo "Computer ".$computer."\n";
    */
    function check($h, $c){
        $moves = array('rock', 'paper', 'scissors');
        if($h == 'select') {
            return "Please select a strategy and press Play";
        }
        else if($h == 'test') {
            $tempoutput = '';
            for($i=0;$i<3;$i++) {
                for($j=0;$j<3;$j++) {
                    $tempoutput .= check($moves[$i], $moves[$j]);
                }
        }
        return $tempoutput;
        }
        else if($h == 'rock'){
            if($c == 'rock') return "Human=Rock Computer=Rock Result=Tie\n";
            else if($c == 'scissors') return "Human=Rock Computer=Scissors Result=You Win\n";
            else return "Human=Rock Computer=Paper Result=You Lose\n";
        }
        else if($h == 'paper'){
            if($c == 'rock') return "Human=Paper Computer=Rock Result=You Win\n";
            else if($c == 'scissors') return "Human=Paper Computer=Scissors Result=You Lose\n";
            else return "Human=Paper Computer=Paper Result=Tie\n";
        }
        else if($h == 'scissors'){
            if($c == 'rock') return "Human=Scissors Computer=Rock Result=You Lose\n";
            else if($c == 'scissors') return "Human=Scissors Computer=Scissors Result=Tie\n";
            else return "Human=Scissors Computer=Paper Result=You Win\n";
        }
    }

    /*function test(&$output){
        $output = "
        Human=Rock Computer=Rock Result=Tie\n
        Human=Paper Computer=Rock Result=You Win\n
        Human=Scissors Computer=Rock Result=You Lose\n
        Human=Rock Computer=Paper Result=You Lose\n
        Human=Paper Computer=Paper Result=Tie\n
        Human=Scissors Computer=Paper Result=You Win\n
        Human=Rock Computer=Scissors Result=You Win\n
        Human=Paper Computer=Scissors Result=You Lose\n
        Human=Scissors Computer=Scissors Result=Tie\n";
    }*/
    /*echo $output."\n";
    $output = "changed";
    echo $output."\n";
    */
    if(isset($_POST["playButton"])) $output = check($human, $computer);
?>
<!DOCTYPE html>
<head>
    <title>Arush Sharma - RPS</title>
</head>
<h1>Rock Paper Scissors</h1>
<p>Welcome: <?= $_GET["name"];?></p>
<br>
<form method="post">
<select name="play"> 
    <option value="select" selected>Select</option>
    <option value="rock">Rock</option>
    <option value="paper">Paper</option>
    <option value="scissors">Scissors</option>
    <option value="test">Test</option>
</select>
<input type="submit" name="playButton" value="Play">
<input type="submit" name="logout" value="Logout">
</form>
<div id="output" style="background-color:grey; padding: 1px; border: solid black 0.1px;">
    <pre><?= $output ?></pre>
</div>


<?php //Human=Scissors Computer=Rock Result=You Lose ?>