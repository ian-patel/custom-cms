<?php

namespace App\Supports;

trait Pagination
{
    /**
     * Paginate the collection
     *
     * @param $collection
     * @return array
     */
    private static function paginate($collection)
    {
        $total = count($collection);

        $page = (int)input('page', 1);
        $limit = (int)input('limit', 3);

        $totalPages = ceil($total / $limit);

        $page = max($page, 1);
        $page = min($page, $totalPages);

        $offset = ($page - 1) * $limit;
        if ($offset < 0) $offset = 0;

        return [
            'data' => array_slice($collection, $offset, $limit),
            'hasMore' => $totalPages > $page,
            'links' => [
                'next' => http_build_query(
                    array_merge($_GET, ['page' => $page + 1]),
                    '',
                    '&amp;'
                ),
                'previous' => http_build_query(
                    array_merge($_GET, ['page' => $page - 1]),
                    '', '&amp;'
                ),
            ]
        ];

    }
}
