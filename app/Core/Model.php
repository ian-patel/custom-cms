<?php

namespace App\Core;

use stdClass;
use Exception;

abstract class Model
{
    /**
     * Get all the records of the model
     */
    public function get()
    {
        $db = new DB();
        $result = $db->query("Select * from " . $this->getTableName());

        return $this->collection($result);
    }

    /**
     * Get the table name of the model
     *
     * @return string
     * @throws Exception
     */
    private function getTableName(): string
    {
        if ($this->table_name) {
            return $this->table_name;
        }

        throw new Exception('Table name not found for ' . get_class($this));
    }

    /**
     * Get the collection of the model, key by primary key
     *
     * @param stdClass $rows
     * @return array
     */
    private function collection(stdClass $rows)
    {
        $collection = [];
        $class = get_class($this);

        foreach ($rows as $row) {
            $object = new $class;
            foreach ($row as $column => $value) {
                $object->{$column} = $value;
            }
            $collection[$row['__pk']] = $object;
        }

        return $collection;
    }
}