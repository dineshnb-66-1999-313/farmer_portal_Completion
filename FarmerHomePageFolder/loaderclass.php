<?php
    session_start();
    require_once "../ComponentFolder/header.php";
    require_once "../ComponentFolder/ComponentForCropItems.php";
?>

<style>
    /*-----------------------------------------------------------starting preloader------------------------------------------------------------*/
        .loaderclass{
            position:fixed;
            z-index:99;
            top :0;
            left:0;
            width:100%;
            height:100%;
            background:white; 
            display:flex;
            justify-content:center;
            align-items:center;
        }
        .loaderclass img{
            width:1000px;
            height:800px;
        }
        .loaderclass > img{
            width:500px;
        }
        .loaderclass.hidden{
            animation:fadeOut 2s;
            animation-fill-mode:forwards;
        }
        @keyframes fadeOut{
            100%{
                opacity:0;
                visibility:hidden;
            }
        }
        .mySlides {display:none;}
        .coverimg{
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }
        /*----------------------------------------------------------ending preloader------------------------------------------------------------*/
</style>

    <div class="container-fluid">
        <div class="loaderclass">
            <h1><i class="fa fa-spinner fa-spin fa-5x"></i></h1>
            <!-- <img src="https://cdn.dribbble.com/users/1356515/screenshots/5500507/comp_4.gif"> -->
        </div>
    </div>
    
    <script>
        window.addEventListener("load",function(){
        const loader=document.querySelector(".loaderclass");
        loader.className += " hidden";
     });
    </script>
    
</body>
</html>