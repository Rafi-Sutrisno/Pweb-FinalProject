<?php
include("config.php");
$selectedType = $_GET['type'];
$selectedID = $_GET['idMovie'];

$query = "SELECT * FROM theatre WHERE T_Type = '$selectedType' AND Movies_M_ID='$selectedID'";
$result = mysqli_query($db, $query);

$divs = [];
while ($row = mysqli_fetch_assoc($result)) {
    // Depending on your data structure, construct the HTML divs
    $divs[] = '<div class="theatre p-2 w-100 text-start"><h4>' . $row['T_Name'] . '</h4></div>';
}

// Send the divs as JSON response
header('Content-Type: application/json');
echo json_encode($divs);
?>