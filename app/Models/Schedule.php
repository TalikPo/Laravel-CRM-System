<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedule';
    protected $fillable = ['group_id', 'subject_id', 'teacher_id', 'starttime', 'finishtime'];

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
}
