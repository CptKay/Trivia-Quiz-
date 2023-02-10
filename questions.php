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

$currentIndex = 0; 
$currentQuestionId = 1; 


// prepare and execute the select statement to select a question
$selectQuestion = $dbConn->prepare("select * from questions where id = ?");
$selectQuestion->bindValue(1, $currentQuestionId); 
$selectQuestion->execute(); 
$currentQuestion = $selectQuestion->fetch(PDO::FETCH_ASSOC); 

/*
print "<pre>"; 
print_r($currentQuestion); 
print "</pre>"; 
*/

echo '<div class="container-fluid p-5">';
echo '<div class="container justify-content-center">';
echo  '<div class="row">';
    echo '<form class="md col w-50 mt-5">'; 
        echo "<div class=h3>Question " . $currentIndex + 1 . "</div>";
        echo "<div class=h4>$currentQuestion[question_text]</div>";
        echo '<img src="/images/' . $currentQuestion["image"] . '" width="400px"></img>';                         

        // prepare and execute the select statements
        $selectAnswers = $dbConn->prepare("select * from answers where question_id = ?");
        $selectAnswers->bindValue(1, $currentQuestion["id"]);                 
        $selectAnswers->execute();                 

        if ($currentQuestion["type"] == "MULTIPLE") {
            
            // display checkboxes buttons for answers to questions with MULTIPLE answers
            while ($answer = $selectAnswers->fetch(PDO::FETCH_ASSOC)) {
                /*
                print "<pre>"; 
                print_r($answer); 
                print "</pre>"; 
                */

                // print html checkbox for each answer                    
                echo '<div class="form-check">';                         
                    echo '<input class="form-check-input" type="checkbox">'; 
                    echo '<label class="form-check-label">' . $answer["answers"] . '</label><br>';         
                echo '</div>';                                                     
            }
        } else {
            // display radio buttons for answers to questions with one SINGLE answer
            while ($answer = $selectAnswers->fetch(PDO::FETCH_ASSOC)) {
                
                /*
                print "<pre>"; 
                print_r($answer); 
                print "</pre>"; 
                */
                
                // print html radio button for each answer   
                echo '<div class="form-check">';                                                  
                    echo '<input class="form-check-input" type="radio">'; 
                    echo '<label class="form-check-label">' . $answer["answers"] . '</label><br>';                                                                            
                echo '</div>';                             
            }    
        }
echo '<input type="hidden" class="form-control" id="questionNum" name="questionNum" value="<?php echo $quiz["questionNum"];" ?> 

<input type="hidden" id="questLastInd" name="questLastInd" value="<?php echo $currentQuestionIndex; ?>">
<input type="hidden" id="indexStep" name="indexStep" value="1">
</div>

<input class="btn btn-info bg-success text-white" type="submit" value="Submit">';
    echo '</form>'; 
echo '</div>';
?>
  <footer class="footer mt-auto py-3 bg-light">
    <div class="container">
      <span class="text-muted">Trivia Quiz</span>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>