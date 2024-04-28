<?php

/**
 * Load the realtime.txt
 */
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
if ($realtime[7] > 0 && $realtime[7] < 70) {
  $runway = '33';
}

if ($realtime[7] > 230 && $realtime[7] <= 361) {
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
  <style media="screen">
    /* CSS */
    html,
    body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Raleway', sans-serif;
      font-weight: 100;
      height: 100vh;
      margin: 0;
    }

    .full-height {
      height: 100vh;
    }

    .flex-center {
      align-items: center;
      display: flex;
      justify-content: center;
    }

    .position-ref {
      position: relative;
    }

    .top-right {
      position: absolute;
      right: 10px;
      top: 18px;
    }

    .content {
      text-align: center;
    }

    .title {
      font-size: 84px;
    }

    .links>a {
      color: #636b6f;
      padding: 0 25px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .1rem;
      text-decoration: none;
      text-transform: uppercase;
    }

    .m-b-md {
      margin-bottom: 30px;
    }

    #wind {
      -webkit-transform-origin: 0 0;
      z-index: 10;
      height: 300px;
      width: 300px;
      position: absolute;
      top: 30%;
      left: 45%;
      text-align: center;
      align-items: center;
      display: flex;
      justify-content: center;
      position: absolute;
    }

    #knots {
      z-index: 20;
      color: #0094FF;
      background-color: #F2FF00;
      padding: 10px;
      top: -40px;
      position: absolute;
    }

    #arrow {
      -webkit-transform: rotate(<?php echo $winddir ?>deg);
      -ms-transform: rotate(<?php echo $winddir ?>deg);
      /* IE 9 */
      transform: rotate(<?php echo $winddir ?>deg);
    }

    .bold {
      font-size: 30px;
      font-weight: bold;
    }

    .windinfo {
      position: relative;
    }
  </style>

  <title>Runway Info</title>

</head>

<body>

  <div class="content">

    <h2>Wind</h2>
    <p class="bold"><?php echo $realtime[7] ?>° / <?php echo $realtime[5] ?> <?php echo $realtime[13] ?> (<?php echo $realtime[11] ?>)</p>

    <h2>erwartete Landerichtung / Expected Runway</h2>
    <p class="bold"><?php echo $runway ?> </p>
    <p><strong><?php echo $realtime[0] ?> <?php echo $realtime[1] ?></strong></p>
  </div>
  <div class="flex-center position-ref">
    <div class="content">
      <img id="runway" src="images/runway<?php echo $runway ?>.png" title="Runway" />

      <div id="wind" class="overlay">
        <?php if ($realtime[7] != 'NULL' && $realtime[12] != 0) : ?>
          <img id="arrow" src="images/windsock.png" title="Wind" />
          <div id="knots" class="bold"><?php echo $realtime[5] ?> <?php echo $realtime[13] ?> (<?php echo $realtime[11] ?>)</div>
        <?php endif ?>
      </div>
    </div>

  </div>

</body>

</html>