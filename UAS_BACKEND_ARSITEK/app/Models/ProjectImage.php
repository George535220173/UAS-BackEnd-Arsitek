<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;

    // Field yang bisa diisi secara massal
    protected $fillable = ['project_id', 'path'];

    // Relasi gambar milik satu project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
