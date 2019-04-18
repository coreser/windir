<?php

$realtimeFile = file_get_contents('realtime.txt');

/**
* See realtimedescription.txt for field values
*/
$realtime = explode(' ', $realtimeFile);

/**
* Set default runway
*/
$runway = '15';

/**
* Set degrees to change runway to alternate runway
*/
if($realtime[7] > 0 && $realtime[7] < 70) {
  $runway = '33';
}

if($realtime[7] > 230 && $realtime[7] <= 361) {
  $runway = '33';
}

/**
* Realtime.txt field for Winddirection
*/
$winddir = $realtime[7];

?>

<!doctype html>
<html lang="de_DE">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Runway Info</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="css/style.css">

  <title>Runway Info</title>

</head>

<body>

  <div class="content">

    <h2>Wind</h2>
    <p class="bold"><?php echo $realtime[7] ?>° / <?php echo $realtime[6] ?> <?php echo $realtime[13] ?> (<?php echo $realtime[11] ?>)</p>

    <h2>erwartete Landerichtung / Expected Runway</h2>
    <p class="bold"><?php echo $runway ?> </p>
    <p><strong><?php echo $realtime[0] ?> <?php echo $realtime[1] ?></strong></p>
  </div>
  <div class="flex-center position-ref">
    <div class="content">
      <img id="runway" src="images/runway<?php echo $runway ?>.png" title="Runway" />

      <div id="wind" class="overlay">
        <?php if($realtime[7] != 'NULL' && $realtime[12] != 0): ?>
          <img id="arrow" src="images/arrow.png" title="Wind" />
          <div id="knots" class="bold"><?php echo $realtime[6] ?> <?php echo $realtime[13] ?> (<?php echo $realtime[11] ?>)</div>
        <?php endif ?>
      </div>
    </div>

  </div>

</body>
</html>
