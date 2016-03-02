<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanitaryWareSupplier extends Model
{
	    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sanitary_ware_supplier';

    /**
     * Primary key used by eloquent.
     *
     * @var string
     */
    protected $primaryKey = 'sanitary_ware_supplier_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'active', 'created_at', 'updated_at'];
    
}