

  
  $("#client").validate({
    errorClass: "validatee",
    ignore: [],
    
    rules:{
    	'name':{
    		required:true,
    	},
    	// 'email':{
    	// 	required:true,
     //        email:true,
    	//},
        'user_Id':{
            required:true,
        },
        'Manager':{
            required:true,
        },
        'ip_val'{
            required:true,
        }

    	
    },
    messages:{
    	'name':{
    		required:"Please Enter  User name",
    	},
    	// 'email':{
    	// required:"Please Enter User Email Id",
        //},
        'user_Id':{
        required:'Please Select Client',
    	},
        'Manager':{
            required:'Please Select Account Manager',

        },
        'ip_val'{
            required:'Please Enter Ip Address',
        } 

    	
    }

});

