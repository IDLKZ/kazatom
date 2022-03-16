<?php

namespace App;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $course_id
 * @property string $url
 * @property string $created_at
 * @property string $updated_at
 * @property Course $course
 */
class Video extends Model
{
    use Upload;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['course_id', 'title',"description",'url',"prev_video","next_video", 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function quizes()
    {
        return $this->hasMany('App\Quiz',"video_id","id");
    }

    public function prevVideo(){
        return $this->belongsTo('App\Video',"prev_video","id");
    }

    public function nextVideo(){
        return $this->belongsTo('App\Video',"next_video","id");
    }

    public function results()
    {
        return $this->belongsTo(Result::class, 'id', 'video_id');
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
