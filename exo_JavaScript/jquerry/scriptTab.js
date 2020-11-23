// ligne = $( "#ligne" );
// col = $( "#col" );
// var tds = document.getElementsByTagName("td");

// $( "#button" ).on( "click", function( event ){
//     for(i = 1; i < tds.length; i++){
        
//     }
// });

//modifyCell(1, 2, newtext)
$( "#idBtn").on("click", function(event){
    const row = $("#idRow").val();
    const col = $("#idCol").val();
    const text = $("#idText").val();
    modifyCell(row, col, text);
});
// function modifyCell(row, col, text){
//     const tr = $("tr").eq(row-1);
//     tr.children().eq(col-1).html(text);
// }
function modifyCell(row, col, text){
    $("tr").eq(row-1).children().eq(col-1).html(text);
} //ou
//$("tr:eq(" + (row-1) + ")td:eq(" + (col-1) + ")").html(text);

//ou
//const indiceCol = 2 * (row-1) + (col-1);
//$("td").eq(indiceCol).html(text);