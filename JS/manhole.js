function TransMhdata(){	

	var id = event.target.id.replace("trans", "");
	
	var info =[];
	info[0] = 	id;
		
	swal({
    title: "Are you sure?",
    text: "You want to proceed",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
    
	$.ajax({
       type: "POST",
       data: {info:info},
       url: "./function.php?q=4",
       success: function(msg){
	   swal("sucessfully transfer data in to edit mode");
       manholes.hideDocument()
       getdatacivil();
	   
       }
    });
	
    } else {
      swal("Process Cancled!");
    }
	
  });
  
}
  
  
function setsubtype(){
 
    var select = document.getElementById(event.target.id);
    var type = select.options[select.selectedIndex].value;
    
    var id = event.target.id.replace("type", "");
    var resp= "";
    if(type == 'MH'){
       resp =  ["S-1","S-2","S-3","S-4","L-1","L-2","L-3","special" ];
    }else if(type == 'HH'){
       resp =  ["HH-1","HH-2","HH-3"];
    }

    sel = document.getElementById(id+'mhsubtype');

      sel.options.length = 0;
      var opt = document.createElement('option');
      opt.value = '';
      opt.innerHTML = '';
      sel.appendChild(opt);

      for (var i = 0; i<resp.length; i++){
        var opt = document.createElement('option');
        opt.value = resp[i].replace('&','*');
        opt.innerHTML = resp[i];
        sel.appendChild(opt);
      }
    }


    function checkKey(e,location) {

    e = e || window.event;
    
    //arrow key event
    if (e.keyCode == '38' || e.keyCode == '40' || e.keyCode == '37' || e.keyCode == '39' || e.keyCode == '13') {
        //event
    }else{
      getroadname(location);
    }

}

  
function getroadname(location){
  
  var location = location.value;

  $.ajax({

       type: "POST",
       data: {location:location},
       url: "function.php?q=20",
       success: function(result){

        $('#locations').html('');

        $('#locations').html(result);

       }
    });

}


function deletemhdata(){  

  var mhNo = document.getElementById("mhNo").value;
  
   swal({
    title: "Are you sure?",
    text: "Once deleted,all Manhole-Handhole informations will not be able to recover!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("All images and other Manhole-Handhole informations have been deleted", {
        icon: "success",
      });

       $.ajax({
       type: "POST",
       data: {mhNo:mhNo},
       url: "./function.php?q=21",
       success: function(msg){
       manholes.hideDocument()
       getdata();
       }
    });

    } else {
      swal("Your informations are safe!");
    }
  });

}


 function showImage(img){

    $("#image-gallery").modal('show');
    
    document.getElementById("show-next-image").style.visibility = "visible"; 

    var imageName = $(img).attr('src');
    var id = $(img).attr('id');

     $('#image-gallery-image').attr('src', imageName);
     $('#imgNo').val(id);

 }

function loadcbl(){
  
 var cblid = event.target.id.replace("cbl", "");
 var rtom = document.getElementById("rtom").value; 
 
 if(cblvw != null){
	cblvw.hideDocument();
 }
 
 $.ajax({ type: "POST",url: "./kmlcreate/cablevwjoint.php", 
	data: {rtom:rtom,cblid:cblid},
	success: function(result){	
	
	cblvw = new geoXML3.parser({map: map});
	cblvw.parse('kmlfiles/'+rtom+'cablvwjnt.kml');
		
 }});

}
 
$(document).ready(function(){

$(document).on('change','#avatar1',function(){

	  var form_data = new FormData(); 

	  let modalId = $('#image-gallery');

	  var counter = 0;

      var files = $('#avatar1')[0].files;

      $('.preview').html("");

      len_files = $("#avatar1").prop("files").length;
	  

      for (var i = 0; i < len_files; i++) {

           var name = files[i].name;

           var extension = name.split('.').pop().toLowerCase();

            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
            {
               alert('invalid imgeformat '+i);

            }
            else
           {
              var MHno = document.getElementById("MHno").value;

              var file_data = $("#avatar1").prop("files")[i];
  
              form_data.append("avatar1[]", file_data);

              form_data.append("txtid[]", MHno);

              var construc = '<img width="50px" height="50px" src="' +  window.URL.createObjectURL(file_data) + '" alt="'  +  file_data.name  + '" />';
              $('.preview').append(construc); 

               $.ajax({
                  url: "./upload.php?q=1",
                  dataType: 'image/jpg',
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: form_data, 
                  type: 'post',
                  success: function(data) {

                      //$('#uploaded_images').html('Image Uploaded successfully');
                      
                  }
              });

           }

      }
	  
  }); 

 /* $(document).on('click','img',function(){

    $("#image-gallery").modal('show');
    
    document.getElementById("show-next-image").style.visibility = "visible"; 

    var imageName = $(this).attr('src');
    var id = $(this).attr('id');

     $('#image-gallery-image').attr('src', imageName);
     $('#imgNo').val(id);

  });*/

  

  $(document).on('click','#show-next-image,#show-previous-image',function(){
         
        var current_image = $('#imgNo').val();
        var imgCount = document.getElementById("imgeCount").value;

        if ($(this).attr('id') === 'show-previous-image') {
          current_image--;
        } else {
          current_image++;
        }
        
        $('#imgNo').val(current_image);
        var imgsrc = document.getElementById(current_image).src;
        
		$('#image-gallery-image').attr('src', '');
        $('#image-gallery-image').attr('src', imgsrc);

        disableButtons(imgCount,current_image);

    });


    function disableButtons(counter_max, counter_current) {

      if (counter_max == counter_current) {

        $('#show-next-image').hide();
        $('#show-previous-image').show();

      } else if (counter_current == 1) {

        $('#show-previous-image').hide();
        $('#show-next-image').show();

      }else{

         $('#show-previous-image, #show-next-image').show();
      }
    }

    $(document).on('click','#delete-image',function(){
         
        var current_image = $('#imgNo').val();
        var imgCount = document.getElementById("imgeCount").value;

        var imgsrc = document.getElementById(current_image).src;
		
         var MHno = document.getElementById("MHno").value;

        var deleteFile = confirm("Do you really want to Delete?");


        if (deleteFile == true) {
	
            $.ajax({
              url: 'removeFile.php',
              type: 'post',
              data: {path: imgsrc,imgcount: imgCount,MHno: MHno,request: 1},
              success: function(response){
                 // Remove
                 if(response == 1){ 

                  var cimgNo = current_image;

                  for(var i=1; i<=imgCount; i++){

                    if(cimgNo<= i){

                        if(imgCount==i){
                          var nextImgNo = parseFloat(i);
                        }else{
                          var nextImgNo = parseFloat(i)+1;
                        }
                        
                        var cimgsrc = document.getElementById(nextImgNo).src;

						$.ajax({

							  url: 'removeFile.php',
							  type: 'post',
							  data: {path: cimgsrc,imgNo: nextImgNo,MHno: MHno,request: 2},
							  success: function(res2){

								// if(res2 == 1){

								//     manholes.hideDocument()
								//     getdata();

								// }

								 location.reload();

							  }

						  });

                    }

                  }

                  if(imgCount>current_image){

                    cimgNo++;

                  }else{

                    cimgNo--;

                  }

                  var imgsrc = document.getElementById(cimgNo).src;

                  $('#imgNo').val(cimgNo);
                  $('#image-gallery-image').attr('src', '');
                  $('#image-gallery-image').attr('src', imgsrc);

                  disableButtons(imgCount,current_image);

                 } 
              } 
            }); 
         } 

    });

});