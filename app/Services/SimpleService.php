<?php
/**
 * Created by PhpStorm.
 * User: hangsopheak
 * Date: 2/1/19
 * Time: 11:48 PM
 */
declare(strict_types = 0);
namespace App\Services;

use App\Models\BaseModel;
use Mockery\Exception;

/**
 * Class BaseService
 * @package App\Services
 */
abstract class SimpleService extends BaseService
{

    /**
     * @var validator
     */

    protected $hasRecordStatus = true;

    abstract protected function repository();

    public function __construct()
    {
        if($this->repository() == null) {
            throw new Exception(get_class($this). ' extends from BaseService must implement repository method with returning a repository .');
        }
    }


    public function all($columns = ['*'])
    {
        if($this->hasRecordStatus){
            return $this->repository()->findWhere(['record_status_id' => BaseModel::RECORD_STATUS_ACTIVE], $columns);
        }
        return $this->repository->all($columns);
    }

    public function insert($request)
    {
        try{
            $data = $this->repository()->create($request->all());
            return $this->getSuccessResponseArray(__('global.save_success'), $data);
        }catch (\Exception $e){
            return $this->getErrorResponseArray(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    // show the record with the given id
    public function getById($id)
    {
        return $this->repository()->find($id);
    }
    // update record in the database
    public function update($request, $id)
    {
        try{
            $data = $this->repository()->update($request->all(), $id);
            return $this->getSuccessResponseArray(__('global.update_success'), $data);
        }catch (\Exception $e){
            return $this->getErrorResponseArray(Response::HTTP_INTERNAL_SERVER_ERROR, $e->getMessage());
        }
    }

    public function delete($id)
    {
        return $this->repository()->update([BaseModel::RECORD_STATUS_ID => BaseModel::RECORD_STATUS_DELETE ], $id);
    }


}