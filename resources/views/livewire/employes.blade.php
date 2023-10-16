@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    @if ($etat === 'add')
        @include('ajouts.addEmploye')
    @elseif($etat === 'info')
        @include('infos.infoEmploye')
    @elseif($etat === 'edit')
        @include('edits.editEmploye')
    @else
        <button class="btn btn-outline-success" wire:click="addNew">Ajouter</button>
        <div class="row">
            @foreach ($emps as $emp)

                <div class="col-xl-3 col-lg-12">
                <div class="card mb-4">
                    <div class="card-body bar-primary">
                        <div class="card-block">
                            <div class="align-self-center halfway-fab text-center">
                                <a class="profile-image">
                                    <img src="storage/images/{{$emp->profil}}" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                                </a>
                            </div>
                            <div class="text-center">
                                <span class="font-medium-2 text-uppercase">{{$emp->prenom}} {{$emp->nom}}</span>
                                <p class="grey font-small-2">{{$emp->fonction}}</p>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <div class="card-footer">

                        <div class="row">
                            <div class="col">
                            <button class="btn btn-outline-success btn-sm" title="Consulter" wire:click="info({{$emp->id}})"><i class="ft-eye"></i> </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-warning btn-sm" title="Modifier" wire:click="edit({{$emp->id}})"><i class="ft-edit"></i> </button>
                        </div>
                        <div class="col">
                            <button class="btn btn-outline-danger btn-sm" title="Supprimer" wire:click="deleteEmploye({{$emp->id}})"><i class="fa fa-trash-o"></i> </button>
                        </div>
                        </div>
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
            @endforeach

        </div>
        <div class="row">
            {{ $emps->links() }}
        </div>
    @endif
</div>

@section('js')
    <script>
        window.addEventListener('employedUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Employé', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('profilUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Employé', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('employedAdded', event =>{
            toastr.success('Ajout avec succès!', 'Employé', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('employedDeleted', event =>{
            toastr.warning('Employé supprimé!', 'Employé', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
