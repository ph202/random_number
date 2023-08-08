<!DOCTYPE html>
<html lang="en">
<head>
    <title>Random number generator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
<?php 
    echo "<p class=\"h4\"> Random Number generator:</p>";
   // var_dump($_POST);
    if (isset($_POST["number_of_rolls"]) && isset($_POST["dice_type"])){
        echo "<p> Number of rolls: "; echo $_POST["number_of_rolls"]; echo "</br>";
        echo " Dice type: "; echo $_POST["dice_type"]; echo "</br>";
        echo " Rolls: {";
       $rolls = [];
       for($i=0; $i<$_POST["number_of_rolls"]; $i++){
        $rolls[$i] = rand(1, $_POST["dice_type"]);  
        echo $rolls[$i]; echo ", ";  
      }
        $sum = array_sum($rolls);
        echo "}</br> Sum: ${sum}</br>";
        //echo "Rolls:";
        
      }

?>
    
    <form target="_self" action="index.php" method="post">
        <div class="form_group row mb3">
            <label  class="col-sm-4 col-form-label" for="number_of_rolls">Number of rolls</label>
            <div class="col-sm-6">
                <input class="form_control" type="number" name="number_of_rolls" id="number_of_rolls" value=<?php echo $_POST["number_of_rolls"]??1;?>>
            </div>
        </div>
        <div class="form_group row">
            <label  class="col-sm-4 col-form-label" for="dice_type">Select dice</label>
                <div class="col-sm-6">            
                <select class="form_control" name="dice_type" id="dice_type">
                    <?php
                        for($i=4; $i<21; $i=$i+2){
                            $selected = "";
                            if($i>14){$i=20;}
                            if($_POST["dice_type"] == $i){
                                $selected = "selected";
                            }
                            echo "<option value=\"${i}\" ${selected}>D${i}</option>";
                        }
                    ?>
                </select>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Roll">
    </form>
</body>

</html>