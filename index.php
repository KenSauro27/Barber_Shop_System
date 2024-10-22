<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sauro Barber Shop</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Welcome To Sauro's Barber Shop Management System !!!</h1>
	<form action="core/handleForms.php" method="POST">
		<p>
			<label for="name">Name</label> 
			<input type="text" name="name" required>
		</p>
		<p>
			<label for="phone_number">Phone Number</label> 
			<input type="text" name="phone_number" required>
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" name="email" required>
		</p>
		<p>
			<label for="experience_years">Experience Years</label> 
			<input type="number" name="experience_years" required>
			<input type="submit" name="insertBarberBtn">
		</p>
	</form>
	<?php $getAllBarbers = getAllBarbers($pdo); ?>
	<?php foreach ($getAllBarbers as $row) { ?>
	<div class="container" style="border-style: solid; width: 50%; height: 300px; margin-top: 20px;">
		<h3>Name: <?php echo $row['name']; ?></h3>
		<h3>Phone Number: <?php echo $row['phone_number']; ?></h3>
		<h3>Email: <?php echo $row['email']; ?></h3>
		<h3>Experience Years: <?php echo $row['experience_years']; ?></h3>
		<h3>Date Added: <?php echo $row['date_added']; ?></h3>

		<div class="editAndDelete" style="float: right; margin-right: 20px;">
			<a href="viewclients.php?barber_id=<?php echo $row['barber_id']; ?>">View Clients</a>
			<a href="editbarber.php?barber_id=<?php echo $row['barber_id']; ?>">Edit</a>
			<a href="deletebarber.php?barber_id=<?php echo $row['barber_id']; ?>">Delete</a>
		</div>
	</div> 
	<?php } ?>
</body>
</html>
