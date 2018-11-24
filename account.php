<!DOCTYPE html>
<html>
<head>
  <!--   https://matthewhallberg.com/store/webcamFaceTracking.html   -->
  <script src="face-api.js"></script>
  <script src="js/commons.js"></script>
  <script src="js/drawing.js"></script>
  <script src="js/faceDetectionControls.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="main.css">
  <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
    <ul>
    <li><a href="main.html"><img src="images/logo.png" id="logo"><li>   
    <li><a href="account.php">Account</a></li>
    <li><a href="about.html">About Us</a></li>
    <li><a href="https://matthewhallberg.com/store/products.php">Product</a></li>
    <li><a href="https://matthewhallberg.com/store/shop.html">Shop</a></li>
  </ul>
</head>
<body>
      <?php

      $usernameLogIn = $_POST['userNameLogIn'];
      $passwordLogIn = $_POST['passwordLogIn'];

      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];
      $username = $_POST['userName'];
      $password = $_POST['password'];

      $servername = "localhost";
      $username = "matthew5_matt";
      $password = "password666";
      $dbName = "matthew5_school";

      //Make Connection
      $conn = mysqli_connect($servername,$username,$password,$dbName);

        //Check Connection
        if(!$conn){
            die("Connection Failed. " . mysqli_connect_error());
        } else {

            if($usernameLogIn != null){
              //LOG IN 



            } else if ($firstName != null){
              //CREATE ACCOUT
              if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($username) && !empty($password)){

                DisplayMessage("good");


              } else {
                DisplayMessage("All fields must be filled out!");
              }
            }


            // $sql = "SELECT * FROM `PRODUCTS`";
            // $result = mysqli_query($conn,$sql);

            //  while ($row = $result->fetch_assoc()) {
            //     if ($shape == 'none' && $color != 'none'){
            //       if ($row['lensColor'] == $color){
            //         CreateProduct($row['name'],$row['brand'],$row['price']);
            //       }
            //     } else if ($shape != 'none' && $color == 'none'){
            //       if ($row['shape'] == $shape){
            //         CreateProduct($row['name'],$row['brand'],$row['price']);
            //       }
            //     } else if ($shape != 'none' && $color != 'none'){
            //       if ($row['lensColor'] == $color && $row['shape'] == $shape){
            //         CreateProduct($row['name'],$row['brand'],$row['price']);
            //       }
            //     }
            // }
        }
        $conn->close();

        function DisplayMessage($message){
            echo("
              <br><br>
              <div class = 'productWrapper'>
              <div class = 'productChild'>
                <span style = 'color: red; font-size: 30px;font-family: 'Permanent Marker', cursive;'>
                $message
                </span>
              </div>
              </div>
          ");
        }

      ?>

      <script>

       function OnLogInButtonDown(){
          document.getElementById("logInForm").submit();
       }

       function OnCreateAccountButtonDown(){
          document.getElementById("accountForm").submit();
       }      

     </script>

    <div class = "productWrapper">

      <div class = "productChild">
        <span style = "color: black; font-size: 40px;font-family: 'Permanent Marker', cursive;">
        Account
        </span>
      </div>

      <form id = "logInForm" action = "account.php" method="post">
      <div class = "productChild">
        <span style = "color: black; font-size: 15px;font-family: 'Permanent Marker', cursive;">
        Login:<br><br>
        Username: <input type="text" name="userNameLogIn" style = "margin-left: 2.5em"><br>
        Password: <input type="text" name="passwordLogIn" style = "margin-left: 2.5em"><br>
        </span>
      </div>

      <div class = "productChild">
      <button class = "button" onclick="OnLogInButtonDown()" type="button">Login</button>
      </div>
     </form>

     <form id = "accountForm" action = "account.php" method="post">
      <div class = "productChild">
        <span style = "color: black; font-size: 15px;font-family: 'Permanent Marker', cursive;">
        Or<br><br>Create Account:<br><br>
        First Name: <input type="text" name="firstName" style = "margin-left: 2.5em"><br>
        Last Name: <input type="text" name="lastName" style = "margin-left: 2.5em"><br>
        Email: <input type="text" name="email" style = "margin-left: 2.5em"><br>
        Username: <input type="text" name="userName" style = "margin-left: 2.5em"><br>
        Password: <input type="text" name="password" style = "margin-left: 2.5em"><br>
        </span>
      </div>

      <div class = "productChild">
      <button class = "button" onclick="OnCreateAccountButtonDown()" type="button">Create Account</button>
      </div>
     </form>
     <br><br><br><br><br><br>

  </body>
</body>
</html>