<?php
include("config.php");
$selectedType = $_GET['type'];
$selectedID = $_GET['idMovie'];
$get_status = $_GET['status_r'];
$selectedBioskop = $_GET['idBioskop'];
$selectedCity = $_GET['idCity'];

$query = null;

if($get_status == 'fromTheater'){
    $query = "SELECT * from theatre, bioskop, city where Bioskop_B_ID = B_ID and City_CI_ID = CI_ID and T_Type = '$selectedType' AND Movies_M_ID='$selectedID' and Bioskop_B_ID = '$selectedBioskop'";
} else if($get_status == 'fromAll'){
    $query = "SELECT * from theatre, bioskop, city where Bioskop_B_ID = B_ID and City_CI_ID = CI_ID and T_Type = '$selectedType' AND Movies_M_ID='$selectedID'";
} else if($get_status == 'fromCity'){
    $query = "SELECT * from theatre, bioskop, city where Bioskop_B_ID = B_ID and City_CI_ID = CI_ID and T_Type = '$selectedType' AND Movies_M_ID='$selectedID' and City_CI_ID = '$selectedCity'";
}

$result = mysqli_query($db, $query);

$divs = [];
while ($row = mysqli_fetch_assoc($result)) {
    
    $divs[] = '<div class="theatre p-2 w-100 text-start row">
                    <h5 class="col col-lg-3">' . $row['T_Name'] . '</h5>
                    <div class="col col-lg-3 d-flex flex-row gap-2">
                            <h5>' . $row['T_Type'] . ' - </h5>
                            <h5>Rp' . $row['T_Price'] . '</h5>
                    </div>
                    <h5 class="col col-lg-3">'.$row['B_Name'].'</h5>
                    <h5 class="col col-lg-3">'.$row['CI_Name'].'</h5>
               </div>';
    
}

header('Content-Type: application/json');
echo json_encode($divs);
?>