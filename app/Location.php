<?php

namespace App;

use App\Core\Model;
use App\Supports\Cacheable;

class Location extends Model
{
    use Cacheable;

    /**
     * Table name for the model
     *
     * @var string
     */
    public $table_name = 'locations';

    /**
     *  Get id of the model
     *
     * @return int|string
     */
    public function id()
    {
        return $this->__pk ?? '';
    }
}