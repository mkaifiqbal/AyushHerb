<?php
header('Content-Type: application/json');

$conn = new mysqli("localhost", "root", "", "ayush_herb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM herbs";
$result = $conn->query($sql);

$herbs = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if (!empty($row['image'])) {
            $row['image'] = "../assets/" . $row['image'];
        }

        if (!empty($row['img1'])) {
            $row['img1'] = "../assets/" . $row['img1'];
        }
        if (!empty($row['img2'])) {
            $row['img2'] = "../assets/" . $row['img2'];
        }
        if (!empty($row['img3'])) {
            $row['img3'] = "../assets/" . $row['img3'];
        }

        if (!empty($row['audio_url'])) {
            $row['audio_url'] = "audio/" . $row['audio_url'];
        }


        $herbs[] = $row;
    }
}

echo json_encode($herbs);
$conn->close();
?>
