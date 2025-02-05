<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertBarberBtn'])) {
	if (!empty($_POST['name']) && !empty($_POST['phone_number']) && !empty($_POST['email']) && !empty($_POST['experience_years'])) {
		$query = insertBarber($pdo, $_POST['name'], $_POST['phone_number'], $_POST['email'], $_POST['experience_years']);

		if ($query) {
			header("Location: ../index.php");
		} else {
			echo "Insertion failed";
		}
	} else {
		echo "All fields are required.";
	}
}

if (isset($_POST['editBarberBtn'])) {
	if (!empty($_POST['name']) && !empty($_POST['phone_number']) && !empty($_POST['email']) && !empty($_POST['experience_years'])) {
		$query = updateBarber($pdo, $_POST['name'], $_POST['phone_number'], $_POST['email'], $_POST['experience_years'], $_GET['barber_id']);

		if ($query) {
			header("Location: ../index.php");
		} else {
			echo "Edit failed";
		}
	} else {
		echo "All fields are required.";
	}
}

if (isset($_POST['deleteBarberBtn'])) {
	$query = deleteBarber($pdo, $_GET['barber_id']);

	if ($query) {
		header("Location: ../index.php");
	} else {
		echo "Deletion failed";
	}
}

if (isset($_POST['insertNewClientBtn'])) {
	if (!empty($_POST['name']) && !empty($_POST['phone_number']) && !empty($_POST['email']) && !empty($_POST['appointment_date']) && !empty($_POST['service_type'])) {
		$query = insertClient($pdo, $_POST['name'], $_POST['phone_number'], $_POST['email'], $_POST['appointment_date'], $_POST['service_type'], $_GET['barber_id']);

		if ($query) {
			header("Location: ../viewclients.php?barber_id=" . $_GET['barber_id']);
		} else {
			echo "Insertion failed";
		}
	} else {
		echo "All fields are required.";
	}
}

if (isset($_POST['editClientBtn'])) {
	if (!empty($_POST['name']) && !empty($_POST['phone_number']) && !empty($_POST['email']) && !empty($_POST['appointment_date']) && !empty($_POST['service_type'])) {
		$query = updateClient($pdo, $_POST['name'], $_POST['phone_number'], $_POST['email'], $_POST['appointment_date'], $_POST['service_type'], $_GET['client_id']);

		if ($query) {
			header("Location: ../viewclients.php?barber_id=" . $_GET['barber_id']);
		} else {
			echo "Update failed";
		}
	} else {
		echo "All fields are required.";
	}
}

if (isset($_POST['deleteClientBtn'])) {
	$query = deleteClient($pdo, $_GET['client_id']);

	if ($query) {
		header("Location: ../viewclients.php?barber_id=" . $_GET['barber_id']);
	} else {
		echo "Deletion failed";
	}
}

?>
