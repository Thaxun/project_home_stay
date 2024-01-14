$(function(){
    $("#check").click(function(){
        var username = $("#userlog").val();
        var password = $("#input").val();
        if(username == ""){
            Swal.fire({
                icon: 'warning',
                title: 'ກະລຸນາປ້ອນຊື່ຜູ້ນຳໃຊ້ກ່ອນ...',
                showConfirmButton:false,
                timer:1500
            })
        }else if(password == ""){
            Swal.fire({
                icon: 'warning',
                title: 'ກະລຸນາປ້ອນລະຫັດຜ່ານກ່ອນ...',
                showConfirmButton:false,
                timer:1500
            })
        }else{
            $.post("css/check/check_user.php",{
                username:username,
                password:password
            },function(data){
                $('.show').html(data);
            })
        }
    })
})
