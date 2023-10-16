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
            <form wire:submit.prevent="addTask">
                    {{-- @csrf --}}
                    <div class="form-group">
                            <label for="titre">Titre<span class="text-danger">*</span></label>

                        <input id="titre" type="text" class="form-control @error('form.titre') is-invalid @enderror"  wire:model="form.titre" required >

                        @error('form.titre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label for="execution">Date d'execution<span class="text-danger">*</span></label>

                            <input id="execution" type="date" class="form-control @error('form.execution') is-invalid @enderror"  wire:model="form.execution" required >

                            @error('form.execution')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label >Assignation</label>
                            <select class="form-control @error('form.assignation') is-invalid @enderror" wire:model="form.assignation" >
                                <option value="">Selectionner un employé</option>
                                @foreach ($emps as $emp)
                                    <option value="{{$emp->prenom}} {{$emp->nom}}">{{$emp->prenom}} {{$emp->nom}}</option>
                                @endforeach
                            </select>

                            @error('form.assignation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
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

                    <div class="row">
                        <div class="form-group col">
                            <label >Type<span class="text-danger">*</span></label>
                            <select class="form-control @error('form.type') is-invalid @enderror" wire:model="form.type" >
                                <option value="">Selectionner un type</option>
                                <option value="Prospect">Prospect</option>
                                <option value="Client">Client</option>
                                <option value="Autres">Autres</option>
                            </select>

                            @error('form.type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col">
                            <label >Statut</label>
                            <select class="form-control @error('form.statut') is-invalid @enderror" wire:model="form.statut" >
                                <option value="">Selectionner un statut</option>
                                @foreach ($statuts as $t)
                                    <option value="{{$t->valeur}}">{{$t->valeur}}</option>
                                @endforeach
                            </select>

                            @error('form.statut')
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
