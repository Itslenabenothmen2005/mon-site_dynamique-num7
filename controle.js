//un module permettant de vérifier si une chaine passée en paramètre est composée seulement par des lettres et des espaces
function AlphaEspace(ch) {
  ch = ch.toUpperCase();
  i = 0;
  ok = true;
  while (ok && i < ch.length) {
    if ((ch.charAt(i) >= "A" && ch.charAt(i) <= "Z") || ch.charAt(i) == " ") {
      i = i + 1;
    } else {
      ok = false;
    }
  }
  return ok;
}
function verif1() {
  var sta = document.getElementById("st").selectedIndex;
  var nr = document.getElementById("nr").value;
  var ds = document.getElementById("ds").value;
  var m = document.getElementById("m").value;
  var la = document.getElementById("la").value;
  var lo = document.getElementById("lo").value;
  var hs = document.getElementById("hs").value;
  resultat = true;
  if (sta === 0) {
    alert("La sélection d'une station est obligatoire");
    resultat = false;
  }
  if (AlphaEspace(nr) == false || nr == "" || nr.length > 50) {
    alert("erreur nom région");
    resultat = false;
  }
  var da = new Date();

  if (new Date(ds) > da) {
    alert("erreur date");
    resultat = false;
  }
  d = ds + " " + hs;
  if (new Date(d) > da) {
    alert("erreur heur");
    resultat = false;
  }

  var c = m.substr(m.indexOf(".") + 1, m.length);
  if (m === "" || isNaN(m) || Number(m) < 1 || Number(m) > 10 || c.length > 1) {
    alert("erreur magnitude");
    resultat = false;
  }

  // Validate latitude
  var lat = "";
  if (la.indexOf(".") !== -1) {
    lat = la.substr(la.indexOf(".") + 1, la.length);
  }
  if (la == "" || isNaN(la) || lat.length !== 2 || Number(la) <= 0) {
    alert("erreur Latitude");
    resultat = false;
  }

  // Validate longitude
  var lot = "";
  if (lo.indexOf(".") !== -1) {
    lot = lo.substr(lo.indexOf(".") + 1, lo.length);
  }
  if (lo == "" || isNaN(lo) || lot.length !== 2 || Number(lo) <= 0) {
    alert("erreur Longitude");
    resultat = false;
  }
  return resultat;
}

function verif2() {
  var st = document.getElementById("st").selectedIndex;
  var resultat = true;

  // Validate station selection
  if (st === 0) {
    alert("La sélection d'une station est obligatoire");
    resultat = false;
  }

  // Validate year selection
  var an22 = document.getElementById("an22").checked;
  var an23 = document.getElementById("an23").checked;
  var an24 = document.getElementById("an24").checked;

  if (!an22 && !an23 && !an24) {
    alert("La sélection d'une année est obligatoire");
    resultat = false;
  }

  return resultat;
}
