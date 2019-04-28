


  $("#addaccount").validate({
    errorClass: "validatee",
    rules:{
    	'name':{
    		required:true,
            noSpace: true
         
    	},
    	'email':{
    		required:true,
    	},
    	
    	// 'password':{
    	// 	required:true,
    	// 	minlength:8,
    	//},
        'role':{
            required:true,
        }

        // },
        // 'password_confirmation':{
        //     required:true,
        //     equalTo : "#password"
        // }

    	
    },
    messages:{
    	'name':{
            noSpace:'No Space In User Name',
    		required:"Please Enter User name",
    	},
    	'email':{
    	required:"Please Enter User Email Id",
    	},
    	// 'password':{
    	// 	required:"Please Enter password",
     //          minlength: "Your password must be at least 8 characters long",
    	// },
        'role':{
            required:'Please  Select  User Role',
        // },
        // 'password_confirmation':{
        //     required:'Please Enter Confirm Password ',
        //     equalTo:'Your Password Not Matched '

         }
    	

    	
    }

});

