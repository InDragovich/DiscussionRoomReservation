<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'rooms';
    protected $primaryKey = 'id_room';
    protected $guarded = ['id_room'];
    // protected $fillable = ['name', 'capacity', 'category', 'description', 'image'];
}