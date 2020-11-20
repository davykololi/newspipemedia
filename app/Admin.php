<?php
 
namespace App;

use App\Models\Post;
use App\Models\Video;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\URL;
 
class Admin extends Authenticatable
{
    use Notifiable,Sluggable;
 
    protected $guard = 'admin';
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','title','phone_no','area','image','keywords','slug',
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
                'separator' => '-',
                'unique' => true,
                'maxLenghKeepWords' => true,
                'onUpdate' => true,
            ]
        ];
    }
 
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }

    public function posts()
    {
    return $this->hasMany('App\Models\Post', 'admin_id', 'id');
    }

    public function videos()
    {
    return $this->hasMany('App\Models\Video', 'admin_id', 'id');
    }

    public function ownsPost(Post $post)
    {
        return auth()->id() == $post->admin->id;
    }

    public function ownsVideo(Video $video)
    {
        return auth()->id() == $video->admin->id;
    }

    public function path()
    {
        return route('author.posts', $this->slug);
    }

    public function videoPath()
    {
        return route('author.videos', $this->slug);
    }

    public function scopeBanned($query)
    {
        return $query->where('is_banned', true);
    }

    public function imageUrl()
    {
        return URL::to('/storage/public/storage/'.$this->image);
    }
}
