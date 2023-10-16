@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    @if ($etat === 'add')
        @include('ajouts.addProduct')
    @else
        <button class="btn btn-outline-success" wire:click="addNew"><i class="ft-plus-circle"></i> Ajouter</button>
        <div class="card">
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <table class="table table-striped table-bordered table-responsive-sm  file-export">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Tarif</th>
                                <th>Taxe</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $p)
                                <tr>
                                    <td>{{$p->nom}}</td>
                                    <td>{{$p->description}}</td>
                                    <td>{{$p->type}}</td>
                                    <td>{{$p->tarif}} F CFA</td>
                                    <td>{{$p->taxe}}%</td>
                                    <td> <button class="btn btn-outline-primary btn-sm rounded mr-2" title="Editer" wire:click.prevent="edit({{$p->id}})"><i class="fa fa-edit" aria-hidden="true"></i></button> <button class="btn btn-outline-danger btn-sm rounded" wire:click.prevent="deleteProduct({{$p->id}})" title="Supprimer"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
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
        window.addEventListener('productUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Produit/Service', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('productAdded', event =>{
            toastr.success('Ajout avec succès!', 'Produit/Service', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('productDeleted', event =>{
            toastr.warning('Produit/Service supprimé!', 'Produit/Service', {positionClass: 'toast-top-right'});
        })
    </script>
@endsection
