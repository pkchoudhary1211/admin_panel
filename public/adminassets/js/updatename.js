


  $("#updateName").validate({
    errorClass: "invalid",
    rules:{
    	'name':{
    		
        required:true,
         maxlength: 30
         
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
    	'name':{
           
    		required:"Please Enter Name ",
            maxlength:'lenght length is 30',
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

