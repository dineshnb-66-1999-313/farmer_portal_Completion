<?php
    session_start();
    require_once "../ComponentFolder/header.php";
    require_once "../ComponentFolder/ComponentForCropItems.php";
    $crop_Approved = 'APPROVED';
    $crop_vegetable = 'Vegetable';
    $crop_fruits = 'Fruits';
    $crop_millets = 'Millets';
    $crop_foodGrains = 'FoodGrains';
    $farmer_user = 'FARMER';

    if(isset($_SESSION['SecureLoginSession']))
    {
        if(isset($_POST['view_crop_detail'])){
            $_SESSION['View_Crop_Id'] = $_POST['crop_view_detailes'];
            header('Location: CropViewPageDetails.php');
        }
    }
    else{
        header("Location: ../");
    }
    
    if(isset($_POST['MoveToLoginPage'])){
        header('location: ../SignUpAndLoginFolder/LoginPageFarmerPortal.php');
    }
    if(isset($_POST['MoveToSignUpPageFarmer'])){
        header('location: ../SignUpAndLoginFolder/BasicDetailSignUp.php');
    }
    if(isset($_POST['MoveToSignUpPageUser'])){
        header('location: ../SignUpAndLoginFolder/SignUpUser.php');
    }

?>

<?php
    if(isset($_SESSION['SecureLoginSession'])){
        nav_bar_home();
    }
    else{
        nav_bar_default();
    }
?>

<style>
    body {
        background: url("https://i.pinimg.com/originals/2b/c9/70/2bc97013f49592c6d7d095ab5407d3bf.jpg");
        font-family: "roboto";
    }
    .nav-tabs{
        overflow-x: auto;
        overflow-y:hidden;
        flex-wrap: nowrap;
    }
    .form-control-md{
        max-width: -webkit-fill-available;
    }
    .form-control-lg{
        max-width: -webkit-fill-available;
    }
    .nav-tabs .nav-item{
        white-space: nowrap;
    }
    .sidenav {
        height: 100%;
        width: 257px;
        position: fixed;
        z-index: 1111;
        background: #042331;
        top: 0;
        left: -257px;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 21px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 60px;
    }

    @media screen and (max-height: 450px) {
    .sidenav {
        padding-top: 15px;
    }
    .sidenav a {
        font-size: 18px;
    }
    }
    #closebtn {
        color: red;
        top: -1%;
        position: absolute;
        left: 53%;
        font-size: 2rem;
    }
    .profile_img {
        width: 68%;
        height: 21%;
        border-radius: 50%;
        position: absolute;
        top: 2%;
        left: 12%;
        border: 1px solid #fff;
    }
    .profile_img1 {
        width: 68%;
        height: 21%;
        border-radius: 50%;
        position: absolute;
        top: 2%;
        left: 12%;
    }
    .list {
    /* background: green; */
        top: 25%;
        position: absolute;
        border-top: 3px solid green;
        width: 104%;
        left: -5%;
    }
    .list ul {
        display: block;
        width: 120%;
        height: 10%;
        line-height: 70px;
        font-size: 17px;
        color: #fff;
        box-sizing: border-box;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        border-bottom: 1px solid #000;
        transition: 0.4s;
        padding-right: 20%;
    }
    .list li {
        left: -10%;
        position: relative;
        text-decoration: none;
    }
    .list ul a {
        display: block;
        width: 110%;
        line-height: 60px;
        font-size: 17px;
        color: #fff;
        padding-right: 49px;
        box-sizing: border-box;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        border-bottom: 1px solid #000;
        transition: 0.7s;
    }
    .list ul a i {
        color: greenyellow;
    }
    .list ul li a:hover {
        background: #818ebc;
        text-decoration: none;
        color: #1ef707;
        border-radius: 0 50px 50px 0;
    }
    .list ul a i {
        margin-right: 15px;
    }
    .sidenav::-webkit-scrollbar {
        width: 4px;
    }
    .sidenav::-webkit-scrollbar-thumb {
        background: orange;
        border-radius: 10px;
    }
    .Approved{
        background: green;
        position: absolute;
        line-height: initial;
        padding: 0.2rem;
        left: 11rem;
        border-radius: 9%;
        z-index: 1123;
    }
    #rowtop1{
        margin-top:2rem !important;
    }
    #rowtop2{
        margin-top:3rem !important;
    }
    #containertop{
        margin-top:5.6rem !important;
    }
    #container ul li a.active{
        border-bottom:5px solid green;
    }
    .nav-tabs{
        border-bottom: 0px solid #dee2e6;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
        background-color:transparent;
        border:0px solid white;
    }
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active:hover {
        background-color:transparent;
        border:0px solid white;
    }
    #main_div_center{
        margin-inline: auto;
    }
    .search{
        border-radius:2rem;
    }
</style>

<!-- --------------------side bar starts----------------- -->
<div id="mySidenav" class="sidenav">
    <a class="closebtn" id="closebtn" onclick="closeNav()"><i class="fas fa-arrow-left"></i></a>
    <?php
        if(isset($_SESSION['SecureLoginSession']))
        {
            if($_SESSION['LoginFarmerUserType'] === 'FARMER')
            {
                $SqlProfileImg=$pdo->prepare("SELECT profile_picture FROM sign_up_farmer_information WHERE E_mail_id=:E_mail_id");
                $SqlProfileImg->execute(array(':E_mail_id'=> $_SESSION['SecureLoginSession']));
                $FetchProfileFamerImage=$SqlProfileImg->fetch(PDO::FETCH_ASSOC);

                echo "<img src=".$FetchProfileFamerImage['profile_picture']." class='profile_img'>";
            }
            else{
                $SqlUserProfileImg=$pdo->prepare("SELECT * FROM user_profile_information WHERE E_mail_id=:E_mail_id");
                $SqlUserProfileImg->execute(array(':E_mail_id'=> $_SESSION['SecureLoginSession']));
                $FetchProfileUserImage=$SqlUserProfileImg->fetch(PDO::FETCH_ASSOC);

                if($FetchProfileUserImage['Actual_profile_image'] == 1)
                {
                    echo "<img src=".$FetchProfileUserImage['Actual_profile_image']." class='profile_img'>";
                }
                else
                {
                    echo "<img src=".$FetchProfileUserImage['Actual_profile_image']." class='profile_img'>";
                }
            }
        }
        else{
            echo "<img src='../Images/Farmer_Logo.png' class='profile_img1'>";
        }
    ?>
    <div class="list">
        <ul>
            <li><a href="../SideBarActivities/ProfileAndPersonalInformation.php"><i class="fas fa-user"></i>Profile</a></li>
            <?php
                if($_SESSION['LoginFarmerUserType'] === 'FARMER'){
                    echo '
                        <li><a href="../SideBarActivities/AddCropComponentFarmer.php"><i class="fas fa-tractor"></i>Add Crop</a></li>
                        <h6 class="Approved">APPROVED</h6>
                        <li><a href="../SideBarActivities/UploadedDocuments.php"><i class="fas fa-id-card"></i>Uploaded Documents</a></li>
                    ';
                }
            ?>
            <li><a href="../SideBarActivities/OrderDetailsFarmerUser.php"><i class="fas fa-arrow-up"></i>My Orders</a></li>
            <li><a href="../SideBarActivities/MyFavouriteFarmerUser.php"><i class="fas fa-heart"></i>My favourite</a></li>
            <li><a href="#"><i class="fa fa-calendar"></i>Events</a></li>
            <li><a href="#"><i class="fa fa-cog fa-spin"></i>Setting</a></li>
            <li><a href="#"><i class="fa fa-phone"></i>contact-info</a></li>
        </ul>
    </div>
</div>
<!-- --------------------side bar ends----------------- -->

<!-- ------------------------------body section starts------------------------------------------- -->
<div class="col-md-12" id="container" style="margin-top: 4.0rem!important;">
    <div class="row pt-2" style="box-shadow: 0 0 5px gray;background-color: #F0FFF0;">
        
        <div class="col-11 col-sm-12 col-md-10 col-lg-11 justify-content-center align-items-center" id="main_div_center" style="padding-top:0px;border-radius:0.4rem;">
            <form action="SearchFarmerCropItem.php" method="post" class="d-flex text-center">
                <div class="input-group">
                    <input class="form-control form-control-lg search" type="search" placeholder="Search Crop" aria-label="Search" name="value_field" required="required">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success mr-3 search" name="SearchCropItem" type="submit"><i class="fas fa-search fa-md mr-2"></i>Search</button>
                    </div>
                </div>
            </form>
            <?php
                require_once "loaderclass.php";
            ?>
            <?php
                if(isset($_SESSION['SecureLoginSession']))
                {
                    echo '<div class="row pb-2">
                    <ul class="nav nav-tabs" id="mytab" role="tablist">
                        <li class="mr-4 nav-item active" role="preentation"><a class="nav-link active" role="tab" area-controls="Vegetable_Crop_items" data-toggle="tab" href="#Vegetable_Crop_items">Vegetable</a></li>
                        <li class="mr-3 ml-2 nav-item" role="preentation"><a class="nav-link" role="tab" area-controls="Fruits_crop_items" data-toggle="tab" href="#Fruits_crop_items">Fruits</a></li>
                        <li class="mr-3 ml-2 nav-item" role="preentation"><a class="nav-link" role="tab" area-controls="FoodGrains_crop_items" data-toggle="tab" href="#FoodGrains_crop_items">Food Grains</a></li>
                        <li class="mr-3 nav-item" role="preentation"><a class="nav-link" role="tab" area-controls="Millets_crop_items" data-toggle="tab" href="#Millets_crop_items">Millets</a></li>
                    </ul></div>
                    ';
                }
            ?>
        </div>
    </div>
    
    <div class="tab-content">

        <!-- vagetable tabs in the website starts -->
        <div id="Vegetable_Crop_items" class="tab-pane fade show active" role="tabpanel">
            <div class="container ml-0 mt-3" style="max-width: 100%; background-color: #F0FFF0;box-shadow: 0 0 10px gray">
                <div class="row text-center" style="padding: 1.5rem 0rem 2rem 2.8rem !important">
                <?php
                    if(isset($_SESSION['SecureLoginSession'])){
                        if($_SESSION['LoginFarmerUserType'] === $farmer_user){
                            $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                             add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND add_crop_image_table.E_mail_id != :E_mail_id AND crop_quantity > 0 ORDER BY Crop_id DESC");
                            $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_vegetable, ':E_mail_id' => $_SESSION['SecureLoginSession']));
                            while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                            {
                                $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                            }
                        }
                        else{
                            $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                             add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND crop_quantity > 0 ORDER BY Crop_id DESC");
                            $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_vegetable));
                            while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                            {
                                $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                            }
                        }
                        
                    }
                    else{
                        echo '';
                    }
                    ?>
                </div>
            </div>
        </div>
        <!-- vagetable tabs in the website ends -->

        <!-- Fruits tabs in the website starts -->

        <div id="Fruits_crop_items" class="tab-pane fade" role="tabpanel">
            <div class="container ml-0 mt-3" style="max-width: 100%; background-color:#F0FFF0;box-shadow: 0 0 10px gray">
                <div class="row text-center pl-5 pt-3" style="padding: 1.5rem 0rem 2rem 2.8rem !important">
                    <?php
                        if(isset($_SESSION['SecureLoginSession']))
                        {
                            if($_SESSION['LoginFarmerUserType'] === $farmer_user )
                            {
                                $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                                    add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND add_crop_image_table.E_mail_id != :E_mail_id AND crop_quantity > 0 ORDER BY Crop_id DESC");
                                $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_fruits,':E_mail_id' => $_SESSION['SecureLoginSession']));
                                while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                                {
                                    $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                    $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                    $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                    crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                                }
                            }
                            else{
                                $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                                    add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND crop_quantity > 0 ORDER BY Crop_id DESC");
                                $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_fruits));
                                while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                                {
                                    $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                    $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                    $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                    crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                                }
                            }
                        }
                        else{
                            echo '';
                        }
                        ?>
                </div>
            </div>
        </div>
        <!-- Fruits tabs in the website ends -->

        <!-- FoodCrops tabs in the website starts -->
        <div id="FoodGrains_crop_items" class="tab-pane fade" role="tabpanel">
            <div class="container ml-0 mt-3" style="max-width: 100%; background-color:#F0FFF0;box-shadow: 0 0 10px gray">
                <div class="row text-center pl-5 pt-3" style="padding: 1.5rem 0rem 2rem 2.8rem !important">
                    <?php
                        if(isset($_SESSION['SecureLoginSession']))
                        {
                            if($_SESSION['LoginFarmerUserType'] === $farmer_user )
                            {
                                $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                                        add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND add_crop_image_table.E_mail_id != :E_mail_id AND crop_quantity > 0 ORDER BY Crop_id DESC");
                                $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_foodGrains,':E_mail_id' => $_SESSION['SecureLoginSession']));
                                while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                                {
                                    $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                    $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                    $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                    crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                                }
                            }
                            else{
                                $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                                        add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND crop_quantity > 0 ORDER BY Crop_id DESC");
                                $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_foodGrains));
                                while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                                {
                                    $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                    $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                    $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                    crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                                }
                            }
                        }
                        else{
                            echo '';
                        }
                    ?> 
                </div>
            </div>
        </div>
        <!-- FoodCrops tabs in the website ends -->

        <!-- millets tabs in the website starts -->
        <div id="Millets_crop_items" class="tab-pane fade" role="tabpanel">
            <div class="container ml-0 mt-3" style="max-width: 100%; background-color:#F0FFF0;box-shadow: 0 0 10px gray">
                <div class="row text-center pl-5 pt-3" style="padding: 1.5rem 0rem 2rem 2.8rem !important">
                    <?php
                        if(isset($_SESSION['SecureLoginSession']))
                        {
                            if($_SESSION['LoginFarmerUserType'] === $farmer_user )
                            {
                                $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                                        add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND add_crop_image_table.E_mail_id != :E_mail_id AND crop_quantity > 0 ORDER BY Crop_id DESC");
                                $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_millets, ':E_mail_id' => $_SESSION['SecureLoginSession']));
                                while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                                {
                                    $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                    $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                    $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                    crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                                }
                            }
                            else{
                                $InnerJoinToFetchFarmerName = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                                                        add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND crop_status = :crop_status AND crop_category = :crop_category AND crop_quantity > 0 ORDER BY Crop_id DESC");
                                $InnerJoinToFetchFarmerName->execute(array(':crop_status' =>$crop_Approved, ':crop_category' => $crop_millets));
                                while($FetchFarmerName = $InnerJoinToFetchFarmerName->fetch(PDO::FETCH_ASSOC))
                                {
                                    $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                    $sqlforavgrating->execute(array(':Crop_id'=> $FetchFarmerName['Crop_id']));
                                    $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                    crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$FetchFarmerName['Crop_id'],$FetchFarmerName['first_name'],$FetchFarmerName['last_name'],$FetchFarmerName['crop_name'],$FetchFarmerName['crop_quantity'], $FetchFarmerName['crop_category'],$FetchFarmerName['crop_price'],$FetchFarmerName['crop_image']);
                                }
                            }
                        }
                        else{
                            echo '';
                        }
                    ?> 
                </div>
            </div>
        </div>
        <!-- millets tabs in the website ends -->

    </div>

</div>
    
<!-- ------------------------------body section ends------------------------------------------- -->

<?php
    require_once "../ComponentFolder/FooterFarmerPortal.php";
?>
<script type="" src="custom.js"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.left = "0px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.left = "-257px";
        }

        window.addEventListener("load",function(){
        const loader=document.querySelector(".loaderclass");
        console.log(loader);
        loader.className += " hidden";
    });
    $(document).ready(function () {
        $('#container').click(function()
        {
            $('#mySidenav').css("left","-257px");
        });
    });
    </script>

    <script>
        var url = document.location.tostring();
        if(url.match('#')){
            $('.nav-tabs a[href="#' + url.split('#')[1]+ '"]').tab('show');
        }
        $('.nav-tabs a').on('show.bs.tab',function(e){
            window.location.hash = e.target.hash;
        });
    </script>
    
</body>
</html>