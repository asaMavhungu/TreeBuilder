<?php

/**
 * Model to abstract the database table
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Atest extends Model
{
    protected $table = 'atest';
    protected $fillable = [
        'id',
        'name',
        'pef_item_id',
        'order_no'
    ];
}