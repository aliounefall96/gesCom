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
        <div class="card-block card-dashboard container col-md-6">
            <form wire:submit.prevent="save">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="form-group col">
                            <label for="nom">Nom<span class="text-danger">*</span></label>

                            <input id="nom" type="text" class="form-control @error('form.nom') is-invalid @enderror"  wire:model="form.nom" required >

                            @error('form.nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                                <label for="adresse">Adresse<span class="text-danger">*</span></label>

                            <input id="adresse" type="text" class="form-control @error('form.adresse') is-invalid @enderror"  wire:model="form.adresse" required >

                            @error('form.adresse')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="tel">Téléphone<span class="text-danger">*</span></label>

                            <input id="tel" type="text" class="form-control @error('form.tel') is-invalid @enderror"  wire:model="form.tel" required >

                            @error('form.tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col">
                                <label for="email">Email<span class="text-danger">*</span></label>

                            <input id="email" type="email" class="form-control @error('form.email') is-invalid @enderror"  wire:model="form.email" required >

                            @error('form.email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                        <div class="form-group ">
                            <label >Pays<span class="text-danger">*</span></label>
                            <select class="form-control @error('form.pays') is-invalid @enderror" wire:model="form.pays" >
                                <option value="">Selectionner un pays</option>
                                @foreach ($pays as $p)
                                    <option value="{{$p->nom_fr}}">{{$p->nom_fr}}</option>
                                @endforeach
                            </select>

                            @error('form.pays')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    @if ($form['id'])
                        <button type="submit" class="btn btn-outline-warning">
                            Modfifier
                        </button>
                    @else
                        <button type="submit" class="btn btn-outline-success">
                            Ajouter
                        </button>
                    @endif

            </form>
        </div>
    </div>
    </div>
