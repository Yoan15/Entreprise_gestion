//argument tab ignoré
function createTab(row, col){
    const table = $("<table border = 1>");
    for (let i = 0; i < row; i++) {
        const tr = $("<tr>");
        for (let j = 0; j < col; j++) {
            tr.append($("<td>").html(i + "-" + j)); //$("td").appendTo(tr);
        }   
        table.append(tr);
    }
    $("body").append(table);
};