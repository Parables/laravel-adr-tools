<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrCommand extends Command
{
  protected $signature = 'adr {subcommand} {args?*} ';
  protected $description = 'Run ADR commands';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $subcommand = $this->argument('subcommand');
    $args = $this->argument('args');

    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-$subcommand " . implode(' ', $args);

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
