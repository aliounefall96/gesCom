@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    @if ($etat === 'add')
        @include('ajouts.addTask')
    @else
        <button class="btn btn-outline-success" wire:click="addNew"><i class="ft-plus-circle"></i> Ajouter</button>
        <div class="card">
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <table class="table table-striped table-bordered table-responsive-sm file-export">
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Statut</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Date d'execution</th>
                                <th>Assignation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $t)
                                <tr>
                                    <td>{{$t->titre}}</td>
                                    <td>{{$t->statut}}</td>
                                    <td>{{$t->type}}</td>
                                    <td>{{$t->description}}</td>
                                    <td>{{$t->execution}}</td>
                                    <td>{{$t->assignation}}</td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm rounded mr-2" wire:click.prevent="edit({{$t->id}})" title="Editer"><i class="fa fa-edit" aria-hidden="true"></i></button><button class="btn btn-outline-danger btn-sm rounded" wire:click.prevent="deleteTask({{$t->id}})" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
        window.addEventListener('taskUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Tâche', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('taskAdded', event =>{
            toastr.success('Ajout avec succès!', 'Tâche', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('taskDeleted', event =>{
            toastr.warning('Tâche supprimée!', 'Tâche', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
