<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class travel extends Model
{
    use HasFactory;

    protected $fillable = [
        'origin',
        'destination',
        'seat_quantity',
        'base_rate'

=======
class Travel extends Model
{
    use HasFactory;

    protected $fillable = ['origin',
    'destination','seat_quantity',
    'base_rate'
>>>>>>> 1344912003c08a7dfcd20de5619ccd4b8bb13019
    ];
}
