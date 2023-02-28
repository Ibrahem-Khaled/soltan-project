let btn_one = document.querySelector(".btn-one");
let btn_two = document.querySelector(".btn-two");
let btn_three = document.querySelector(".btn-three");

let geniral =document.querySelector(".geniral");
let securty =document.querySelector(".securty");


btn_one.addEventListener("click",(e)=>{
    btn_one.classList.add("clickd");
    btn_two.classList.remove("clickd");
    btn_three.classList.remove("clickd");
})


btn_two.addEventListener("click",(e)=>{
    btn_two.classList.add("clickd");
    btn_one.classList.remove("clickd");
    btn_three.classList.remove("clickd");
})


btn_three.addEventListener("click",(e)=>{
    btn_three.classList.add("clickd");
    btn_one.classList.remove("clickd");
    btn_two.classList.remove("clickd");
})






