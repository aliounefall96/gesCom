<div class="card">
    <div class="card-header">
        <div class="card-title-wrap bar-success row">
            <div class="col">
                <h1 class="pl-md-3">{{$data['subtitle']}}</h1>
            </div>
            <div class="col text-md-right">
                <button class="btn btn-outline-primary" wire:click="retour"><i class="icon-action-undo" aria-hidden="true"></i> Retour</button>
            </div>
        </div>
    </div>
    <div class="card-body collapse show">
        <div class="card-block card-dashboard container col-md-8">
            <form wire:submit.prevent="addEmploye">
                    {{-- @csrf --}}
                <div class="row">
                    <div class="form-group col">
                        <label for="prenom">Prénom</label>
                        <input id="prenom" type="text" class="form-control @error('form.prenom') is-invalid @enderror"  wire:model="form.prenom" required autocomplete="form.prenom" autofocus>

                        @error('form.prenom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                            <label for="nom">Nom</label>

                        <input id="nom" type="text" class="form-control @error('form.nom') is-invalid @enderror"  wire:model="form.nom" required >

                        @error('form.nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="adresse">Adresse</label>
                        <input id="adresse" type="text" class="form-control @error('form.adresse') is-invalid @enderror"  wire:model="form.adresse" required autocomplete="form.adresse" autofocus>

                        @error('form.adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                            <label for="email">Email</label>

                        <input id="email" type="email" class="form-control @error('form.email') is-invalid @enderror"  wire:model="form.email" required >

                        @error('form.email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label >Fonction</label>
                    <select class="form-control @error('form.fonction') is-invalid @enderror" wire:model="form.fonction" >
                        <option value="">Selectionner une fonction</option>
                        @foreach ($fonctions as $fonc)
                            <option value="{{$fonc->valeur}}">{{$fonc->valeur}}</option>
                        @endforeach
                    </select>

                    @error('form.fonction')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col">
                        <label for="tel">Tel</label>
                        <input id="tel" type="text" class="form-control @error('form.tel') is-invalid @enderror"  wire:model="form.tel" required >

                        @error('form.tel')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col">
                        <label>Sexe</label>
                        <select wire:model="form.sexe" class="form-control @error('form.email') is-invalid @enderror" required>
                            <option value="">Selectionner un genre</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>

                        @error('form.sexe')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-success">
                    Ajouter
                </button>
            </form>
        </div>
    </div>
    </div>
