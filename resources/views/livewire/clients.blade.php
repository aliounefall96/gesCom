@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    @if ($etat === 'add')
        @include('ajouts.addClient')
    @else
        <button class="btn btn-outline-success" wire:click="addNew">Ajouter</button>
        <div class="card">
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <table class="table table-striped table-bordered file-export table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Pays</th>
                                <th>Adresse</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clients as $cli)
                                <tr>
                                    <td>{{$cli->nom}}</td>
                                                <td>{{$cli->pays}}</td>
                                                <td>{{$cli->adresse}}</td>
                                                <td>{{$cli->email}}</td>
                                                <td>{{$cli->tel}}</td>
                                            <td>
                                                <button class="btn btn-outline-primary btn-sm rounded mr-2" wire:click.prevent="edit({{$cli->id}})" title="Editer" data-target="#editClient" ><i class="fa fa-edit" aria-hidden="true"></i></button><button class="btn btn-outline-danger btn-sm rounded" wire:click.prevent="delete({{$cli->id}})" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                            </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

</div>


@section('js')
    <script>
        window.addEventListener('clientUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Client', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('clientAdded', event =>{
            toastr.success('Ajout avec succès!', 'Client', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('clientDeleted', event =>{
            toastr.warning('Client supprimé!', 'Client', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
