var btn = document.getElementById("button");
var brs = document.getElementsByTagName('br');
btn.addEventListener('click', function(e) {
    for (var i = brs.length -1; i >= 0; i--) {
        brs[i].parentNode.removeChild(brs[i]);
    }
}
);