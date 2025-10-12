<?php

namespace App\Livewire\AdminPanel;

use App\Models\Service;
use Livewire\Component;

class ServiceTable extends Component
{
    public $search = '';
    public function getRecords($inputs = [])
    {

        $records = new Service();

        if (!empty($inputs['search'])) {
            $records = $records->where('name', 'like', '%' . $inputs['search'] . '%');
        }

        return $records->paginate(10);
    }

    public function delete($id)
    {

        $record = Service::find($id);
        $record->delete();
        $this->dispatch('recordDeleted'); // optional feedback

    }

    #[\Livewire\Attributes\On('deleteConfirmed')]
    public function deleteConfirmed($id)
    {
        $this->delete($id);
    }
    public function render()
    {
        return view('livewire.admin-panel.service-table',          [
            'records' => $this->getRecords(['search' => $this->search]),
        ]);
    }   
}
