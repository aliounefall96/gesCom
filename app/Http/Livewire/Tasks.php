<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use App\Models\Task;
use Livewire\Component;

class Tasks extends Component
{
    public $histo;

    public $etat = 'list';
    public $statuts;
    public $emps;

    public $data = [
        'icon' => 'fas fa-edit',
        'title' => 'Tâches',
        'subtitle' => 'Liste des tâches',
    ];

    public $form = [
        'titre' => '',
        'type' => '',
        'assignation' => '',
        'statut' => '',
        'execution' => '',
        'description' => '',
        'id' => null
    ];

    protected $rules = [
            'form.titre' => 'required',
            'form.type' => 'required',
            'form.assignation' => 'required',
            'form.statut' => 'required',
            'form.execution' => 'required',
            'form.description' => 'required',
    ];

    public function addNew()
    {
        $this->data['subtitle'] = 'Ajout tâche';
        $this->etat = 'add';
    }

    public function retour()
    {
        $this->data['subtitle'] = 'Liste des tâches';
        $this->etat = 'list';
    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->first();
        $this->form['id'] = $task->id;
        $this->form['titre'] = $task->titre;
        $this->form['statut'] = $task->statut;
        $this->form['execution'] = $task->execution;
        $this->form['type'] = $task->type;
        $this->form['assignation'] = $task->assignation;
        $this->form['description'] = $task->description;

        $this->data['subtitle'] = 'Edition tâche';
        $this->etat = 'add';

    }

    public function addTask()
    {
        $this->validate();

        if($this->form['id']){
            $task = Task::where('id', $this->form['id'])->first();

            $task->titre = $this->form['titre'];
            $task->type = $this->form['type'];
            $task->statut = $this->form['statut'];
            $task->execution = $this->form['execution'];
            $task->assignation = $this->form['assignation'];
            $task->description = $this->form['description'];

            $task->save();

            $this->dispatchBrowserEvent('taskUpdated');

            $this->histo->addHistorique("Edition d'une tâche", "Edition");

        }else{
            Task::create([
                'titre' => $this->form['titre'],
                'type' => $this->form['type'],
                'assignation' => $this->form['assignation'],
                'statut' => $this->form['statut'],
                'execution' => $this->form['execution'],
                'description' => $this->form['description']
            ]);

            $this->dispatchBrowserEvent('taskAdded');

            $this->histo->addHistorique("Ajout d'une tâche", "Ajout");
        }

        $this->retour();

    }

    public function deleteTask($id)
    {
        $task = Task::where('id', $id)->first();

        $task->delete();

        $this->dispatchBrowserEvent('taskDeleted');

        $this->histo->addHistorique("Suppression d'une tâche", "Suppression");
    }

    public function render()
    {
        $tasks = Task::orderBy('titre', 'ASC')->get();

        $this->histo = new Astuce();

        $this->statuts = $this->histo->getTaskStatus();

        $this->emps = $this->histo->getEmployes();

        return view('livewire.tasks', [
            'page' => 'task',
            'tasks' => $tasks
        ]);
    }

    private function formInit()
    {
        $this->form['titre'] = '';
        $this->form['type'] = '';
        $this->form['assignation'] = '';
        $this->form['statut'] = '';
        $this->form['execution'] = '';
        $this->form['description'] = '';
        $this->form['id'] = null;
    }
}
