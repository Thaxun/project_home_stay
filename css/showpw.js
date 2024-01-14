function showPw(){
    let input = document.getElementById("input");
    if(input.type == "password"){
        input.type = "text";
    }else{
        input.type = "password";
    }
}