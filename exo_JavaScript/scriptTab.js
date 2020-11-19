var tds = document.getElementsByTagName("td");

for(var i = 0; i < tds.length; i++){
    var td = tds[i];
    td.addEventListener("click", function (event){
        var input = document.createElement("input");
        input.type = "text";
        var myClickedTd = event.target;
        myClickedTd.appendChild(input);
        event.stopPropagation;
        input.addEventListener("change", function(){
            event.target.innerHTML=input.value;
        })
    });
}
