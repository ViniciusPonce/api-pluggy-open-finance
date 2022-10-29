<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class BusinessUser extends Authenticatable implements JWTSubject
{

    public $table = 'business_user';

    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'corporate_name',
        'cnpj',
        'whatsapp',
        'email',
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'corporate_name' => 'string',
        'cnpj' => 'string',
        'whatsapp' => 'string',
        'email' => 'string',
        'password' => 'string',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'corporate_name' => 'required',
        'cnpj' => 'required',
        'whatsapp' => 'required',
        'email' => 'required',
        'password' => 'required',
    ];

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


    public function checkIfExist()
    {
        $cnpj = (bool) $this->where('cnpj', $this->cnpj)->first();
        $cpf = (bool) $this->where('email', $this->email)->first();

        if ($cnpj || $cpf) {
            return true;
        }

        return false;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

    public function setHashPassword()
    {
        $this->password = Hash::make($this->password);

        return $this;
    }

}
