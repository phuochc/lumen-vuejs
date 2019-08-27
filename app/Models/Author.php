<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'gender',
        'country',
    ];
}
