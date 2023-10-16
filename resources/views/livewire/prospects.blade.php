@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')
    @if ($etat === 'add')
        @include('ajouts.addProspect')
    @else
        <button class="btn btn-outline-success" wire:click="addNew"><i class="ft-plus-circle"></i> Ajouter</button>
        <div class="card">
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <table class="table table-striped table-bordered table-responsive-sm file-export">
                        <thead>
                            <tr>
                                <th>Sujet</th>
                                <th>Source</th>
                                <th>Assigné à</th>
                                <th>Pays</th>
                                <th>Adresse</th>
                                <th>Email</th>
                                <th>Tel</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prospects as $p)
                                <tr>
                                    <td>{{$p->sujet}}</td>
                                    <td>{{$p->source}}</td>
                                    <td>{{$p->assignation}}</td>
                                    <td>{{$p->pays}}</td>
                                    <td>{{$p->adresse}}</td>
                                    <td>{{$p->email}}</td>
                                    <td>{{$p->tel}}</td>
                                    <td> <button class="btn btn-outline-primary btn-sm rounded mr-2" wire:click.prevent="edit({{$p->id}})"><i class="fa fa-edit" aria-hidden="true"></i></button><button class="btn btn-outline-danger btn-sm rounded" wire:click.prevent="delete({{$p->id}})"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
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
        window.addEventListener('prospectUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Prospect', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('prospectAdded', event =>{
            toastr.success('Ajout avec succès!', 'Prospect', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('prospectDeleted', event =>{
            toastr.warning('Prospect supprimé!', 'Prospect', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
