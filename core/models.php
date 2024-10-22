<?php  

function insertBarber($pdo, $name, $phone_number, $email, $experience_years) {

	$sql = "INSERT INTO barbers (name, phone_number, email, experience_years) VALUES(?,?,?,?)";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$name, $phone_number, $email, $experience_years]);

	if ($executeQuery) {
		return true;
	}
}

function updateBarber($pdo, $name, $phone_number, $email, $experience_years, $barber_id) {

	$sql = "UPDATE barbers
				SET name = ?,
					phone_number = ?,
					email = ?, 
					experience_years = ?
				WHERE barber_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$name, $phone_number, $email, $experience_years, $barber_id]);
	
	if ($executeQuery) {
		return true;
	}

}

function deleteBarber($pdo, $barber_id) {
	$deleteBarberClients = "DELETE FROM clients WHERE barber_id = ?";
	$deleteStmt = $pdo->prepare($deleteBarberClients);
	$executeDeleteQuery = $deleteStmt->execute([$barber_id]);

	if ($executeDeleteQuery) {
		$sql = "DELETE FROM barbers WHERE barber_id = ?";
		$stmt = $pdo->prepare($sql);
		$executeQuery = $stmt->execute([$barber_id]);

		if ($executeQuery) {
			return true;
		}

	}
	
}

function getAllBarbers($pdo) {
	$sql = "SELECT * FROM barbers";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();

	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getBarberByID($pdo, $barber_id) {
	$sql = "SELECT * FROM barbers WHERE barber_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$barber_id]);

	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function getClientsByBarber($pdo, $barber_id) {
	
	$sql = "SELECT 
				clients.client_id AS client_id,
				clients.name AS client_name,
				clients.phone_number AS client_phone,
				clients.email AS client_email,
				clients.appointment_date AS appointment_date,
				clients.service_type AS service_type,
				clients.date_added AS date_added,
				barbers.name AS barber_name
			FROM clients
			JOIN barbers ON clients.barber_id = barbers.barber_id
			WHERE clients.barber_id = ? 
			GROUP BY clients.name;
			";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$barber_id]);
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function insertClient($pdo, $name, $phone_number, $email, $appointment_date, $service_type, $barber_id) {
	$sql = "INSERT INTO clients (name, phone_number, email, appointment_date, service_type, barber_id) VALUES (?,?,?,?,?,?)";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$name, $phone_number, $email, $appointment_date, $service_type, $barber_id]);
	if ($executeQuery) {
		return true;
	}

}

function getClientByID($pdo, $client_id) {
	$sql = "SELECT 
				clients.client_id AS client_id,
				clients.name AS client_name,
				clients.phone_number AS client_phone,
				clients.email AS client_email,
				clients.appointment_date AS appointment_date,
				clients.service_type AS service_type,
				clients.date_added AS date_added,
				barbers.name AS barber_name
			FROM clients
			JOIN barbers ON clients.barber_id = barbers.barber_id
			WHERE clients.client_id  = ? 
			GROUP BY clients.name";

	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_id]);
	if ($executeQuery) {
		return $stmt->fetch();
	}
}

function updateClient($pdo, $name, $phone_number, $email, $appointment_date, $service_type, $client_id) {
	$sql = "UPDATE clients
			SET name = ?,
				phone_number = ?,
				email = ?,
				appointment_date = ?,
				service_type = ?
			WHERE client_id = ?
			";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$name, $phone_number, $email, $appointment_date, $service_type, $client_id]);

	if ($executeQuery) {
		return true;
	}
}

function deleteClient($pdo, $client_id) {
	$sql = "DELETE FROM clients WHERE client_id = ?";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute([$client_id]);
	if ($executeQuery) {
		return true;
	}
}

?>
