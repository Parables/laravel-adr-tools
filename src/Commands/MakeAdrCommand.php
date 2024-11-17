<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class MakeAdrCommand extends Command
{
  protected $signature = 'make:adr {--args=*}';
  protected $description = 'Run ADR commands';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $subcommand = 'new';
    $args = $this->option('args');

    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-$subcommand " . implode(' ', $args);

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
