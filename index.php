<?php

    require "db.php";

    $rating = 8;

    if (empty($_GET)) {
        $type = "all";

    }
    else if ($_GET['type']){
        $type = $_GET['type'];

        // $type = mysqli_real_escape_string($conn, $_GET['type']);

    }

    $id = mysqli_real_escape_string($conn, $_POST['Code']);

    if ($type != "all"){
        $sql = "SELECT * FROM img where catg = '$type' ORDER BY rating DESC" ;  // fixed query


    }
    else if ($type="all") {
        $sql = "SELECT * FROM img where rating > $rating ORDER BY rating DESC" ;  // fixed query

    }
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    $sresult = mysqli_query($conn, $sql);
    $sresultCheck = mysqli_num_rows($sresult);

    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talesbylal</title>
    <style>
        
        .btn:focus,.btn:active {
            outline: none !important;
            box-shadow: none;
        }
   


      


    </style>
    <script>

    $(function(){

        var counter=0;
        var top;

        
        document.getElementById("dumC").click();


        const container = document.getElementById('');
        $("#navBtn").click(function(){ 


            counter++;
            if (counter%2 == 0)
            {
                if(top<850){
                    window.scrollTo(0, (0));
                    console.log(top-12);

                }
                else
                    window.scrollTo(0, (top-12));
                // alert(counter);
            }
            else
            {
                top = $("#navBtn").offset().top + window.screenY+ $(window).height() - ( $(window).height()*0.04);
                console.log($("#navBtn").offset().top + window.screenY+ $(window).height() - ( $(window).height()*0.04));

                window.scrollTo(0, 0);

                // alert(counter);           }
                


            document.getElementById("dumC").click();
            }

        }); 
       

    
        if (($(window).width())> 600 ){
            

            $("#right").click(function(){ 

                document.getElementById('base').scrollLeft += ($(window).width())/3;


            });
            $("#left").click(function(){ 

            document.getElementById('base').scrollLeft -= ($(window).width())/3;


            });


    
        }else
        {
            $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
            })
        }


    });

    </script>
</head>
<body id="body">
    <nav class="navbar navbar-expand-md navbar-light  static-to" > 
    <div class="container" style="border: 0px solid green;">
    <a class="navbar-brand" style="border: 0px solid green;" href="index.php" id="logoText">@talesbylal

        </a>
        <span id="dumC" style="position: fixed; margin-left:40%;" class=""> </span>


    <button id="navBtn" style="position:fixed; margin-left:80%; top:2.5%;background-color:transparent" class="navbar-toggler navbar-toggler-right btn btn-outline-light" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span  class="navbar-toggler-icon"></span>
    </button>
        
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul id="test" class="navbar-nav ml-auto">
        
        <li class="nav-item">
          <a class="nav-link" href="index.php?type=pt">PORTRAITS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?type=ls">LANDSCAPES</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?type=mc">MISC.</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">EDITS(coming soon)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="">ABOUT(coming soon)</a>
        </li>
          
        <li class="nav-item">
            <a class="nav-link" target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/talesbylal/"><img style="width: 40px;" src="img/3.png" alt="talesbylal"></a>
          </li>
      </ul>
    </div>
  </div>        
            
    </nav>

    <div id="divBox"><i id="right" class="material-icons">keyboard_arrow_right</i>
    <i id="left" class="material-icons">keyboard_arrow_left</i></div>


    <div id="base" >


       <?php if($resultCheck> 0){ 
           while($coun = mysqli_fetch_assoc($result)){
        ?>

                <img class="img-responsive-custom" data-toggle="modal" data-target="#m<?= $coun['id'] ?>"  src="<?= $coun['location'] ?>" alt="">


           <?php        }} 
?>
 
        

    </div>

    <?php for($i = 0; $i<$resultCheck;$i++){     
      $scount=mysqli_fetch_array($sresult,MYSQLI_ASSOC);
 ?>

        <div class="modal fade"  id="m<?= $scount['id'] ?>"     >
            <div class="modal-dialog modal-dialog-centered modal-md-lg"  >
          
            
            
                <img class="img-responsive-custom-modal"  src="<?= $scount['location'] ?>" alt="">
           
            </div>
        </div>

        <?php } ?>

</body>
</html>