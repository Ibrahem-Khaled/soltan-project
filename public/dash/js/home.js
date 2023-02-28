import {error,success} from "./main.js";


let getdata = localStorage.getItem("Admin");
getdata = JSON.parse(getdata)

let submitForm = document.querySelector("form");

let getcheckboxDolar = document.querySelector(".checkbox #dolar");
let getcheckboxTurkey = document.querySelector(".checkbox #turkey");
let getcheckboxSyria = document.querySelector(".checkbox #syria");

let getinput = document.querySelectorAll(".form-info .input-info .inputText");
let selectCountry = document.getElementById("country");

if(getdata.token){
    console.log("A")
}
else{
        document.body.remove()
        window.location.assign("login.html")   
}

submitForm.addEventListener("submit", (e) => {

    
  if(getValueInput() === false){
    e.preventDefault();
    validInbut= true
    validCheckbox = true;
    error("يرجي اكمال جميع الحقول");
  }


  if(getValueInput() === true){
      e.preventDefault();
      
        getData()
   
      success("تم","تحرير")
  }

})



//get all value from input
let validInbut;
let validCheckbox;
let validcountry;

function getValueInput(){
    
    getinput.forEach((i)=>{
        if(i.value === ""){
            validInbut = false;
            i.classList.add("error");
        }else{
            i.classList.remove("error");
        }
    })
    let validCheckbox = false;

    if(getcheckboxDolar.checked === true){
        validCheckbox = true;
        
    }
  
    if(getcheckboxTurkey.checked === true){
        validCheckbox = true;
    }
    
    if(getcheckboxSyria.checked === true){
        validCheckbox = true;
    }
    if(selectCountry.value === "defult"){
        validcountry = false
    }
    else{
        validcountry = true
    }
    
    if(validCheckbox === false || validInbut === false|| validcountry ===false){
        return false;

    }else{
        return true;
    }

}



// get api cuntry name
fetch("../js/api/countries.json").then((result) => {
    return result.json();
}).then((data) => {
    let re = Object.values(data);
    return re;

    // console.log(re)   
}).then((data) => {

    for (let i in data) {
        // console.log(data[i]["country"])
        let option = document.createElement("option");

        option.value = data[i]["country"];
        option.textContent = data[i]["country"];
        selectCountry.appendChild(option);
    }
})






let username = document.querySelector("#username");
let boxnumber = document.querySelector("#boxnumber");
let nameoffice = document.querySelector("#nameoffice");
let p_nameoffice = document.querySelector("#p-nameoffice");
let phonenumber = document.querySelector("#phonenumber");
let city = document.querySelector("#city");
let info_addres = document.querySelector("#info-addres");








function getData(){
    
    let datapro;
    if (localStorage.setData != null) {
    datapro = JSON.parse(localStorage.setData);
    } else {
     datapro = [];
    }
    
   

        let data = {
            username: username.value,
            boxnumber: boxnumber.value,
            nameoffice: nameoffice.value,
            p_nameoffice: p_nameoffice.value,
            phonenumber: phonenumber.value,
            country: selectCountry.value,
            city: city.value,
            info_addres: info_addres.value,
            dolar: getcheckboxDolar.checked === true? getcheckboxDolar.value:false,
            Turkey:  getcheckboxTurkey.checked === true? getcheckboxTurkey.value:false,
            syria:  getcheckboxSyria.checked === true? getcheckboxSyria.value:false,
        
        }

         let getdata = localStorage.getItem("setData");
            getdata = JSON.parse(getdata);
    
       
              datapro.push(data);
            
        

        localStorage.setItem('setData', JSON.stringify(datapro));
       
    
}


// localStorage.clear();