<?php
include "./scripts/php_includes/data-collector.php";
?>
<!doctype html>
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
<body class="d-flex flex-column" style="background-color: #D7FDEC">
  <header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <h5 class="mt-0 mb-0 text-light">Trivia Quiz</h5>
        <div class="collapse navbar-collapse" id="navbarCollapse">
        </div>
      </div>
    </nav>
  </header>
  <!-- Begin page content -->
  <main class="container d-flex mt-3">
    
    <div class="col-md-12">
     
        <form onsubmit="return validateSelection()" id="quiz" action="questions.php" method="post" class="md">
        <div class="col-12 text-center">
          <h4>Category</h4>
        
          <select style="width:170px;" class="form-select text-center dropdown "
            aria-label="Select category" name="topic">
            <option selected>Select category</option>
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
          <br>
          <!-- Anzahl Fragen-->
          <h4>
            <label for="questionNum" class="form-label"> Number of questions</label>
          </h4>
          <div>
            <input style="width:170px;" type="number"
              class="mt-2 form-select text-center dropdown" id="questionNum"
              name="questionNum" min="5" max="40" value="10">
            <input type="hidden" id="questLastInd" name="questLastInd" value="-1">
            <input type="hidden" id="indexStep" name="indexStep" value="1">
          </div>
          </div>
                      <figure>
              <img src="Icons/LOGOGO.png" class="rounded mx-auto d-block" alt="Quiz Starting image">
              <figcaption class="figure-caption text-center">
                <div class="col-md-12 text-center">
                  <input type="submit" value="Start" class="btn btn-primary btn-lg mb-5 py-0">
                </div>
              </figcaption>
            </figure>
            </form>
   
  <footer class="fixed-bottom footer mt-0 py-3 bg-light">
    <div class="container-fluid">
      <span class="text-muted">Trivia Quiz</span>
    </div>
  </footer>
  </div>
  </main>
</body>

</html>