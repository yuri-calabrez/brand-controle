<?php

namespace App\Contracts;

/**
 *
 * @author Yuri
 */
interface RepositoryInterface
{

    public function findAll($columns = ['*']);

    public function find($id, $columns = ['*']);

    public function paginate($path, $items, $currentPage, $maxPage = 5);

    public function findByField($field, $value, $columns = ['*']);

    public function findAllByField($field, $value, $columns = ['*']);

    public function findWhere(array $where, $columns = ['*']);

    public function findWhereIn($field, array $values, $columns = ['*']);

    public function findWhereNotIn($field, array $values, $columns = ['*']);

    public function create(array $data);

    public function update($id, array $data, $attribute = 'id');

    public function delete($id);
    
    public function with(array $relations);
    
    public function load($relation);

    public function orderBy($column, $direction = 'ASC');
}
