<?php
    require_once "../ComponentFolder/header.php";
    session_start();
    $errorMessage = 0;

if(isset($_POST['BasicDetailSignUp']))
{
    $_SESSION['firstname']=$_POST['firstname'];
    $_SESSION['lastname']=$_POST['lastname'];
    $_SESSION['email']=$_POST['email']; 
    $_SESSION['dateofbirth'] = $_POST['dateofbirth'];          
    $_SESSION['createpass']=$_POST['cpass'];
    $_SESSION['confirmpass'] = $_POST['copass'];
        
    if($_SESSION['createpass'] == $_SESSION['confirmpass'])
    {
        if(preg_match("/^[a-zA-Z]{3,}/",$_SESSION['firstname']))
        {
            if(preg_match("/(.*[a-zA-Z]){2}/",$_SESSION['lastname']))
            {
                if(preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/",$_SESSION['email']))
                {
                    $emailiduniqueinfarmertable = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailiduniqueinfarmer FROM sign_up_farmer_information WHERE E_mail_id=:E_mail_id");
                    $emailiduniqueinfarmertable->execute(array(':E_mail_id' => $_SESSION['email']));
                    $row1 = $emailiduniqueinfarmertable->fetch(PDO::FETCH_ASSOC);

                    $emailiduniqueinusertable = $pdo->prepare("SELECT COUNT(E_mail_id) AS emailiduniqueinuser FROM sign_up_user_information WHERE E_mail_id=:E_mail_id");
                    $emailiduniqueinusertable->execute(array(':E_mail_id' => $_SESSION['email']));
                    $row11 = $emailiduniqueinusertable->fetch(PDO::FETCH_ASSOC);
                    
                    if($row11['emailiduniqueinuser'] < 1)
                    {
                        if($row1['emailiduniqueinfarmer'] < 1)
                        {
                            if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/",$_SESSION['createpass']))
                            {
                                $_SESSION['createpassencrypted'] = password_hash($_SESSION['createpass'], PASSWORD_BCRYPT);
                                header('Location: PhoneNumberInputFeild.php');
                            }
                            else{
                                $errorMessage = 7;
                                $message ='<label>Please follow the restriction in password-field </label>';
                            }
                        }
                        else{
                            $errorMessage = 6;
                            $message ='<label>E-mail alredy exist</label>';
                        }
                    }
                    else{
                        $errorMessage = 5;
                        $message ='<label>You already Registered as a Purchased User</label>';
                    }
                }
                else{
                    $errorMessage = 4;
                    $message ='<label>Invalid Email format</label>';
                }
            }
            else{
                $errorMessage = 3;
                $message ='<labe>Last Name should be more than two charactors</label>';
            }
        }
        else{
            $errorMessage = 2;
            $message ='<labe>First Name should be more than three charactors</label>';
        }
    }
    else{
        $errorMessage = 1;
        $message ='<label>password does not match</label>';
    }
}

?>
<style>
    body {
        background: url("https://i.pinimg.com/originals/2b/c9/70/2bc97013f49592c6d7d095ab5407d3bf.jpg");
        font-family: "roboto";
    }
    .form-control-md{
        max-width: -webkit-fill-available;
    }
    #main_div_center{
        margin-inline: auto;
    }
    .paddingcontainer{
        padding: 1rem 2rem 0rem 2rem;
    }
    .maincontainer{
        margin-top: 4rem;
    }
    .fas{
        line-height: 2;
        font-size: 1.5rem;
    }
</style>
<?php
    nav_bar_sign_up();
?>
<div class="container-fluid maincontainer" style="width:100%;">
    <div class="row">
        <div class="col-12 col-sm-9 col-md-8 col-lg-6 col-xl-5 mt-3 justify-content-center align-items-center bg-white p-1" id="main_div_center" style="border-radius:0.4rem;border: 2px solid #000;">
        <?php
            if(isset($message)){
                echo '<div class="alert alert-danger col-12 col-sm-12 col-md-12 col-lg-12 text-center" id="address_center" role="alert"><span>'.$message.'</span></div>';
            }
        ?>
            <h2 class="text-success text-center">Sign Up Form For Farmer</h2>
                <h5 class="text-danger text-center">All feilds are mandetory *</h5>
                    <form action ="BasicDetailSignUp.php" method="post" onchange ="formbasiconchange()"   class="paddingcontainer">
                        <div class="row p-2">
                            <label class="form-label"><b>First Name</b></label>
                                <input type="text" name="firstname" id="firstnameinput" onkeyup="firstnamevalidation()" value="<?php echo isset($_SESSION['firstname']) ? $_SESSION['firstname'] : ''?>" placeholder="Enter First Name" autocomplete="off" class="form-control form-control-lg ml-0" required="required" <?php if($errorMessage == 2){echo 'style="border:3px dashed red"';} ?>>
                            <span id="first_name_error" class="text-danger"></span>
                        </div>
                
                        <div class="row p-2">
                            <label class="form-label"><b>Last Name</b></label>
                                <input type="text" name="lastname" id="lastnameinput" onkeyup="lastnamevalidation()" value="<?php echo isset($_SESSION['lastname']) ? $_SESSION['lastname'] : ''?>" placeholder="Enter Last Name" autocomplete="off" class="form-control form-control-lg ml-0" required="required" <?php if($errorMessage == 3){echo 'style="border:3px dashed red"';} ?>>
                            <span id="last_name_error" class="text-danger"></span>
                        </div>
                        
                        <div class="row p-2">
                            <label class="form-label"><b>Email</b></label>
                                <input type="text" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''?>" placeholder="Enter Email" id="emailinput" onkeyup="emailvalidation()" autocomplete="off" class="form-control form-control-lg ml-0" required="required" <?php if($errorMessage == 4 || $errorMessage == 5 || $errorMessage == 6){echo 'style="border:3px dashed red"';} ?>>
                            <span id="email_error" class="text-danger"></span>
                        </div>
                        
                        <div class="row p-2">
                            <label class="form-label"><b>Date of Birth</b></label>
                                <input type="date" name="dateofbirth" id="datepicker" value="<?php echo isset($_SESSION['dateofbirth']) ? $_SESSION['dateofbirth'] : ''?>" class="form-control form-control-lg ml-0" required="required">
                        </div>
                        
                        <div class="row">
                            <div class="col-10 col-md-11 align-items-center">
                                <label class="form-label"><b>Create Password</b></label>
                            </div>
                            <div class="col-2 col-md-1 text-right">
                                <a type="button" tabindex="0" data-bs-trigger="focus" class=" p-0 m-0 fas fa-info-circle fa-md text-success nav-link" data-bs-html="true" title="Restriction in password feild" data-bs-content="<h6>1. At least a lowercase letter</h6><h6>2. At least a uppercase letter</h6> <h6>3. At least a Numeric digit</h6> <h6>4. Minimum length is 8</h6> <h6>5. Maximum length is 15</h6>" data-toggle="popover" data-bs-placement="right"></a>
                            </div>
                        </div>
                        <div class="row">   
                            <div class="input-group mb-3">
                                <input type="password" name="cpass" maxlength="15" value="<?php echo isset($_SESSION['createpass']) ? $_SESSION['createpass'] : ''?>" onkeyup="validationpassword()" id="createpasswordinput" placeholder="Create Password" autocomplete="off" class="form-control form-control-lg ml-0" required="required" <?php if($errorMessage == 7){echo 'style="border:3px dashed red"';} ?>>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-eye fa-lg" id="togglepassword1"></i></span>
                                </div>
                            </div>
                            <span id="create_password_error" class="text-danger"></span>
                        </div>

                        <div class="row">
                            <label class="form-label"><b>Confirm Password</b></label>
                            <div class="input-group mb-3">
                                <input type="password" name="copass" value="<?php echo isset($_SESSION['confirmpass']) ? $_SESSION['confirmpass'] : ''?>" placeholder="Conform password" id="createconfirmpasswordinput" onkeyup="passwordmatching()" autocomplete="off" class="form-control form-control-lg ml-0" required="required" <?php if($errorMessage == 1){echo 'style="border:3px dashed red"';} ?>>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fa fa-eye fa-lg" id="togglepassword2"></i></span>
                                </div>
                            </div>
                            <span id="confirm_password_error" class="text-danger"></span>
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg btn-block btn-block mt-4" id="BasicDetailSignUp" name="BasicDetailSignUp">Save And Continue</button>
                    <br><br>
            </form>
        </div>
    </div>
</div>   
<?php
    require_once "../ComponentFolder/FooterFarmerPortal.php";
?>

<script>  

    
    $(function () {
        $('[data-toggle="popover"]').popover();
    });
    
    $('.popover-dismiss').popover({
        trigger: 'focus'
    });
    
    // prevent future dates starts
    var date = new Date();
    var cYear = date.getUTCFullYear();
    var cMounth = date.getMonth() + 1;
    var cDate = date.getDate();

    if(cMounth < 9){
        cMounth = "0" + cMounth;
    }
    if(cDate < 10){
        cDate = "0" + cDate;
    }
    var maxdate = cYear + "-" + cMounth + "-" + cDate;

    document.getElementById("datepicker").setAttribute("max", maxdate);
    // prevent future dates ends
    

    function passwordmatching()
    {
        var create_password=document.getElementById('createpasswordinput').value;
        var confirm_password=document.getElementById('createconfirmpasswordinput').value;
        if(create_password === confirm_password)
        {
            document.getElementById('confirm_password_error').textContent = "";
            document.getElementById('createconfirmpasswordinput').style.border='3px dashed green';
        }
        else{
            document.getElementById('confirm_password_error').textContent = "Password does not match";
            document.getElementById('createconfirmpasswordinput').style.border='3px dashed red';
        }
    }
    function firstnamevalidation() 
    { 
        var firstnameinput=document.getElementById('firstnameinput').value;
        var firstnamevalidation=/^[a-zA-Z]{3,}/;
            if(firstnamevalidation.test(firstnameinput))
            {
                document.getElementById('first_name_error').textContent = " ";
                document.getElementById('firstnameinput').style.border='3px dashed green';
            }
            else{
                document.getElementById('first_name_error').textContent = "First Name should be more than three charactors";
                document.getElementById('firstnameinput').style.border='3px dashed red';
            }
    }
    function lastnamevalidation() 
    { 
        var lastnameinput=document.getElementById('lastnameinput').value;
        var lastnamevalidation=/(.*[a-zA-Z]){2}/;
            if(lastnamevalidation.test(lastnameinput))
            {
                document.getElementById('last_name_error').textContent = " ";
                document.getElementById('lastnameinput').style.border='3px dashed green';
            }
            else{
                document.getElementById('last_name_error').textContent = "Last Name should be more than two charactors";
                document.getElementById('lastnameinput').style.border='3px dashed red';
            }
    }
    function validationpassword()
    {
        var createpass=document.getElementById('createpasswordinput').value;
        var passpattren=/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            if(passpattren.test(createpass))
            {
                document.getElementById('create_password_error').textContent = " ";
                document.getElementById('createpasswordinput').style.border='3px dashed green';
            }
            else{
                document.getElementById('create_password_error').textContent = "Please follow the restriction in password-field";
                document.getElementById('createpasswordinput').style.border='3px dashed red';
            }
    }
    function emailvalidation()
    {
        var emailinput=document.getElementById('emailinput').value;
        var emailpattren=/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/;
            if(emailpattren.test(emailinput))
            {
                document.getElementById('email_error').textContent = " ";
                document.getElementById('emailinput').style.border='3px dashed green';
            }
            else{
                document.getElementById('email_error').textContent = "Invalid Email format";
                document.getElementById('emailinput').style.border='3px dashed red';
            }
    }
    
</script>
<script>
    const togglePasswordcreatePass = document.querySelector('#togglepassword1');
    const password1 = document.querySelector('#createpasswordinput');
        togglePasswordcreatePass.addEventListener('click', function (e) {
        const type = password1.getAttribute('type') === 'password' ? 'text' : 'password';
        password1.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });

    const togglePasswordconfirmPass = document.querySelector('#togglepassword2');
    const password2 = document.querySelector('#createconfirmpasswordinput');
    togglePasswordconfirmPass.addEventListener('click', function (e) {
        const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
        password2.setAttribute('type', type);
        this.classList.toggle('fa-eye-slash');
    });
</script>

</body>
</html>