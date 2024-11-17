<?php

namespace Parables\LaravelAdrTools;

use Illuminate\Support\ServiceProvider;
use Parables\LaravelAdrTools\Commands\AdrCommand;

class AdrToolsServiceProvider extends  ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register(): void
  {
    $this->commands([
      AdrCommand::class,
    ]);
  }
}
