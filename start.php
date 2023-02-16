<?php
include "./scripts/php_includes/data-collector.php";
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
</head>
<body>
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
    <div class="col-md-12 text-center">
      <br>
      <?php 
      $id = 5;
      $result = fetchresultById($id, $dbConn);
      echo '<img class="rounded mx-auto d-block" alt="Quiz Starting image" src="/Icons/' . $result["value"] . '" ">'; ?>
      <!-- <img src="Icons/LOGOGO.png" class="rounded mx-auto d-block" alt="Quiz Starting image"> -->
         <a type="button" class="btn btn-primary btn-lg mt-0" href="index.php">Start</a>
        </div>
  <footer class="fixed-bottom mt-auto py-3 bg-light">
    <div class="container-fluid">
      <span class="text-muted">Trivia Quiz</span>
    </div>
  </footer>
</body>
</html>