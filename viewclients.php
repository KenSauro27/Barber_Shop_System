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
	<a href="index.php">Return to home</a>
	<?php $getBarberByID = getBarberByID($pdo, $_GET['barber_id']); ?>
	<h1>Barber: <?php echo $getBarberByID['name']; ?></h1>
	<h1>Add Your New Client</h1>
	<form action="core/handleForms.php?barber_id=<?php echo $_GET['barber_id']; ?>" method="POST">
		<p>
			<label for="name">Client Name</label> 
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
			<label for="appointment_date">Appointment Date</label> 
			<input type="date" name="appointment_date" required>
		</p>
		<p>
			<label for="service_type">Service Type</label> 
			<input type="text" name="service_type" required>
			<input type="submit" name="insertNewClientBtn">
		</p>
	</form>

	<table style="width:100%; margin-top: 50px;">
	  <tr>
	    <th>Client ID</th>
	    <th>Client Name</th>
	    <th>Phone Number</th>
	    <th>Email</th>
	    <th>Appointment Date</th>
	    <th>Service Type</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>
	  <?php $getClientsByBarber = getClientsByBarber($pdo, $_GET['barber_id']); ?>
	  <?php foreach ($getClientsByBarber as $row) { ?>
	  <tr>
	  	<td><?php echo $row['client_id']; ?></td>	  	
	  	<td><?php echo $row['client_name']; ?></td>	  	
	  	<td><?php echo $row['client_phone']; ?></td>	  	
	  	<td><?php echo $row['client_email']; ?></td>	  	
	  	<td><?php echo $row['appointment_date']; ?></td>	  	
	  	<td><?php echo $row['service_type']; ?></td>	  	
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="editclient.php?client_id=<?php echo $row['client_id']; ?>&barber_id=<?php echo $_GET['barber_id']; ?>">Edit</a>
	  		<a href="deleteclient.php?client_id=<?php echo $row['client_id']; ?>&barber_id=<?php echo $_GET['barber_id']; ?>">Delete</a>
	  	</td>	  	
	  </tr>
	<?php } ?>
	</table>
</body>
</html>
