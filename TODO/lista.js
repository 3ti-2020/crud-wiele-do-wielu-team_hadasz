
    const todoList = document.querySelector('#todoList');
    const todoForm = document.querySelector('#todoForm');
    const todoSearch = document.querySelector('#todoSearch');
    const todoTextarea = todoForm.querySelector('textarea');

    function addTask(text) {
        const element = document.createElement("div");
        element.classList.add("element");

        //pobieram zawartość templatki
        const elementInner = document.querySelector("#elementTemplate").content.cloneNode(true);

        //wrzucam do elementu
        element.append(elementInner);

      
        //wstawiam tekst
        element.querySelector(".element-text").innerText = text;

        //i wrzucam element do listy
        todoList.append(element);
    }

    todoForm.addEventListener('submit', e => {
        e.preventDefault();

        if (todoTextarea.value !== '') {
            addTask(todoTextarea.value);
            todoTextarea.value = '';
        }
    });

    todoList.addEventListener("click", e => {
        if (e.target.classList.contains("element-delete")) {
            e.target.closest(".element").remove();
        }
    });

   