<?php

namespace KaizenSheesh\Commentify\Providers;


use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use KaizenSheesh\Commentify\Http\Livewire\Comment;
use KaizenSheesh\Commentify\Http\Livewire\Comments;
use KaizenSheesh\Commentify\Http\Livewire\Like;
use KaizenSheesh\Commentify\Policies\CommentPolicy;

class CommentifyServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(CommentPolicy::class, function ($app) {
            return new CommentPolicy;
        });

        Gate::policy(\KaizenSheesh\Commentify\Models\Comment::class, CommentPolicy::class);

        $this->app->register(MarkdownServiceProvider::class);
    }


    /**
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish config file
            $this->publishes([
                __DIR__.'/../../config/commentify.php' => config_path('commentify.php'),
            ], 'commentify-config');

            $this->publishes([
                __DIR__.'/../../tailwind.config.js' => base_path('tailwind.config.js'),
            ], 'commentify-tailwind-config');
        }
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'commentify');
        Livewire::component('comments', Comments::class);
        Livewire::component('comment', Comment::class);
        Livewire::component('like', Like::class);
    }
}
