const obj = {

    ocena: document.querySelector(".ocena"),
    button1: document.querySelector(".button1"),
    button2: document.querySelector(".button2"),

    getCookie: function(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
            c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
            }
        }
        return "";
    },

    init:function (){
        this.ocena.innerText = this.getCookie("rating");

        this.button2.addEventListener("click", function(){
            document.cookie = "rating=" + (parseInt(this.ocena.innerText) + parseInt(1));
            this.ocena.innerText = this.getCookie("rating");
        }.bind(this))

        this.button1.addEventListener("click", function(){
            document.cookie = "rating=" + (parseInt(this.ocena.innerText) - parseInt(1));
            this.ocena.innerText = this.getCookie("rating");
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
