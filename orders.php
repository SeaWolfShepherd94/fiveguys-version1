<?php
	$name = "Matt";
	$age = 24;
	$stringOne = "My name is ";
	$stringTwo = "I am a computer scientist.";

	include('config/db_connect.php');
	
	$sql = 'SELECT title, ingredients, customer, ordered_at, id FROM Burgers ORDER BY ordered_at';
	
	$result = mysqli_query($conn, $sql);
	
	$burgers = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	mysqli_free_result($result);
	
	mysqli_close($conn);
	
?>

<!DOCTYPE html>
<html>
<head>
  <title>Five Guys</title>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/15.4.2/react-dom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-standalone/6.21.1/babel.min.js"></script>
	
	<h1>Orders</h1>
	
	<!--<?php foreach($burgers as $burger): ?>-->
	<!--<?php endforeach; ?>-->
	<div id="orders"></div>
	
	<script type="text/babel">
		class Orders extends React.Component {
    render() {
       return(
       		<div>
       			<?php foreach($burgers as $burger): ?>
  					<div>
  						<h2><?php echo htmlspecialchars($burger['title']); ?></h2>
  					</div>
					<div>
						<ul>
							<?php foreach(explode(',', $burger['ingredients']) as $ing){ ?>
								<li>
									<?php echo htmlspecialchars($ing); ?>
								</li>
							<?php } ?>
						</ul>
					</div>
					<div>
						<?php echo htmlspecialchars($burger['customer']); ?>
					</div>
					<div>
						<?php echo htmlspecialchars($burger['ordered_at']); ?>
					</div>
				<?php endforeach; ?>
			</div>
  		);
    }
}
ReactDOM.render(
    <Orders />,
    document.getElementById('orders')
);
	</script>
	
</body>
</html>