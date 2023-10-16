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
        <div class="card-block card-dashboard container col-md-4">
            <form method="POST" wire:submit.prevent="addStaticData" novalidate>
                <div class="form-group controls">
                    <label for="">Type</label>
                    <input type="text" wire:model="form.type" class="form-control">
                    @error('form.type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label for="">Valeur</label>
                        <input type="text"  wire:model="form.valeur" required data-validation-required-message="Ce champ est requis" minlength="3" class="form-control">
                        @error('form.valeur')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-outline-success" type="submit">Ajouter</button>
            </form>
        </div>
    </div>
    </div>
