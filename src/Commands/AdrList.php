<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrList extends Command
{
  protected $signature = 'adr:list';
  protected $description = 'Lists the architecture decision records';

  public function handle(): void
  {
    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-list";

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
