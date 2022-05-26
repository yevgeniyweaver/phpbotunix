<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskItemType extends Model
{
    use HasFactory;

    protected $table = 'task_item_types';
    protected $primaryKey = 'id';

    protected $fillable = [
        'task_id',
        'task_type_id',
    ];
}
