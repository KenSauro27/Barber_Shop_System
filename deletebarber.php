<?php require_once 'core/models.php'; ?>
<?php require_once 'core/dbConfig.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<h1>Delete this barber?</h1>
	<?php $getBarberByID = getBarberByID($pdo, $_GET['barber_id']); ?>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Name: <?php echo $getBarberByID['name']; ?></h2>
		<h2>Phone Number: <?php echo $getBarberByID['phone_number']; ?></h2>
		<h2>Email: <?php echo $getBarberByID['email']; ?></h2>
		<h2>Experience Years: <?php echo $getBarberByID['experience_years']; ?></h2>
		<h2>Date Added: <?php echo $getBarberByID['date_added']; ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?barber_id=<?php echo $_GET['barber_id']; ?>" method="POST">
				<input type="submit" name="deleteBarberBtn" value="Delete">
			</form>			
		</div>	
	</div>
</body>
</html>
