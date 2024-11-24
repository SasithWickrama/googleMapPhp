<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Map</title>
	<link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
	<script src="JS/geoxml3.js"></script>
	<script src="JS/walk.js"></script>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>	
	<script src="js/map.js" type="text/javascript"></script>
	<!-- pop box resource files -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	
	<!-- alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
   html, body {
        height: 100%;
        padding: 0;
        margin: 0;
        }
      #map {
       height: 100%;
       width: 100%;
       overflow: hidden;
       float: left;
       border: thin solid #333;
       }
	   

   #wrapper { position: relative; }
   #over_map { position: absolute; top: 70px; right: 10px; z-index: 99; background-color:rgba(0,0,0,0.6); color:#ffffff;padding:5px; border-radius:5px;font-family: Times New Roman, Times, serif; font-size:11px;width:20%;}
   #over_map1 { position: absolute; top: 30%; right: 40%; z-index: 99; background-color:#FFF;padding:5px;width: 20%; height: 40%; overflow: auto; overflow-x: hidden;}
   #btn_logout { position: absolute; top: 5%; right: 4%; z-index: 99; padding:12px; color:#ffffff;}
   #btn_Home { position: absolute; top: 5%; right: 11%; z-index: 99; padding:12px; color:#ffffff;}
	
  .btn:focus, .btn:active, button:focus, button:active {

    outline: none !important;
    box-shadow: none !important;

  }

  #image-gallery .modal-footer{

    display: block;

  }

  .thumb{

    margin-top: 15px;
    margin-bottom: 15px;

  }

      
    </style>
  </head>
  <body>
<span class="metadata-marker" style="display: none;" data-region_tag="html-body"></span>    <div id="map"></div>
   
<script>

var newLoc;

</script>

 
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyACf3KGqbKylkAoI4MkjKTdwlbdoCMD-rY&libraries=drawing&callback=initMap">
</script>
	
<div id="wrapper">

   <div id="google_map">

   </div>
   
</div>

<!-- img popup box -->
    <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     <h4 class="modal-title"></h4>
                    </div>

                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                        <input type="text" id="imgNo" style="display: none;" />
                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary full-left" id="delete-image"><i class="glyphicon glyphicon-trash"></i>
                        </button>

                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>

<!-- end img popup box -->


<div id="over_map1" style="visibility: hidden;  border: 0.5px solid red;  border-radius: 25px;" >

 <div class="modal-header">
          <button type="button" class="close" id="btnclose" onclick="exit();">&times;</button>
          <h6 class="modal-title" style="color: red; text-align: center; font-weight: bold;"><span class="glyphicon glyphicon-exclamation-sign"></span><br>Following Informations Are Not Available This<p id="rtomname"></p></h6>
        </div>
  <div class="row">
    <ul type="circle" id="errbox">
      
    </ul>
  </div>

</div>


<!-- popup box -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body" id="frm_body">

            </div>
        </div>
    </div>
</div>
<!-- end popup box -->

  </body>
</html>