<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use willvincent\Rateable\Rateable;
use Laravel\Scout\Searchable; //import the trait

class Article extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Rateable;
    use Searchable;


    /**
    * Get the indexable data array for the model.
    *
    * @return array
    */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        return array('id' => $array['id'],'user_id'=>$array['user_id'],'title' => $array['title']);
    }

}
