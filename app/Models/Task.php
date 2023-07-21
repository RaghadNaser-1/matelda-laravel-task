<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employee;
class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'date', 'description', 'employee_id'];
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
