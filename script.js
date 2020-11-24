const obj = {

    ocena: document.querySelector(".ocena"),
    button1: document.querySelector(".button1"),
    button2: document.querySelector(".button2"),

    
    init:function (){
        

        this.button2.addEventListener("click", function(){
            
            this.ocena.innerText = parseInt(this.ocena.innerText) + parseInt(1);
        }.bind(this))

        this.button1.addEventListener("click", function(){
           
            this.ocena.innerText = parseInt(this.ocena.innerText) - parseInt(1);
        }.bind(this))
    }
}
obj.init();

(function(){
    let login_input = document.querySelector(".login_input");
    let login_hidden = document.querySelectorAll(".login_hidden");
    if (login_input) {
        login_input.addEventListener("keyup", function() {
            for (let i = 0; i < login_hidden.length; i++) {
                login_hidden[i].value = login_input.value;
            }
        });
    }
})();