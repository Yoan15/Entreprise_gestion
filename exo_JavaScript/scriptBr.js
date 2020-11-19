var btn = document.getElementById("button");
var brs = document.getElementsByTagName('br');
btn.addEventListener('click', () => {
    for (var i = brs.length -1; i >= 0; i--) {
        brs[i].parentNode.removeChild(brs[i]);
    }
}
);