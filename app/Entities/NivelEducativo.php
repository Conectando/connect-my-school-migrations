<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class NivelEducativo extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'niveles_educativos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * return encode to utf8 name.
     *
     * @var string
     * @return string
     */
    public function getNombreAttribute($value)
    {
        return utf8_encode($this->attributes['nombre']);
    }
    /**
     * The decode to utf8 name.
     *
     * @var string
     * @return void
     */
    public function setNombreAttribute($value)
    {
        if (!empty($value))
        {
            $this->attributes['nombre'] = utf8_decode($value);
        }
    }

    /**
     *
     * Get the escuelas record associated with the EscuelaAcademico.
     */
    public function escuelas()
    {
        return $this->hasMany('App\Entities\DetalleEscuela', 'nivel_id', 'id');
    }

}
