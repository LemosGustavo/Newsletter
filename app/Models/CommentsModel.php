<?php

namespace App\Models;
use CodeIgniter\Model;

class CommentsModel extends Model{
    protected $table = "comments";
    protected $primaryKey = "id";

    protected $returnType = "array";
    protected $useSoftDeletes = true;
    protected $deletedField = 'deleted';

    protected $allowedFields = array("post_id","name","email","comment");
    
}
