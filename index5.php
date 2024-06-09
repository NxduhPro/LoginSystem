<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect to the login page
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>THE GAME</title>
  <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

   
<!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="IndexNavScript/style.css">
    

    <style>
        footer {
          background-color: #333;
          color: #fff;
          padding: 2px;
          text-align: left;
          position: absolute;
          bottom: 0;
          width: 100%;
        }
        #content{
            background: linear-gradient(to bottom, #edf2fb, #d7e3fc, #ccdbfd, #c1d3fe, #abc4ff);
        }
    </style>
</head>
<body style="height: 100dvh;">
    
<!-- partial:index.partial.html -->
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" >
            <div class="sidebar-header">
                <h3>PINOY WORDLE</h3>
            </div>
            <ul class="list-unstyled components">
                <p id="nametag">Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="logout">logout</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" id="page1">Portfolio</a>
                </li>
                <li>
                    <a href="#" id="page2">Game</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="Container_TEST">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        
            <div id="content">
            <!---->
            <div id="GameContent">
                <link rel="stylesheet" href="GameScrips/gamecss.css">
                    <div class="container text-center">
                        <h1 class="my-4">PINOY Wordle Game</h1>
                        <div id="wordle-board"></div>
                            <div class="input-group my-3">
                                <input type="text" id="guess-input" class="form-control" placeholder="Enter your guess">
                            <div class="input-group-append">
                            <button class="btn btn-primary" id="submit-guess">Submit</button>
                        </div>
                    </div>
                    <div id="message" class="mt-3"></div>
                </div>
                <script  src="GameScrips/gamescript.js"></script>
            </div>
            <!---->
            <div id="ContentLoader">
            </div>
            
            </div>
            
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
            $(document).ready(function(){
        // Load initial content
        $('#nametag').html('<?php echo  $_SESSION['username']." (Points: )" ;?>');
        // Handle button clicks
        $('#page1').click(function(){
            document.getElementById('GameContent').style.display = 'none';
            $('#ContentLoader').load('page1.php');
        });

        $('#page2').click(function(){
            document.getElementById('GameContent').style.display = 'block';
            document.getElementById('ContentLoader').innerHTML = '';
        });

        $('#logout').click(function(){
            window.location.replace('logout.php');
        });
    });
            </script>
            
        </div>
        <footer style="font-size: 10px;">
        © 2024-present Neil Andrei S. All Rights Reserved.
        </footer>
    </div>
<!-- partial -->
  <script  src="IndexNavScript/script.js"></script>

</body>
</html>
