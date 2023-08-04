<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;


class InventoryItem extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    //Especificamos el nombre de la tabla
    protected $table = 'inventory_item'; 

    protected $fillable = [
        'name',
        'quantity'
    ];
    public function users()
    {
        return $this->belongsTo(Treatment::class);
    }
}
