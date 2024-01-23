<?php
error_reporting(E_NOTICE);
    include 'header.php';
?>

    <h1>About page</h1>

    <div class="boxes">
        <div class="box"><?php echo name(); ?> /div>
        <div class="box">box2</div>
        <div class="box">box3</div>
    </div>



<?php
    require 'footer.php';
?>

<?php

    $data = [];

    $string = 'hello how are you';
    $text = explode(" " , $string);

    function name()
    {
        return "any value for this element";
    }


    echo count($data);
    echo '<br>';
    var_dump($text);
    echo '<br>';

    var_dump('This is a text');

    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';










?>
