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
                            <label for="sujet">Nom<span class="text-danger">*</span></label>

                            <input id="sujet" type="text" class="form-control @error('form.sujet') is-invalid @enderror"  wire:model="form.sujet" required >

                            @error('form.sujet')
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

                        <div class="row">
                        <div class="form-group col">
                            <label for="assignation">Assigné à<span class="text-danger">*</span></label>

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
                        <div class="form-group col">
                            <label for="source">Source<span class="text-danger">*</span></label>

                            <select class="form-control @error('form.source') is-invalid @enderror" wire:model="form.source" >
                                <option value="">Selectionner une source</option>
                                @foreach ($sources as $source)
                                    <option value="{{$source->valeur}}">{{$source->valeur}}</option>
                                @endforeach
                            </select>

                            @error('form.source')
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
