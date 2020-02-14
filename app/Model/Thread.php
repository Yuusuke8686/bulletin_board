<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thread extends Model
{
    use SoftDeletes;

    protected $guarded = [
        'id'
    ];

    /**
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }

    /**
 * スレッド数を1増やす
 * @param int $thread_id
 * @param Thread $thread
 * @return
 */
    public function incrementQuantity(int $thread_id)
    {
        $thread = new Thread();
        // 現在のQuantityを取得する //
        $now_quantity = $thread->where('id', $thread_id)->value('quantity');
        $quantity = $now_quantity + 1;

        return $thread->where('id', $thread_id)->update(['quantity' => $quantity]);
    }

    /**
     * スレッド数を1減らす
     * @param int $thread_id
     * @param Thread $thread
     * @return
     */
    public function decrementQuantity(int $thread_id)
    {
        $thread = new Thread();
        // 現在のQuantityを取得する //
        $now_quantity = $thread->where('id', $thread_id)->value('quantity');

        // コメント数が1以下の場合は実行しない //
        if($now_quantity > 1) {
            $quantity = $now_quantity-1;
            return $thread->where('id', $thread_id)->update(['quantity' => $quantity]);
        }

        return;
    }
}
