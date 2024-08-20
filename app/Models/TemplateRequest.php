<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateRequest extends Model
{
    use HasFactory;

    protected $table = 'template_requests_pkl';

    protected $fillable = [
        'name',
        'description',
        'filename',
        'source',
        'size',
        'ext',
    ];
}
