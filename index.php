<?php
 include 'header.php';
  include 'connect.php';
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <br>
    <br>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style.css">
 </head>
 <style>
  .sameLine {display: inline;}
 </style>
 <body>
 <!-- Page Content -->
 <div class="container">
   <br>
   <br>

     <div class="row">
         <div class="col-lg-12">
             <h1 >Store
                 <small>Purchase T-Shirts</small>
             </h1>
             <p>*Note: Each shirt is made of a different material sourced from different parts of the world. Our prices reflect the supply and availability of the material we use.</p>
         </div>

    <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="Images/shirt_black.png" height="600" width="500">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Black Shirt</h3>
          <p>Our black shirt is made with premium cotton.</p>
          <p>Price: $15.00</p>
          <div class="dropdown">
            <button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" 
            class="button dropdown">Select Size</button><br>
              <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
                <li><a href="#">Small</a></li>
                <li><a href="#">Medium</a></li>
                <li><a href="#">Large</a></li>
                <li><a href="#">X-Large</a></li>
              </ul>
          </div>
          <a class="btn btn-primary" href="#">Purchase</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="Images/shirt_blue.png" height="600" width="500">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Blue Shirt</h3>
          <p>Our blue shirt is made with premium leather.</p>
          <p>Price: $18.50</p>
          <button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" 
          class="button dropdown">Select Size</button><br>
            <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
              <li><a href="#">Small</a></li>
              <li><a href="#">Medium</a></li>
              <li><a href="#">Large</a></li>
              <li><a href="#">X-Large</a></li>
            </ul>
          <a class="btn btn-primary" href="#">Purchase</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="Images/shirt_green.png" height="600" width="500">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Green Shirt</h3>
          <p>Our green shirt is made with premium modal.</p>
          <p>Price: $16.50</p>
          <button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" 
          class="button dropdown">Select Size</button><br>
            <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
              <li><a href="#">Small</a></li>
              <li><a href="#">Medium</a></li>
              <li><a href="#">Large</a></li>
              <li><a href="#">X-Large</a></li>
            </ul>
          <a class="btn btn-primary" href="#">Purchase</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="Images/shirt_pink.png" height="600" width="500">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Pink Shirt</h3>
          <p>Our pink shirt is made with premium wool.</p>
          <p>Price: $29.50</p>
          <button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" 
          class="button dropdown">Select Size</button><br>
            <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
              <li><a href="#">Small</a></li>
              <li><a href="#">Medium</a></li>
              <li><a href="#">Large</a></li>
              <li><a href="#">X-Large</a></li>
            </ul>
          <a class="btn btn-primary" href="#">Purchase</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="Images/shirt_red.png" height="600" width="500">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Red Shirt</h3>
          <p>Our red shirt is made with premium polyester.</p>
          <p>Price: $14.00</p>
          <button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" 
          class="button dropdown">Select Size</button><br>
            <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
              <li><a href="#">Small</a></li>
              <li><a href="#">Medium</a></li>
              <li><a href="#">Large</a></li>
              <li><a href="#">X-Large</a></li>
            </ul>
          <a class="btn btn-primary" href="#">Purchase</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
          <a href="#">
            <img class="img-fluid rounded mb-3 mb-md-0" src="Images/shirt_yellow.png" height="600" width="500">
          </a>
        </div>
        <div class="col-md-5">
          <h3>Yellow</h3>
          <p>Our yellow shirt is made with premium rayon.</p>
          <p>Price: $17.50</p>
          <button href="#" data-dropdown="drop1" aria-controls="drop1" aria-expanded="false" 
          class="button dropdown">Select Size</button><br>
            <ul id="drop1" data-dropdown-content class="f-dropdown" aria-hidden="true">
              <li><a href="#">Small</a></li>
              <li><a href="#">Medium</a></li>
              <li><a href="#">Large</a></li>
              <li><a href="#">X-Large</a></li>
            </ul>
          <a class="btn btn-primary" href="#">Purchase</a>
        </div>
    </div>

     <?php
     $sql = "SELECT * FROM CATALOG;";
     $result = mysqli_query($conn,$sql);
     $counter = 0;
//'.$counter.'
     while($row = mysqli_fetch_assoc($result)) {
       echo '<div class="row">
           <div class="col-md-5">
               <center><a>
                   <img class="img-responsive img-hover" src=".'.$row['image'].'" style="height:300px;widht:400px;" alt="">
               </a></center>
           </div>
           <div class="col-md-6">
               <form method = "POST" action="added_to_cart.php">
               <h3>'.$row['item_name'].'</h3>
               <p>'.$row['item_desc'].'</p>
               <p class = "sameLine">Cost: $<p class = "sameLine" name = "cost">'.$row['item_cost'].'</p></p>
               <input type="hidden" name="item_cost" value="'.$row['item_cost'].'"></input>
               <input type="hidden" name="item_name" value="'.$row['item_name'].'"></input>
               <input type="hidden" name="item_ID" value="'.$row['item_ID'].'"></input>
               <button class="btn btn-primary" type="submit">Add to Cart<i class="fa fa-angle-right"></i></button>
               </form>
           </div>
       </div>
       <hr>';
       $counter++;
     }
     ?>
    </div>
    <hr>
<!-- /.container -->

 <!-- jQuery -->
 <script src="js/jquery.js"></script>
 <!-- Bootstrap Core JavaScript -->
 <script src="js/bootstrap.min.js"></script>
 </body>
 </html>

<?php
 include 'footer.php';
?>
