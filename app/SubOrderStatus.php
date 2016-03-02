<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubOrderStatus extends Model
{
	    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sub_order_status';

    /**
     * Primary key used by eloquent.
     *
     * @var string
     */
    protected $primaryKey = 'sub_order_status_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'active', 'created_at', 'updated_at'];

}