

  
  $("#newpermission").validate({
    errorClass: "validatee",
    rules:{
    	'name':{
    		required:true,
    	},
    	'Display_Name':{
    		required:true,
    	},
    	
    	'Details':{
    		required:true,
    		
    	}

    	
    },
    messages:{
    	'name':{
    		required:"Please Enter Permission Name",
    	},
    	'Display_Name':{
    	required:"Please Enter Display Name",
    	},
    	'Details':{
    		required:"Please Enter Role Details"
    	}
    	

    	
    }

});

