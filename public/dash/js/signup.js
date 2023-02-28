import {error} from "./main.js";

let userName_signup = document.querySelector(".username-signup")
let password_signup = document.querySelector(".password-signup")
let c_password_signup = document.querySelector(".c-password-signup")
let phone_signup = document.querySelector(".phone-signup")

let formSubit = document.querySelector("form")


formSubit.addEventListener("submit", submitFormLogin);

function submitFormLogin(e){

    if(inputCheck() === false){
        e.preventDefault();
        inputCheck();
    }else{
        e.preventDefault();
        loginCheck();
    }
}


 
function inputCheck(){

    let userNameValed = true;
    let passwordValed = true;
    let c_passwordValed = true;
    let phoneValed = true;

    if(userName_signup.value === "" || password_signup.value ==="" || c_password_signup.value ==="" || phone_signup.value ===""){


        userNameValed = false;
        passwordValed = false;
        c_passwordValed = false;
        phoneValed = false;

        userName_signup.classList.add("error");
        password_signup.classList.add("error");
        c_password_signup.classList.add("error");
        phone_signup.classList.add("error");
        error("يرجي اكمال جميع البيانات");
    }else{
        userName_signup.classList.remove("error");
        password_signup.classList.remove("error");
        c_password_signup.classList.remove("error");
        phone_signup.classList.remove("error");
    }

    if( userNameValed === false || passwordValed === false || c_passwordValed === false ||phoneValed === false){
        return false
    }else{
        return true;
    }


}
