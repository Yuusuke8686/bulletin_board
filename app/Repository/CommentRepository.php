<?php

namespace App\Repository;

use Illuminate\Http\Request;
use App\Model\Comment;

class CommentRepository implements CommentRepositoryInterface
{
    /**
     * 一覧表示
     * @param int $thread_id
     * @param Comment $comment
     */
    public function index(int $thread_id, Comment $comment)
    {
        // $thread_idをもとにコメントを全件取得する
        return $comment->where('thread_id', $thread_id)->get();
    }

    /**
     * 投稿機能
     * @param array $commentArray
     * @param Comment $comment
     */
    public function create(array $newCommentArray, Comment $comment)
    {
        try {
            $comment->fill([
                'thread_id' => $newCommentArray['thread_id'],
                'admin_id' => $newCommentArray['admin_id'],
                'body' => $newCommentArray['body']
            ]);
    
            // 保存する
           return $comment->save();
        } catch (\Exception $e) {
            throw $e;
        }       
    }

    /**
     * 編集機能
     * @param array $editCommentArray
     * @param Comment $comment
     */
    public function edit(array $editCommentArray, Comment $comment)
    {
        try {
            // 更新する
            return $comment->where('id', $editCommentArray['comment_id'])->update(['body'=>$editCommentArray['body']]);            
        } 
catch (\Exception $e) {
            throw $e;
        }
    }

    /**
     * スレッドID取得
     * @param int $comment_id
     * @param Comment $comment
     */
    public function getThreadId(int $comment_id, Comment $comment)
    {
        return $comment->where('id', $comment_id)->value('thread_id');
    }

    /**
     * コメント一件取得
     * @param int $comment_id
     * @param Comment $comment
     */
    public function find(int $comment_id, Comment $comment)
    {
        return $comment->find($comment_id);
    }

    /**
     * コメント削除
     * @param int $comment_id
     * @param Comment $comment
     */
    public function destroy(int $comment_id, Comment $comment)
    {
        try {
            return $comment->destroy($comment_id);
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
