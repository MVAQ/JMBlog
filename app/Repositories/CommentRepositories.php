<?php
/**
 * Created by PhpStorm.
 * User: МВА
 * Date: 29.04.2019
 * Time: 15:22
 */
namespace JMApp\Repositories;
use JMApp\Comment;
class CommentRepositories extends Repository{

    public function  __construct(Comment $comment)
    {
        $this->model = $comment;
    }
}
