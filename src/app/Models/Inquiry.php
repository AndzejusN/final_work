<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inquiry extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'inquiries';

    public function state()
    {
        return $this->belongsTo(InquiryState::class, 'name', 'inquiry_state');
    }

}
