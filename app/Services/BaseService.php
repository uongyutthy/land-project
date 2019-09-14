<?php
/**
 * Created by PhpStorm.
 * User: hangsopheak
 * Date: 2/1/19
 * Time: 11:48 PM
 */
namespace App\Services;


use App\Traits\StandardResponser;
use Illuminate\Foundation\Validation\ValidatesRequests;


/**
 * Class BaseService
 * @package App\Services
 */
abstract class BaseService
{
    use ValidatesRequests, StandardResponser;


}