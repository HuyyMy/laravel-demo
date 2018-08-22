<?php

namespace App\Models;

use App\Models\Traits\OrderTrait;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use OrderTrait;

    protected $fillable = ['content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
