<?php

namespace App\Models;

use App\Mail\ProductRestoredDeletedReport;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Mail;

class Products extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Orders::class, 'product_id');
    }

    public function sendNotification()
    {
        $orders = $this->orders();
        if ($orders->count()) {
            $emails = $orders->distinct()->get(['email'])->map(function ($item) {
                return $item->email;
            });

            foreach($emails as $email) {
                Mail::to($email)->queue(new ProductRestoredDeletedReport($this));
            }
        }
    }

}
