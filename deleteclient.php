<?php require_once 'core/dbConfig.php'; ?>
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
	<?php $getClientByID = getClientByID($pdo, $_GET['client_id']); ?>
	<h1>Delete this client?</h1>
	<div class="container" style="border-style: solid; height: 400px;">
		<h2>Client Name: <?php echo $getClientByID['client_name'] ?></h2>
		<h2>Phone Number: <?php echo $getClientByID['client_phone'] ?></h2>
		<h2>Email: <?php echo $getClientByID['client_email'] ?></h2>
		<h2>Appointment Date: <?php echo $getClientByID['appointment_date'] ?></h2>
		<h2>Service Type: <?php echo $getClientByID['service_type'] ?></h2>
		<h2>Date Added: <?php echo $getClientByID['date_added'] ?></h2>

		<div class="deleteBtn" style="float: right; margin-right: 10px;">
			<form action="core/handleForms.php?client_id=<?php echo $_GET['client_id']; ?>&barber_id=<?php echo $_GET['barber_id']; ?>" method="POST">
				<input type="submit" name="deleteClientBtn" value="Delete">
			</form>			
		</div>	
	</div>
</body>
</html>
