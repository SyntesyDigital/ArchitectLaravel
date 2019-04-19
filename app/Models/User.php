<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Modules\Architect\Traits\ImageUpload;
use Zizaco\Entrust\Traits\EntrustUserTrait;

use Esensi\Model\Contracts\ValidatingModelInterface;
use Esensi\Model\Traits\ValidatingModelTrait;
use Illuminate\Auth\Passwords\CanResetPassword;
use Hash;

class User extends Authenticatable
{
    use SoftDeletes, EntrustUserTrait {
        SoftDeletes::restore insteadof EntrustUserTrait;
        EntrustUserTrait::restore insteadof SoftDeletes;
    }

    use CanResetPassword,
        Notifiable,
        ImageUpload;

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_INACTIVE = 'INACTIVE';

    protected $throwValidationExceptions = true;

    protected $table = 'users';

    protected $imagesUpload = [
        'image'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'telephone',
        'image',
        'language',
        'status'
    ];

    protected $hashable = [
        'password',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'full_name',
    ];

    public function entrustPasswordHash()
    {
        $this->password = Hash::make($this->password);
        $this->save();
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role', 'role_user', 'user_id', 'role_id');
    }
    //

    /**
     * Get the user's full name.
     */
    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }

    /*
    *   Return translated status
    */
    public static function getStatus()
    {
        return [
            self::STATUS_ACTIVE => 'Actif',
            self::STATUS_INACTIVE => 'Désactivé',
        ];
    }

    public function getStringStatus()
    {
        return isset($this->getStatus()[$this->status]) ? $this->getStatus()[$this->status] : null;
    }

    public function getRoleId()
    {
        $role = isset($this->roles) ? $this->roles : null;
        $role = $role ? $role->first() : null;

        return $role ? $role->id : null;
    }

    public function getRoleName()
    {
        $role = isset($this->roles) ? $this->roles : null;
        $role = $role ? $role->first() : null;

        return $role ? $role->display_name : null;
    }



    public function is($role)
    {
        if ($role == $this->roles) {
            return true;
        }
        return false;
    }
}
