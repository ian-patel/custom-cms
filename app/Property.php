<?php

namespace App;

use App\Core\Model;
use App\Supports\Cacheable;
use App\Supports\Pagination;

class Property extends Model
{
    use Cacheable;
    use Pagination;

    /**
     * Table name for the model
     *
     * @var string
     */
    public $table_name = 'properties';

    /**
     * Filter the properties
     */
    public static function filter()
    {
        $searchResult = array_filter(self::all(), function ($property) {
            $filter = true;

            // Location
            if (input('location')) {
                $filter = ($filter and
                    ($property->_fk_location == input('location'))
                );
            }

            // keyword search
            if (input('q')) {
                $filter = ($filter and
                    (preg_match("/" . htmlspecialchars(input('q')) . "/i", $property->property_name))
                );
            }

            // Near the beach
            if (input('nb') == 'on') {
                $filter = ($filter and
                    ($property->near_beach == 1)
                );
            }

            // Allow pets
            if (input('pet') == 'on') {
                $filter = ($filter and
                    ($property->accepts_pets == 1)
                );
            }

            // Beds
            if (input('beds')) {
                $filter = ($filter and
                    ($property->beds >= (int)input('beds'))
                );
            }

            // Sleeps
            if (input('sleeps')) {
                $filter = ($filter and
                    ($property->sleeps >= (int)input('sleeps'))
                );
            }

            // Booking
            if (input('arrive') and input('depart')) {
                foreach ($property->bookings() as $booking) {
                    if (input('arrive') >= $booking->start_date and input('arrive') <= $booking->end_date) {
                        return false;
                    }
                }
            }

            return $filter;
        });

        return self::paginate($searchResult);
    }

    /**
     * Get Location of the property
     *
     * @return mixed
     */
    public function location()
    {
        return Location::all()[$this->_fk_location];
    }

    /**
     * Get Bookings of the property
     *
     * @return mixed
     */
    public function bookings()
    {
        return array_filter(Booking::all(), function ($booking) {
            return $booking->property()->id() === $this->id();
        });
    }

    /**
     * Get id of the model
     *
     * @return int|string
     */
    public function id()
    {
        return $this->__pk ?? '';
    }
}