<?php

namespace App\Repositories\Eloquent;

use App\Contracts\Repositories\IRepository;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class ItemRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
abstract class BaseExtensionRepository extends BaseRepository implements IRepository
{

    public function createBatch($data)
    {
        $this->model::insert($data);
        $this->resetModel();
    }
    /**
     * @param array $dataSets
     * @param int|string $value
     * @param string|array $fieldName
     * @return mixed
     */

    public function updateData($dataSets, $values, $fieldName = 'id')
    {
        if(is_array($values)){
            $affectedRows = $this->whereFieldIn($values, $fieldName)->update($dataSets);
            $this->resetModel();
            return $affectedRows;
        }else{
            $value = $values;
            $affectedRows = $this->whereField($value, $fieldName)->update($dataSets);
            $this->resetModel();
            return $affectedRows;
        }

    }


    public function deleteWhereIn($fieldName, $values)
    {
        if(is_array($values)){
            $affectedRows = $this->whereFieldIn($values, $fieldName)->delete();
            $this->resetModel();
            return $affectedRows;
        }else{
            $value = $values;
            $affectedRows = $this->whereField($value, $fieldName)->delete();
            $this->resetModel();
            return $affectedRows;
        }
    }

    /**
     * @param int|string $value
     * @param string $fieldName
     * @return $this
     */
    public function whereField($value, $fieldName = 'id')
    {
        $this->model = $this->model::where($fieldName, $value);
        return $this->model;
    }

    /**
     * @param array $values
     * @param string $fieldName
     * @return $this
     */
    public function whereFieldIn($values, $fieldName = 'id')
    {
        $this->model = $this->model::whereIn($fieldName, $values);
        return $this->model;
    }

    /**
     * @param array $values
     * @param string $fieldName
     * @return $this
     */
    public function whereFieldNotIn($values, $fieldName = 'id')
    {
        $this->model = $this->model::whereNotIn($fieldName, $values);
        return $this->model;
    }

}
