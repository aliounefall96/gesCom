@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')
     @if ($etat === 'add')
        @include('ajouts.addFr')
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
                            @foreach ($frs as $fr)
                                <tr>
                                    <td>{{$fr->nom}}</td>
                                    <td>{{$fr->pays}}</td>
                                    <td>{{$fr->adresse}}</td>
                                    <td>{{$fr->email}}</td>
                                    <td>{{$fr->tel}}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm rounded mr-2" wire:click.prevent="edit({{$fr->id}})" title="Modifier"><i class="fa fa-edit" aria-hidden="true"></i></button><button class="btn btn-outline-danger btn-sm rounded" wire:click.prevent="delete({{$fr->id}})" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
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
        window.addEventListener('frUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Fournisseur', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('frAdded', event =>{
            toastr.success('Ajout avec succès!', 'Fournisseur', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('frDeleted', event =>{
            toastr.warning('Fournisseur supprimé!', 'Fournisseur', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
