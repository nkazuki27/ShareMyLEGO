<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
# use Illuminate\View\Compilers\BladeCompiler;
# use Illuminate\View\Compilers\Concerns\CompilesIncludes;

/**
 * Blade拡張
 *
 * @package App\Providers
 */
class BladeServiceProvider extends ServiceProvider
{
    /**
     * コンテナ結合の登録
     *
     * @return void
     */
    public function boot()
    {
        /**
         * 入力エラーメッセージ出力
         *
         * @param   string $name ビュー名
         * @return  string
         */
        Blade::directive('alert', function ($name) {
            $expression = "'shared.alert', ['key' => {$name}]";
            return "<?php echo \$__env->make({$expression}, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>";
        });
        Blade::directive('ifauth', function() {
          return "<?php if(\Auth::check()): ?>";
        });

        Blade::directive('authname', function() {
            return "<?php echo \Auth::user()->name; ?>";
        });
    }

    /**
     * サービスプロバイダー登録
     *
     * @return void
     */
    public function register()
    {
        //
    }
}