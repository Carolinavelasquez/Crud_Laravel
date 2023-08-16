<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    //para manipular datos
protected $fillable = ['title', 'descripcion', 'due_date', 'status'];
}
