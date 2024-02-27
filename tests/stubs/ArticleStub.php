<?php

use Illuminate\Database\Eloquent\Model;
use KaizenSheesh\Commentify\Scopes\CommentScopes;

class ArticleStub extends Model
{
    use \KaizenSheesh\Commentify\Traits\Commentable;

    protected $connection = 'testbench';

    public $table = 'articles';

}
