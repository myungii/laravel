<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class reply extends Model
{
    use HasFactory;

    protected $table = "replies";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'audit_trail'
    ];

    public function __construct()
    {
        parent::__construct();

        $this->board = DB::table('boards');
    }




}
