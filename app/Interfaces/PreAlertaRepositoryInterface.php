<?php

namespace App\Interfaces;

interface PreAlertaRepositoryInterface
{
    public function create(array $data);
    public function getAll();
    public function findById($id);
    public function update(array $data, $id);
    public function delete($id);
    public function getEstados();

}