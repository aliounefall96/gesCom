<div class="card">
    <div class="card-header">
        <div class="card-title-wrap bar-success row">
            <div class="col">
                <h1 class="pl-md-3">{{$data['subtitle']}}</h1>
            </div>
            <div class="col text-md-right">
                <button class="btn btn-outline-primary" wire:click="retour"><i class="icon-action-undo" aria-hidden="true"></i> Retour</button>
            </div>
        </div>
    </div>
    <div class="card-body collapse show">
        <div class="card-block card-dashboard container">
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Date<span class="text-danger">*</span></span>
                        </div>
                        <input type="date" class="form-control @error('form.date') is-invalid @enderror"
                            placeholder="Entrez l'identifiant de l'agence" wire:model="form.date">
                        @error('form.date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Client <span class="text-danger">*</span></span>
                        </div>
                        <select class="form-control @error('form.client_id') is-invalid @enderror" wire:model="form.client_id">
                            <option value="">Selectionner un client</option>
                            @foreach ($clients as $cli)
                                <option value="{{$cli->id}}">{{$cli->nom}}</option>
                            @endforeach
                        </select>
                        @error('form.client_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Assigné à <span class="text-danger">*</span> </span>
                        </div>
                        <select  class="form-control @error('form.employed_id') is-invalid @enderror" wire:model="form.employed_id">
                            <option value="">Selectionner un employé</option>
                            @foreach ($emps as $emp)
                                <option value="{{$emp->id}}">{{$emp->prenom}} {{$emp->nom}}</option>
                            @endforeach
                        </select>
                        @error('form.employed_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Commentaire</label>
                        <textarea class="form-control" wire:model="form.description"></textarea></div>
                </div>
                    <div class="col-md-4 mt-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Statut <span class="text-danger">*</span></span>
                        </div>
                        <select class="form-control @error('form.statut') is-invalid @enderror" wire:model="form.statut">
                            <option value="">Selectionnez un statut</option>
                            @foreach ($statuts as $ds)
                                <option value="{{$ds->valeur}}">{{$ds->valeur}}</option>
                            @endforeach
                        </select>
                        @error('form.statut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body collapse show">
        <div class="card-block card-dashboard container-fluid">
            <div class="row  mb-3">
                <div class="col">
                    <h2>Bon de commande Article</h2>
                </div>
            </div>
            <hr>
            <!--  Ligne 1 -->
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Produits & Services</span>
                        </div>
                        <select  class="form-control" wire:model="idProd" wire:change="addToAllProducts">
                            <option value="">Selectionnez un produit ou service</option>
                            @foreach ($products as $p)
                                <option value="{{$p->id}}">{{$p->nom}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
            <!-- ligne 2 -->
            <div class="row mt-3">
                <table class="table">
                    <thead>
                        <th>Produit&Service <span class="text-danger">*</span></th>
                        <th>Description <span class="text-danger">*</span></th>
                        <th>Tarif <span class="text-danger">*</span></th>
                        <th>Quantité <span class="text-danger">*</span></th>
                        <th>TVA</th>
                        <th>Montant <span class="text-danger">*</span></th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($allProducts as $key=>$prod)
                            <tr>
                                <td><input type="text" class="form-control" value="{{$prod['nom']}}"></td>
                                <td><textarea class="form-control">{{$prod['description']}}</textarea></td>
                                <td><input type="number" class="form-control" name="prix{{$key}}" value="{{$prod['tarif']}}"></td>
                                <td><input type="number" class="form-control" value="{{$prod['qte']}}"></td>
                                <td><input type="number" class="form-control"  value="{{$prod['taxe']}}"></td>
                                <td><input type="number" class="form-control" readonly  value="{{$prod['amount']}}"></td>
                                <td><button class="btn btn-danger btn-rounded" wire:click.prevent="deleteRow({{$key}})"><i class="fa fa-trash" aria-hidden="true"></i></button></td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
            <!-- Montant Total -->
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <button class="btn btn-outline-success btn-rounded" wire:click="addRow"><i class="fa fa-plus" aria-hidden="true"></i></button>
                </div>
                <div class="col-md-6 text-right">
                    <div class="row text-bold">
                        <div class="col-md-6">
                            Sous Total :
                        </div>
                        <div class="col-md-6 text-left">
                            {{$subtotal}} F CFA
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Remise -->
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <div class="row text-bold">
                        <div class="col-md-6">
                            Remise :
                        </div>
                        <div class="col-md-3 text-left">
                            <div class="input-group">
                                <input type="number" placeholder="Remise" wire:model="form.discount" wire:change="getMontantTotal" class="form-control">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-percent" aria-hidden="true"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Montant final -->
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <div class="row ">
                        <div class="col-md-6 h4">
                            Montant Final <span class="text-danger">*</span>:
                        </div>
                        <div class="col-md-6 text-left text-bold h4 text-success">{{$form['total_amount']}} F CFA</div>
                    </div>
                </div>
            </div>

            <!-- Enregistrer la vente -->
            <div class="row mt-3">
                <button class="btn btn-success btn-rounded" wire:click.prevent="save">Enregister</button>
            </div>
        </div>
    </div>
</div>
