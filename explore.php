<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codiscuss-Forum 4 Coder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>


<body>
    <?php  include 'header.php';?>
    <?php  include 'dbconnect.php';?>
    
    <?php 
      $id = $_GET['catid'];
      $sql = "SELECT * FROM `categories` WHERE Category_id= $id"; 
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
            $catname = $row['Category_name'];
            $catdes = $row['Category_description'];
        }
        ?>
    <?php 
        $showalert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method== 'POST'){
            $th_title=$_POST['title'];
            $th_title = str_replace("<","&lt;","$th_title");
            $th_title= str_replace(">","&gt;","$th_title");

            $th_desc=$_POST['desc'];
            $th_desc = str_replace("<","&lt;","$th_desc");
            $$th_desc = str_replace(">","&gt;","$th_desc");
            $sno=$_POST['sno'];
            $sql="INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())"; 
            $result = mysqli_query($conn,$sql);
        $showalert = true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your question has been submitted and Please wait a while community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        }
        ?>

    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> Forum</h1>
            <p class="lead"><?php echo $catdes; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forum .No Spam / Advertising / Self-promote in the forums is not allowed.Do not post
                copyright-infringing material. Do not post “offensive” posts, links or images. Remain respectful of
                other members at all times.
            </p>
           
        </div>
    </div>
<?php
 if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true ){

   echo '<div class="container">
        <h1>Ask your Question</h1>
        <form action="' . $_SERVER["REQUEST_URI"]. ' " method="post">
            <div class="form-group">
                <label for="exampleInputEmail1"></label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"
                    placeholder="Problem Title">
                <small id="emailHelp" class="form-text text-muted">Keep the problem title shorts as much as
                    possible</small>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" id="desc" name="desc" rows="3"
                    placeholder="Ellaborate your Problems"></textarea>
            </div>
            <button type="submit" class="btn btn-success my-3">Submit</button>
        </form>
    </div>';
 }
 else{
    echo'<div class="container">
    <h1>Ask your Question</h1>
    <p class="lead">You are not logged in .To ask question you need to log in.</P>';
 }
?>
    <div class="container">
        <h2 class="py-2">Browse Questions</h2>
        <?php 
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `threads` WHERE thread_cat_id= $id"; 
    $result = mysqli_query($conn,$sql);
    $noResult= true;
    while($row = mysqli_fetch_assoc($result)){
        $noResult= false;
        $id = $row['thread_id'];
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_time = $row['timestamp'];
        $thread_user_id = $row['thread_user_id'];
        $sql2 ="SELECT user_email FROM `user`WHERE sno ='$thread_user_id'";
        $result2= mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
          
        
        
        echo '<div class="media my-3">
        <div class="d-inline-flex p-2 bd-highlight">
            <img src="user.png" width="24px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="fw-bold" my-0">Asked By: '.$row2['user_email'].'  ' . $thread_time. '</p>
        </div>
        </div><br>
                <h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' .$id. '">' .$title. '</a></h5>
                ' .$desc. '
            
        </div>';
        }
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No Questions Found</p>
              <p class="lead">Be the First person to ask a question</p>
            </div>
          </div>';
        }
        ?>
        </div>
        </div>

        <?php  include 'footer.php';?>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
</body>

</html>