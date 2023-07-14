// Artiste
let artsitesSelected = [];

function addArtiste() {
    let artisteId = document.getElementById("artisteId").value;
    let heureArtiste = document.getElementById("heureArtiste").value;
    artsitesSelected.push({ artisteId, heureArtiste });
}

//Autre Depense

let autreDepensesSelected = [];
function addAutreDepense() {
    let autreDepenseId = document.getElementById("autreDepenseId").value;
    let prixAutreDepense = document.getElementById("prixAutreDepense").value;
    autreDepensesSelected.push({ autreDepenseId, prixAutreDepense });
    console.log(autreDepensesSelected);
}

// Logistique

let logistiquesSelected = [];
function addLogistique() {
    alert("makato");
    let logistiqueId = document.getElementById("logistiqueId").value;
    let dureeLogistique = document.getElementById("dureeLogistique").value;
    let quantiteLogistique = document.getElementById("quantiteLogistique").value;
    logistiquesSelected.push({ logistiqueId, dureeLogistique,quantiteLogistique});
    console.log(logistiquesSelected);
}

// Sonorisation

let sonorisationsSelected = [];
function addSonorisation() {
    let sonorisationId = document.getElementById("sonorisationId").value;
    let heureSonorisation = document.getElementById("heureSonorisation").value;
    let quantiteSonorisation = document.getElementById("quantiteSonorisation").value;
    sonorisationsSelected.push({ sonorisationId, heureSonorisation, quantiteSonorisation });
    console.log(sonorisationsSelected);
}


function addDevis() {

    let lieu = {
        'id': document.getElementById('lieuId').value,
        'titreSpectacle': document.getElementById('titreSpectacle').value,
        'vip': document.getElementById('vip').value,
        'reserve': document.getElementById('reserve').value,
        'normal': document.getElementById('normal').value,
        'dateDebut': document.getElementById('dateDebut').value,
        'heureDebut': document.getElementById('heureDebut').value,
        'prixLocation': document.getElementById('prixLocation').value,
    }

    let data = {
        'lieu': JSON.stringify(lieu),
        'artistesSelected': JSON.stringify(artsitesSelected),
        'sonorisationsSelected': JSON.stringify(sonorisationsSelected),
        'autreDepensesSelected': JSON.stringify(autreDepensesSelected),
        'logistiquesSelected': JSON.stringify(logistiquesSelected)
    };
    console.log(data);
    // Send an AJAX POST request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/devis'); // Replace with your endpoint URL
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Request successful, handle the response
            var response = xhr.responseText;
        }
    };
    xhr.send(JSON.stringify(data));

}
