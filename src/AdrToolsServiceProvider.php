<?php

namespace Parables\LaravelAdrTools;

use Illuminate\Support\ServiceProvider;
use Parables\LaravelAdrTools\Commands\AdrCommand;
use Parables\LaravelAdrTools\Commands\AdrFile;
use Parables\LaravelAdrTools\Commands\AdrGenerate;
use Parables\LaravelAdrTools\Commands\AdrGenerateGraph;
use Parables\LaravelAdrTools\Commands\AdrGenerateToc;
use Parables\LaravelAdrTools\Commands\AdrHelp;
use Parables\LaravelAdrTools\Commands\AdrInit;
use Parables\LaravelAdrTools\Commands\AdrLink;
use Parables\LaravelAdrTools\Commands\AdrList;
use Parables\LaravelAdrTools\Commands\AdrNewCommand;
use Parables\LaravelAdrTools\Commands\MakeAdrCommand;

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
      MakeAdrCommand::class,
      AdrNewCommand::class,
      AdrList::class,
      AdrLink::class,
      AdrFile::class,
      AdrGenerate::class,
      AdrGenerateToc::class,
      AdrGenerateGraph::class,
      AdrHelp::class,
      AdrInit::class,
    ]);
  }
}
