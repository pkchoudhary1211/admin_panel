

  
  $("#newrole").validate({
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
    		
    	},
        'permission[]':{
            required:true,
           // error.appendTo('.errorTxt');
            
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
    		required:"Please Enter Role Details",
    	},
        'permission[]':{
            required:'Please Select Permission'
           
        },
            
    	

    	
    },errorElement : 'div',
            errorLabelContainer: '.errorTxt'


});

