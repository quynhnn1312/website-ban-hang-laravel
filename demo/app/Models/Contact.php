<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Arr;

class Contact extends Model
{
    protected $table = 'contacts';
    protected $guarded = ['*'];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
        1 => [
            'name' => 'Xử lý',
            'class' => 'badge-success'
        ],
        0 => [
            'name' => 'Chưa xử lý',
            'class' => 'badge-secondary'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->c_status ,'[N/A]' );
    }
}
