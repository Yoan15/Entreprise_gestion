//créer la div
var elDiv = document.createElement("div");
//ajouter la div au body
document.body.appendChild(elDiv);
elDiv.style = "display : none";
//attribuer un id à la div
elDiv.id = "divTP1";
//créer le texte et séparation 
var elContent = [
    document.createTextNode("Le "),
    document.createTextNode("World Wide Web Consortium"),
    document.createTextNode(", abrégé par le sigle "),
    document.createTextNode(" W3C"),
    document.createTextNode(", est un "),
    document.createTextNode("organisme de standardisation "),
    document.createTextNode(" à but non-lucratif chargé de promouvoir la compatibilité des technologies du "),
    document.createTextNode("World Wide Web")
    ];

// //création des éléments strong (sans fonction)
// var strong1 = document.createElement("strong");
// //ajoute strong autour de World Wide...
// strong1.appendChild(elContent[1]);

// var strong2 = document.createElement("strong");
// //ajoute strong autour de W3C
// strong2.appendChild(elContent[3]);

//création des éléments strong (avec fonction)
function strongWords(text) {
    var strong = document.createElement("strong");
        strong.appendChild(text);
        return strong;
}
var strong1 = strongWords(elContent[1]);
var strong2 = strongWords(elContent[3]);

// //création des a href (sans fonction)
// //1er a href
// var ODN = document.createElement("a");
// ODN.href = "https://fr.wikipedia.org/wiki/Organisation_de_normalisation";
// ODN.title = "Organisme de normalisation"
// ODN.appendChild(elContent[5]);

// //2nd a href
// var WWW = document.createElement("a");
// WWW.href = "https://fr.wikipedia.org/wiki/World_Wide_Web";
// WWW.title = "World Wide Web";
// WWW.appendChild(elContent[7]);

//création des a href (avec fonction)
function a(href, title) {
    var a = document.createElement("a");
    a.href = href;
    a.title = title;
    return a;
}

var ODN = a("https://fr.wikipedia.org/wiki/Organisation_de_normalisation", "Organisme de normalisation");
ODN.appendChild(elContent[5]);
var WWW = a("https://fr.wikipedia.org/wiki/World_Wide_Web", "World Wide Web");
WWW.appendChild(elContent[7]);

//afficher/cacher avec un bouton
var elt = document.getElementById("button");
var txt = document.getElementsByTagName("div");
elt.addEventListener('click', boutonAfficher);
function boutonAfficher(){
    if (elt.value === "Afficher"){
        elt.value = "Masquer";
        txt.text = elDiv.style.display = "block";
        document.body.appendChild(elDiv);
    } else if (elt.value === "Masquer"){
        elt.value = "Afficher";
        elDiv.style.display = "none";
    }
}

//ajouter au div "les enfants" texte, strong, href
elDiv.appendChild(elContent[0]);
elDiv.appendChild(strong1);
elDiv.appendChild(elContent[2]);
elDiv.appendChild(strong2);
elDiv.appendChild(elContent[4]);
elDiv.appendChild(ODN);
elDiv.appendChild(elContent[6]);
elDiv.appendChild(WWW);