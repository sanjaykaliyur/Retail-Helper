
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
                        <p>Wow, wow, wow!! My green shirt is great. It is so good that I bought one for all of my neighbors.</p>
                    </div>
                </div>
            </div>
						<?php
							$sql = "SELECT * FROM FORUM;";
							$result = mysqli_query($conn,$sql);
				 			while($row = mysqli_fetch_assoc($result)) {
  							if($row != 0) {
    							echo '<div class="col-md-4">
    	                <div class="panel panel-default">
    	                    <div class="panel-heading">
    	                        <h4><strong>'.$row['Username'].'</strong> on '.$row['entryDate'].'</h4>
    	                    </div>
    	                    <div class="panel-body">
    												<h4> '.$row['campName'].'</h4>
    	                        <p>'.$row['response'].'</p>
    	                    </div>
    	                </div>
    	            </div>';
    						}
              }
						 ?>
        </div>

<div>
            <br>
            <br>
</div>
<?php
if(isset($_SESSION['id'])) {
	echo '<h3> Leave a Review </h3>
  <form method="post" id="forum" style="margin:15px" action = "forum_add.php">
            Camp Name: <br>
						<select name = "campName"required data-validation-required-message="select a camp name">
							<option selected="selected" value="">Camp Name</option>
							<option value="Introduction to Web Programming">Introduction to Web Programming</option>
							<option value="Introduction to Python">Introduction to Python</option>
							<option value="Introduction to Java">Introduction to Java</option>
							<option value="Introduction to Robotics">Introduction to Robotics</option>
							<option value="Electrical Engineering: Circuits">Electrical Engineering: Circuits</option>
							<option value="Electrical Engineering: Logic Design">Electrical Engineering: Logic Design</option>
							<option value="Basketball">Basketball</option>
							<option value="Football">Football</option>
							<option value="Swimming">Swimming</option>
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
