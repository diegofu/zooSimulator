<?php

require_once('Zoo.php');


if(empty($_POST)) {
    $zoo = new Zoo();
} else {
    $zoo = (unserialize(json_decode($_POST['zoo'])));

    if(!empty($_POST['feed'])) {
        $zoo->feed();
    } else {
        $zoo->nextHour();
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>title</title>
    </head>
    <body>
        <form method="post">
            <input type="submit" value="Feed" name="feed">
            <input type="submit" value="Next Hour" name="nextHour">

            <input type="hidden" name="zoo" value="<?php echo htmlentities(json_encode(serialize($zoo))); ?>">
        </form>


        Current hour: <?php echo $zoo->getHour(); ?>
        <table>
        <?php
            foreach($zoo->getAnimals() as $animal):
        ?>

            <tr>
                <td>
                    <?php echo $animal->getName(); ?>
                </td>
                <td>
                    <?php echo $animal->getHealth(); ?>
                </td>
                <td>
                    <?php if($animal->isDead()): ?>
                        DEAD
                    <?php else: ?>
                        ALIVE
                    <?php endif ?>
                </td>
            </tr>
        <?php endforeach ?>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    </body>
</html>