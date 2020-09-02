<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    /**
     * All the columns are fillable
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get the link associated with a particular visit
     *
     * @return Relationship
     */
    public function link()
    {
        return $this->belongsTo('App\Link');
    }
}
