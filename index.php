<?php
include 'resources/connection.php';
$fetchcard=mysqli_query($con,"select * from completed") or die(mysqli_error($con));
$fetchcarousel=mysqli_query($con,"select * from working") or die(mysqli_error($con));


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <!-- Required meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css"
        integrity="sha384-3AB7yXWz4OeoZcPbieVW64vVXEwADiYyAEhwilzWsLw+9FgqpyjjStpPnpBO8o8S" crossorigin="anonymous">
    <title>Hello, world!</title>
</head>

<body>
  <!-- navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid"> <a class="navbar-brand" style="color: white; height: 46px;" href="#">My
                Portfolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"> <a class="nav-link active" style="color: white; height: 32px;"
                            aria-current="page" href="#">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" style="color: white" href="#working_on">Working On</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" style="color: white" href="#completed_project">Completed
                            projects</a> </li>
                    <li class="nav-item"> <a class="nav-link" style="color: white" href="#about_me">About me</a> </li>

                    <li class="nav-item"> <a class="nav-link" style="color: white" href="#feedback">Feedback</a> </li>
                    <li class="nav-item"> <a class="nav-link" style="color: white" href="#feedback">Contact us</a> </li>
                    <li class="nav-item"> <a class="nav-link" style="color: white" href="#important_links">Important
                            links</a> </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- carousel  -->
    <div id="working_on" class="d-block p-2 bg-dark text-white">Working on</div>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php  

    echo'
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    ';
    $j=1;
    for($i=1;$i<mysqli_num_rows($fetchcarousel);$i++){
    echo'
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$i.'" aria-label="Slide '.$i+$j.'"></button>';
    }
           
        ?>
        </div>
        <div class="carousel-inner">

            <?php
      $data=mysqli_fetch_assoc($fetchcarousel);
      $image=$data['imgsrc'];
      $alt=$data['alt'];
      echo'    <div class="carousel-item active">
      <img class="d-block w-100" src="image/'.$image.'" alt="'.$alt.'">
    </div>';
      while($data=mysqli_fetch_assoc($fetchcarousel)){
        $image=$data['imgsrc'];
        $alt=$data['alt'];
      echo'
      <div class="carousel-item"> <img src="image/'.$image.'" class="d-block w-100" alt="'.$alt.'"> </div>
      ';

    }
    ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span> </button> <button class="carousel-control-next" type="button"
            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span> <span
                class="visually-hidden">Next</span>
        </button>
    </div>
    <div id="completed_project" class="d-block p-2 bg-dark text-white mt-5 mb-5">Completed Project</div>
    <!-- card -->
    <div class="row mx-auto">
        <?php
    while($data=mysqli_fetch_assoc($fetchcard)){
      $title=$data['c_title'];
      $link=$data['c_link'];
      $brief=$data['c_brief'];
      $image=$data['c_image'];
    echo'
    <div class="card text-center mt-2 mb-2" style="width: 18rem;"> <img src="image/'.$image.'" class="card-img-top" alt="Image does not exist">
      <div class="card-body">
        <h5 class="card-title">'.$title.'</h5>
        <p class="card-text">'.$brief.'</p>
        <a href="'.$link.'" class="btn btn-primary">Click to View</a>
      </div>
    </div>';
    }
    ?>
    </div>
    <div id="about_me" class="d-block p-2 bg-dark text-white mt-5 mb-5">About me</div>
    <div class="border ">
        <h3 class="mt-1 mb-5 ">
            <div style="padding: 15%;">Hello, My
                name is Vikas. I am a full stack web developer. I work with PHP, Javascript, NodeJs,
                HTML, CSS,MYSQL, ReactJs, AJAX, Jquery, Bootstrap. I am always interested to learn new technology.
                Made various project, You can checkout all my project source code on Github by <a href="">Clicking
                    here.</a></div>
        </h3>
    </div>
    <div id="feedback" class="d-block p-2 bg-dark text-white">Feedback/Contact us</div>
    <div class="mx-auto mt-5 mb-5" style="width: 80%;">
        <form action="submit.php" method="post">
            <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Your
                    name</label> <input class="form-control" name="name" id="exampleFormControlInput1"
                    placeholder="Your name" type="text"> </div>
            <div class="mb-3"> <label for="exampleFormControlInput1" class="form-label">Your
                    E-mail address</label> <input class="form-control" name="email" id="exampleFormControlInput1"
                    placeholder="name@example.com" type="email"> </div>
            <div class="mb-3"> <label for="exampleFormControlTextarea1"
                    class="form-label">Feedback/Suggestion/Message</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="feedback" rows="3"></textarea>
            </div>
            <input class="btn btn-primary" value="submit" type="submit">
        </form>
    </div>
    <!-- footer of site -->
    <div id="important_link" class="d-block p-2 bg-dark text-white">Important links</div>
    <!-- Footer -->
    <footer class=" text-center text-white" style="background-color:#000000;">
        <!-- Grid container -->
        <div class="container p-4">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <!-- Twitter -->
                <!-- Google -->
                <!-- Instagram -->
                <!-- Linkedin -->
                <!-- Github -->
            </section>
            <!-- Section: Social media -->
            <!-- Section: Form -->
            <section class="">
                <form action="">
                    <!--Grid row-->

                    <!--Grid row-->
                </form>
            </section>
            <!-- Section: Form -->
            <!-- Section: Text -->
            <section class="mb-4">
                <p> This Section contain all the important link </p>
            </section>
            <!-- Section: Text -->
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Recent Projects</h5>
                        <ul class="list-unstyled mb-0">
                            <li> <a href="#%21" class="text-white">Link 1</a> </li>
                            <li> <a href="#%21" class="text-white">Link 2</a> </li>
                            <li> <a href="#%21" class="text-white">Link 3</a> </li>
                            <li> <a href="#%21" class="text-white">Link 4</a> </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Popular project</h5>
                        <ul class="list-unstyled mb-0">
                            <li> <a href="#%21" class="text-white">Link 1</a> </li>
                            <li> <a href="#%21" class="text-white">Link 2</a> </li>
                            <li> <a href="#%21" class="text-white">Link 3</a> </li>
                            <li> <a href="#%21" class="text-white">Link 4</a> </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Big projects</h5>
                        <ul class="list-unstyled mb-0">
                            <li> <a href="#%21" class="text-white">Link 1</a> </li>
                            <li> <a href="#%21" class="text-white">Link 2</a> </li>
                            <li> <a href="#%21" class="text-white">Link 3</a> </li>
                            <li> <a href="#%21" class="text-white">Link 4</a> </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase">Site Links</h5>
                        <ul class="list-unstyled mb-0">
                            <li> <a href="#%21" class="text-white">Link 1</a> </li>
                            <li> <a href="#%21" class="text-white">Link 2</a> </li>
                            <li> <a href="#%21" class="text-white">Link 3</a> </li>
                            <li> <a href="#%21" class="text-white">Link 4</a> </li>
                        </ul>
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->
        </div>
        <!-- Grid container -->
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            Portfolio profile of <a class="text-white" href="">Vikas kumar</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <?php
  echo'
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script>
    console.log(document.getElementById("test").innerHTML);
    </script>';
    ?>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>