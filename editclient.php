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
	<a href="viewclients.php?barber_id=<?php echo $_GET['barber_id']; ?>">
	View All Clients</a>
	<h1>Edit your client</h1>
	<?php $getClientByID = getClientByID($pdo, $_GET['client_id']); ?>
	<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>&barber_id=<?php echo $_GET['barber_id']; ?>" method="POST">
		<p>
			<label for="name">Client Name</label> 
			<input type="text" name="name" 
			value="<?php echo $getClientByID['client_name']; ?>" required>
		</p>
		<p>
			<label for="phone_number">Phone Number</label> 
			<input type="text" name="phone_number" 
			value="<?php echo $getClientByID['client_phone']; ?>" required>
		</p>
		<p>
			<label for="email">Email</label> 
			<input type="email" name="email" 
			value="<?php echo $getClientByID['client_email']; ?>" required>
		</p>
		<p>
			<label for="appointment_date">Appointment Date</label> 
			<input type="date" name="appointment_date" 
			value="<?php echo $getClientByID['appointment_date']; ?>" required>
		</p>
		<p>
			<label for="service_type">Service Type</label> 
			<input type="text" name="service_type" 
			value="<?php echo $getClientByID['service_type']; ?>" required>
			<input type="submit" name="editClientBtn">
		</p>
	</form>
</body>
</html>
