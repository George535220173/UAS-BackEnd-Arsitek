<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Field yang bisa diisi secara massal
    protected $fillable = [
        'project_name',
        'client',
        'time_taken',
        'location',
        'description',
        'category_id',
    ];

    // Relasi satu project punya banyak gambar
    public function images()
    {
        return $this->hasMany(ProjectImage::class);
    }

    // Relasi project milik satu kategori
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class);
    }
}
