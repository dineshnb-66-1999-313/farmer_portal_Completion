<?php
    require_once "../ComponentFolder/DataBaseConnectionForFarmerPortal.php";
    $address_id = $_POST['addressid'];

    $SelectaddressDetails = $pdo->prepare("SELECT * FROM farmer_user_address_table WHERE ID = :ID");
    $SelectaddressDetails -> execute(array(':ID' => $address_id));

    $address_array = array();
    while($FetchaddressDetails = $SelectaddressDetails->fetch(PDO::FETCH_ASSOC))
    {
        $address_array = array(
                            "phone_number" => $FetchaddressDetails['phone_number'],
                            "pin_code" => $FetchaddressDetails['pin_code'],
                            "country" => $FetchaddressDetails['country'],
                            "user_state" => $FetchaddressDetails['user_state'],
                            "user_city" => $FetchaddressDetails['user_city'],
                            "village" => $FetchaddressDetails['village'],
                            "house_number" => $FetchaddressDetails['house_number'],
                            "landmark" => $FetchaddressDetails['landmark'],
                            "ID" => $FetchaddressDetails['ID']);
    }
    echo json_encode($address_array);
?>