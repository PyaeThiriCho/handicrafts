<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Order_Item;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name', 
        'email',
        'phone', 'address', 
        'total_amount', 
        'payment_method', 
        'status', 
        'payment_screenshot'
        
    ];

    public function order_items()
    {
        return $this->hasMany(Order_Item::class,'order_id');
    }





}
