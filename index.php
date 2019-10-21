<?php

	include('config/db_connect.php');

	$title = $ingredients = $fries = $customer = '';
	$errors = array('title'=>'', 'ingredients'=>'', 'fries'=>'', 'customer'=>'');
	
	if(isset($_POST['submit'])) {
		if(empty($_POST['title'])) {
			$errors['title'] = 'A title is required <br />';
		} else {
			$title = $_POST['title'];
		}

		if(empty($_POST['ingredients'])){
			$ingredients = 'plain';
		} else {
			$s = sizeof($_POST['ingredients']);
			foreach($_POST['ingredients'] as $ingredient){
				if($s != 1) {
					$ingredient = $ingredient . ', ';
				}
				$ingredients = $ingredients . $ingredient;
				$s--;
			}
		}
		
		if(empty($_POST['fries'])) {
			$errors['fries'] = 'Fries are required <br />';
		} else {
			$fries = $_POST['fries'];
		}
		
		if(empty($_POST['customer'])){
			$errors['customer'] = 'A name is required <br />';
		} else {
			$customer = $_POST['customer'];
		}
		
		if (array_filter($errors)){
			//echo errors;
		} else {
			$customer = mysqli_real_escape_string($conn, $_POST['customer']);
			
			$sql = "INSERT INTO Burgers(title,ingredients,fries,customer) VALUES('$title', '$ingredients', '$fries', '$customer')";
			
			if(mysqli_query($conn, $sql)){
				header('Location: index.php');
			} else {
				echo 'query error: ' . mysqli_error($conn);
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <title>Five Guys</title>
  </head>
  <body>
  	<header>
    	<img src="http://akns-images.eonline.com/eol_images/Entire_Site/2013728/rs_560x415-130828153928-560.fiveguys-logo.cm.82813.jpg" alt="Five Guys Logo" id="logo">
  	</header>
  	<div class="menu">
		<table>
      <thead>
        <tr>
          <th colspan="4">
            <h1>Menu</h1>
      	  </th>
	</tr>
    	<tr>
          <th>
            <h2>Burgers</h2>
      	  </th>
      	  <th>
            <h2>Hot Dogs</h2>
      	  </th>
	  <th>
            <h2>Veggie Sandwiches</h2>
          </th>
	  <th>  
            <h2>Other</h2>
          </th>
    	</tr>
  		</thead>
      <tbody>
        <tr>
          <td class="left"><h3>Little Hamburger</h3></td>
    			<td><h3>Hot Dog</h3></td>
			<td><h3>Veggie Sandwich</h3></td>
			<td><h3>BLT</h3></td>
        </tr>  
  			<tr>
          <td class="left"><h3>Hamburger</h3></td>
    			<td><h3>Cheese Dog</h3></td>
			<td><h3>Cheese Veggie Sandwich</h3></td>
			<td><h3>Grilled Cheese</h3></td>
        </tr>
  			<tr>
          <td class="left"><h3>Little Cheese Burger</h3></td>
    			<td><h3>Bacon Cheese Dog</h3></td>
        </tr>
  			<tr>
          <td class="left"><h3>Cheese Burger</h3></td>
        </tr>
  			<tr>
          <td class="left"><h3>Little Bacon Cheese Burger</h3></td>
        </tr>
			<tr>
          <td class="left"><h3>Bacon Cheese Burger</h3></td>
        </tr>
  		</tbody>
		</table>
  </div>
  <div class="sides">
    <h3>Fries</h3>
  </div>
  <div class="sides">
    <h3>Shakes</h3>
  </div>
  <div class="sides">
    <h3>Drinks</h3>
  </div>
      <form action="add.php" method="POST">
				<h1>Create a burger!</h1>
				
		<section class="burger">
          <span>What kind of burger would you like</span>
          <br>
          <input type="radio" name="title" id="little hamburger" value="Little Hamburger">
          <label for="yes">Little Hamburger</label>
          <input type="radio" name="title" id="hamburger" value="Hamburger">
          <label for="yes">Hamburger</label>
          <input type="radio" name="title" id="little cheeseburger" value="Little Cheeseburger">
          <label for="yes">Little Cheeseburger</label>
          <input type="radio" name="title" id="cheeseburger" value="Cheeseburger">
          <label for="yes">Cheeseburger</label>
          <input type="radio" name="title" id="little bacon cheeseburger" value="Little Bacon Cheeseburger">
          <label for="yes">Little Bacon Cheeseburger</label>
          <input type="radio" name="title" id="bacon cheeseburger" value="Bacon Cheeseburger">
          <label for="yes">Bacon Cheeseburger</label>
        </section>
        <hr>
        
        <section class="ingredients">
          <span>What toppings would you like?</span>
          <br>
          <input type="checkbox" name="ingredients[]" id="mayo" value="mayo">
          <label for="mayo">Mayo</label>
          <input type="checkbox" name="ingredients[]" id="lettuce" value="lettuce">
          <label for="lettuce">Lettuce</label>
          <input type="checkbox" name="ingredients[]" id="pickle" value="pickle">
          <label for="pickle">Pickle</label>
          <input type="checkbox" name="ingredients[]" id="tomato" value="tomato">
          <label for="tomato">Tomato</label>
          <input type="checkbox" name="ingredients[]" id="onion" value="onion">
          <label for="onion">Onion</label>
          <input type="checkbox" name="ingredients[]" id="relish" value="relish">
          <label for="relish">Relish</label>
          <input type="checkbox" name="ingredients[]" id="grilled onion" value="grilled onion">
          <label for="grilled onion">Grilled Onion</label>
          <input type="checkbox" name="ingredients[]" id="mushroom" value="mushroom">
          <label for="mushroom">Mushroom</label>
          <input type="checkbox" name="ingredients[]" id="green pepper" value="green pepper">
          <label for="green pepper">Green Pepper</label>
          <input type="checkbox" name="ingredients[]" id="jalapeno" value="jalapeno">
          <label for="jalapeno">Jalapeno</label>
          <input type="checkbox" name="ingredients[]" id="hot sauce" value="hot sauce">
          <label for="hot sauce">Hot Sauce</label>
          <input type="checkbox" name="ingredients[]" id="barbeque sauce" value="barbeque sauce">         
          <label for="barbeque sauce">Barbeque Sauce</label>
          <input type="checkbox" name="ingredients[]" id="a1 sauce" value="a1 sauce">
          <label for="a1 sauce">A1 Sauce</label>
        </section>
        <hr>
        
        <section class="fries">
          <span>What kind of fries would you like</span>
          <br>
          <input type="radio" name="fries" id="none" value="None">
          <label for="yes">None</label>
          <input type="radio" name="fries" id="little fries" value="Little Fries">
          <label for="yes">Little Fries</label>
          <input type="radio" name="fries" id="regular fries" value="Regular Fries">
          <label for="yes">Regular Fries</label>
          <input type="radio" name="fries" id="large fries" value="Large Fries">
          <label for="yes">Large Fries</label>
          <input type="radio" name="fries" id="little cajun fries" value="Little Cajun Fries">
          <label for="yes">Little Cajun Fries</label>
          <input type="radio" name="fries" id="cajun fries" value="Cajun Fries">
          <label for="yes">Cajun Fries</label>
          <input type="radio" name="fries" id="large cajun fries" value="Large Cajun Fries">
          <label for="yes">Large Cajun Fries</label>
        </section>
        <hr>
       
       <section class="customer">
       		<span>What's your name?</span>
			<input type="text" name="customer" value="<?php echo htmlspecialchars($customer) ?>">
       </section>
       <hr>

        <section class="submission">
          <input type="submit" name = "submit" value="Submit">
        </section>
      </form>
    </section>
    <p><bold>Orders</bold> (Employee Access)</p>
    <form action="orders.php">
    	<input type="password" name="password">
    	<label for="password"> Enter Password</label>
    	<br>
    	<input type="submit" value="Submit">
    </form>
    <div id="burger"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.21.1/babel.min.js"></script>

    <script type="text/babel" src="burger.js"></script>
  </body>
</html>