<?php

use Illuminate\Database\Eloquent\Model;

class CommentStub extends Model
{
    use \KaizenSheesh\Commentify\Traits\Commentable;

    protected $connection = 'testbench';

    public $table = 'comments';

}
