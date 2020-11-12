(function(){
    let login_input = document.querySelector(".login_input");
    let login_hidden = document.querySelectorAll(".login_hidden");
    
    login_input.addEventListener("keyup", function() {
        for (let i = 0; i < login_hidden.length; i++) {
            login_hidden[i].value = login_input.value;
        }
    });
})();