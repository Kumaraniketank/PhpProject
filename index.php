<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codiscuss-Forum 4 Coder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <style>
           
        </style>
</head>


<body>
    <?php  include 'header.php';?>
    <?php  include 'dbconnect.php';?>

    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
                
        </div>
        <div class="carousel-inner">
           
            <div class="carousel-item active">
                <img src="gd1.jpg" width="1600" height="300" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="gd2.jpg" width="1600" height="300" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="gd3.jpg" width="1600" height="300" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container my-4" >
        <h2 class="text-center my-3">Welcome to Codiscuss - Categories</h2>
        <div class="row">

        <?php $sql = "SELECT * FROM `categories`"; 
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            $cat = $row['Category_name'];
            $id = $row['Category_id'];

            echo '<div class="col-md-3 my-2">
            <div class="card" style="width: 18rem;">
                <img src="'.$id.'.jpg"   width="400" height="300" coding" class="card-img-top" alt="'.$cat.'">
                <div class="card-body">
                    <h5 class="card-title">' .$cat. '</h5>
                    <p class="card-text">' .substr($row['Category_description'],0,45). '...</p>
                    <a href="explore.php?catid=' .$id. '" class="btn btn-primary">Explore</a>
                </div>
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