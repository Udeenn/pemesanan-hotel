<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_room extends Model
{
    use HasFactory;
    protected $table = 'tb_room';
    protected $primaryKey = 'id_room';
    protected $fillable = [
        'room_name',
        'room_description',
        'room_price',
        'room_picture',
    ];
}
