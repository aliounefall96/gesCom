<?php

namespace App\Models;

use DateTime;
use App\Models\Country;
use App\Models\History;
use App\Models\StaticData;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Astuce extends Model
{
    public function addHistorique($message, $type)
    {
        History::create([
            'description' => $message,
            'type' => $type,
            'date' => new DateTime(),
            'user_id' => Auth::user()->id
        ]);
    }

    public function getFonction()
    {
        return StaticData::where('type', 'Type de fonction')->orderBy('valeur', 'ASC')->get();
    }

    public function getTaxe()
    {
        return StaticData::where('type', 'TVA')->orderBy('valeur', 'ASC')->get();
    }

    public function getProductType()
    {
        return StaticData::where('type', 'Type des produits et services')->orderBy('valeur', 'ASC')->get();
    }


    public function getTaskStatus()
    {
        return StaticData::where('type', 'Statut de la tâche')->orderBy('valeur', 'ASC')->get();
    }

    public function getEmployes()
    {
        return Employed::orderBy('prenom', 'ASC')->get();
    }

    public function getClients()
    {
        return Client::orderBy('nom', 'ASC')->get();
    }

    public function getProducts()
    {
        return Product::orderBy('nom', 'ASC')->get();
    }

    public function getCountries()
    {
        return Country::orderBy('nom_fr', 'ASC')->get();
    }

    public function getProspectSource()
    {
        return StaticData::where('type', 'Source du prospect')->get();
    }

    public function getDevisStatus()
    {
        return StaticData::where('type', 'Statut des devis')->get();
    }
}
