<?php
    session_start();
    require_once "../ComponentFolder/header.php";
    require_once "../ComponentFolder/ComponentForCropItems.php";
    $Approved = 'APPROVED';

    if(isset($_POST['backtohomefrombillpage']))
    {
        unset($_SESSION['ORDER_ID']);
        header('Location: HomePageFarmerPortal.php');
    }
?>

<?php
    nav_bar_serach();
?>
<style>
    body {
        background: url("https://i.pinimg.com/originals/2b/c9/70/2bc97013f49592c6d7d095ab5407d3bf.jpg");
        font-family: "roboto";
    }
    #main_div_center{
        margin-inline: auto;
    }
    .search{
        border-radius:2rem;
    }
    .form-control-lg{
        max-width: -webkit-fill-available;
    }
</style>
<div class="container-fluid" style="width: 100%;">
     <?php
        require_once "loaderclass.php";
    ?>
    <div class="row ml-1" style="margin-top: 4rem !important;padding-top: 0.8rem !important;background-color: #F0FFF0;box-shadow: 0 0 10px gray;max-width: 100%;">
        <div class="col-5 col-sm-3 col-md-3 col-lg-3 mr-auto">
            <form method="post">
                <button class="btn btn-primary btn-md" name="backtohomefrombillpage"><i class="fa fa-arrow-left mr-3 text-danger"></i>Home</button>
            </form>
        </div>
        
        <div class="col-12 col-sm-9 col-md-9 col-lg-9 justify-content-center align-items-center" id="main_div_center" style="border-radius:3rem;">
            <form method="post" class="d-flex text-center">
                <div class="input-group">
                    <input class="form-control form-control-lg search" type="search" placeholder="Search Crop" aria-label="Search" name="value_field" required="required">
                    <div class="input-group-append">
                        <button class="btn btn-success mr-3 search" name="SearchCropItem" type="submit"><i class="fas fa-search fa-md mr-2"></i>Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div class="row text-center ml-1 mt-3" style="max-width: 100%; background-color: #F0FFF0;box-shadow: 0 0 10px gray">
        <?php
            if(isset($_SESSION['SecureLoginSession']))
            {
                if(isset($_POST['SearchCropItem']))
                {
                    $_SESSION['value_feild'] = $_POST['value_field'];
                    $value_filter = $_SESSION['value_feild'];

                    $SqlforcropSearchitem = $pdo->prepare("SELECT COUNT(*) AS cropIdCount FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                            add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND add_crop_image_table.E_mail_id != :E_mail_id AND (crop_name LIKE '%$value_filter%' OR crop_category LIKE '%$value_filter%') AND crop_status = :crop_status AND crop_quantity > 0");
                    $SqlforcropSearchitem->execute(array(':crop_status'=> $Approved, ':E_mail_id' =>$_SESSION['SecureLoginSession']));
                    $fetchacropcount = $SqlforcropSearchitem->fetch(PDO::FETCH_ASSOC);
                    if($fetchacropcount['cropIdCount'] > 0)
                    {
                        echo '<div class="row text-center">
                            <h3 class="text-dark"><b>There are <span class="text-success">'.$fetchacropcount['cropIdCount'].'</span> matching record.</b></h3>
                        </div>';
                    }
                
                    $searchcropitemsapproved = $pdo->prepare("SELECT * FROM add_crop_image_table INNER JOIN sign_up_farmer_information ON 
                                                        add_crop_image_table.E_mail_id = sign_up_farmer_information.E_mail_id AND add_crop_image_table.E_mail_id != :E_mail_id AND (crop_name LIKE '%$value_filter%' OR crop_category LIKE '%$value_filter%') AND crop_status = :crop_status AND crop_quantity > 0");
                    $searchcropitemsapproved->execute(array(':crop_status' =>$Approved, ':E_mail_id' =>$_SESSION['SecureLoginSession']));
                    
                    echo '<div class="col-12 col-md-12 pl-5"><div class="row">';
                        if($fetchacropcount['cropIdCount'] > 0)
                        {
                            while($fetchsearchcropitem = $searchcropitemsapproved->fetch(PDO::FETCH_ASSOC))
                            {
                                $sqlforavgrating = $pdo->prepare("SELECT AVG(crop_rating) AS cropavgrating, COUNT(crop_rating) AS countrating FROM crop_comments WHERE Crop_id =:Crop_id");
                                $sqlforavgrating->execute(array(':Crop_id'=> $fetchsearchcropitem['Crop_id']));
                                $fetchforavgrating = $sqlforavgrating->fetch(PDO::FETCH_ASSOC);
                                crop_product_items_approved_in_home_page($fetchforavgrating['cropavgrating'],$fetchforavgrating['countrating'],$fetchsearchcropitem['Crop_id'],$fetchsearchcropitem['first_name'],$fetchsearchcropitem['last_name'],$fetchsearchcropitem['crop_name'],$fetchsearchcropitem['crop_quantity'], $fetchsearchcropitem['crop_category'],$fetchsearchcropitem['crop_price'],$fetchsearchcropitem['crop_image']);
                            }
                        }
                        else{
                            echo '
                                <div class="container-fluid maincontainer">
                                    <div class="row justify-content-center">
                                        <div class="col-12 col-md-8 offset-md-1">
                                            <img class="img-responsive" src="../Images/empty_result.png" style="width:100%;height:20rem;">
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    echo '</div></div>';
                }
            }
            ?>
    </div>
</div>

<?php
    require_once "../ComponentFolder/FooterFarmerPortal.php";
?>
</body>
</html>
    
