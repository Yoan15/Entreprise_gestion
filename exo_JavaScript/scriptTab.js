var tds = document.getElementsByTagName("td");

// for(var i = 0; i < tds.length; i++){
//     var td = tds[i];
//     td.addEventListener("click", function (event){
//         var input = document.createElement("input");
//         input.type = "text";
//         var myClickedTd = event.target;
//         myClickedTd.appendChild(input);
//         event.stopPropagation;
//         input.addEventListener("change", function(){
//             event.target.innerHTML = input.value;
//         })
//     });
// }

//correction
for (let i = 0; i < tds.length; i++) {
    const element = tds[i];
    element.addEventListener("click", function(event){
        const tdContent = element.innerHTML;
        element.innerHTML = "";
        const input = document.createElement("input");
        input.type = "text";
        input.value = tdContent;
        event.target.appendChild(input);
        input.focus();

        input.addEventListener("focusout", function(event){
            const targetInput = event.target;
            const inputContent = targetInput.value;
            targetInput.parentElement.innerHTML = inputContent;
        });

        //evite de vider
        input.addEventListener("click", function(event){
            event.stopPropagation();
        });
    });
}