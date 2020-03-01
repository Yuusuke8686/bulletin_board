<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ThreadDeleteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:thread:destroy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '削除済のスレッドを物理削除する';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('now deleting');
        DB::beginTransaction();
        try {
            // 論理削除されている項目を取得
            DB::table('threads')->whereNotNull('deleted_at')->delete();
            $this->info('success deleting');
            DB::commit();         
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Could not run thread deleting');
        }
        
    }
}
