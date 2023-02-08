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

    

    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.2/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.2/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.2/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.2/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
    
  </head>
  <body class="d-flex flex-column h-100 bg-info">

    


    
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

  <div class="">

  <h1 class="mt-5">Trivia Quiz</h1>

  <form id="quiz" action="questions.php" method="post"  class="md">

  <select class="form-select" aria-label="Select category" name="topic">
  <option selected>Select category</option>
  <option value="gen-knowledge">General Knowledge</option>
  <option value="technology">Technology</option>
  <option value="astronautics">Astronautics</option>
  <option value="science">Science</option>
  <option value="informatics">Informatics</option>
  <option value="ai">Artificial Intelligence</option>
  <option value="geography">Geography</option>
  <option value="animals">Animals</option>
  <option value="sports">Sports</option>
  <option value="music">music</option>
  <option value="movies">Movies</option>
  <option value="ch-norris">Chuck norris</option>
  <option value="d-n-d">Dungeons and Dragons</option>  
</select>
    
<!-- Anzahl Fragen-->
<div>
<label style="margin-top:20px;" for="questionNum" class="form-label"> Number of questions</label>
<input style="width:100px;" type="number" class="form-control" id="questionNum" name="questionNum" min="5" max="40" value="10">

<input type="hidden" id="questLastInd" name="questLastInd" value="-1">
<input type="hidden" id="indexStep" name="indexStep" value="1">
</div>
</div>

<input class="btn btn-info" type="submit" value="Start">

</form>

  </div>

  
</main>

<footer class="footer mt-auto py-3 bg-light">
  <div class="container">

    <span class="text-muted">Trivia Quiz</span>
  </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  
  </body>
</html>
