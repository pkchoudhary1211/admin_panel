


  $("#updateEmail").validate({
    errorClass: "invalid",
    rules:{
    	'email':{
    		
        required:true,
        email:true,
         
    	}
    	// 'newpassword':{
    	// 	required:true,
     //        minlength:8,
    	// },
    	
    	// // 'password':{
    	// // 	required:true,
    	// // 	minlength:8,
    	// //},
     //    'confirmPassword':{
     //        required:true,
     //        equalTo:'#newpassword'
     //    }

        // },
        // 'password_confirmation':{
        //     required:true,
        //     equalTo : "#password"
        // }

    	
    },
    messages:{
    	'email':{
           
    		required:"Please Enter Email ",
            email:'Please Enter Valid Id',

        }
    	// },
    	// 'newpassword':{
    	// required:"Please Enter User New Password ",
     //    minlength:'Your password must be at least 8 characters long!!',
    	// },
    	// // 'password':{
    	// // 	required:"Please Enter password",
     // //          minlength: "Your password must be at least 8 characters long",
    	// // },
     //    'confirmPassword':{
     //        required:'Please Enter Confirm Password',
     //        equalTo:'Your Password Not Matched !!'
        // },
        // 'password_confirmation':{
        //     required:'Please Enter Confirm Password ',
        //     equalTo:'Your Password Not Matched '

         }
    	

    	
    

});

