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
    let logistiqueId = document.getElementById("logistiqueId").value;
    let dureeLogistique = document.getElementById("dureeLogistique").value;
    let quantiteLogistique = document.getElementById("quantiteLogistique").value;
    logistiquesSelected.push({ logistiqueId, dureeLogistique, quantiteLogistique });
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






// -------------------------HAFA NOUVEAU CODE-------------------------

let updatedArtist = [];
function updateArtist(artistId, newDuree) {
    let index = updatedArtist.findIndex(artist => artist.id === artistId);

    if (index !== -1) {
        // L'artiste existe déjà, mettez à jour la durée
        updatedArtist[index].duree = newDuree;
    } else {
        // L'artiste n'existe pas, ajoutez un nouvel objet artiste
        let artist = {
            id: artistId,
            duree: newDuree
        };
        updatedArtist.push(artist);
    }
    console.log(updatedArtist);
}

let updatedSono = [];
function updateQuantiteSono(sonoId, newQuantite) {
    let index = updatedSono.findIndex(sono => sono.id === sonoId);
    if (index !== -1) {
        updatedSono[index].quantite = newQuantite
    } else {
        let sono = {
            id: sonoId,
            quantite: newQuantite
        };
        updatedSono.push(sono);
    }
    console.log(updatedSono);
}

function updateDureeSono(sonoId, newDuree) {
    let index = updatedSono.findIndex(sono => sono.id === sonoId);

    if (index !== -1) {
        updatedSono[index].dureesono = newDuree
    } else {
        let sono = {
            id: sonoId,
            dureesono: newDuree,
        };
        updatedSono.push(sono);
    }
    console.log(updatedSono);
}

let updatedLogistique = [];
function updateDureeLogistique(logistiqueId, newDuree) {
    let index = updatedLogistique.findIndex(logistique => logistique.id === logistiqueId);
    if (index !== -1) {
        updateLogistique[index].dureelogistique = newDuree;
    } else {
        let logistique = {
            id: logistiqueId,
            dureelogistique: newDuree,
        };
        updatedLogistique.push(logistique);
    }
    console.log(updatedLogistique);
}
function updateQuantiteLogistique(logistiqueId, newQuantite) {
    let index = updatedLogistique.findIndex(logistique => logistique.id === logistiqueId);
    if (index !== -1) {
        updateLogistique[index].quantite = newQuantite
    } else {
        let logistique = {
            id: logistiqueId,
            quantite: newQuantite
        };
        updatedLogistique.push(logistique);
    }
    console.log(updatedLogistique);
}

let updatedAutreDepense = [];
function updateAutreDepense(autreDepenseId, newprix) {
    let index = updatedAutreDepense.findIndex(autreDepense => autreDepense.id === autreDepenseId);
    if (index !== -1) {
        updatedAutreDepense[index].prix = newprix
    } else {
        let autreDepense = {
            id: autreDepenseId,
            prix: newprix
        };
        updatedAutreDepense.push(autreDepense);
    }
    console.log(updatedAutreDepense);
}

function updatedDevis(devisId) {

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
        'devisId': devisId,
        'lieu': JSON.stringify(lieu),
        'artistesSelected': JSON.stringify(artsitesSelected),
        'sonorisationsSelected': JSON.stringify(sonorisationsSelected),
        'autreDepensesSelected': JSON.stringify(autreDepensesSelected),
        'logistiquesSelected': JSON.stringify(logistiquesSelected),
        'updatedArtist': JSON.stringify(updatedArtist),
        'updatedSono': JSON.stringify(updatedSono),
        'updatedLogistique': JSON.stringify(updatedLogistique),
        'updatedAutreDepense': JSON.stringify(updatedAutreDepense)
    };
    console.log(data);
    // Send an AJAX POST request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', '/api/updatedevis/' + devisId); // Replace with your endpoint URL
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // Request successful, handle the response
            var response = xhr.responseText;
        }
    };
    xhr.send(JSON.stringify(data));

}
