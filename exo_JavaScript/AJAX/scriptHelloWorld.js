
    $.ajax("HelloWorld.php", {
        success: function (success){ 
        $( "#btn" ).on("click", function(e){
        $("#body").load('HelloWorld.php');
    })
    },
    error: function(){
        alert('erreur');
    }
    })