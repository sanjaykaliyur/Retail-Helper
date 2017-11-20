
<?php include 'header.php'; ?>

<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <br> <br>
                <h2 class="page-header" style = "padding-top: 10px;
								">
                    Customer Reviews
                </h2>
                <p>
                Here is what our customers have to say! </p>
                <br>
            </div>
            <hr>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4> <strong>John L. on 2016-11-30</strong></h4>
                    </div>
                    <div class="panel-body">
											<h4>Black Shirt</h4>
                        <p>Wow! This black shirt is amazing. It's the best black shirt I've ever owned. I recommend everyone purchase this shirt.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><strong>Lucy J. on 2016-10-24</strong></h4>
                    </div>
                    <div class="panel-body">
											<h4>Pink Shirt</h4>
                        <p>Wow! This pink shirt is amazing. The material is great. Thanks!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><strong>Andy R. on 2016-08-15</strong></h4>
                    </div>
                    <div class="panel-body">
											<h4>Blue Shirt</h4>
                        <p>No other blue shirt can compete with this shirt. This is the best shirt ever.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4><strong>Patty M. on 2016-09-10</strong></h4>
                    </div>
                    <div class="panel-body">
											<h4>Green Shirt</h4>
                        <p>Wow, wow, wow!! My green shirt is great. It is so good that I bought one for all of my neighbors.</po
			</div>
                </div>
            </div>
              <?php
	        $result = oci_parse($conn, "SELECT * FROM REVIEWS");
		oci_execute($result);
	        while(($row = oci_fetch_array($result, OCI_BOTH)) != false){
		    	if ($row['PRODUCTID'] == 'a'){
        		  $product = 'Black Shirt';
    			}
    			if ($row['PRODUCTID'] == 'b'){
        		  $product = 'Blue Shirt';
    			}
    			if ($row['PRODUCTID'] == 'c'){
        		  $product = 'Green Shirt';
    			}
    			if ($row['PRODUCTID'] == 'd'){
        		  $product = 'Pink Shirt';
    			}
    			if ($row['PRODUCTID'] == 'e'){
        		  $product = 'Red Shirt';
    			}
    			if ($row['PRODUCTID'] == 'f'){
        		  $product = 'Yellow Shirt';
    			}  
    		    echo '<div class="col-md-4">
    	                    <div class="panel panel-default">
    	                      <div class="panel-heading">
    	                        <h4><strong>'.$row['USERID'].'</strong></h4>
    	                      </div>
    	                      <div class="panel-body">
				<h4>'.$product.'</h4>
    	                        <p>'.$row['REVIEW'].'</p>
    	                      </div>
    	                    </div>
    	                  </div>';
                }
	      ?>
        </div>

<div>
            <br>
            <br>
</div>
<?php
if(isset($_SESSION['id'])) {
	echo '<hr><br><br>';
	echo '<h3> Leave a Review </h3>
  <form method="post" id="forum" style="margin:15px" action = "reviews_add.php">
            T-Shirt Color: <br>
						<select name = "tshirts" required data-validation-required-message="select a color">
							<option selected="selected" value="Black">Black</option>
							<option value="Blue">Blue</option>
							<option value="Green">Green</option>
							<option value="Pink">Pink</option>
							<option value="Red">Red</option>
							<option value="Yellow">Yellow</option>
						</select>
						<br><br>
            Comment: <br>

            <textarea rows="8" cols="49" name="comment" required data-validation-required-message="Write a review!"></textarea><br>
            <input type="submit" class="button" style="margin:5px">
</form>
<br>';
}
?>
<?php include 'footer.php' ?>
