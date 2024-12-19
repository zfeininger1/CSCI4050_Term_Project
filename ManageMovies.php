<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" >
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
        <meta name="description" content="" >
        <meta name="author" content="" >
        <title>WatchNow Cinema Booking</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" >
        <!-- Link to Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <!-- Link to Custom CSS -->
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">WatchNow</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="AdminView.html">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Select Category
                    </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Now Playing</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Coming Soon</a></li>
                </ul>
                </li>
            </ul>
            <input class="form-control me-2" type="search" placeholder="Search Movies" aria-label="Search">
                <button class="btn btn-outline-success buttonStyle" type="submit">Search</button>
                    <form class="d-flex" role="search">
                        
                    </form>
                </div>
            </div>
        </nav>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h6 class="fw-bold text-center">You are currently logged in as an administrator.</h6>
            </div>
        </div>     
        <form method="post" action="">
            <div class="jumbotron d-flex justify-content-center">
              <div><a class="btn btn-outline-dark mt-auto margins px-xl-5" data-bs-toggle="modal" data-bs-target="#newMovie">Add New Movie</a></div>
              <div>
              <a href="ScheduleMovie.php" class="btn btn-outline-dark mt-auto margins px-xl-5">Schedule Movie</a>
    </div>
                <div class="modal fade" id="newMovie" tabindex="-1" aria-labelledby="newMovieLabel" aria-hidden="true">
                    <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                            <div class="input-group mb-1">
                                <input type="text" class="form-control" placeholder="Movie Name" aria-label="Movie Name" aria-describedby="" name="name" required>
                         </div>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                         </div>
                    <div class="modal-body">
                        <div class="input-group mb-1">
                        <input type="text" class="form-control" id="link" placeholder="Link to Movie Trailer" aria-label="Link to Movie Trailer" name="link" required pattern="https?://.+">
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="category" placeholder="Category" aria-label="Category" name="category" required pattern="[A-Za-z, ]+">
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="cast" placeholder="Cast" aria-label="Cast" name="cast" required pattern="[A-Za-z, ]+">
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="director" placeholder="Director" aria-label="Director" name="director" required pattern="[A-Za-z, ]+">
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="producer" placeholder="Producer" aria-label="Producer" name="producer" required pattern="[A-Za-z, ]+">
                        </div>
                        <div class="input-group mb-1">
                        <input type="text" class="form-control" id="synopsis" placeholder="Synopsis" aria-label="Synopsis" name="synopsis" required minlength="10">
                        </div>
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" id="rating" placeholder="Film Rating" aria-label="Film Rating" name="rating" required pattern="[0-9]+(\.[0-9]+)?" min="0" max="100">
                        </div>
                    <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (empty($_POST["link"]) || empty($_POST["category"]) || empty($_POST["cast"]) || empty($_POST["director"]) || empty($_POST["producer"]) || empty($_POST["synopsis"]) || empty($_POST["rating"]) || empty($_POST["name"])) {
                            } else {
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "WatchNow";
                                
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                
                                if ($conn->connect_error) {
                                    echo "Connection failed: " . $conn->connect_error;
                                } else {
                                    $name = $_POST["name"];
                                    $link = $_POST["link"];
                                    $category = $_POST["category"];
                                    $cast = $_POST["cast"];
                                    $director = $_POST["director"];
                                    $producer = $_POST["producer"];
                                    $synopsis = $_POST["synopsis"];
                                    $rating = $_POST["rating"];

                                    $name = mysqli_real_escape_string($conn, $name);
                                    $link = mysqli_real_escape_string($conn, $link); 
                                    $category = mysqli_real_escape_string($conn, $category);
                                    $cast = mysqli_real_escape_string($conn, $cast);
                                    $director = mysqli_real_escape_string($conn, $director);
                                    $producer = mysqli_real_escape_string($conn, $producer);
                                    $synopsis = mysqli_real_escape_string($conn, $synopsis);
                                    $rating = mysqli_real_escape_string($conn, $rating);


                                    $sql = "SELECT * FROM movies WHERE name = '$name'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                       echo '<p style="color:red;">Movie already exists.</p>';
                                    } else {
                                        $sql = "INSERT INTO movies (`name`, trailer, category, cast, director, producer, synopsis, rating) VALUES ('$name', '$link', '$category', '$cast', '$director', '$producer', '$synopsis', '$rating')";
                                        $result = mysqli_query($conn, $sql);
                                        echo $result;
                                        $conn->close();
                                        echo '<script>window.location.href = "AddedMovieConfirmation.html";</script>';
                                    }
                                }
                            }
                        }
                    ?>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-secondary">Add Movie</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>

        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder"></h1>
                    <p class="lead fw-normal text-white-50 mb-0"></p>
                </div>
            </div>
        </header>

        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Movie Trailer -->
                            <iframe class="card-img-top" width="450" height="140" src="https://www.youtube.com/embed/YIwja07VVg4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- Movie details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Movie name-->
                                    <h5 class="fw-bolder">Movie 1</h5>
                                    <!-- Movie Synopsis -->
                                    <p><b>FLUSHED AWAY</b></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" class=" btn btn-outline-dark mt-auto margins" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit Details
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Movie 1</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe class="card-img-top" width="450" height="300" src="https://www.youtube.com/embed/YIwja07VVg4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            <form>
                                                <div class="input-group mb-1">
                                                     <input type="text" class="form-control" placeholder="Category" aria-label="ategory" aria-describedby="">
                                                </div>
                                                <div class="input-group mb-1">
                                                     <input type="text" class="form-control" placeholder="Cast" aria-label="Cast" aria-describedby="">
                                                </div>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" placeholder="Director" aria-label="Director" aria-describedby="">
                                               </div>
                                               <div class="input-group mb-1">
                                                    <input type="text" class="form-control" placeholder="Producer" aria-label="Producer" aria-describedby="">
                                               </div>
                                               <div class="input-group mb-1">
                                                    <input type="text" class="form-control" placeholder="Synopsis" aria-label="Synopsis" aria-describedby="">
                                                </div>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" placeholder="Reviews" aria-label="Reviews" aria-describedby="">
                                                </div>
                                                <div class="input-group mb-1">
                                                    <input type="text" class="form-control" placeholder="Film Rating" aria-label="Film Rating" aria-describedby="">
                                                </div>
                                                <button type="submit" class="btn btn-dark">Save</button>
                                            </form>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Showtimes</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Delete Movie</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Movie Trailer -->
                            <iframe class="card-img-top" width="450" height="140" src="https://www.youtube.com/embed/Lm8p5rlrSkY" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- Movie details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Movie name-->
                                    <h5 class="fw-bolder">Movie 2</h5>
                                    <!-- Movie Synopsis -->
                                    <p><b>INTERSTELLAR</b></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" class=" btn btn-outline-dark mt-auto margins" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit Details
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Movie 1</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Movie Trailer goes Here
                                            <p>Category:</p>
                                            <p>Cast:</p>
                                            <p>Director:</p>
                                            <p>Producer:</p>
                                            <p>Synopsis:</p>
                                            <p>Reviews:</p>
                                            <p>Film Rating:</p>
                                            <p>Show Dates:</p>
                                            <p>Show Times:</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <div class="text-center"><a class="btn btn-outline-dark mt-auto margins">Delete Movie</a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Movie Trailer -->
                            <iframe class="card-img-top" width="450" height="140" src="https://www.youtube.com/embed/BSXBvor47Zs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- Movie details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Movie name-->
                                    <h5 class="fw-bolder">Movie 3</h5>
                                    <!-- Movie Synopsis -->
                                    <p><b>THE BREAKFAST CLUB</b></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" class=" btn btn-outline-dark mt-auto margins" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit Details
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Movie 1</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Movie Trailer goes Here
                                            <p>Category:</p>
                                            <p>Cast:</p>
                                            <p>Director:</p>
                                            <p>Producer:</p>
                                            <p>Synopsis:</p>
                                            <p>Reviews:</p>
                                            <p>Film Rating:</p>
                                            <p>Show Times:</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <div class="text-center"><a class="btn btn-outline-dark mt-auto margins">Delete Movie</a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Movie Trailer -->
                            <iframe class="card-img-top" width="450" height="140" src="https://www.youtube.com/embed/4eaZ_48ZYog" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- Movie details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Movie name-->
                                    <h5 class="fw-bolder">Movie 4</h5>
                                    <!-- Movie Synopsis -->
                                    <p><b>Superbad</b></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" class=" btn btn-outline-dark mt-auto margins" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit Details
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Movie 1</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Movie Trailer goes Here
                                            <p>Category:</p>
                                            <p>Cast:</p>
                                            <p>Director:</p>
                                            <p>Producer:</p>
                                            <p>Synopsis:</p>
                                            <p>Reviews:</p>
                                            <p>Film Rating:</p>
                                            <p>Show Dates:</p>
                                            <p>Show Times:</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <div class="text-center"><a class="btn btn-outline-dark mt-auto margins">Delete Movie</a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Movie Trailer -->
                            <iframe class="card-img-top" width="450" height="140" src="https://www.youtube.com/embed/W6Mm8Sbe__o" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- Movie details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Movie name-->
                                    <h5 class="fw-bolder">Movie 5</h5>
                                    <!-- Movie Synopsis -->
                                    <p><b>THE SILENCE OF THE LAMBS</b></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" class=" btn btn-outline-dark mt-auto margins" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit Details
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Movie 1</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Movie Trailer goes Here
                                            <p>Category:</p>
                                            <p>Cast:</p>
                                            <p>Director:</p>
                                            <p>Producer:</p>
                                            <p>Synopsis:</p>
                                            <p>Reviews:</p>
                                            <p>Film Rating:</p>
                                            <p>Show Dates:</p>
                                            <p>Show Times:</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <div class="text-center"><a class="btn btn-outline-dark mt-auto margins">Delete Movie</a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Movie Trailer -->
                            <iframe class="card-img-top" width="450" height="140" src="https://www.youtube.com/embed/NmzuHjWmXOc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <!-- Movie details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Movie name-->
                                    <h5 class="fw-bolder">Movie 6</h5>
                                    <!-- Movie Synopsis -->
                                    <p><b>THE SHAWSHANK REDEMPTION</b></p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="text-center card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <button type="button" class=" btn btn-outline-dark mt-auto margins" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit Details
                                </button>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h1 class="modal-title fs-5" id="exampleModalLabel">Movie 1</h1>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Movie Trailer goes Here
                                            <p>Category:</p>
                                            <p>Cast:</p>
                                            <p>Director:</p>
                                            <p>Producer:</p>
                                            <p>Synopsis:</p>
                                            <p>Reviews:</p>
                                            <p>Film Rating:</p>
                                            <p>Show Dates:</p>
                                            <p>Show Times:</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                          <div class="text-center"><a class="btn btn-outline-dark mt-auto margins">Delete Movie</a></div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">&copy; WatchNow</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>

