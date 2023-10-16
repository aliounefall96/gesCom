
<!--Basic User Details Ends-->
<section id="user-area">
    <div class="row">
        <div class="col-xl-3 col-lg-3">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                        <div class="card-title">{{$data['subtitle']}}</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form wire:submit.prevent="uploadImage" enctype="multipart/form-data">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    @if ($photo)
                                        <img src="{{$photo->temporaryUrl()}}" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                                    @else
                                    <img src="storage/images/{{$form['profil']}}" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                                    @endif
                                </a>
                            </div>
                            <div class="text-center">
                                <div class="custom-file mt-3">
                                    <input type="file" class="custom-file-input" wire:model="photo">
                                    <label for="image" class="custom-file-label">Changer votre avatar</label>
                                    <div wire:loading wire:target="photo">Chargement...</div>
                                </div>
                                @error('photo') <span class="error">{{ $message }}</span> @enderror
                                <button type="submit" class="btn btn-outline-warning mt-3">Changer</button>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-9 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    {{$data['subtitle']}}
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <button class="btn btn-outline-primary" wire:click="retour"><i class="icon-action-undo" aria-hidden="true"></i> Retour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <form wire:submit.prevent="editEmploye">
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

                <button type="submit" class="btn btn-outline-warning">
                    Modifier
                </button>
            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
