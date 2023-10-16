@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    <div class="card">
        <div class="card-body collapse show">
            <div class="card-block card-dashboard">
                <table class="table table-striped table-responsive-sm table-bordered file-export">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Employé</th>
                            <th>Montant Total</th>
                            <th>Produit/Service</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventes as $v)
                            <tr>
                                <td>
                                            {{$v->date}}
                                        </td>
                                        <td>{{ $v->client->nom }}</td>
                                        <td>
                                            {{ $v->employed->prenom }}
                                            {{ $v->employed->nom }}
                                        </td>
                                        <td>{{ $v->total_amount }} F CFA</td>
                                        <td>
                                            @foreach ($v->produitVendus as $item)
                                                <span>{{$item->nom}}</span>
                                            @endforeach
                                        </td>
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
</div>
