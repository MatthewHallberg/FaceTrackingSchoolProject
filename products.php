<!DOCTYPE html>
<html>
<head>
  <!--   https://matthewhallberg.com/store/products.php   -->
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

      $color = $_POST['color'];
      $shape = $_POST['shape'];

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

            $sql = "SELECT * FROM `PRODUCTS`";
            $result = mysqli_query($conn,$sql);

             while ($row = $result->fetch_assoc()) {
                if ($shape == 'none' && $color != 'none'){
                  if ($row['lensColor'] == $color){
                    CreateProduct($row['name'],$row['brand'],$row['price']);
                  }
                } else if ($shape != 'none' && $color == 'none'){
                  if ($row['shape'] == $shape){
                    CreateProduct($row['name'],$row['brand'],$row['price']);
                  }
                } else if ($shape != 'none' && $color != 'none'){
                  if ($row['lensColor'] == $color && $row['shape'] == $shape){
                    CreateProduct($row['name'],$row['brand'],$row['price']);
                  }
                }
            }
        }
        $conn->close();

        function CreateProduct($name,$brand,$price){
            echo("
              <div class = 'productElement'>  
              <div class = 'productElementImage'>
              <input type='image' id='$name' style='height:100;width:170;
              outline-style: none;' src='images/$name.png'/>
              </div>
              <div class = 'productElementText'> $name
              <div class = 'productElementSubTitle'>
              <span style = 'color: red; font-size: 23px;'>" . "$" . "$price</span>
              <span style = 'color: black; font-size: 18px;'>" . "by " . "$brand</span>
              </div>
              </div>
              </div>
          ");
        }

      ?>

      <script>
       var colorVal = "none";
       var lensVal = "none";

       function OnSubmitButtonDown(){
          document.getElementById("form").submit();
       }   

       function OnColorChanged(value){
          colorVal = value;
       }

        function OnColorChanged(value){
          colorVal = value;
       }

        function OnShapeChanged(value){
          lensVal = value;
       }
     </script>

    <div class = "productWrapper">

      <div class = "productChild">
        <span style = "color: black; font-size: 40px;font-family: 'Permanent Marker', cursive;">
        Product Search
        </span>
      </div>


      <form id = "form" action="products.php" method="post">

      <div class = "productChild">
        <span style = "color: black; font-size: 15px;font-family: 'Permanent Marker', cursive;">
        Select Lens Color:
        </span>
      <select name="color" style = "margin-left: 2.5em" onchange="OnColorChanged(this.value)">
        <option value="none">none</option>
        <option value="dark">dark</option>
        <option value="light">light</option>
      </select>
      </div>

       <div class = "productChild">
        <span style = "color: black; font-size: 15px;font-family: 'Permanent Marker', cursive;">
        Select Lens Shape:
        </span>
      <select name="shape" style = "margin-left: 2.5em" onchange="OnShapeChanged(this.value)">
        <option value="none">none</option>
        <option value="square">square</option>
        <option value="circle">circle</option>
      </select>
      </div>

      <div class = "productChild">
      <button class = "button" onclick="OnSubmitButtonDown()" type="button">Search</button>
      </div>

     <form>
  </body>
</body>
</html>