document.addEventListener("DOMContentLoaded",() => {
    //button functionality
    const buttons = document.querySelectorAll(".buttons button");
    const pages = document.querySelectorAll(".page");
    
    function showPage(Page){
        buttons.forEach(button => {
            button.style.background = '#DCDCDC';
            button.style.color = '#3C3C3B';
        })
        document.querySelector(`[data-page=${Page}]`).style.background = '#0054CE';
        document.querySelector(`[data-page=${Page}]`).style.color = 'white';
        pages.forEach(page => {
            page.style.display = 'none';
        })
        document.querySelector(`#${Page}`).style.display = 'block';
       };

       showPage(buttons[0].dataset.page);
    
    buttons.forEach(button => {
        button.onclick = () => {
            showPage(button.dataset.page);
        }
    })




})