<?php require_once 'core/handleForms.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<?php $getBarberByID = getBarberByID($pdo, $_GET['barber_id']); ?>
	<h1>Edit your barber</h1>
	<form action="core/handleForms.php?barber_id=<?php echo $_GET['barber_id']; ?>" method="POST">
		<p>
			<label for="name">Name</label> 
			<input type="text" name="name" value="<?php echo $getBarberByID['name']; ?>" required>
		</p>
		<p>
			<label for="phone_number">Phone Number</label> 
			<input type="text" name="phone_number" value="<?php echo $getBarberByID['phone_number']; ?>" required>
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" name="email" value="<?php echo $getBarberByID['email']; ?>" required>
		</p>
		<p>
			<label for="experience_years">Experience Years</label> 
			<input type="number" name="experience_years" value="<?php echo $getBarberByID['experience_years']; ?>" required>
			<input type="submit" name="editBarberBtn">
		</p>
	</form>
</body>
</html>
