<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Score extends Model
{
    protected $table="user_scores";
    protected $fillable=["user_id,score_id"];
}
