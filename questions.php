<?php
include "./scripts/php_includes/data-collector.php";
?>
<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.104.2">
  <title>Sticky Footer Navbar Template · Bootstrap v5.2</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sticky-footer-navbar/">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
  <link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#712cf9">
  <!-- Custom styles for this template -->
  <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100 bg-info">
  <?php
  echo "Hello, we are starting to work with Databases and PHP PDO!";
  ?>
  <header>
    <?php
    if (isset($quiz["questionIdSequence"])) {
      $questionCount = $quiz["questionNum"];
      $id = $quiz["questionIdSequence"][$currentQuestionIndex];
    }
    /* $i= intval($_POST["questLastInd"])+1;
    $id = $quiz["questionIdSequence"]["$i"]; */
    $question = fetchQuestionById($id, $dbConn);
    $answers = fetchAnswerById($id, $dbConn);
    // $question = fetchQuestionById($id, $dbConn);
    // Frage auslesen
    ?>
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
  <!-- Begin page content -->
  <main class="flex-shrink-0">
    <div class="container justify-content-center">
      <div class="row">
        <div class="col">
          <h1 class="mt-5"></h1>
        </div>
        <div class="col">
          <h2 class="mt-5">
            </h1>
        </div>
        <div class="col">
        </div>
      </div>
      <div class="col">
      </div>
      <div class="col">
      </div>
      <div class="col">
      </div>
      <div class="row">
        <p class="lead"></p>
        <p>
        <h6> Question
          <?php echo ($currentQuestionIndex + 1)
            ?> of
          <?php echo $quiz["questionNum"]; ?> :
          <?php echo $question["question_text"]; ?>
        </h6>
        </p>
        <p>
          <h7>Your answer:</h7>
        </p>
      </div>
      <form action="<?php echo $link; ?>" method="post">
        <?php

        $correct = $answers["is_correct"];
        for ($a = 1; $a <= 5; $a++) {
          $answerColName = $answers["is_correct"] . $a;
          if (isset($answers[$answerColName]) && $answers[$answerColName] !== '') {
            $answerText = $answers[$answerColName];
            if ($correct === 1)
              $value = 1;
            else
              $value = 0;



              
            echo "<div class='form-check form-check-inline'>
    <input class='form-check-input' type='radio' name='single-choice' id= '$answerColName' value='$value'>
    <label class='form-check-label' for='single-choice-0'>$answerText</label>
  </div>";
          }
        }
        ;
        ?>

        <div class="hidden">
          <input type="hidden" class="form-control" id="questionNum" name="questionNum"
            value="<?php echo $quiz["questionNum"]; ?>">
          <input type="hidden" id="questLastInd" name="questLastInd" value="<?php echo $currentQuestionIndex; ?>">
          <input type="hidden" id="indexStep" name="indexStep" value="1">
          <input class="btn btn-info mt-5 bg-success text-white" type="submit" value="Submit">
        </div>
    </div>
    </form>
    </div>
    </div>
  </main>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">Trivia Quiz
        <?php echo $quiz["topic"] ?> Questions
      </span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>