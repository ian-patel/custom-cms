<?php

namespace App;

use App\Core\Model;
use App\Supports\Cacheable;

class Booking extends Model
{
    use Cacheable;

    /**
     * Table name for the model
     *
     * @var string
     */
    public $table_name = 'bookings';

    /**
     * Get id of the model
     *
     * @return int|string
     */
    public function id()
    {
        return $this->__pk ?? '';
    }

    /**
     * Get Property of the booking
     *
     * @return mixed
     */
    public function property()
    {
        return Property::all()[$this->_fk_property];
    }
}