<?php

// Connect to the database
$conn = new mysqli("mhacd.co", "u508226309_dana", "Danu_here.1", "u508226309_dana_db");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the JSON file
$json = file_get_contents("json_file.json");

// Decode the JSON into an array
$array = json_decode($json, true);

// Loop through the array
foreach ($array as $index => $item) {
    // Insert the item into the database
    $sql = "INSERT INTO words (id, word) VALUES ('$index', '$item')";
    $conn->query($sql);
}

// Close the connection
$conn->close();

?>
