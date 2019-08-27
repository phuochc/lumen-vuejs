<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'price',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
