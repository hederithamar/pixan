<?php

namespace App\Models\Auth;

use App\Models\Traits\Uuid;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Auth\Traits\Scope\VoluntaryScope;
use App\Models\Auth\Traits\Method\VoluntaryMethod;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Auth\Traits\Attribute\VoluntaryAttribute;
use App\Models\Auth\Traits\Relationship\VoluntaryRelationship;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Voluntary.
 */
class Voluntary extends Model
{
    use HasRoles,
        Notifiable,
        SoftDeletes,
        VoluntaryAttribute,
        VoluntaryMethod,
        VoluntaryRelationship,
        VoluntaryScope,
        Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'celular',
        'sexo',
        'facebook',
        'escolaridad',
        'carrera',
        'habilidades',
        'razon',
        'user_id',
        'status',
        
    ];

    /**
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The dynamic attributes from mutators that should be returned with the product object.
     * @var array
     */
    protected $appends = ['full_name'];
}
