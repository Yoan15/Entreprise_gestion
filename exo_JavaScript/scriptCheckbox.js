var elt = document.getElementsByTagName("input");
var btn1 = document.getElementById("check");
function check(){
    btn1.addEventListener('click', check);
    for(var i = 0; i < elt.length; i++){
        if (elt[i].type === 'checkbox') {
            elt[i].checked = true;
        }
    }
}

var btn2 = document.getElementById("uncheck");
function uncheck(){
    btn2.addEventListener('click', uncheck);
    for(var i = 0; i < elt.length; i++){
        if (elt[i].type === 'checkbox') {
            elt[i].checked = false;
        }
    }
}