<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected array $newsList = [
        [
            'id' => 1,
            'title' => 'Новость 1',
            'description' => 'Краткое описание',
            'categoryId' => 1
        ],
        [
            'id' => 2,
            'title' => 'Новость 2',
            'description' => 'Краткое описание',
            'categoryId' => 3
        ],
        [
            'id' => 3,
            'title' => 'Новость 3',
            'description' => 'Краткое описание',
            'categoryId' => 4
        ],
        [
            'id' => 4,
            'title' => 'Новость 4',
            'description' => 'Краткое описание',
            'categoryId' => 2
        ],
        [
            'id' => 5,
            'title' => 'Новость 5',
            'description' => 'Краткое описание',
            'categoryId' => 5
        ],
        [
            'id' => 6,
            'title' => 'Новость 3',
            'description' => 'Краткое описание',
            'categoryId' => 4
        ],
        [
            'id' => 7,
            'title' => 'Новость 4',
            'description' => 'Краткое описание',
            'categoryId' => 2
        ],
        [
            'id' => 8,
            'title' => 'Новость 5',
            'description' => 'Краткое описание',
            'categoryId' => 5
        ]
    ];

    protected array $categories = [
        [
            'id' => 1,
            'title' => 'Культура'
        ],
        [
            'id' => 2,
            'title' => 'Политика'
        ],
        [
            'id' => 3,
            'title' => 'Наука'
        ],
        [
            'id' => 4,
            'title' => 'Экономика'
        ],
        [
            'id' => 5,
            'title' => 'Общество'
        ]
    ];
}
