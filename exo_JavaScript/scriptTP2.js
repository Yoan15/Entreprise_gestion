//créer la div
var elDiv = document.createElement("div");
//ajouter la div au body
document.body.appendChild(elDiv);
//attribuer un id à la div
elDiv.id = "divTP2";

//création formulaire
var elForm = document.createElement("form");

//création élément "fieldset"
var elFieldset = document.createElement("fieldset");

//création élément "legend"
var elLegend = document.createElement("legend")

//création texte légende et insertion dans élément "legend"
var elLegendContent = document.createTextNode("Uploader une image");
elLegend.appendChild(elLegendContent);

//création 2nde div et lui attribuer un style
var elDiv2 = document.createElement("div");
elDiv2.style = "text-align : center";

//création élément label
var elLabel = document.createElement("label");
elLabel.htmlFor = "inputUpload";

//création texte label
var elLabelContent = document.createTextNode("Image à uploader : ");
elLabel.appendChild(elLabelContent);

//création input upload image
// var elInputImage = document.createElement("input");
// elInputImage.type = "file";
// elInputImage.name = "inputUpload";
// elInputImage.id = "inputUpload";

//création élément br
var elBr = document.createElement("br");

//création input submit
// var elInputSubmit = document.createElement("input");
// elInputSubmit.type = "submit";
// elInputSubmit.value = "envoyer";

//fonction input
function input(type, name, id, value) {
    var input = document.createElement("input");
    input.type = type;
    input.name = name;
    input.id = id;
    input.value = value;
    return input;
}

var elInputImage = input("file", "inputUpload", "inputUpload", "");
var elInputSubmit = input("submit", "", "", "envoyer")


elDiv.appendChild(elForm);
elForm.appendChild(elFieldset);
elFieldset.appendChild(elLegend);
elFieldset.appendChild(elDiv2);
elDiv2.appendChild(elLabel);
elDiv2.appendChild(elInputImage);
elDiv2.appendChild(elBr);
elDiv2.appendChild(elBr.cloneNode(true));
elDiv2.appendChild(elInputSubmit);