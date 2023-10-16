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
                            <th>Date</th>
                            <th>Utilisateur</th>
                            <th>Type</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histos as $h)
                            <tr>
                                <td>{{$h->date}}</td>
                                <td>{{$h->user->name}}</td>
                                <td><span class="badge @if($h->type === 'Ajout') badge-success @elseif($h->type === 'Suppression')badge-danger @else badge-warning @endif">{{$h->type}}</span></td>
                                <td>{{$h->description}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
