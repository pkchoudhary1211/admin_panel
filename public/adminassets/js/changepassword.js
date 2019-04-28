


  $("#Change_password").validate({
    errorClass: "Change_password",
    rules:{
    	'current_password':{
    		required:true,
            //noSpace: true
         
    	},
    	'new_password':{
    		required:true,
            minlength:8,
    	},
    	
    	// 'password':{
    	// 	required:true,
    	// 	minlength:8,
    	//},
        'confirm_password':{
            required:true,
            equalTo : "#new_password"
        }

        // },
        // 'password_confirmation':{
        //     required:true,
        //     equalTo : "#password"
        // }

    	
    },
    messages:{
    	'current_password':{
            //noSpace:'No Space In User Name',
    		required:"Please Enter tyj th   Current Password",
    	},
    	'new_password':{
    	required:"Please Enter User New Password",
         minlength: "Your password must be at least 8 characters long",

    	},
    	// 'password':{
    	// 	required:"Please Enter password",
     //          minlength: "Your password must be at least 8 characters long",
    	// },
        'confirm_password':{
            required:'Please  Enter Confirm Password',
             equalTo:"Your Confirm Password Not Matched !!"
        // },
        // 'password_confirmation':{
        //     required:'Please Enter Confirm Password ',
        //     equalTo:'Your Password Not Matched '

         }
    	

    	
    }

});

