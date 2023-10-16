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
            <form wire:submit.prevent="addReunion">
                    {{-- @csrf --}}
                    <div class="form-group">
                            <label for="title">Titre<span class="text-danger">*</span></label>

                        <input id="title" type="text" class="form-control @error('form.title') is-invalid @enderror"  wire:model="form.title" required >

                        @error('form.title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description<span class="text-danger">*</span></label>

                        <textarea  class="form-control @error('form.description') is-invalid @enderror"  wire:model="form.description"  ></textarea>

                        @error('form.description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                            <label for="date">Date<span class="text-danger">*</span></label>

                            <input id="date" type="datetime-local" class="form-control @error('form.date') is-invalid @enderror"  wire:model="form.date"   >

                            @error('form.date')
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
