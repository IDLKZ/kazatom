<?php

namespace App;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $course_id
 * @property string $question
 * @property string $a
 * @property string $b
 * @property string $c
 * @property string $d
 * @property string $correct
 * @property string $created_at
 * @property string $updated_at
 * @property Course $course
 */
class Quiz extends Model
{
    use Upload;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quizes';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['course_id', 'question', 'a', 'b', 'c', 'd', 'correct', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo('App\Course');
    }
}
