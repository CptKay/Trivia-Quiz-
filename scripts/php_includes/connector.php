<?php



$dbHost = getEnv('DB_HOST');
$dbName = getEnv('DB_NAME');
$dbUser = getEnv('DB_USER');
$dbPassword = getEnv('DB_PASSWORD');

$dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);

try {
  // $dbConn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
  // set the PDO error mode to exception
  $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "<header>
  <!-- Fixed navbar -->
  <nav class='navbar navbar-expand-md navbar-dark fixed-top bg-dark'>
    <div class='container-fluid'>
      <h5 class='mt-0 text-light'>Trivia Quiz</h5>
      <div class='collapse navbar-collapse' id='navbarCollapse'>
      </div>
    </div>
  </nav>
</header>";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}



function fetchQuestionById($id, $dbConn) {

  $sqlQuery=$dbConn->query("SELECT * FROM `questions` WHERE `id` = $id");
    $row = $sqlQuery->fetch(PDO::FETCH_ASSOC);

   // print_r($row);

  return $row;
};
function fetchAnswerById($selectAnswers,$currentQuestionIndex, $dbConn) {
  $answers = fetchAnswerById($selectAnswers,$currentQuestionIndex, $dbConn);
  $selectAnswers = $dbConn->prepare("select * from answers where question_id = ?");
  $selectAnswers->bindValue(1, $currentQuestionIndex["id"]);                 
  $selectAnswers->execute(); 
   // print_r($row);

  return  $selectAnswers;
};

function fetchQuestionIdSeq($topic, $questionNum, $dbConn) {
  $query = "SELECT `id` FROM `questions` WHERE `topic` = '$topic' ORDER BY RAND() LIMIT $questionNum";



  $sqlQuery=$dbConn->query($query);
  $row = $sqlQuery->fetchAll(PDO::FETCH_COLUMN, 0);

  return $row;

};





// Aliases
define ("NAME_MAP",
$nameMap = array(
  "title" => "Title" ,
  "author" => "Author" ,
  "genre" => "Genre" ,
  "description" => "Description" ,
  "publisher" => "Publisher" ,
  "price" => "Price" ,
  "currency" => "Currency",
  "in_stock" => "Available" ,
  "id" => "ID" ,
  "used" => "Used" ,
  "modification_date" => "Date of modification" ,
  "modification_time" => "Time of modification" ,
  "ISBN" => "ISBN"
  

)

);

function nColumnName($columnName)
{
  return NAME_MAP[$columnName];

}
 // ucfirst "title" , "author" , "genre" , "description" , "publisher" , "price" , "currency" , "in_stock" , "ISBN"

?>