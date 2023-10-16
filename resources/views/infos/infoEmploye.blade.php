
<!--Basic User Details Ends-->
<section id="user-area">
    <div class="row">
        <div class="col-xl-4 col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="card-title-wrap bar-primary">
                        <div class="card-title">Information personnel</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div class="align-self-center halfway-fab text-center">
                            <a class="profile-image">
                                <img src="storage/images/{{$form['profil']}}" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
                            </a>
                        </div>
                        <div class="text-center">
                            <span class="font-medium-2 text-uppercase">{{$form['prenom']}} {{$form['nom']}}</span>
                            <p class="grey font-small-2">{{$form['fonction']}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-6">
                                    {{$form['prenom']}} {{$form['nom']}}
                                </div>
                                <div class="col-md-6 text-md-right">
                                    <button class="btn btn-outline-primary" wire:click="retour"><i class="icon-action-undo" aria-hidden="true"></i> Retour</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="no-list-style pl-0 ">
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-globe font-small-3"></i> Adresse:</a></span>
                                        <span class="display-block overflow-hidden">{{$form['adresse']}}</span>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-user font-small-3"></i> Genre</a></span>
                                        <span class="display-block overflow-hidden">{{$form['sexe']}}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="no-list-style pl-0 ">
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                                        <a class="display-block overflow-hidden">{{$form['email']}}</a>
                                    </li>
                                    <li class="mb-2">
                                        <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Télepone:</a></span>
                                        <span class="display-block overflow-hidden">{{$form['tel']}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
