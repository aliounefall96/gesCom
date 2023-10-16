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
            <form wire:submit.prevent="addProduct">
                    {{-- @csrf --}}
                    <div class="form-group">
                            <label for="nom">Nom<span class="text-danger">*</span></label>

                        <input id="nom" type="text" class="form-control @error('form.nom') is-invalid @enderror"  wire:model="form.nom" required >

                        @error('form.nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                            <label for="description">Description<span class="text-danger">*</span></label>

                        <textarea  class="form-control @error('form.description') is-invalid @enderror"  wire:model="form.description" required ></textarea>

                        @error('form.description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                            <label for="tarif">Tarif<span class="text-danger">*</span></label>

                        <input id="tarif" type="number" class="form-control @error('form.tarif') is-invalid @enderror"  wire:model="form.tarif" required >

                        @error('form.tarif')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label >Type<span class="text-danger">*</span></label>
                            <select class="form-control @error('form.type') is-invalid @enderror" wire:model="form.type" >
                                <option value="">Selectionner un type</option>
                                <option value="Produit">Produit</option>
                                <option value="Service">Service</option>
                            </select>

                            @error('form.type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label >Taxe</label>
                            <select class="form-control @error('form.taxe') is-invalid @enderror" wire:model="form.taxe" >
                                <option value="">Selectionner une taxe</option>
                                @foreach ($taxes as $taxe)
                                    <option value="{{$taxe->valeur}}">{{$taxe->valeur}}</option>
                                @endforeach
                            </select>

                            @error('form.taxe')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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
