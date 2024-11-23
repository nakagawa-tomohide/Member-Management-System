<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Member extends Model
{
    use HasFactory;

    use Sortable;

    protected $fillable = [
        'name',
        'phone',
        'email',
    ];

    public $sortable = [
        'created_at',
    ];
}
