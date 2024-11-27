<?php
// Database connection settings
$servername = "localhost"; // database host
$dbName = "hospital_db"; //database name
$username = "root"; // replace with your database username
$password = ""; // replace with your database password

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $doctor = htmlspecialchars($_POST['doctor']);
    $appointmentDate = htmlspecialchars($_POST['appointment-date']);
    $appointmentTime = htmlspecialchars($_POST['appointment-time']);

    // Validation (basic checks)
    if (empty($name) || empty($email) || empty($doctor) || empty($appointmentDate) || empty($appointmentTime)) {
        echo "All fields are required.";
        exit;
    }

    // Insert data into the database
    $sql = /*$conn->prepare*/("INSERT INTO appointments (name, email, doctor, appointment_date, appointment_time) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $doctor, $appointmentDate, $appointmentTime);

    /*if ($stmt->execute()) {
        echo "Appointment booked successfully.";*/
    if ($conn->query($sql) === TRUE) {
        echo "Appointment booked successfully.";
    } else {
        echo "There was a problem booking the appointment. Please try again later.";
    }

    if ($stmt === false) {
      die("Error preparing statement: " . $conn->error);
  }

  echo "Connected to database: " . $conn->host_info;


    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
