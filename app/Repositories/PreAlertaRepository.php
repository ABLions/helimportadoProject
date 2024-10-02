<?php

namespace App\Repositories;

use App\Interfaces\PreAlertaRepositoryInterface;
use App\Models\PreAlerta;
use App\Models\Estado;

class PreAlertaRepository implements PreAlertaRepositoryInterface
{
    public function create(array $data)
    {
        return PreAlerta::create($data);
    }

    public function getAll()
    {
        return PreAlerta::all();
    }

    public function findById($id)
    {
        return PreAlerta::find($id);
    }

    public function update(array $data, $id)
    {
        $prealerta = PreAlerta::findOrFail($id); // Make sure the record exists
        return $prealerta->update($data); // Update with the validated data
    }

    public function delete($id)
    {
        $prealerta = PreAlerta::find($id);
        return $prealerta->delete();
    }

    public function getEstados()
    {
        return Estado::all();
    }
}
