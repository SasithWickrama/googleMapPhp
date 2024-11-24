//-------------------------------start initialize view map---------------------------------------//

function initMap() {
	
	var marker;
        map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(7.927079, 80.861244),
          zoom: 8,
          mapTypeId: 'satellite'
        });

	map.addListener('click', function() {
	
	var divs = document.getElementsByClassName("gm-style-iw-a"); //geoxml3_infowindow");
	console.log(divs.length);
	
	for(var i=0; i<divs.length;i++ ){
		divs[i].style.display = "none";
	}
	
	});	
	
	viewData();
       
}

//-------------------------------End initialize civil,cable & view map--------------------------------------//


//----------------------------start load view map data -----------------//	

function viewData(){
		
	if(newLoc != null){
		newLoc.hideDocument();
	}
	
	$.ajax({ type: "POST",url: "./kmlcreate/newLocation.php",success: function(result){				   
		newLoc = new geoXML3.parser({map: map});
		newLoc.parse('kmlfiles/newlocation.kml');
	}});
									
}

//----------------------------end load view map data -----------------//	

function closex(){

		document.getElementById("addinfo").style.display = "none";
}
    

function togelDoc(layer,el){

	var box = el.id;
	if (document.getElementById(box).checked == false)
	{
		layer.hideDocument();
	}
	else{
		layer.showDocument();
	}
	
}


function exit(){

		document.getElementById("over_map1").style.visibility = "hidden";
}
