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
  <link rel="stylesheet" href="css/style.css">

</head>

<body class="d-flex flex-column h-100">
  <header>
    <?php

    if (isset($quiz["questionIdSequence"])) {
      $questionCount = $quiz["questionNum"];
      $id = $quiz["questionIdSequence"][$currentQuestionIndex];
    }
    // Frage auslesen
    $question = fetchQuestionById($id, $dbConn);
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

  <br>
  <!-- Begin page content -->
  <div class="container mt-2 mt-sm-5 my-1">
    <main class="question flex-shrink-0">
      <div class="mt-2 py-2 h5"><b> Question
          <?php echo ($currentQuestionIndex + 1)
            ?> of
          <?php echo $quiz["questionNum"]; ?> :
          <?php echo $question["question_text"]; ?>
        </b></div>
      <?php echo '<img class="optionalstuff" src="/images/' . $question["image"] . '" ">'; ?>
      <h7 class="ml-md-3 ml-sm-3 pl-md-5 pt-sm-0 pt-3" id="options">Your answer:</h7>
        <form style="width:auto;" class="form-select containerq" action="<?php echo $link; ?>" method="post">
          <?php
          $correct = $answer["is_correct"] = 1;
          // prepare and execute the select statements
          $selectAnswers = $dbConn->prepare("select * from answers where question_id = ?");
          $selectAnswers->bindValue(1, $question["id"]);
          $selectAnswers->execute();
          if ($question["type"] == "MULTIPLE") {
            // display checkboxes buttons for answers to questions with MULTIPLE answers
            while ($answer = $selectAnswers->fetch(PDO::FETCH_ASSOC)) {
              // print html checkbox for each answer  
              echo '<div class="align">';
              echo '<div class="form-check">';
              echo "<input class='form-check-input' type='checkbox'  name='multiple-choice[]' id='$answer[id]' value='$answer[is_correct]' onclick='checkBoxLimit()'>";
              echo '<label class="form-check-label">' . $answer["answers"] . '</label><br>';
              echo '</div>';
            }
          } else {
            // display radio buttons for answers to questions with one SINGLE answer
            while ($answer = $selectAnswers->fetch(PDO::FETCH_ASSOC)) {
              // print html radio button for each answer   
              echo '<div class="">';
              echo '<div class="form-check">';
              echo "<input class='form-check-input' type='radio' name='single-choice' id= '$answer[id]' value='$answer[is_correct]' >";
              echo '<label class="form-check-label">' . $answer["answers"] . '</label><br>';
              echo '</div>';
            }
          }
          ?>
          <div class="d-flex align-items-center pt-3">
            <div id="prev">
              <div class="hidden">
                <input type="hidden" class="form-control" id="questionNum" name="questionNum"
                  value="<?php echo $quiz["questionNum"]; ?>">
                <input type="hidden" id="questLastInd" name="questLastInd" value="<?php echo $currentQuestionIndex; ?>">
                <input type="hidden" id="indexStep" name="indexStep" value="1">
                <input class="btn btn-info justify-content-center" type="submit" value="Submit">
              </div>
            </div>
          </div>
      </div>
  </div>
  <!-- <?php prettyPrint($_SESSION, "Test") ?> -->
  </div>
  </form>
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