<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id');
    }

    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    public function allFriends()
    {
        return $this->friends()->union($this->friendOf());
    }


    //userfriend shoe
    public function vrienden()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->select('users.*', 'friends.user_id as pivot_user_id', 'friends.friend_id as pivot_friend_id');
    }

    public function vriendenof()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
            ->select('users.*', 'friends.user_id as pivot_user_id', 'friends.friend_id as pivot_friend_id');
    }

    public function allVrienden()
    {
        return $this->vrienden()->union($this->vriendenof());
    }
}
