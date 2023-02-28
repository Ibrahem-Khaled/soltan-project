let names = document.querySelector("#name");
let office = document.querySelector("#office");
let officeCode = document.querySelector("#officeCode");
let content = document.querySelector(".content");
let form = document.querySelector("form");





let getdata = localStorage.getItem("setData");
getdata = JSON.parse(getdata);


function createNewUser(i){

    let table = document.querySelector("#tableoffice")

    
    let tr = document.createElement("tr");
    let pname = document.createElement("td");
    let poffice = document.createElement("td");
    let pofficeCode = document.createElement("td");
    let submittd = document.createElement("td");
    let submit = document.createElement("a");

    pname.id = "pname";
    poffice.id = "poffice";
    pofficeCode.id = "pofficeCode";

    submit.id = "submitoffice"
    submit.setAttribute( "href",`setting.html?q=${i}`)
    submit.textContent = "تحرير"

    pname.textContent = getdata[i].username;
    poffice.textContent = getdata[i].nameoffice;
    pofficeCode.textContent = getdata[i].boxnumber;
    submittd.appendChild(submit)

    tr.appendChild(pname);
    tr.appendChild(poffice);
    tr.appendChild(pofficeCode);
    tr.appendChild(submittd);

    table.appendChild(tr);

    content.appendChild(table);
} ;

for(let i in getdata){
    createNewUser(i)
};
