const options = $("#colorSelect").children();
console.log(options.length);

$("#remove-btn").on("click", function(e){
    options.remove();
})