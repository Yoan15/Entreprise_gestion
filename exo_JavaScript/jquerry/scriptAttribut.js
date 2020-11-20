$( "#values-btn" ).on( "click", function( event ){
    link = $( "#ggl" );
    $("p").append( "</br>" ).append(link.attr("href"));
    $("p").append( "</br>" ).append(link.attr("hreflang"));
    $("p").append( "</br>" ).append(link.attr("rel"));
    $("p").append( "</br>" ).append(link.attr("target"));
    $("p").append( "</br>" ).append(link.attr("type"));
});