<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Model\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * 一覧表示
     * @param int $thread_id
     */
    public function index(int $thread_id)
    {
        $comment = new Comment();
        // $thread_idをもとにコメントを全件取得する
        return $comment->where('thread_id', $thread_id)->get();
    }

    /**
     * 投稿機能
     * @param array $commentArray
     */
    public function create(array $newCommentArray)
    {
        $comment = new Comment();

        $comment->fill([
            'thread_id' => $newCommentArray['thread_id'],
            'admin_id' => $newCommentArray['admin_id'],
            'body' => $newCommentArray['body']
        ]);

        // 保存する
        if($comment->save()){
            return true;
        }
        return false;        
    }

    /**
     * 編集機能
     * @param array $editCommentArray
     */
    public function edit(array $editCommentArray)
    {
        $comment = new Comment();

        // 更新する
        if($comment->where('id', $editCommentArray['comment_id'])->update(['body'=>$editCommentArray['body']])){
            return true;
        }
        
        return false;
    }

    /**
     * スレッドID取得
     * @param int $comment_id
     */
    public function getThreadId(int $comment_id)
    {
        $comment = new Comment();

        return $comment->where('id', $comment_id)->value('thread_id');
    }

    /**
     * コメント一件取得
     * @param int $comment_id
     */
    public function find(int $comment_id)
    {
        $comment = new Comment();

        return $comment->find($comment_id);
    }

    /**
     * コメント削除
     * @param
     */
    public function destroy(int $comment_id)
    {
        $comment = new Comment();

        if($comment->destroy($comment_id)){
            return true;
        }
        return false;
    }
}
