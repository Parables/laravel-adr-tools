<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrInit extends Command
{
  protected $signature = 'adr:init 
                          {directory? : The directory to keep the architecture decision records}';

  protected $description = 'Initialises the directory of architecture decision records';

  protected $help = 'This command creates a subdirectory of the current working directory and creates the first ADR in that subdirectory, recording the decision to record architectural decisions with ADRs.

If the DIRECTORY is not given, the ADRs are stored in the directory `doc/adr`. 
  
Examples:

1. To use the `./docs/adr/decions` as the directory for all the ADRs:

   php artisan adr:init "./docs/"

 ';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $directory = trim($this->argument('directory'));

    $directory = match (true) {
      empty($directory) => '',
      default => $directory,
    };

    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-init $directory";

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
