<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrNewCommand extends Command
{
  protected $signature = 'adr:new 
                          {--s|superceded=* :  A reference (number or partial filename) of a previous decision that the new decision supercedes.}
                          {--l|link=* : Links the new ADR to a previous ADR. }
                          {title* : Concatenated to form the title of the new ADR}';

  protected $description = 'Creates a new, numbered ADR';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $superceded = array_map(fn($s) => "-s $s", $this->option('superceded'));
    $link = array_map(fn($l) => "-l $l", $this->option('link'));
    $title = $this->argument('title');

    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-new " . implode(' ', [...$superceded, ...$link]) . " " .  implode(' ', $title);

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
