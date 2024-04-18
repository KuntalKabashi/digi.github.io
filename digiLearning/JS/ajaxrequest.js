$(document).ready(function(){
    //Ajax call for already Exist Email Verification
    $("#stumail").on(" blur",function(){
        var reg =/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stumail = $("#stumail").val();
        $.ajax({
            url: 'Student/addstudent.php',
            method: 'POST',
            data:{
                cheakmail : "cheakmail",
                stumail : stumail,
            },
            success:function(data){
                //console.log(data);
                if(data !=0){
                    $("#statusMsg2").html('<small style="color:red"> Email ID already Used !</small>');
                    $("#signup").attr("disabled", true);
                } 
                else if(data == 0 && reg.test(stumail)){
                    $("#statusMsg2").html('<small style="color:green"> There You GO!</small>');
                    $("#signup").attr("disabled", false);
                }
                else if(!reg.test(stumail)){
                    $("#statusMsg2").html('<small style="color:red"> Please Enter Valid Email e.g. example@mail.com !</small>');
                    $("#signup").attr("disabled", true);
                }
                if(stumail == ""){
                    $("#statusMsg2").html('<small style="color:red"> Please Enter Email !</small>');
                    $("#signup").attr("disabled", false);
                }
            },
        });
    });
});

function addStu(){
    var reg =/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname= $("#stuname").val();
    var stumail= $("#stumail").val();
    var stupass= $("#stupass").val();
    
    //cheaking form fields on form Submit
    if(stuname.trim()== ""){
        $("#statusMsg1").html('<small style="color:red"> Please Enter Name !</small>');
        $("#stuname").focus();
        return false;
    }else if (stumail.trim()== ""){
        $("#statusMsg2").html('<small style="color:red"> Please Enter Email !</small>');
        $("#stumail").focus();
        return false;
    }else if(stumail.trim() != "" && !reg.test(stumail)){
        $("#statusMsg2").html('<small style="color:red"> Please Enter Valid Email e.g. example@mail.com !</small>');
        $("#stumail").focus();
        return false;
    }
    else if (stupass.trim()== ""){
        $("#statusMsg3").html('<small style="color:red"> Please Enter Password !</small>');
        $("#stupass").focus();
        return false;
    } else{
        $.ajax({
            url:'Student/addstudent.php',
            method:'POST',
            dataType:"json",
            data:{
                stusignup:"stusignup",
                stuname : stuname,
                stumail : stumail,
                stupass : stupass,
            },
            success:function(data){
                console.log(data)
                if(data == "OK"){
                    $('#successMsg').html("<span class='alert alert-success'>Registraion Successful ! </span>");
                    clearStuRegField();
                }
                else if(data == "Failed"){
                    $('#successMsg').html("<span class='alert alert-danger'>Unabale to Register ! </span>");
                }
            },
        });
    }
}


//Empty all Fields

function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}
//Ajax call for student login verification
function cheakStuLogin()
{
    var stuLogEmail =$("#stuLogmail").val();
    var stuLogPass =$("#stuLogpass").val();
    $.ajax({
        url: 'Student/addstudent.php',
        method : "POST",
        data:{
            cheakLogemail :"cheaklogmail",
            stuLogEmail : stuLogEmail,
            stuLogPass : stuLogPass,
        },
        success : function(data){
            //console.log(data);
            if(data == 0){
                $('#statusLogMsg').html('<small class="alert alert-danger">Invalid Email ID or Password !</small>');
            }else if(data == 1){
                $('#statusLogMsg').html('<small class="alert alert-success">Logging...</small>');
                setTimeout(()=>{
                    window.location.href ="index.php"
                },1000);
            }
        },
    });
}
