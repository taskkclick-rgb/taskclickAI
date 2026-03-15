<?php
require_once('../config/database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        die("Please fill all fields.");
    }

    // Hash password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Calculate trial dates
    $trial_start = date('Y-m-d H:i:s');
    $trial_end = date('Y-m-d H:i:s', strtotime('+30 days'));

    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password_hash, trial_start, trial_end) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $password_hash, $trial_start, $trial_end]);

        // Start session and redirect to dashboard
        session_start();
        $_SESSION['user_id'] = $pdo->lastInsertId();
        $_SESSION['user_name'] = $name;

        header("Location: ../dashboard.php");
        exit();
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) {
            die("Email already exists.");
        }
        die("Error: " . $e->getMessage());
    }
}
?>
