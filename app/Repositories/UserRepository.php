<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

/**
 * Description of UserRepository
 *
 * @author Yuri
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getBrandData($id)
    {
        return $this->model->find($id)
                ->join('BRC_MARCAS', 'BRC_USUARIOS.ID_MARCA', '=', 'BRC_MARCAS.ID')
                ->select('BRC_USUARIOS.EMAIL', 'BRC_MARCAS.NOME', 'BRC_MARCAS.ID')
                ->get();
    }
}
