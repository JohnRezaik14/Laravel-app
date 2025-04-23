<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /** @mixin \Database\Factories\PostFactory */
    use HasFactory, SoftDeletes;
    protected $table    = "posts";
    protected $fillable = ['title', 'body', 'enabled', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
