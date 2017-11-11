<?php

namespace Lighthouse;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;

class User extends Authenticatable
{
    use Notifiable;
    use HasRolesAndAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user's full name.
     *
     * @param string $value
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * Get the projects owned by the user.
     */
    public function ownedProjects()
    {
        return $this->hasMany('Lighthouse\Project', 'owner_id');
    }

    /**
     * Get the users projects
     */
    public function projects()
    {
        return $this->belongsToMany('Lighthouse\Project');
    }
}
