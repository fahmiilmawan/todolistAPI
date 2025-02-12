<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChecklistItem extends Model
{
    protected $fillable = [
        'checklistID',
        'itemName',
        'status'
    ];
    public function checklist()
    {
        return $this->belongsTo(Checklist::class);
    }
}

