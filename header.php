<?php
session_start();
echo'<nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
<div class="container-fluid">
<span class="navbar-brand mb-0 h1"><img src="logo.jpg" alt="Logo" width="40" height="30" class="d-inline-block align-text-top">Codiscuss</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
        <div class="mx-2">
       ';

        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true ){
           echo ' <form class="d-flex" method="get" action="search.php">
           <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-success" type="submit">Search</button>
      
           <p class="text-light my-0 mx-2"> Welcome ' .$_SESSION['useremail']. '</p>
           <a  href="logout.php" class="btn btn-outline-success mx-2" >Logout</a>
           </form>
        ';
    }
        else{
           echo '<form class="d-flex"  method="get" action="search.php">
           <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
           <button class="btn btn-success" type="submit">Search</button>
           <button type="button" class="btn btn-outline-success mx-2"data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
             <button type="button" class="btn btn-outline-success ml-2"data-bs-toggle="modal" data-bs-target="#signupModal">SignUp</button>
             </form>';
            
        }
   echo '</div>
    
</div>
</nav>';
include 'login.php';
include 'signup.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You can now login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>