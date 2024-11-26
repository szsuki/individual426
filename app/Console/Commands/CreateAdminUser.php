<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User; // Userモデルをインポート

class CreateAdminUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin'; // artisanコマンドの名前

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user'; // コマンドの説明

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        // 管理者情報を入力
        $name = $this->ask('Enter the admin name');
        $email = $this->ask('Enter the admin email');
        $password = $this->secret('Enter the admin password'); // パスワード非表示入力

        // 管理者アカウントを作成
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password), // bcryptでハッシュ化
            'role' => 1, // 管理者を表す値
        ]);

        // 成功メッセージを表示
        $this->info("Admin user created successfully: {$user->name}");
    }
}
