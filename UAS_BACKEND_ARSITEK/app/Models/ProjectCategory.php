<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    use HasFactory;

    // Field yang bisa diisi secara massal
    protected $fillable = ['main_category', 'name'];

    // Relasi satu kategori punya banyak project
    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id');
    }
}
