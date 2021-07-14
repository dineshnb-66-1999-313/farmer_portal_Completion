<?php
    session_start();
    error_reporting(0);
    require_once "../ComponentFolder/header.php";
    require_once "../ComponentFolder/ComponentForCropItems.php";
    $errormessage = '';
    $FARMER = 'FARMER';
    $PURCHASER = 'PURCHASER';
$random1 = substr(number_format(time() * rand(),0,'',''),0,8);

if(isset($_POST['submit']))
{
    $file = $_FILES['ProfileUploadFile'];                           $filename=$_FILES['ProfileUploadFile']['name'];
    $filetempname=$_FILES['ProfileUploadFile']['tmp_name'];         $filesize=$_FILES['ProfileUploadFile']['size'];
    $fileerror=$_FILES['ProfileUploadFile']['error'];               $filetype=$_FILES['ProfileUploadFile']['type'];

    $fileext=explode('.',$filename);
    $fileactualext = strtolower(end($fileext));
    $allowed=array('jpg','jpeg','png');

    if(in_array($fileactualext,$allowed))
    {
        if($fileerror===0)
        {
            if($filesize < (1*1024*1024))
            {
                $all_data_from_profile_data=$pdo->prepare("SELECT * FROM user_profile_information WHERE E_mail_id=:E_mail_id");
                $all_data_from_profile_data->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                $select_profile_image_row=$all_data_from_profile_data->fetch(PDO::FETCH_ASSOC);
                unlink($select_profile_image_row["Actual_profile_image"]);

                $email_given = $_SESSION['SecureLoginSession'];
                $email_split = explode('@',$email_given,2);
                $filenamenew="User_profile_".$email_split[0]."_".$random1.".".$fileactualext;
                $filedestination='../UploadUserProfile/'.$filenamenew;
                move_uploaded_file($filetempname,$filedestination);
                $sql123=$pdo->prepare("UPDATE user_profile_information SET Profile_Status = 'YES', Actual_profile_image=:profilename,
                                        date_of_profile_update_info = now() WHERE E_mail_id=:E_mail_id");
                $sql123->execute(array(':profilename' => $filedestination,':E_mail_id' => $_SESSION['SecureLoginSession']));
                $errormessage ='<label style="color:green;";><b>Profile updated successfully</b></label>';
            }
            else{
                $errormessage ='<label><b>file is too big</b></label>';
            }
        }
        else{
            $errormessage ='<label><b>There was an error in uploading the file</b></label>';
        }
    }
    else{
         $errormessage ='<label><b>You cannot upload files of this kind</b></label>';
    }
}

if(isset($_POST['RemoveProfileUser']))
{
    $selectimagequery=$pdo->prepare("SELECT * FROM user_profile_information WHERE E_mail_id=:E_mail_id");
    $selectimagequery->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
    $rowimage=$selectimagequery->fetch(PDO::FETCH_ASSOC);

    unlink($rowimage['Actual_profile_image']);
    $deleteimagequery=$pdo->prepare("UPDATE user_profile_information SET Profile_Status ='NO', Actual_profile_image=:profiledefaultimage, date_of_profile_update_info=now() WHERE E_mail_id=:E_mail_id");
    $deleteimagequery->execute(array(':profiledefaultimage' => $rowimage['Default_profile'],':E_mail_id' => $_SESSION['SecureLoginSession']));
    $errormessage ='<label style="color:green;";><b>Profile Removed successfully</b></label>';
}

if($_SESSION['SecureLoginSession'])
{
    if(isset($_POST['backtohomefromaddcrop']))
    {
        header('location: ../FarmerHomePageFolder/HomePageFarmerPortal.php');
    }
}
else{
    header("Location: ../");
}

if(isset($_POST['confirmandsaveaddressFarmer']))
{
    $firstnameaddress = $_POST['AddressFirstName'];
    $lastnameaddress = $_POST['AddressLastName'];
    $fullnameaddress = $_POST['AddressFullName'];
    $farmerusermobile = $_POST['farmer_Mobile'];
    $pincodeaddress = $_POST['addresspincode'];
    $countryaddress = $_POST['AddressCountry'];
    $stateaddress = $_POST['AddressState'];
    $cityaddress = $_POST['AddressCity'];
    $villageaddress = $_POST['addressvillageName'];
    $buildingnumber = $_POST['AddressHouseBuilding'];
    $landmarkaddress = $_POST['AddressLandmark'];


    if(preg_match("/^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$/",$farmerusermobile))
    {
        if($buildingnumber !== '')
        {
            if($landmarkaddress !== '')
            {  
                $selectcountofemail2 = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailuniqueforaddress FROM farmer_user_address_table WHERE E_mail_id = :E_mail_id");
                $selectcountofemail2->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                $fetchuniqueemailforaddress1 = $selectcountofemail2->fetch(PDO::FETCH_ASSOC);  
                
                if($_SESSION['LoginFarmerUserType'] === $FARMER)
                {
                    if($fetchuniqueemailforaddress1['emailuniqueforaddress'] == 0)
                    {
                        $insertaddress = $pdo->prepare("INSERT INTO farmer_user_address_table(first_name,last_name,full_name, E_mail_id,default_address,User_Type, phone_number, pin_code, country, user_state, user_city, village, house_number, landmark)
                            VALUES (:first_name,:last_name,:full_name, :E_mail_id, :default_address,:User_Type, :phone_number, :pin_code, :country, :user_state, :user_city, :village, :house_number, :landmark)");
                        $insertaddress ->execute(array(
                            'first_name' => $firstnameaddress,
                            ':last_name' => $lastnameaddress,
                            ':full_name' => '',
                            ':E_mail_id' => $_SESSION['SecureLoginSession'],
                            ':default_address' => 'DEFAULT',
                            ':User_Type' => $_SESSION['LoginFarmerUserType'],
                            ':phone_number' => $farmerusermobile, 
                            ':pin_code' => $pincodeaddress, 
                            ':country' => $countryaddress, 
                            ':user_state' =>  $stateaddress, 
                            ':user_city' => $cityaddress, 
                            ':village' => $villageaddress, 
                            ':house_number' => $buildingnumber, 
                            ':landmark' => $landmarkaddress
                        ));
                        echo '<script>swal("Address stored Successfully","","success")</script>';
                    }
                    else{
                        $insertaddress = $pdo->prepare("INSERT INTO farmer_user_address_table(first_name,last_name,full_name, E_mail_id,default_address,User_Type, phone_number, pin_code, country, user_state, user_city, village, house_number, landmark)
                            VALUES (:first_name,:last_name,:full_name, :E_mail_id, :default_address,:User_Type, :phone_number, :pin_code, :country, :user_state, :user_city, :village, :house_number, :landmark)");
                        $insertaddress ->execute(array(
                            'first_name' => $firstnameaddress,
                            ':last_name' => $lastnameaddress,
                            ':full_name' => '',
                            ':E_mail_id' => $_SESSION['SecureLoginSession'],
                            ':default_address' => '',
                            ':User_Type' => $_SESSION['LoginFarmerUserType'],
                            ':phone_number' => $farmerusermobile, 
                            ':pin_code' => $pincodeaddress, 
                            ':country' => $countryaddress, 
                            ':user_state' =>  $stateaddress, 
                            ':user_city' => $cityaddress, 
                            ':village' => $villageaddress, 
                            ':house_number' => $buildingnumber, 
                            ':landmark' => $landmarkaddress
                        ));
                        echo '<script>swal("Address stored Successfully","","success")</script>';
                    }
                    
                }
                else
                {
                    if($fetchuniqueemailforaddress1['emailuniqueforaddress'] == 0)
                    {
                        $insertaddress = $pdo->prepare("INSERT INTO farmer_user_address_table(first_name,last_name,full_name, E_mail_id, default_address,User_Type, phone_number, pin_code, country, user_state, user_city, village, house_number, landmark)
                                VALUES (:first_name,:last_name,:full_name, :E_mail_id, :default_address, :User_Type, :phone_number, :pin_code, :country, :user_state, :user_city, :village, :house_number, :landmark)");
                        $insertaddress ->execute(array(
                            'first_name' => '',
                            ':last_name' => '',
                            ':full_name' => $fullnameaddress,
                            ':E_mail_id' => $_SESSION['SecureLoginSession'],
                            ':default_address' => 'DEFAULT',
                            ':User_Type' => $_SESSION['LoginFarmerUserType'],
                            ':phone_number' => $farmerusermobile,
                            ':pin_code' => $pincodeaddress, 
                            ':country' => $countryaddress, 
                            ':user_state' =>  $stateaddress, 
                            ':user_city' => $cityaddress, 
                            ':village' => $villageaddress, 
                            ':house_number' => $buildingnumber, 
                            ':landmark' => $landmarkaddress
                        ));
                        echo '<script>swal("Address stored Successfully","","success")</script>';
                    }
                    else{
                        $insertaddress = $pdo->prepare("INSERT INTO farmer_user_address_table(first_name,last_name,full_name, E_mail_id, default_address,User_Type, phone_number, pin_code, country, user_state, user_city, village, house_number, landmark)
                                VALUES (:first_name,:last_name,:full_name, :E_mail_id, :default_address, :User_Type, :phone_number, :pin_code, :country, :user_state, :user_city, :village, :house_number, :landmark)");
                        $insertaddress ->execute(array(
                            'first_name' => '',
                            ':last_name' => '',
                            ':full_name' => $fullnameaddress,
                            ':E_mail_id' => $_SESSION['SecureLoginSession'],
                            ':default_address' => '',
                            ':User_Type' => $_SESSION['LoginFarmerUserType'],
                            ':phone_number' => $farmerusermobile,
                            ':pin_code' => $pincodeaddress, 
                            ':country' => $countryaddress, 
                            ':user_state' =>  $stateaddress, 
                            ':user_city' => $cityaddress, 
                            ':village' => $villageaddress, 
                            ':house_number' => $buildingnumber, 
                            ':landmark' => $landmarkaddress
                        ));
                        echo '<script>swal("Address stored Successfully","","success")</script>';
                    }
                }
            }
            else{
                $message ='<label><b>Please Enter the landmark</b></label>';
            }
        }
        else{
            $message ='<label><b>Please Enter the House Number</b></label>';
        }
    }
    else{
        $message ='<label><b>Please Enter 10 Digit Phone number</b></label>';
    }
}

if(isset($_POST['edit_crop_detail_submit']))
{
    $addressID = $_POST['edit_address_id'];
    $farmerusermobile = $_POST['farmer_Mobile'];
    $pincodeaddress = $_POST['addresspincode'];
    $countryaddress = $_POST['AddressCountry'];
    $stateaddress = $_POST['AddressState'];
    $cityaddress = $_POST['AddressCity'];
    $villageaddress = $_POST['addressvillageName'];
    $buildingnumber = $_POST['AddressHouseBuilding'];
    $landmarkaddress = $_POST['AddressLandmark'];

    if(preg_match("/^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$/",$farmerusermobile))
    {
        $insertaddress = $pdo->prepare("UPDATE farmer_user_address_table SET phone_number = :phone_number,pin_code = :pin_code, country = :country, user_state = :user_state, user_city = :user_city, village = :village, house_number = :house_number, landmark = :landmark WHERE ID = :ID ");
        $insertaddress ->execute(array(':ID' => $addressID,
            ':phone_number' => $farmerusermobile,
            ':pin_code' => $pincodeaddress, 
            ':country' => $countryaddress, 
            ':user_state' =>  $stateaddress, 
            ':user_city' => $cityaddress, 
            ':village' => $villageaddress, 
            ':house_number' => $buildingnumber, 
            ':landmark' => $landmarkaddress
        ));
        echo '<script>swal("Address stored Successfully","","success")</script>';
    }
    else
    {
        $message ='<label><b>Please Enter 10 Digit Phone number</b></label>';
    }
}

if(isset($_POST['close_modal'])){
    header("header: profileAndPersonalInformation.php");
}

if(isset($_POST['make_default']))
{
    $default_delete_all = $pdo->prepare("SELECT * FROM farmer_user_address_table WHERE E_mail_id = :E_mail_id");
    $default_delete_all->execute(array(':E_mail_id'=>$_SESSION['SecureLoginSession']));
    while($delete_all_address = $default_delete_all->fetch(PDO::FETCH_ASSOC)){
        $update_default= $pdo->prepare("UPDATE farmer_user_address_table SET default_address ='' WHERE E_mail_id= :E_mail_id");
        $update_default ->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
    }
    $update_default_one= $pdo->prepare("UPDATE farmer_user_address_table SET default_address = :default_address WHERE E_mail_id= :E_mail_id AND ID = :ID");
    $update_default_one ->execute(array('ID' => $_POST['default_id'],':default_address' => 'DEFAULT',':E_mail_id' => $_SESSION['SecureLoginSession']));
    echo '<script>swal("Default Address Changed","","success");</script>';

}

if(isset($_POST['DeleteaddressData']))
{
    $deleteaddressId = $_POST['deleteaddressname'];

    $deleteperticaularaddress = $pdo->prepare("DELETE FROM farmer_user_address_table WHERE ID=:ID");
    $deleteperticaularaddress->execute(array(':ID' => $deleteaddressId));
    echo '<script>swal("Address Deleted Successfully","","success")</script>';
}

?>
<style>
    body {
        background: url("https://i.pinimg.com/originals/2b/c9/70/2bc97013f49592c6d7d095ab5407d3bf.jpg");
        font-family: "roboto";
    }
    #confirm_status{
        position: absolute;
        top: 3rem;
        left: 20.3rem;
        font-size: 2.5rem;
    }
    .img-fluid{
        max-width:17rem;
        height:17rem;
        border:2px solid #000;
        margin-left: 0rem;
        padding: 1.4rem;
    }
    #main_row1{
        margin-inline: auto;
    }
    #main_row2{
        margin-inline: auto;
        display:none;
    }
    #main_div_center{
        margin-inline: auto;
    }
    .form-control{
        padding: 0.5rem 0.7em;
    }
    .form-control-lg{
        max-width: -webkit-fill-available;
    }
    #message{
        color:red;
        font-size:18px;
    }
    #adrress_center{
        margin-inline: auto;
    }
    #myid{
        margin-top:15rem;
        background: transparent;
        z-index: 1;
        display: none;
    }
    .edit{
        width:50px;
        height:30px;
        position:absolute;
        background:transparent;
        top:5%;
        left:88%;
        display:block;
    }
    .edit i{
        cursor:pointer;
        color:orange;
    }
    #edit_inside_personal_data:hover{
        cursor:pointer;
    }
    #edit_form_personal_data{
        display:none;
        padding:10px;
        top:15px;
        left:15%;
        position:absolute;
        color:#fff;
    }
    #edit_id{
        line-height:5rem;
    }
    #edit_profile{
        cursor:pointer;
    }
    .nav-pills-custom .nav-link {
        color: #aaa;
        background: #fff;
        position: relative;
    }

    .nav-pills-custom .nav-link.active {
        color: blue;
        background: #fff;
    }
    
    .nav-pills .nav-link {
        border-radius: 0rem;
    }


    /* Add indicator arrow for the active tab */
    @media (min-width: 992px) {
        .nav-pills-custom .nav-link::before {
            content: '';
            display: block;
            border-top: 8px solid transparent;
            border-left: 10px solid #fff;
            border-bottom: 8px solid transparent;
            position: absolute;
            top: 50%;
            right: -10px;
            transform: translateY(-50%);
            opacity: 0;
        }
    }

    .nav-pills-custom .nav-link.active::before {
        opacity: 1;
    }    
</style>
<body>
<?php
    nav_bar_profile();
?> 
<!-- profile_remove model starts -->
    <div class="modal fade" id="profile_remove" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:10%;";>        
        <div class="modal-dialog">
            <div class="modal-content" style="border:3px solid red";>
            <div class="modal-header">
                <h3 class="modal-title text-danger" id="exampleModalLabel">Profile Image</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pl-3">
                <h4 class="ml-4">Are you sure You want to Remove Profile Image</h4>
            </div>
            <div class="modal-footer">
                <form method="post">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="RemoveProfileUser">Remove</button>
                </form>
            </div>
            </div>
        </div>
    </div>
<!-- profile_remove model ends -->


<!-- delete address modal starts -->
    <div class="modal fade" id="deleteaddressmodel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletecropmodal_text">Delete Address</h5>
                </div>
                <form method="post">
                    <div class="modal-body">
                        <h4>Are you sure You want to Delete the Address</h4>
                        <input type="hidden" name="deleteaddressname" id="deleteaddressId">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger" name="DeleteaddressData">Delete Address</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- delete address modal ends-->

<div class="container-fluid" style="width: 100%;">
    <?php
        require_once "../FarmerHomePageFolder/loaderclass.php";
    ?>
    <div class="row" style="margin-top: 6rem !important">
        <div class="col-md-3">
            <form method="post">
                <button class="btn btn-primary btn-md" name="backtohomefromaddcrop"><i class="fa fa-arrow-left mr-3 text-danger"></i>Back To Home</button>
            </form>
        </div>
        
        <!----------------------------- horizantal tabs starts -------------------------- -->
        <?php
        if(isset($_SESSION['SecureLoginSession']))
        {
            echo '<div class="row" style="margin:0px;padding:0px;">
                    <div class="col-12 col-sm-4 col-md-3 col-lg-3">
                        <div class="nav flex-column nav-pills nav-pills-custom" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link mb-3 p-3 shadow active" id="v-pills-home-tab" data-toggle="pill" href="#ProfileFarmerOrUser" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class="fa fa-user mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Profile Info</span></a>

                            <a class="nav-link mb-3 p-3 shadow" id="v-pills-profile-tab" data-toggle="pill" href="#AddressSection" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                <span class="font-weight-bold small text-uppercase">Address</span></a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 justify-content-center align-items-center" id="main_div_center" style="margin:0px;">
                        <div class="tab-content" id="v-pills-tabContent">';
                        # profile section starts
                            echo '<div class="tab-pane fade shadow active bg-white show pt-3 pb-3" id="ProfileFarmerOrUser" role="tabpanel" aria-labelledby="v-pills-home-tab">';
                                    $SqlUserProfileSelection=$pdo->prepare("SELECT * FROM user_profile_information WHERE E_mail_id=:E_mail_id");
                                    $SqlUserProfileSelection->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                    $FetchUserProfile=$SqlUserProfileSelection->fetch(PDO::FETCH_ASSOC);

                                    $SqlFarmerProfileSelection=$pdo->prepare("SELECT * FROM sign_up_farmer_information WHERE E_mail_id=:E_mail_id");
                                    $SqlFarmerProfileSelection->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                    $FetchFarmerProfile=$SqlFarmerProfileSelection->fetch(PDO::FETCH_ASSOC);

                                    echo '<div class="col-12 col-sm-12 col-md-8 col-lg-8 justify-content-center align-items-center" id="main_div_center">
                                            <div class="row">
                                                    <div class="card">
                                                        <div class="card-header bg-info">';
                                                            if($_SESSION['LoginFarmerUserType'] !== 'FARMER')
                                                            {
                                                                echo '<span class ="mr-5 text-center" id="message">'.$errormessage.'</span>
                                                                <div class="float-right">
                                                                    <i onclick=myfunction() id="edit_profile" class="fa fa-pencil fa-2x mr-3"></i>
                                                                </div>';
                                                            }
                                                            else{
                                                                echo '<div class="row text-center text-danger"><h5>Farmer Cannot Edit The Profile Picture</h5></div>';
                                                            }
                                                        echo '</div>';
                                                        
                                                    echo '<div class="card-body pt-2 pb-2" style="background:transparent;">
                                                            <div class="row justify-content-center justify-content-md-center">';
                                                                if($_SESSION['LoginFarmerUserType'] === 'FARMER'){
                                                                    echo '<img class="img-fluid" src="'.$FetchFarmerProfile["profile_picture"].'" style="border-radius:50%;">';
                                                                }
                                                                else{
                                                                    if($FetchUserProfile["Profile_Status"] == "YES")
                                                                    {
                                                                        echo '<img class="img-fluid card-img-top mr-3" src="'.$FetchUserProfile["Actual_profile_image"].'" style="border-radius:50%;">';
                                                                    }
                                                                    else{
                                                                        echo '<img class="img-fluid card-img-top mr-3" src="'.$FetchUserProfile["Actual_profile_image"].'" style="border-radius:50%;">';
                                                                    }
                                                                }
                                                            echo '</div>';
                                                    echo '</div>';

                                                        echo '<div class="card-footer" id="edit_item_show" style="display:none;">
                                                                <form method="post" enctype="multipart/form-data">
                                                                
                                                                    <div class="col-lg-12" id="adrress_center">
                                                                        <input type="file" name="ProfileUploadFile" class="form-control form-control-lg">
                                                                    </div>
    
                                                                    <div class="row">';
                                                                        if($FetchUserProfile['Profile_Status'] == "YES")
                                                                        {
                                                                            echo '<div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                                                    <button class="btn btn-warning btn-lg mt-4 btn-block" style="padding-right:-1rem;"; type="submit" name="submit"><i class="fa fa-upload text-success mr-2"></i>Upload</button>
                                                                                </div>';
                                                                            echo '<div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                                                                    <button type="button" class="btn btn-danger btn-lg mt-4 btn-block" data-bs-toggle="modal" data-bs-target="#profile_remove"><i class="fa fa-trash-o fa-lg text-light mr-2"></i>Remove </button>
                                                                                </div>';
                                                                        }
                                                                        else{
                                                                            echo '<div class="col-lg-12" style="width: 105%;padding-right: 8px;padding-left: 6px;">
                                                                                    <button class="btn btn-warning btn-lg mt-4 btn-block" style="padding-right:-1rem;"; type="submit" name="submit"><i class="fa fa-upload text-success mr-2"></i>Upload</button>
                                                                                </div>';
                                                                        }
                                                                echo '</div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                        </div>';
                                echo '</div>';
                        // profile section ends

                        // address section starts

                            echo '<div class="tab-pane fade shadow show bg-white" id="AddressSection" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="col-12 col-md-10 justify-content-center align-items-center bg-white p-2" id="main_div_center">';
                                    if(isset($message)){
                                        echo '<div class="alert alert-danger col-12 col-sm-12 col-md-12 col-lg-12 text-center" id="address_center" role="alert"><span>'.$message.'</span></div>';
                                    }
                                        // buy the crop befor add the address message
                                        $selectExistemailaddress=$pdo->prepare("SELECT COUNT(E_mail_id) AS emailuniqueforaddaddress FROM farmer_user_address_table WHERE E_mail_id = :E_mail_id");
                                        $selectExistemailaddress->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                        $fetch_unique_email_address = $selectExistemailaddress ->fetch(PDO::FETCH_ASSOC);

                                        if($fetch_unique_email_address['emailuniqueforaddaddress'] < 1)
                                        {
                                            if(isset($_SESSION['Add_address']))
                                            {
                                                echo '<div class="alert alert-danger col-12 col-sm-12 col-md-12 col-lg-12 text-center" id="address_center" role="alert"><span>'.$_SESSION['Add_address'].'</span></div>';
                                            }
                                            else{
                                                echo '';
                                            }
                                        }
                                        else{
                                            echo '';
                                        }
                                        // buy the crop befor add the address message
                                        
                                        $selectcountofemail1 = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailuniqueforaddress FROM farmer_user_address_table WHERE E_mail_id = :E_mail_id");
                                        $selectcountofemail1->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                        $fetchuniqueemailforaddress = $selectcountofemail1->fetch(PDO::FETCH_ASSOC);  
                                    if($fetchuniqueemailforaddress['emailuniqueforaddress'] == 0)
                                    {     
                                        $selectusertypefarmer1 = $pdo->prepare("SELECT * FROM sign_up_farmer_information WHERE E_mail_id = :E_mail_id");
                                        $selectusertypefarmer1->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                        $fetchFarmerDetails = $selectusertypefarmer1->fetch(PDO::FETCH_ASSOC);

                                        $selectuserTypeUser1 = $pdo->prepare("SELECT * FROM sign_up_user_information WHERE E_mail_id = :E_mail_id");
                                        $selectuserTypeUser1->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                        $fetchUserDetails = $selectuserTypeUser1->fetch(PDO::FETCH_ASSOC);

                                        add_address_user_farmer_one($fetchFarmerDetails['first_name'], $fetchFarmerDetails['last_name'], $fetchUserDetails['full_name'], $fetchFarmerDetails['phone_number'],$fetchUserDetails['phone_number'],$fetchuniqueemailforaddress['emailuniqueforaddress']);
                                    }
                                    else{
                                        $only_three_address = $pdo->prepare("SELECT COUNT(E_mail_id) AS email_id_three_more FROM farmer_user_address_table WHERE E_mail_id =:E_mail_id");
                                        $only_three_address ->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                        $fetch_email = $only_three_address->fetch(PDO::FETCH_ASSOC);
                                        if($fetch_email['email_id_three_more'] < 3){
                                            echo '<div class="col-12 col-sm-12 col-md-10 col-lg-10 mb-3 rounded" id="adrress_center">
                                                    <button type="button" class="btn btn-primary btn-lg btn-block" id="addressaddfarmeruser" data-bs-toggle="modal" data-bs-target="#add_or_edit_address" data-bs-backdrop="static" data-bs-keyboard="false" data-bs-toggle="modal"><i class="fa fa-plus-circle pr-2"></i> Add Address</button>
                                                </div>';
                                        }
                                            echo '<div class="col-12 col-sm-12 col-md-10 col-lg-12 rounded" id="adrress_center">
                                                    <div class="row">';
                                                    $select_user_address = $pdo->prepare("SELECT * FROM farmer_user_address_table WHERE E_mail_id=:E_mail_id");
                                                    $select_user_address->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                                                    while($fetch_user_and_farmer = $select_user_address->fetch(PDO::FETCH_ASSOC))
                                                    { 
                                                        list_of_address_in_profile($fetch_user_and_farmer['ID'],$fetch_user_and_farmer['first_name'],$fetch_user_and_farmer['last_name'],$fetch_user_and_farmer['full_name'],$fetch_user_and_farmer['phone_number'],
                                                                        $fetch_user_and_farmer['pin_code'],$fetch_user_and_farmer['country'],$fetch_user_and_farmer['user_state'],$fetch_user_and_farmer['user_city'],$fetch_user_and_farmer['village'],
                                                                        $fetch_user_and_farmer['house_number'],$fetch_user_and_farmer['landmark'], $fetch_user_and_farmer['default_address']);
                                                    }
                                                echo '</div>
                                            </div>';
                                    }
                                echo '</div>
                                </div>';
                        // address section ends
                    echo '</div>
                    </div>
            </div>';
        }
        ?>
        <!----------------------------- horizantal tabs ends -------------------------- -->
    </div>
</div>

<!-- add more address model starts-->
<div class="modal fade" id="add_or_edit_address" tabindex="-1" aria-labelledby="editaddress_text" aria-hidden="true" style="max-width:100%;">
    <div class="modal-dialog">
        <div class="modal-content" style="border:3px solid green;">
            <div class="modal-header">
                <h3 class="modal-title" id="editaddress_text"></h3>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 col-md-12 col-lg-12 bg-white pt-3 pl-3 pr-3 pb-1 rounded" id="adrress_center">
                    <?php
                        $selectusertypefarmer1 = $pdo->prepare("SELECT * FROM sign_up_farmer_information WHERE E_mail_id = :E_mail_id");
                        $selectusertypefarmer1->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                        $fetchFarmerDetails = $selectusertypefarmer1->fetch(PDO::FETCH_ASSOC);

                        $selectuserTypeUser1 = $pdo->prepare("SELECT * FROM sign_up_user_information WHERE E_mail_id = :E_mail_id");
                        $selectuserTypeUser1->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                        $fetchUserDetails = $selectuserTypeUser1->fetch(PDO::FETCH_ASSOC);

                        $selectcountofemail1 = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailuniqueforaddress FROM farmer_user_address_table WHERE E_mail_id = :E_mail_id");
                        $selectcountofemail1->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                        $fetchuniqueemailforaddress = $selectcountofemail1->fetch(PDO::FETCH_ASSOC);
                        add_address_user_farmer_one($fetchFarmerDetails['first_name'], $fetchFarmerDetails['last_name'], $fetchUserDetails['full_name'], $fetchFarmerDetails['phone_number'],$fetchUserDetails['phone_number'],$fetchuniqueemailforaddress['emailuniqueforaddress']);
                    ?>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- add more address model ends-->

<?php
    require_once "../ComponentFolder/FooterFarmerPortal.php";
?>
<script src="custom.js"></script>
<script>
    $('#pincodeaddress').focusout(function(){ //focusout == when i click out side the input box
        var pincodeaddressid = $('#pincodeaddress').val();
        console.log(pincodeaddressid);
        if(pincodeaddressid == '' || pincodeaddressid.length <6){
            jQuery('#addressstate').val('');
            jQuery('#addresscity').val('');
            jQuery('#addresscountry').val('');
            $('#villageName').empty();
            $('#pincodeerror').text('Please Enter 6 Digit Pin Code');
            $('#pincodeaddress').css('border',"3px dashed red");
        }
        else{
            jQuery.ajax({
                type: "post",
                url: "GetStateAndCity.php",
                data: {pincode:pincodeaddressid},
                success: function (response) {
                    if(response=='no'){
                        jQuery('#addressstate').val('');
                        jQuery('#addresscity').val('');
                        jQuery('#addresscountry').val('');
                        $('#villageName').empty();
                        $('#pincodeerror').text('Incorrect Pin Code');
                        $('#pincodeaddress').css('border',"3px dashed red");
                    }
                    else{
                        var getdata = $.parseJSON(response);
                        $('#pincodeerror').text(' ');
                        $('#pincodeaddress').css('border',"3px dashed green");
                        jQuery('#addressstate').val(getdata[0][0].State);
                        jQuery('#addresscity').val(getdata[0][0].Taluk);
                        jQuery('#addresscountry').val(getdata[0][0].Country);
                        $('#villageName').empty();
                        for(var i=0;i<getdata[0].length;i++){
                            console.log(getdata[0][i].Name);
                            $('#villageName').append("<option value='"+getdata[0][i].Name+"'>"+getdata[0][i].Name+"</option>");
                        }
                    }
                }
            });
        }
    });
    // delete address ajax starts
    $(document).on('click','#deleteaddressid',function (e) {
            e.preventDefault();
            var delete_address_id = $(this).val();
            $('#deleteaddressId').val(delete_address_id);
    });
    //delete address ajax ends

    $(document).on('click','#closeaddressbuttonadd',function()
    {
        $("#editaddress_text").text('');
        $('#villageName').empty();
        $('form').trigger('reset');
        $('#addaddressfarmeruser').remove();
        $('#closeaddressbuttonadd').remove();
    });
    
    $(document).on('click','#closeaddressbuttonedit',function()
    {
        $("#editaddress_text").text('');
        $('#villageName').empty();
        $('form').trigger('reset');
        $('#edit_crop_detail_submit').remove();
        $('#closeaddressbuttonedit').remove();
        $('#editaddressfarmeruserid').remove();
    });

    $(document).on('click','#addressaddfarmeruser',function(){
        $("#editaddress_text").text('Add Address');
        var button_close = "<button type='button' id='closeaddressbuttonadd' class='btn btn-secondary btn-lg btn-block' data-bs-dismiss='modal'>Close</button>";
        $(button_close).appendTo('#closeaddressandreset');
        var button_add = "<button type='submit' class='btn btn-primary btn-lg btn-block' id='addaddressfarmeruser' name='confirmandsaveaddressFarmer'>Save Address</button>";
        $(button_add).appendTo('#addaddressbutton');
    });
    
    $(document).on('click','#editaddressid',function (e) {
            e.preventDefault();
            var editaddressid = $(this).val();
            $.ajax({
                type: "post",
                url: "editaddressfarmeruser.php",
                data: {addressid: editaddressid},
                dataType: "JSON",
                success: function (response) {
                    if(response){
                        $("#editaddress_text").text('Edit Address');
                        $('#farmer_Mobile').val(response.phone_number);
                        $('#pincodeaddress').val(response.pin_code);
                        $('#addresscountry').val(response.country);
                        $('#addressstate').val(response.user_state);
                        $('#addresscity').val(response.user_city);
                        $('#villageName').val(response.village);
                        $('#house_number').val(response.house_number);
                        $('#landmark').val(response.landmark);
                        var input_hidden = "<input type='hidden' id='editaddressfarmeruserid' name='edit_address_id' value='"+response.ID+"' >";
                        $(input_hidden).appendTo('form#formforaddressedit');
                        $('#add_crop_item').remove();
                        var button_close = "<button type='button' id='closeaddressbuttonedit' class='btn btn-secondary btn-lg btn-block' data-dismiss='modal'>Close</button>";
                        $(button_close).appendTo('#closeaddressandreset');
                        var button_edit = "<button type='submit' class='btn btn-primary btn-lg btn-block' id='edit_crop_detail_submit' name='edit_crop_detail_submit'>Update Address</button>";
                        $(button_edit).appendTo('#addaddressbutton');
                    }
                }
            });
        });

    var url = document.location.tostring();
    if(url.match('#')){
        $('.nav-pills a[href="#' + url.split('#')[1]+ '"]').tab('show');
    }
    $('.nav-pills a').on('show.bs.tab',function(e){
        window.location.hash = e.target.hash;
    });

</script>

<script>

    function validationpnumber()
    {
        var createnumber=document.getElementById('farmer_Mobile').value;
        var numberpattren=/^(\+91[\-\s]?)?[0]?(91)?[6789]\d{9}$/;
            if(numberpattren.test(createnumber)){
                document.getElementById("errorphonenumber").textContent = " ";
                document.getElementById('farmer_Mobile').style.border='3px dashed green';
            }
            else{
                document.getElementById("errorphonenumber").textContent = "Please Enter 10 Digit Phone Number";
                document.getElementById('farmer_Mobile').style.border='3px dashed red';
            }
    }
    
    function myfunction() {
        document.getElementById("edit_profile").style.display = "none";
        document.getElementById("edit_item_show").style.display = "block";
    }
    function myfunction2() {
        document.getElementById("edit_inside_personal_data").style.display="none";
        document.getElementById("main_row1").style.display="none";
        document.getElementById("main_row2").style.display="block";
    }


    // window.addEventListener("load",function(){
    // const loader=document.querySelector(".loaderclass");
    // console.log(loader);
    // loader.className += " hidden";
    // });
</script>
</body>
</html>