<?php

namespace App\Models\Marketing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDFFile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function campaigns() {
        return $this->belongsTo(Campaign::class);
    }
}