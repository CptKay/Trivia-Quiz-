<?php
   include "./scripts/php_includes/data-collector.php";
?>
<?php

$points = 0;
$totalPoints = 0;
$maxPoints = $_SESSION["quiz"]["questionNum"];

foreach ($_SESSION as $name => $correct) {
  if (str_contains($name, 'question-')) {
      if (isset($correct["single-choice"])) {
          $points = 0;
          $answer = $correct["single-choice"];
          $selected = $_SESSION[$name]["single-choice"] ?? '';
          if (!empty($selected) && $selected === $answer) {
              $points = 1;
          }
          $totalPoints += $points;
      } elseif (isset($correct["multiple-choice"])) {
          $points = 0;
          $answer = $correct["multiple-choice"];
          $selected = $_SESSION[$name]["multiple-choice"] ?? [];
          if (is_array($selected)) {
              sort($selected);
              sort($answer);
              if ($selected == $answer) {
                  $points = count($answer) / 2;
              }
          }
          $totalPoints += $points;
      }
  }
}

$totalPoints = min($totalPoints, $maxPoints);
$maxPoints = $_SESSION["quiz"]["questionNum"];
$totalPoints_100 = round(($totalPoints / $maxPoints) *100);
if ($totalPoints_100 <= 30) {
  $result = "result_30.php";
} elseif ($totalPoints_100 > 30 && $totalPoints_100 <= 60) {
  $result = "result_60.php";
} elseif ($totalPoints_100 > 60 && $totalPoints_100 <= 80) {
  $result = "result_80.php";
} else {
  $result = "result_100.php";
};
    ?>
<!doctype html>

<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <!-- Custom styles for this template -->
  <title>QQA</title>
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="d-flex flex-column h-100">
  <header>
  
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
          <h5 class="mt-0 text-light">Restart Trivia Quiz</h5>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        </div>
      </div>

    </nav>
  </header>

  <br>
  <!-- Begin page content -->
  <div class="container mt-2 mt-sm-5 my-1">
    <main class="question flex-shrink-0">
    <div class="container mt-2 mt-sm-5 my-1">
    <main class="question flex-shrink-0">
    <h2 class="mt-5">You made <?php include "./$result"; ?></h1>
        </b></div>
      <?php echo '<img class="optionalstuff" src="/images/' . $question["image"] . '" ">'; ?>
      </main>
  <footer class="fixed-bottom footer mt-0 py-3 bg-light">
    <div class="container-fluid">
      <span class="text-muted">Trivia Quiz
        <?php echo $quiz["topic"] ?> Questions
      </span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>
</html>