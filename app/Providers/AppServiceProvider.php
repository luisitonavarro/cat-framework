<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Helpers\StrHelper;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Directiva para el método `after`
        Blade::directive('after', function ($expression) {
            return "<?php echo StrHelper::after($expression); ?>";
        });

        // Directiva para el método `before`
        Blade::directive('before', function ($expression) {
            return "<?php echo StrHelper::before($expression); ?>";
        });

        // Directiva para el método `contains`
        Blade::directive('contains', function ($expression) {
            return "<?php echo StrHelper::contains($expression); ?>";
        });

        // Directiva para el método `afterLast`
        Blade::directive('afterLast', function ($expression) {
            return "<?php echo StrHelper::afterLast($expression); ?>";
        });

        // Directiva para el método `beforeLast`
        Blade::directive('beforeLast', function ($expression) {
            return "<?php echo StrHelper::beforeLast($expression); ?>";
        });

        // Directiva para el método `between`
        Blade::directive('between', function ($expression) {
            return "<?php echo StrHelper::between($expression); ?>";
        });

        // Directiva para el método `camel`
        Blade::directive('camel', function ($expression) {
            return "<?php echo StrHelper::camel($expression); ?>";
        });

        // Directiva para el método `kebab`
        Blade::directive('kebab', function ($expression) {
            return "<?php echo StrHelper::kebab($expression); ?>";
        });

        // Directiva para el método `lower`
        Blade::directive('lower', function ($expression) {
            return "<?php echo StrHelper::lower($expression); ?>";
        });

        // Directiva para el método `upper`
        Blade::directive('upper', function ($expression) {
            return "<?php echo StrHelper::upper($expression); ?>";
        });

        // Directiva para el método `slug`
        Blade::directive('slug', function ($expression) {
            return "<?php echo StrHelper::slug($expression); ?>";
        });

        // Directiva para el método `title`
        Blade::directive('title', function ($expression) {
            return "<?php echo StrHelper::title($expression); ?>";
        });

        // Directiva para el método `replace`
        Blade::directive('replace', function ($expression) {
            return "<?php echo StrHelper::replace($expression); ?>";
        });

        // Directiva para el método `limit`
        Blade::directive('limit', function ($expression) {
            return "<?php echo StrHelper::limit($expression); ?>";
        });

        // Directiva para el método `uuid`
        Blade::directive('uuid', function ($expression) {
            return "<?php echo StrHelper::uuid(); ?>";
        });

        // Directiva para el método `ulid`
        Blade::directive('ulid', function ($expression) {
            return "<?php echo StrHelper::ulid(); ?>";
        });

        // Directiva para el método `password`
        Blade::directive('password', function ($expression) {
            return "<?php echo StrHelper::password($expression); ?>";
        });

        // Directiva para el método `wrap`
        Blade::directive('wrap', function ($expression) {
            return "<?php echo StrHelper::wrap($expression); ?>";
        });

        // Directiva para el método `wordCount`
        Blade::directive('wordCount', function ($expression) {
            return "<?php echo StrHelper::wordCount($expression); ?>";
        });
    }
}
