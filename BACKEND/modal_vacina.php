<?php

$dose1 = 0;

$aux1 = "";
if($dose1 == 1)
	$aux1 = "checked";

?>

<form action = "process.php" method="post">
	Doses: <br>
	Primeira<input type="checkbox" name="primeira" value="primeira" <?php echo $aux1 ?> >
	Segunda <input type="checkbox" name="segunda" value="segunda">
	Terceira <input type="checkbox" name="terceira" value="terceira">
	<input type="submit">
</form>