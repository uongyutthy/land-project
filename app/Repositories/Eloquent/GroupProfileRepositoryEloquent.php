<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\IGroupProfileRepository;
use App\Models\GroupProfile;
use App\Validators\GroupProfileValidator;

/**
 * Class GroupProfileRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class GroupProfileRepositoryEloquent extends BaseRepository implements IGroupProfileRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return GroupProfile::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return GroupProfileValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
