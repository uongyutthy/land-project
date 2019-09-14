<?php

namespace App\Contracts\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Contracts\Repositories;
 */
interface IRepository extends RepositoryInterface
{
    //
    public function createBatch($data);
    public function updateData($dataSets, $value, $fieldName = 'id');
    public function whereField($value, $fieldName = 'id');
    public function whereFieldIn($values, $fieldName = 'id');

}
