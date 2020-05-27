<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
        1 => [
            'name' => 'public',
            'class' => 'badge-success'
        ],
        0 => [
            'name' => 'private',
            'class' => 'badge-danger'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->ar_status, '[N\A]');
    }
}
