
let ch = ["a","b","c","d","e","f","g","h","i","g","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];



let username = document.querySelector("#username");

let num = Math.floor(Math.random() * 99999);
let pass = Math.floor(Math.random() * 9999);

let test =[];

for(let i = 0; i < 6; i++){
  let pass = Math.floor(Math.random() * 26);
  test+=ch[pass];
}


 //alert success
 export function success(buttonOne, buttonTwo){
    Swal.fire({
        title: 'تم تسجيل المكتب بنجاح',
        
        html:
        `<input id="swal-input1" class="swal2-input" readonly="readonly" value="${username.value}${num}">` +
        `<input id="swal-input2" class="swal2-input" readonly="readonly" value="${test}${pass}">`,

        showDenyButton: true,
        confirmButtonText: `${buttonOne}`,
        denyButtonText: `${buttonTwo}`,
        icon: 'success',

      }).then((result) => {
        
        if (result.isConfirmed) {
          Swal.fire(myFunction())
        } else if (result.isDenied) {
            location.href = "";
        }
      })
      
      function myFunction() {
        Swal.fire(window.location.reload(true))

      }
}

 //alert eror
 export function error(buttonEror){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
      
      Toast.fire({
        icon: 'error',
        title: `${buttonEror}`,
      })
}