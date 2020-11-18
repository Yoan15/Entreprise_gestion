// Exercice 1
var i = prompt("Veuillez saisir un nombre : ");

console.log("La valeur absolue est :" + Math.abs(i));

// Exercice 2

var j = 6;//prompt("Veuillez saisir un nombre : ");
var k = 7;//prompt("Veuillez saisir un nombre : ");

if (j > k) {
    console.log(j + " est supérieur à " + k)
} else {
    console.log(j + " est inférieur à " + k)
}

//Exercice 3

var l = prompt("Veuillez saisir un nombre : ");

if (l % 2 == 0) {
    alert("Le nombre est pair")
} else {
    alert("Le nombre est impair")
}

//Exercice 4

var m = 6;
var f = 1;

for (i = 1; i <= m; i++){
    f = f * i;
}

console.log(f);

//Exercice 5

var o;
var p;

for (o = 1; o <= 10; o++){
    console.log("Table de : " + o)
    for (p = 1; p <= 10; p++){
        console.log(r = o * p);
    }
}

//Exercice 6

nbr = prompt ("Veuillez saisir un nombre : ");

function fact(nbr) 
{
  // Si nbr = 0 la factorielle retournera 1
  if (nbr === 0)
  {
     return 1;
  }
  // appelez à nouveau la procédure récursive
  return nbr * fact(nbr-1);
}
console.log(fact(nbr));