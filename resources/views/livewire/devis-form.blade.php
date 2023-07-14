<script src="{{ asset('js/myjs/Devis.js') }}" defer></script>
<form action="" method="post">
    @csrf

    <div class="row mb-4">
        <div class="form-outline col ">
            <input type="text" id="titreSpectacle" class="form-control " name="titreSpectacle" />
            <label class="form-label" for="titreSpectacle">titre du Spectacle</label>
        </div>

        <div class="form-outline col ">
            <input type="text" id="prixLocation" class="form-control " name="prixLocation" />
            <label class="form-label" for="prixLocation">prix Location</label>
        </div>

        <div class="form-outline col ">
            <input type="date" id="dateDebut" class="form-control " name="dateDebut" />
            <label class="form-label" for="dateDebut">dateDebut</label>
        </div>

        <div class="form-outline col ">
            <input type="time" id="heureDebut" class="form-control " name="heureDebut" />
            <label class="form-label" for="heuredebut">heure debut</label>
        </div>
    </div>

    <div class="row">
        <label class="form-label" for="select">lieu</label>
    </div>
    <div class="row mb-4">
        <div class="form-group col ">
            <select id="lieuId" class="form-control" name="lieu">
                @foreach ($lieux as $lieu)
                    <option value="{{ $lieu->id }}">
                        {{ $lieu->typelieu->designation }} {{ $lieu->nom }} {{ $lieu->capacite }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-outline col ">
            <input type="number" id="vip" class="form-control " name="vip" />
            <label class="form-label" for="vip">VIP</label>
        </div>

        <div class="form-outline col ">
            <input type="number" id="reserve" class="form-control " name="reserve" />
            <label class="form-label" for="reserve">Reserve</label>
        </div>
        <div class="form-outline col ">
            <input type="number" id="normal" class="form-control " name="normal" />
            <label class="form-label" for="normal">Normal</label>
        </div>
    </div>

    <div class="row">
        <label class="form-label" for="select">Artiste</label>
    </div>

    <div class="row mb-4">

        <div class="col">
            <div class="form-group  ">
                <select id="artisteId" class="form-control" name="artiste">
                    @foreach ($artistes as $artiste)
                        <option value="{{ $artiste->id }}">
                            {{ $artiste->nom }} {{ $artiste->prenom }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col">
            <div class="form-outline ">
                <input type="number" id="heureArtiste" class="form-control " name="dureeSono" />
                <label class="form-label" min=0 for="heureArtiste">Duree</label>
            </div>
        </div>

    </div>

    <div class="row">
        <button type="button" onclick="addArtiste()" class="btn btn-success btn-block mb-4">Ajouter
            Artiste</button>
    </div>


    <div class="row">
        <label class="form-label" for="select">Sonorisation</label>
    </div>

    <div class="row mb-4">
        <div class="form-group col ">
            <select id="sonorisationId" class="form-control" name="sonorisation">
                @foreach ($sonorisations as $sonorisation)
                    <option value="{{ $sonorisation->id }}">
                        {{ $sonorisation->typesonorisation }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-outline col ">
            <input type="number" min=0 id="heureSonorisation" class="form-control " name="dureeArtiste" />
            <label class="form-label" for="heureSono">Heure</label>
        </div>

        <div class="form-outline col ">
            <input type="number" min=0 max=59 id="quantiteSonorisation" class="form-control "
                name="quantiteSono" />
            <label class="form-label" for="quantiteSono">Quantite </label>
        </div>
    </div>

    <div class="row">
        <button type="button" onclick="addSonorisation()" class="btn btn-success btn-block mb-4">Ajouter
            Sonorisation</button>
    </div>

    <div class="row">
        <label class="form-label" for="select">Autre Depense</label>
    </div>

    <div class="row mb-4">
        <div class="form-group col">
            <select id="autreDepenseId" class="form-control" name="depense">
                @foreach ($autreDepenses as $depense)
                    <option value="{{ $depense->id }}">
                        {{ $depense->designation }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-outline col ">
            <input type="number" id="prixAutreDepense" class="form-control " name="prix" />
            <label class="form-label" for="duree">prix</label>
        </div>
    </div>


    <div class="row">
        <button type="button" onclick="addAutreDepense()" class="btn btn-success btn-block mb-4">Ajouter
            Depense</button>
    </div>

    <div class="row">
        <label class="form-label" for="select">Logistique</label>
    </div>
    <div class="row mb-4">
        <div class="form-group col">
            <select id="logistiqueId" class="form-control" name="logistique">
                @foreach ($logistiques as $logistique)
                    <option value="{{ $logistique->id }}">
                        {{ $logistique->typelogistique }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-outline col ">
            <input type="number" min=0 id="dureeLogistique" class="form-control " name="duree" />
            <label class="form-label" for="duree">Duree</label>
        </div>

        <div class="form-outline col ">
            <input type="number" min=0 id="quantiteLogistique" class="form-control " name="quantiteLogistique" />
            <label class="form-label" for="duree">Quantite logistique</label>
        </div>

    </div>

    <div class="row">
        <button type="button" onclick="addLogistique()" class="btn btn-success btn-block mb-4">Ajouter
            Logistique</button>
    </div>

    <!-- button button -->
    <button type="button" onclick="addDevis()" class="btn btn-success btn-block mb-4">Inserer</button>
</form>
