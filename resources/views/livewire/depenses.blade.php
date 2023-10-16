@section('sidebar')
    @include('layouts.sidebar')
@endsection
<div>
    @include('layouts.entete')

    <div class="card">
        <div class="card-body collapse show">
            <div class="card-block card-dashboard">
                <table class="table table-striped table-bordered file-export table-responsive-sm">
                    <thead>
                        <tr>
                            <th>Catégorie</th>
                                        <th>Mode de paiement</th>
                                        <th>Date</th>
                                        <th>Montant</th>
                                        <th>Description</th>
                                        <th>Reférence</th>
                                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($depenses as $exp)
                            <tr>
                                <td>{{$exp->category}}</td>
                                            <td>{{$exp->payment_mode}}</td>
                                            <td>{{$exp->date}}</td>
                                            <td>{{$exp->montant}} F CFA</td>
                                            <td>{{$exp->description}}</td>
                                            <td> {{$exp->recu}} </td>
                                        <td><button class="btn btn-outline-primary btn-sm rounded mr-2" data-toggle="modal" data-target="#editExpense"><i class="fa fa-edit" aria-hidden="true"></i></button><button class="btn btn-outline-danger btn-sm rounded"><i class="fa fa-trash" aria-hidden="true"></i></button> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
