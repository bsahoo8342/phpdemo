<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        

            <?php
            //Takes Input From Form section
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name=$_POST["Nm"];
                $age=$_POST["Age"];
                $gender=$_POST["gender"];
    
            //Submit To database

            //Connecting PHP file to My SQL file...............
                $servername="localhost";
                $username="root";
                $password="";
                $database="prac1";

                //Create connection.................
                $conn=mysqli_connect($servername, $username, $password, $database);   //Connection function.........

                //Check Connection
                    if(!$conn){
                        die("Failed to Connect to My SQL! Due to --> ".mysqli_connect_error());
                    }
                    else{
                       
                        //Insert data in table
                         $ins="INSERT INTO `table1` ( `Name`, `Age`, `Gender`) VALUES ( '$name', '$age', '$gender')";
                         $res=mysqli_query($conn, $ins);

                        //check Data insert or not
                    if($res){
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Success!</strong> entry Successfully. 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>' ;
                    }
                    else{
                        // echo "data Not inserted because --> ".mysqli_error($conn);  
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Error!</strong> Data not entry Successfully, Please contact Admin!. 
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                              </div>' ;
                        }
                    }
                }
            ?>
    
         <div class="container mt-4">
                        <form action="/Php1/Submit.html" method='post'>
                    <div class="mb-3">
                        <label for="Nm" class="form-label">Name</label>
                        <input type="text" name="Nm" class="form-control" id="Nm" aria-describedby="emailHelp">

                        <label for="age" class="form-label">Age</label>
                        <input type="Number" name="Age" class="form-control" id="age" aria-describedby="emailHelp">

                        <label for="gender" class="form-label">Gender</label><br>
                        <input type="radio"  name="gender" value="Male">
                        <label for="Male">Male</label><br>
                        <input type="radio"  name="gender" value="Female">
                        <label for="Female">Female</label>
                        
                    </div>
                    
                  
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
            </div>
</body>
</html>
