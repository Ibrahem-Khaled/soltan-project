import {error} from "./main.js";

let userName = document.querySelector(".username")
let passWord = document.querySelector(".password")
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

   let userValed = true;
    let passValed =true;

    if(userName.value === "" && passWord.value ===""){
        passValed = false;
        userValed = false;
        passWord.classList.add("error");
        userName.classList.add("error");
        error("يرجي ادخال اسم المستخدم وكلمة المرور");
    }else if(userName.value === ""){
        userValed = false;
        userName.classList.add("error");
        error("يرجي ادخال اسم المستخدم");
        passWord.classList.remove("error");

    }else if(passWord.value === ""){
        userName.classList.remove("error");
        passValed = false;
        passWord.classList.add("error");
        error("يرجي ادخال كلمة المرور");

    }else if(userName.value != getdata.name ||  passWord.value != getdata.password){
        passValed = false;
        userValed = false;
        passWord.classList.add("error");
        error("اسم المستخدم وكلمة المرور خطأ");
    }


    if(userValed === false || passValed === false){
        return false;
    }else{

        return true;
    }

}


let login = {
    name: "admin",
    password: "admin"
}

localStorage.setItem('Admin', JSON.stringify(login));

let getdata = localStorage.getItem("Admin");
getdata = JSON.parse(getdata)



function loginCheck(){
    if(userName.value === getdata.name &&  passWord.value === getdata.password){
        console.log(true)
        login.token = "123";
        localStorage.setItem('Admin', JSON.stringify(login));
        window.location.assign("index.html");
    }
}


// localStorage.clear();
