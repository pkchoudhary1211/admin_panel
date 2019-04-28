$(document).ready(function(){
         var arr=[];
       
       
        $(".btn-success").click(function(){
            var flag=0;
            //var name = $("#name").val();
           
            var ip = $("#ip").val();
            // var found = arr.find(function(ip) {
            //     return ip ==arr ;
            // });
            //console.log(ip);
            for(var i=0; i<arr.length; i++) {
                //console.log(i);
                if (arr[i] == ip){ 
                    //return true;
                    flag=1;
                    break;
                }
            
            }
            //console.log('below for');
            if(flag==1){
                console.log("ip already added");
                 $("#ip_msg").html('Ip already added');
            }else{
                if(ip==''){
                     $("#ip_msg").html('Please Enter Ip Address');
                }else{
                    var ipformat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
                    if(!ip.match(ipformat)){
                        
                        $("#ip_msg").html('Please Enter Valid Ip Address');
                    }else{
                        flag=0;
                        arr.push(ip);
                        //console.log(arr);
                        var markup="";
                        for(var i=0;i<arr.length;i++){
                            console.log(arr[i]);
                            markup = markup+"<tr class='" + arr[i]+ "'><td><input type='checkbox'name='record'></td><td id='" + i + "'>'"  + arr[i] + "' </td></tr>";
                            //$("table tbody").append(markup);
                        }
                       // console.log(markup);
                        $("table tbody").html(markup);
                        console.log('hello  World');
                        document.getElementById("ip_class").value = arr;
                        var nn=document.getElementById('ip_class');
                        //console.log();
                        console.log(arr);
                        //parents("tr").remove();
                         $("#ip_msg").html('');
                        var node = document.createTextNode("This is new.");
                    }
                }
            }
        });
        
        // Find and remove selected table rows
        $(".btn-danger").click(function(){
            $("table tbody").find('input[name="record"]').each(function(){
                if($(this).is(":checked")){
                    //var trval =$(this).parents("tr").className = class;
                    var rowval= document.getElementsByTagName('tr').className;
                    console.log(rowval);
                    var name = $("#ip").val();
                    //console.log("deleted : "+ip);
                    var val=$(this).parents("tr").remove();

                    //console.log(val[0]);
                    var cls_name=val[0].className;
                    //var array = [2, 5, 9];
                    //console.log(array)
                    console.log('second'+arr);
                    var index = arr.indexOf(cls_name);
                      //var $temp = $('#id1').html();
                    if (index > -1) {
                        console.log('inside if');
                        arr.splice(index, 1);
                        document.getElementById("ip_class").value = arr;
                         $("#ip_msg").html('');
                    }
                    // array = [2, 9]
                    console.log(arr);


                }
            });
        });
    });   