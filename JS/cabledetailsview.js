function savecblviewdata(){  

    var id = event.target.id.replace("save", "");
    
    var info =[];
    info[0] =   id;
    info[1] =   document.getElementById(id+'ctype').value;
    info[2] =   document.getElementById(id+'cduct').value;
    info[3] =   document.getElementById(id+'mhend1').value;
    info[4] =   document.getElementById(id+'mhend2').value;
    info[5] =   document.getElementById(id+'clength').value;
    info[6] =   document.getElementById(id+'core').value;
    
	
    $.ajax({
       type: "POST",
       data: {info:info},
       url: "./function.php?q=73",
       success: function(msg){
       swal("Updated Success");
       //cbldetails.hideDocument();

       getallnetdata();
	   
       }
    });
  }

function deletecblviewdata(){  

  var cblNo = document.getElementById("cblNo").value;
  
   swal({
    title: "Are you sure?",
    text: "Once deleted,all cable informations will not be able to recover!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      swal("All cable informations have been deleted", {
        icon: "success",
      });

       $.ajax({
       type: "POST",
       data: {cblNo:cblNo},
       url: "./function.php?q=74",
       success: function(msg){
       cbldetails.hideDocument();
       getcabledetailsview();
       }
    });

    } else {
      swal("Your informations are safe!");
    }
  });

}
  