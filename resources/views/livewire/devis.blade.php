@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    @if ($etat === 'add')
        @include('ajouts.addDevis')
    @else
        <button class="btn btn-outline-success" wire:click="addNew">Ajouter</button>

        <div class="card">
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <table class="table table-striped table-bordered file-export table-responsive-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Employé</th>
                                <th>Montant Total</th>
                                <th>Produit/Service</th>
                                <th>Statut</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($devis as $d)
                                <tr>
                                    <td>
                                                {{$d->date}}
                                            </td>
                                            <td>{{ $d->client->nom }}</td>
                                            <td>
                                                {{ $d->employed->prenom }}
                                                {{ $d->employed->nom }}
                                            </td>
                                            <td>{{ $d->total_amount }} F CFA</td>
                                            <td>
                                                @foreach ($d->devisItems as $item)
                                                    <span>{{$item->nom}}</span>
                                                @endforeach
                                            </td>
                                            <td>{{ $d->statut }}</td>
                                            <td>
                                                <button
                                                    class="btn btn-outline-primary rounded btn-sm"
                                                >
                                                    <i
                                                        class="fa fa-eye"></i>
                                                </button>
                                                <button
                                                    class="btn btn-outline-danger rounded btn-sm" >
                                                    <i
                                                        class="fa fa-trash"
                                                        aria-hidden="true"
                                                    ></i>
                                                </button>
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
        window.addEventListener('devisUpdated', event =>{
            toastr.success('Mis à jour avec succès!', 'Devis', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('devisAdded', event =>{
            toastr.success('Ajout avec succès!', 'Devis', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('devisDeleted', event =>{
            toastr.warning('Devis supprimé!', 'Devis', {positionClass: 'toast-top-right'});
        })

        window.addEventListener('rowEmpty', event =>{
            toastr.error('Veuillez remplir d\'abord la ligne courante', 'Devis', {positionClass: 'toast-bottom-right'});
        })
    </script>
@endsection

