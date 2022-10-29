<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    // public $table = 'user';

    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    const ADMINISTRATOR = 'administrator';
    const BUSINESS = 'business';
    const OFFICE = 'office';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'crc',
        'name',
        'whatsapp',
        'cnpj',
        'corporate_name',
        'password',
        'type'
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => 'integer',
        'username' => 'string',
        'email' => 'string',
        'crc' => 'string',
        'name' => 'string',
        'whatsapp' => 'string',
        'cnpj' => 'string',
        'corporate_name' => 'string',
        'password' => 'string',
        'type' => 'string'
    ];

    // /**
    //  * Validation rules
    //  *
    //  * @var array
    //  */
    // public static $rules = [
    //     'username' => 'required',
    //     'email' => 'required',
    //     'crc' => 'required',
    //     'name' => 'required',
    //     'whatsapp' => 'required',
    //     'cnpj' => 'required',
    //     'corporate_name' => 'required',
    //     'password' => 'required',
    //     'permission' => 'required'
    // ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * 
     */
    public function checkExistAdmin($user)
    {
        $username = (bool) $this->where('username', $user->username)->first();

        if ($username) {
            return true;
        }

        return false;
    }

    /**
     * 
     */
    public function checkExistOffice($user)
    {
        $cnpj = (bool) $this->where('cnpj', $user->cnpj)->first();
        $corporateName = (bool) $this->where('corporate_name', $user->corporate_name)->first();
        // dd($cnpj, $corporateName);
        if ($cnpj || $corporateName) {
            return true;
        }

        return false;
    }

    /**
     * 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * 
     */
    public function setHashPassword()
    {
        $this->password = Hash::make($this->password);

        return $this;
    }

    /**
     * 
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * 
     */
    public function hasPassword()
    {
        return isset($this->password);
    }

    /**
     * 
     */
    public function findByCnpj($userOffice)
    {
        $cnpj = $userOffice['cnpj'];

        $user = $this->where('cnpj', $cnpj)->first();

        return $user;
    }

}
