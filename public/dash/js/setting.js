

function officeDataSetting(){

    let tables = document.querySelector("#tableofficesetting")

    let tr = document.createElement("tr");
    let pname = document.createElement("td");
    let poffice = document.createElement("td");
    let pofficeCode = document.createElement("td");

    pname.id = "pname";
    poffice.id = "poffice";
    pofficeCode.id = "pofficeCode";

    pname.textContent = "test";
    poffice.textContent = "test";
    pofficeCode.textContent = "test";

    tr.appendChild(pname);
    tr.appendChild(poffice);
    tr.appendChild(pofficeCode);

    tables.appendChild(tr);
} 

officeDataSetting();

let setting_btn =document.querySelector(".setting-btn");
setting_btn.addEventListener("click",()=>{
    window.location.href = "gneralsetting.html"
})