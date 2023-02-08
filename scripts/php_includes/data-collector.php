<?php

session_start();

    include "tools.php";
    include "connector.php";
       
   
echo "hallo";



if (isset($_SESSION["quiz"])) $quiz=$_SESSION["quiz"];
else $quiz = NULL;

if(isset($_POST["questLastInd"])) {
  $questLastInd = intval($_POST["questLastInd"]);
}
else {
   $questLastInd = -1;
}


$scriptName = $_SERVER['SCRIPT_NAME'];


if(str_contains($scriptName, 'index')) {
   session_unset();
   $quiz = null;
}
else if(str_contains($scriptName, 'questions')) {
   $questionNum = $_POST['questionNum'];


   if ($questLastInd === -1) {
         $questNum = intval($_POST["questionNum"]);
         $questionIdSequence = fetchQuestionIdSeq(
            $_POST["topic"],
            $questionNum,
            $dbConn
         );

         // Anzahl Fragen
         $questionNum = min(count($questionIdSequence), $questionNum);

      $quiz = array(
         "topic" => $_POST["topic"],
         "questionNum" => $questionNum,
         "questLastInd" => $questLastInd,
         "currentQuestionIndex" => -1,
         "questionIdSequence" => $questionIdSequence
      );
   }
   

   $indexStep = 1;
   if (isset($_POST["indexStep"])) {
      $indexStep = intval($_POST["indexStep"]);
   }

   $currentQuestionIndex = $questLastInd + $indexStep;

   // $x=intval($questionNum)-1;
   if ($currentQuestionIndex +1 < $quiz["questionNum"]) {
      $link = "questions.php";
   }

   else {
      $link ="report.php";
   } 
}




// report


else if (str_contains($scriptName, 'report')) {
   $currentQuestionIndex = -1;

}

else {

}

if (isset($quiz) && $currentQuestionIndex >=0) {
   $_SESSION["quiz"] = $quiz;
   $_SESSION["quiz"]["questLastInd"]=$questLastInd;
   $_SESSION["quiz"]["currentQuestionIndex"]=$currentQuestionIndex;
}

if ($questLastInd >= 0) {
   $questionName = "question-" . $questLastInd;
   $_SESSION[$questionName] = $_POST;
}
?>