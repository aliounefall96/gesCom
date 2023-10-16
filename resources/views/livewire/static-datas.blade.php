@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    @if ($etat === 'add')
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
                    <input type="text" wire:model="form.type" @error('form.type') is-invalid @enderror" class="form-control">
                    @error('form.type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="controls">
                        <label for="">Valeur</label>
                        <input type="text"  wire:model="form.valeur" @error('form.valeur') is-invalid @enderror" required data-validation-required-message="Ce champ est requis" minlength="3" class="form-control">
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

    @else

    @foreach ($staticDatas as $index => $value)
      <div class="card collapse-icon accordion-icon-rotate">
          <div id="headingCollapse{{$this->removeSpace($index)}}"  class="card-header" >
          <a data-toggle="collapse" href="#collapse{{$this->removeSpace($index)}}" aria-expanded="true" aria-controls="collapse{{$this->removeSpace($index)}}" class="card-title lead text-dark">{{$index}} </a>
          <button type="button" class="btn btn-outline-success btn-sm" wire:click="addNew()">
                                <i class="icon-plus" aria-hidden="true"></i>Ajouter
                    </button>
        </div>
        <div id="collapse{{$this->removeSpace($index)}}" role="tabpanel" aria-labelledby="headingCollapse{{$this->removeSpace($index)}}" class="collapse">
          <div class="card-body">
            <div class="card-block">
              <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Label</th>
                                <th>Valeur</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($value as $sd)

                            <tr>
                                <td>{{$sd->label}}</td>
                                <td>{{$sd->valeur}}</td>
                                <td>
                                    <!-- <input type="checkbox" @click="changeStatus(sd.id)" v-if="sd.statut == 1" checked>
                                    <input type="checkbox" @click="changeStatus(sd.id)" v-if="sd.statut == 0"> -->
                                    <div class="form-group">
                                        <input type="checkbox" id="switcheryPrimary" data-size="xs" class="switchery" data-color="success" @if($sd->statut === 1)   checked  @endif/>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-outline-warning btn-sm rounded mr-3" data-toggle="modal" data-target="#editStaticData" ><i class="fa fa-edit" aria-hidden="true"></i></button>
                                        <button class="btn btn-outline-danger btn-sm rounded" ><i class="fa fa-trash"  aria-hidden="true"></i></button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

</div>
