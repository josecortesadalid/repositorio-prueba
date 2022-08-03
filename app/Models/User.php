<?php

namespace App\Models;

use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function hasRoles($role)
    // {
    //     return $this->role === $role;
    // }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles'); // en el segundo parámetro, le decimos a Eloquent cual es nuestra tabla pivote
    }

    public function hasRoles(array $roles)
    {

        return $this->roles->pluck('name')->intersect($roles)->count(); 
        // Estamos tratando de comparar el array de roles de usuario y el array que recibimos por parámetro. Por eso usamos intersect
        // count para que devuelva 1 o 0 (true o false) si existen intersecciones

        // foreach($roles as $userRole){
        //     foreach($userRole->name as $role){
        //         if($this->roles->name === $role){
        //             return true;
        //         }
        //     }
        // }

        return false;

    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    public function articulos()  // Un usuario, puede tener varios artículos
    {
        return $this->hasMany(Articulo::class, 'user_id');
        // con hasOne sería solo uno
    }



}
