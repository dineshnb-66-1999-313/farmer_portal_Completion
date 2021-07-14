<?php
    session_start();
    require_once "../ComponentFolder/header.php";
    require_once "../ComponentFolder/ComponentForCropItems.php";

    if(isset($_POST['backtohomefromaddcrop']))
    {
        header('location: ../FarmerHomePageFolder/HomePageFarmerPortal.php');
    }

    if(isset($_POST['view_crop_detail']))
    {
        $_SESSION['View_Crop_Id'] = $_POST['favourite_crop_view_detailes'];
        header('Location: ../FarmerHomePageFolder/CropViewPageDetails.php');
    }
    
    
    if(isset($_SESSION['SecureLoginSession']))
    {
        if(isset($_POST['DeletefavouriteCropData']))
        {
            $cropfavouriteid = $_POST['deletefavouritecropname'];
    
            $sqlforremovefavouritecrop = $pdo->prepare("DELETE FROM farmer_user_favourite WHERE Crop_id = :Crop_id AND E_mail_id = :E_mail_id");
            $sqlforremovefavouritecrop->execute(array(':Crop_id' => $cropfavouriteid, ':E_mail_id' => $_SESSION['SecureLoginSession']));
    
            $message ='<labe><i class="fas fa-check fa-lg mr-3"></i>Crop Remove From Favourites Successfuly</label>';
    
        }
    }
    else{
        header("Location: ../");
    }
    
    if(isset($_POST['empty_cart_crop']))
    {
        $emptycartcrop = $pdo->prepare("DELETE FROM farmer_user_favourite WHERE E_mail_id = :E_mail_id");
        $emptycartcrop ->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
        echo '<script>swal("Cart is Empty","","success")</script>';
    }

?>

<?php
    nav_bar_profile();
?>

<style>
    body {
        background: url("https://i.pinimg.com/originals/2b/c9/70/2bc97013f49592c6d7d095ab5407d3bf.jpg");
        font-family: "roboto";
    }
    #main_div_center{
        margin-inline: auto;
    }
</style>

<div class="container-fluid" style="width:100%;">
    <?php
        require_once "../FarmerHomePageFolder/loaderclass.php";
    ?>
    <div class="row" style="margin-top: 4rem !important">
        <div class="row p-2" style="box-shadow: 0 0 5px gray;background-color: #F0FFF0;margin:0px;padding:0px;">
            <div class="col-2 col-sm-6 col-md-6 col-lg-6 mr-auto justify-content-center" >
                <form method="post">
                    <button class="btn btn-primary btn-md" name="backtohomefromaddcrop"><i class="fa fa-arrow-left mr-3 text-danger"></i>Back</button>
                </form>
            </div>
            <div class="col-10 col-sm-6 col-md-6 col-lg-6 ml-auto">
                <?php
                    $sqlforemptycart = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailisemptycartcount FROM farmer_user_favourite WHERE E_mail_id=:E_mail_id");
                    $sqlforemptycart->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                    $fetchemptycartcount = $sqlforemptycart->fetch(PDO::FETCH_ASSOC);
                    
                    if($fetchemptycartcount['emailisemptycartcount'] > 1)
                    {
                        echo '<button class="btn btn-danger btn-lg pl-5 pr-5 pt-1 pb-1 float-right" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#emptycartmodal"><i class="fa fa-trash fa-lg mr-2"></i>Empty Cart</button>';
                    }
                ?>
            </div>
            <div class="row">
                <?php
                    if(isset($message)){
                        echo '<div class="alert alert-success col-12 col-sm-12 col-md-12 col-lg-12 text-center" id="address_center" role="alert"><span>'.$message.'</span></div>';
                    }
                ?>
            </div>
        </div>

        <div class="row" style="--bs-gutter-x: 0rem;">
            <div class="col-12 col-md-7 justify-content-md-center item-align-center mt-2 mr-1">
                <?php
                    $total = 0;
                    if(isset($_SESSION['SecureLoginSession']))
                    {
                        $sqlforemptycart = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailisemptycartcount FROM farmer_user_favourite WHERE E_mail_id=:E_mail_id");
                        $sqlforemptycart->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                        $fetchemptycartcount = $sqlforemptycart->fetch(PDO::FETCH_ASSOC);

                        if($fetchemptycartcount['emailisemptycartcount'] > 0)
                        {
                            $sqlforselectfavoritecrop = $pdo->prepare("SELECT * FROM farmer_user_favourite INNER JOIN add_crop_image_table ON farmer_user_favourite.Crop_id = add_crop_image_table.Crop_id WHERE farmer_user_favourite.E_mail_id = :E_mail_id");
                            $sqlforselectfavoritecrop->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                            while($fetchcropinformation = $sqlforselectfavoritecrop->fetch(PDO::FETCH_ASSOC))
                            {
                                $total = $total + (int)$fetchcropinformation['crop_price'];
                                favourite_crop_items($fetchcropinformation['Crop_id'],$fetchcropinformation['first_name'], $fetchcropinformation['last_name'], $fetchcropinformation['crop_name'], $fetchcropinformation['crop_quantity'],$fetchcropinformation['crop_category'], $fetchcropinformation['crop_price'], $fetchcropinformation['crop_image'],$fetchcropinformation['crop_description']);
                            }
                            
                        }
                        else{
                            echo '
                            <div class="container-fluid maincontainer">
                                <div class="row justify-content-center">
                                    <div class="col-11 col-md-7 offset-md-1 bg-white">
                                        <img class="img-responsive" src="../Images/emptycart.png" style="width:100%;height:20rem;">
                                    </div>
                                </div>
                            </div>
                        ';
                        }
                    }
                    else{
                        echo '
                            <div class="container-fluid maincontainer">
                                <div class="row justify-content-center">
                                    <div class="col-12 col-md-10 offset-md-1">
                                        <img class="img-responsive" src="../Images/404_error.jpg" style="width:100%;height:20rem;">
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                ?>
            </div>
            
            <?php
                $sqlforemptycart1 = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailisemptycartcount FROM farmer_user_favourite WHERE E_mail_id=:E_mail_id");
                $sqlforemptycart1->execute(array(':E_mail_id' => $_SESSION['SecureLoginSession']));
                $fetchemptycartcount1 = $sqlforemptycart1->fetch(PDO::FETCH_ASSOC);
                
                if($fetchemptycartcount1['emailisemptycartcount'] > 0)
                { 
                    echo '<div class="col-12 col-md-4 justify-content-md-center item-align-center mt-2" id="main_div_center">
                        <div class="col-12 col-md-12 pt-3 bg-white ml-2" id="box_shadow">
                            <h6 class="text-success">CROP PRICE DETAILS</h6>
                                <hr>
                                <div class="row price-details">
                                    <div class="col-7 col-sm-6 col-md-6 pl-3 col-lg-6">
                                            <h5>Number of Crops</h5>
                                            <h5>Total Quantity</h5>
                                            <h5>Selected Quantity</h5>
                                            <h5>Delivary charges</h5>
                                            <hr>
                                            <h4 class="text-success">Total Amount</h4>
                                    </div>
                                    <div class="col-5 col-sm-6 col-md-6 col-lg-6 pl-4">
                                            <h5>Number of Crops</h5>
                                            <h5>Total Quantity</h5>
                                            <h5>Selected Quantity</h5>
                                            <h5>Delivary charges</h5>
                                            <hr>
                                            <h4 class="text-success">Total</h4>
                                    </div>
                                </div>
                        </div>
                    </div>';
                }
            ?>
        </div>
    </div>
</div>

<!-- delete favourite crop model starts-->
<div class="modal fade" id="deletefavouritecropmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Remove Favourite Crop</h5>
            </div>
            <form method="post">
                <div class="modal-body">
                    <h4>Are you sure You want to Remove the Crop Form Favourite ?</h4>
                    <input type="hidden" name="deletefavouritecropname" id="deletefavouritecropId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" name="DeletefavouriteCropData">Remove</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
<!-- delete crop model ends-->

<!-- empty favourite crop model starts-->
<div class="modal fade" id="emptycartmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border:2px solid red;">
            <div class="modal-header">
                <h5 class="modal-title text-danger">Empty Cart</h5>
            </div>
            <form method="post">
                <div class="modal-body">
                    <h4>Are you sure You want to Empty The Cart ?</h4>
                    <input type="hidden" name="emptycartcropid" id="emptycartcropId">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" name="empty_cart_crop">Yes !Empty Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>
    
<!-- empty crop model ends-->

<?php
    require_once "../ComponentFolder/FooterFarmerPortal.php";
?>

<script>
    $(document).on('click','#removefromfavorite',function (e) {
        e.preventDefault();
        var deletefavouritecropid = $(this).val();
        $('#deletefavouritecropId').val(deletefavouritecropid);
    });
</script>