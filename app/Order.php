<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [ 'shipping_id', 'customer_id', 'order_total', 'shipping_charge' ];

    public function shipping()
    {
    	return $this->belongsTo(Shipping::class);
    }

    public function customer()
    {
    	return $this->belongsTo(User::class,customer_id);
    }

    public function status()
    {
    	if($this->status){
    	  return '<a><span class="badge badge-success-inverse">Delivered</span></a>';
    	}else{
    	  return '<a href="'. url("admin/orders/delivered/". $this->id ) . '"><span class="badge badge-primary-inverse">Processing</span></a>';
    	}
    }

    public function products()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
