doGetJson("db_voiture.php", false);
// $.getJSON("db_voiture.php", function(data){
//     $.each(data, function(key, value){
//         $("<tr>").append($("<td>").html(value.marque), $("<td>").html(value.modele)).appendTo($("tbody"));
//     })
// })

$("#marque").on("change", function(e){
    const marqueSelectionnee = $("#marque :selected").val();
    let url = marqueSelectionnee ? "db_voiture.php?marque=" + marqueSelectionnee : "db_voiture.php";
    doGetJson("db_voiture.php", true);
    // $.getJSON(url, function(data){
    //     $("tbody").empty();
    //     $("#modele").empty().append($("<option value= ''>").html("-- Sélectionnez un modèle --"));
    //     $.each(data, function(key, value){
    //         $("#modele").append($("<option value='" + value.modele + "'>").html(value.modele));
    //         $("<tr>").append($("<td>").html(value.marque), $("<td>").html(value.modele)).appendTo($("tbody"));
    //     });
    // })
})

$("#modele").on("change", function(e){
    const modeleSelectionne = $("#modele :selected").val();
    const marqueSelectionnee = $("#marque option:selected").val();
    //égal à If
    let url = modeleSelectionne ?
        "db_voiture.php?marque=" + marqueSelectionnee + "&modele=" + modeleSelectionne
        :
        "db_voiture.php?marque=" + marqueSelectionnee;
    doGetJson(url, false);
    // $.getJSON(url, 
    // function(data){
    //     $("tbody").empty();
    //     $.each(data, function(key, value){
    //         $("<tr>").append($("<td>").html(value.marque), $("<td>").html(value.modele)).appendTo($("tbody"));
    //     });
    // })
})

function doGetJson(url, isSelect){
    $.getJSON(url, function(data){
    $("tbody").empty();
        if (isSelect) {
            $("#modele").empty().append($("<option value=''>").html("-- Sélectionnez un modèle --"));   
        }
        $.each(data, function(key, value){
            if (isSelect) {
                $("#modele").append($("<option value='" + value.modele + "'>").html(value.modele));
            }
            $("<tr>").append($("<td>").html(value.marque), $("<td>").html(value.modele)).appendTo($("tbody"));       
        });
    })
}