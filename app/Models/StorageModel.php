<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StorageModel extends Model
{
    protected $table = 'tbl_storage';
    protected $primaryKey = 'storage_id';
    protected $guarded = [];
    
}
