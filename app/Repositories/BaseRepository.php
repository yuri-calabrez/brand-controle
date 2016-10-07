<?php

namespace App\Repositories;

use App\Contracts\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Description of BaseRepository
 *
 * @author Yuri
 */
abstract class BaseRepository implements RepositoryInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Find data by id
     * @param type $id
     * @param type $columns
     */
    public function find($id, $columns = array('*'))
    {
        $model = $this->model->find($id, $columns);
        
        return $model;
    }

    /**
     *  Retrieve all data of repository
     * @param type $columns
     * @return type
     */
    public function findAll($columns = array('*'))
    {
        $model = $this->model->get($columns);

        return $model;
    }

    public function paginate($path, $items, $currentPage, $maxPage = 5)
    {
        $result = [];
        $currentPage = (isset($currentPage) && filter_var($currentPage, FILTER_VALIDATE_INT) ?  $currentPage : 1);

        foreach ($items as $item):
            $result[] = $item;
        endforeach;

        $currentItems = array_slice($result, $maxPage * ($currentPage - 1), $maxPage);
        $totalItens = count($items);

        $paginator = new LengthAwarePaginator($currentItems, $totalItens, $maxPage, $currentPage);

        //Trata URL
        $uri = $path;
        $posicao = strpos($uri, '?');
        $posicao = ($posicao == false ? strlen($uri) : $posicao);
        $newUri = substr($uri, 0, $posicao - 1);

        $paginator->setPath($newUri . "/");

        return $paginator;
    }

    /**
     * Find data by field and value
     * @param type $field
     * @param type $value
     * @param type $columns
     */
    public function findByField($field, $value, $columns = array('*'))
    {
        $model = $this->model->where($field, '=', $value)->first($columns);

        return $model;
    }
    
    public function findAllByField($field, $value, $columns = array('*'))
    {
        $model = $this->model->where($field, '=', $value)->get($columns);

        return $model;
    }

    /**
     * Find data by multiple field
     * @param array $where
     * @param type $columns
     */
    public function findWhere(array $where, $columns = array('*'))
    {

        foreach ($where as $field => $value):
            if (is_array($value)):
                list($field, $condition, $val) = $value;
                $this->model = $this->model->where($field, $condition, $val);
            else:
                $this->model = $this->model->where($field, '=', $value);
            endif;
        endforeach;

        $model = $this->model->get($columns);

        return $model;
    }

    /**
     * Find data by multiple values in one field
     * @param type $field
     * @param array $values
     * @param type $columns
     */
    public function findWhereIn($field, array $values, $columns = array('*'))
    {
        $model = $this->model->whereIn($field, $values)->get($columns);

        return $model;
    }

    /**
     * Find data by excluding multiple values in one field
     * @param type $field
     * @param array $values
     * @param type $columns
     */
    public function findWhereNotIn($field, array $values, $columns = array('*'))
    {
        $model = $this->model->whereNotIn($field, $values)->get($columns);

        return $model;
    }

    /**
     * 
     * @param type $column
     * @param type $direction
     * @return \App\Repositories\BaseRepository
     */
    public function orderBy($column, $direction = 'ASC')
    {
        return $this->model->orderBy($column, $direction)->get();
    }

    /**
     * Save a new entity in repository
     * @param array $data
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * 
     * @param type $id
     * @param array $data
     * @param type $attribute
     */
    public function update($id, array $data, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    /**
     * Delete a entity in repository by id
     * @param type $id
     */
    public function delete($id, $attribute = 'id')
    {
        return $this->model->where($attribute, '=', $id)->delete();
    } 
    
    public function with(array $relations)
    {
        $this->model->with($relations);
        
        return $this;
    }
    
    public function load($relation)
    {
        $this->model->load($relation);
        
        return $this;
    }

}
