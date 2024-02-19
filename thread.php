<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codiscuss-Forum 4 Coder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 400px
    }
    </style>
</head>


<body>
    <?php  include 'header.php';?>
    <?php  include 'dbconnect.php';?>
    <?php 
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id= $id"; 
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            
            $thread_user_id = $row['thread_user_id'];
            $sql2 ="SELECT user_email FROM `user`WHERE sno ='$thread_user_id'";
            $result2= mysqli_query($conn,$sql2);
            $row2=mysqli_fetch_assoc($result2);
            $posted_by=$row2['user_email'];
        }
        ?>





    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title; ?></h1>
            <p class="lead"><?php echo $desc; ?></p>
            <p>Posted By: <em><?php echo  $posted_by; ?></em></p>
            <hr class="my-4">
            <p>This is peer to peer forum .No Spam / Advertising / Self-promote in the forums is not allowed.Do not post
                copyright-infringing material. Do not post “offensive” posts, links or images. Remain respectful of
                other members at all times.
            </p>
           
        </div>

    </div>

    <?php 
        $showalert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method== 'POST'){
            $comment=$_POST['comment'];
            $comment = str_replace("<","&lt;","$comment");
            $comment = str_replace(">","&gt;","$comment");
            $sno=$_POST['sno'];
            $sql="INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp())"; 
            $result = mysqli_query($conn,$sql);
        $showalert = true;
        if($showalert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success! </strong> Your Comment has been added 🤗.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        }
        ?>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']== true ){

    echo ' <div class="container">
        <h1>Post your comment</h1>
        <form action="' .$_SERVER['REQUEST_URI']. '" method="post">
            <div class="form-group">
                <label for="exampleFormControlTextarea1"></label>
                <textarea class="form-control" id="comment" name="comment" rows="3"
                    placeholder="Type your comment"></textarea>
                    <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
            </div>
            <button type="submit" class="btn btn-success my-3">Post Comment</button>
        </form>
    </div>';
    }
    else{
    echo'<div class="container">
        <h1>Post your comment</h1>
        <p class="lead">You are not logged in .To post comment you need to log in.</P>';
        }
        ?>

    <div class="container" id="ques">
        <h2 class="py-2">Discussions</h2>
        <?php 
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comment` WHERE thread_id= $id"; 
        $result = mysqli_query($conn,$sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time=$row['comment_time'];
            $thread_user_id = $row['comment_by'];
        $sql2 ="SELECT user_email FROM `user`WHERE sno ='$thread_user_id'";
        $result2= mysqli_query($conn,$sql2);
        $row2=mysqli_fetch_assoc($result2);
          
            
        
        
        echo '<div class="media my-3">
           <div class="d-inline-flex p-2 bd-highlight">
            <img src="user.png" width="24px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="fw-bold  ml-2">'.$row2['user_email'].' ' . $comment_time. '</p>
            </div>
            </div><br>
            <div class="ml-4">
          
                ' .$content. '
          
              </div> 
                
            
        </div>';
        }
        if($noResult){
            echo '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No Comments Found</p>
              <p class="lead">Be the First person to comment on this Problem</p>
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