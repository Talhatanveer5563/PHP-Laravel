<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class booktbl extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookimage','bookname','bookcategory','bookauthor','bookprice','bookpdf',
    ];

}
