<?php

namespace App\Models;

use Spatie\Feed\Feedable;
use Spatie\Feed\FeedItem;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model implements Feedable
{
    //
    use Sluggable,Searchable;
    protected $table = 'posts';
    protected $fillable = ['title','image','caption','content','description','keywords','is_published','admin_id','category_id','slug'];
    protected $appends = ['createdDate','excerpt','image_url'];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'separator' => '-',
                'unique' => true,
                'maxLenghKeepWords' => true,
                'onUpdate' => true,
            ]
        ];
    }

    public function searchableAs()
    {
        return 'posts_index';
    }
   
    public function admin()
    {
    return $this->belongsTo('App\Admin')->withDefault();
    }

    public function user()
    {
    return $this->belongsTo('App\User')->withDefault();
    }

    public function comments()
    {
    return $this->morphMany('App\Models\Comment','commentable');
    }

    public function category()
    {
    return $this->belongsTo('App\Models\Category')->withDefault();
    }

    public function scopePopular($query) 
    {
        return $query->whereHas('comments','>=',2);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag','post_tag')->withTimestamps();
    }

    public function toFeedItem():FeedItem
    {
        return FeedItem::create([
                'id'=>$this->id,
                'title'=>$this->title,
                'summary'=>$this->description,
                'updated'=>$this->updated_at,
                'link'=>route('users.posts.read',$this->slug),
                'author'=>$this->admin->name,
                ]);
    }

    public static function getFeedItems()
    {
        return Post::orderBy('created_at','desc')->limit(50)->get();
    }

    public function getExcerptAttribute()
    {
        return substr(strip_tags($this->content),0,100);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeDrafted($query)
    {
        return $query->where('is_published', false);
    }

    public function path()
    {
        return route('users.posts.read', $this->slug);
    }

    public function imageUrl()
    {
        return url('/storage/public/storage/'.$this->image);
    }
}
