var item = document.getElementById('info'),
    name,
    model,
    arr;


item.onclick = function () {
    "use strict";
    
    name = item.parentElement.nextElementSibling.firstElementChild.firstElementChild.textContent;
    model = item.parentElement.nextElementSibling.firstElementChild.nextElementSibling.textContent;
    arr = [name, model];
    item.appendTo('<input type="hidden" name="name" value=' + name + '/>');

};


