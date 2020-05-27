<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVETA = 0;

    protected  $status = [
            1 => [
                'name'  => 'Public',
                'class' => 'badge-success'
            ],
            0 => [
                'name'  => 'Private',
                'class' => 'badge-danger'
            ]
        ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->c_active, '[N\A]');
    }

}
