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
  <title>Trivia Quiz</title>
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
  <link rel="stylesheet" href="css/style.css">
  <!-- Custom styles for this template -->
  <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100" style="background-color: #D7FDEC">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <h5 class="mt-0 text-light">Trivia Quiz</h5>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        </div>
      </div>
    </nav>
  </header>
  <!-- Begin page content -->
  <main class="flex-shrink-0">
    <div class="col-md-12">
      <h1 class="mt-5">Trivia Quiz</h1>
      <form onsubmit="return validateSelection()" id="quiz" action="questions.php" method="post" class="md">
      <div class="text-center">
        <div class="text-center">Category</div>
        <br>
        <select style="width:170px;" class="form-select text-center position-absolute start-50 translate-middle" aria-label="Select category" name="topic">
          <option selected>Select category</option>
          </div>
          <?
          /* $question = fetchQuestionById($id, $dbConn);
          $sql = 'SHOW COLUMNS FROM '.$table_name.' WHERE field="'.$column_name.'"';
          $row = $db->query($sql)->fetch(PDO::FETCH_ASSOC);
          prettyPrint($quiz);
          */

          $sqlQuery = $dbConn->query("SELECT `topic` FROM `questions`");
          $row = $sqlQuery->fetchAll(PDO::FETCH_UNIQUE);

          // print_r($row);
          
          foreach ($row as $key => $option) {
            // print_r($key);
            print("<option value='$key'>$key</option>");
          }
          ?>
        </select>
        <!-- Anzahl Fragen-->
        <div>
          <label style="margin-top:20px;" for="questionNum" class="form-label"> Number of questions</label>
          </div>
          <div>
          <input style="width:130px;" type="number" class="mt-3 form-select text-center position-absolute start-50 translate-middle" id="questionNum" name="questionNum" min="5"
            max="40" value="10">
          <input type="hidden" id="questLastInd" name="questLastInd" value="-1">
          <input type="hidden" id="indexStep" name="indexStep" value="1">
          </div>
          <div class="container h-50">
            <figure>
              <img src="Icons/LOGOGO.png" class="rounded mx-auto d-block text-center" alt="Quiz Starting image">
              <figcaption class="figure-caption text-center"></figcaption>
            </figure>
          </div>
  </main>
  <div class="col-md-12 text-center">
    <input type="submit" value="Start" class="btn btn-primary btn-lg mb-5">
  </div>
  </div>
  </div>
  </div>
  </form>
  </main>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">Trivia Quiz</span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</body>
</html>