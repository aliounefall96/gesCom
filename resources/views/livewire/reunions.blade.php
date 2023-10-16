@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    @if ($etat === 'add')
        @include('ajouts.addReunion')
    @else
        <div class="row">
            <div class="col-md-6 btn-group">
                <button type="button" class="btn btn-warning" wire:click="retour" @if($etat === 'list') disabled @endif >Liste</button>
                <button type="button" class="btn btn-warning"  @if($etat === 'list') disabled @endif wire:click="calendrier">Calendrier</button>
            </div>
            <div class="col-md-6 text-md-right">
                <button class="btn btn-outline-success" wire:click="addNew"><i class="ft-plus-circle"></i> Ajouter</button>
            </div>
        </div>
        <div class="card">
        <div class="card-body collapse show">
            <div class="card-block card-dashboard">
                @if ($etat === 'calendrier')
                    @include('infos.calendrier')
                @else
                    <table class="table table-striped table-bordered file-export table-responsive-sm" >
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reunions as $r)
                            <tr>
                                <td>{{$r->title}}</td>
                                <td>{{$r->date}}</td>
                                <td>{{$r->description}}</td>
                                <td><button class="btn btn-outline-primary btn-sm rounded mr-2" wire:click="edit({{$r->id}})" ><i class="fa fa-edit" aria-hidden="true"></i></button><button class="btn btn-outline-danger btn-sm rounded" title="Supprimer" wire:click="deleteReunion({{$r->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            </div>
        </div>
    </div>
    @endif

</div>

@section('js')
    <script>
        window.addEventListener('reunionUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Réunion', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('reunionAdded', event =>{
            toastr.success('Ajout avec succès!', 'Réunion', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('reunionDeleted', event =>{
            toastr.warning('Réunion supprimée!', 'Réunion', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
