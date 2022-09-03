<?php
//including the database connection file
include_once("config.php");
$query1 = mysqli_query($mysqli, "SELECT * FROM filmtitles");
$editmovie = 'editmovie.php?FilmTitleID=$res[FilmTitleID]';
?>
<html>
<head>
	<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: black;
  color: white;
  font-size: 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  width: 87px;
  margin-top: 5px;
}

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  top: 50px;
  right: 0;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.cancel {
  position: absolute;
  font-size: 20px;
  top: 0;
  right: 0;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
}
</style>
</head>
<nav>
		<a href="home.php" class="channel"><img src="../images/logo.png"/></a>
		
		<ul>
			<li><a href="home.php" class="hl">Home</a></li>
			<li><a href="#">View</a>
        <ul>
          <li><a href="viewmovies.php">Movies</a></li>
          <?php
      if($user == 'rene'){
      ?>
          <li><a href="db.php">DATA BASE</a></li>

      <?php
      }
      ?>
        </ul>
      </li>
			<?php
			if($user == 'rene'){
			?>
				<li><a href="#">ADD</a>
				<ul>
					<li><a href="addmovie.php">MOVIE</a></li>
					<li><a href="addroletype.php">ROLE TYPE</a></li>
					<li><a href="addgenre.php">GENRE</a></li>
					<li><a href="addproducer.php">PRODUCER</a></li>
					<li><a href="addactor.php">ACTOR</a></li>

				</ul>
			</li>
			<li><a href="">EDIT</a>
				<ul>
					<!--<li>
						<select>
							<?php while($row = mysqli_fetch_array($query1)):;?>
							<option><?php echo $row['FilmTitle'];?></option>
						<?php endwhile;?>
						</select>
						<a  href=' <?php echo $editmovie; ?>' >Edit Selected Title</a>
					</li>-->
					<li><a href="editable.php#tb1">FILM TITLES</a></li>
					<li><a href="editable.php#tb2">GENRE</a></li>
					<li><a href="editable.php#tb3">ACTOR ROLE</a></li>
					<li><a href="editable.php#tb4">ACTOR</a></li>
					<li><a href="editable.php#tb5">ROLE TYPES</a></li>
					<li><a href="editable.php#tb6">CERTIFICATE</a></li>
					<li><a href="editable.php#tb7">PRODUCER</a></li>
				</ul>
			</li>
			<li><a href="delete.php">DELETE MOVIE</a></li>
			
			<?php
			}
			?>
			<li>
				Hi <?php echo $user;
				?><button class="open-button" onclick="openForm()">&#9660;</button>
			</li>
		</ul>

	</nav>

<div class="form-popup" id="myForm">
<!-- 	<?php
	if($user == 'guest'){?>
		<form action="script.php" class="form-container" method="post">
    <h1>Login</h1>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="submit" class="btn">Login</button> 
    <button type="submit" name="submit_logout" class="btn">Logout</button> 
  </form>
<?php
}

?> -->
  <?php
    if($user == "guest"){
  ?>
      <form action="script.php" class="form-container" method="post">
        <h1>Login</h1>
        <label for="username"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="un" required>

        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="pw" required>

        <button type="submit" name="submit" class="btn" onclick="myFunction()">Login</button> 
    </form>

    <form action="searched.php" class="form-container" method="post">
        <hr>

              <input type="text" placeholder="Search.." name="search" style="width: 240px;">
          <!--     <input type="submit" value="Go" style="height: 45px;"> -->
              <button type="submit" name="searchbtn" style="height: 45px;">Go</button> 

    </form>
  <?php
    }
  ?>

   <?php
    if($user == "rene"){
  ?>
    <form action="script.php" class="form-container" method="post">
      <h1>Logout</h1>
    <button type="submit" name="submit_logout" class="btn">Logout</button> 
     
  </form>
  <form action="searched.php" class="form-container" method="post">
        <hr>

              <input type="text" placeholder="Search.." name="search" style="width: 240px;">
          <!--     <input type="submit" value="Go" style="height: 45px;"> -->
              <button type="submit" name="searchbtn" style="height: 45px;">Go</button> 

    </form>
  <?php
    }
  ?>

  
  <button type="" class="btn cancel" onclick="closeForm()">X</button>
</div>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>

<script>
function myFunction() {
  if (document.getElementById('un').value != "rene" && document.getElementById('pw').value != "rene" ) {
    window.alert("INVALID USERNAME OR PASSWORD");
  }
}
</script>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--> <!-- this is the direct link for hiding nav -->
	<script src="../css_java/hide_nav1.js"> </script> <!-- this is the actual code for hiding nav -->
	<script src="../css_java/hide_nav.js"> </script>	

<html>
