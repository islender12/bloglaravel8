<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{

    protected $model;
    private $relations;

    public function __construct(Model $model, array $relations = [])
    {
        $this->model = $model;
        $this->relations = $relations;
    }

    // Ajustamos el Metodo all para que acepte o no paginación
    public function all(int $paginate = 0)
    {
        $query = $this->model;

        if (!empty($this->relations)) {
            $query = $query->with($this->relations);
        }

        if ($paginate) {
            return $query->latest()->paginate($paginate);
        }

        return $query->get();
    }

    public function save(Model $model)
    {
        $model->save();
        return $model;
    }

    public function delete(Model $model)
    {
        $model->delete();
        return $model;
    }

    /**
     * @param $search string / Busqueda a Realizar desde el input de busqueda
     */
    public function search($search)
    {
        $query = $this->model;
        $busqueda = "%$search%";
        return $query->where("title", "like", $busqueda)->orWhere("body", "like", "$busqueda")->paginate(10);
        
    }
}
