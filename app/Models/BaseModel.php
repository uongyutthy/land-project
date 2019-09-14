<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2/10/2019
 * Time: 10:34 PM
 */

namespace App\Models;


use App\Enums\StateEnum;
use App\Traits\HasTimestamps;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasTimestamps;

    /**
     * The name of the "record status id" column.
     *
     * @var string
     */
    const RECORD_STATUS_ID = 'record_status_id';

    /**
     * The name of the "created by" column.
     *
     * @var string
     */
    const CREATED_BY = 'created_by';

    /**
     * The name of the "updated by" column.
     *
     * @var string
     */
    const UPDATED_BY = 'updated_by';

    /**
     * The value of the "record status id" column.
     *
     * @var int
     */
    const RECORD_STATUS_ACTIVE   = 1;
    const RECORD_STATUS_DELETE   = 0;


    /**
     * The name of the "record state id" column.
     *
     * @var string
     */
    const RECORD_STATE_ID = 'record_state_id';

    /**
     * The name of the "record state reason" column.
     *
     * @var string
     */
    const RECORD_STATE_REASON = 'record_state_reason';

    public function breadcrumbName()
    {
    	return $this->{$this->primaryKey};
    }

    /**
     * Get active menu
     * @return mixed
     */
    public static function active(){
        return (new static())->where(self::RECORD_STATUS_ID, self::RECORD_STATUS_ACTIVE);
    }

    public function getStateLabelAttribute(){
        return isset($this->{self::RECORD_STATE_ID}) ? StateEnum::getDescription($this->record_state_id) : '';
    }

    public function getStatusLabelAttribute() {
        return $this->{self::RECORD_STATUS_ID} = BaseModel::RECORD_STATUS_ACTIVE ? "Active" : "Inactive";
    }

}
