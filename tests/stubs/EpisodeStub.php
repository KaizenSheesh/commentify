<?php

use Illuminate\Database\Eloquent\Model;
use KaizenSheesh\Commentify\Scopes\CommentScopes;

class EpisodeStub extends Model
{
    use \KaizenSheesh\Commentify\Traits\Commentable;

    protected $connection = 'testbench';

    public $table = 'episodes';

}
