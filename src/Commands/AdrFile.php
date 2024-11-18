<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrFile extends Command
{
  protected $signature = 'adr:file 
                          {filename : A partial filename of an existing ADR}';

  protected $description = 'Finds an ADR with the filename given';

  protected  $help = 'Examples: 

1. To find an ADR wth the filename containing: "MySQL Database"   
   php artisan adr:find "mysql database"

';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $filename = $this->argument('filename');

    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-file $filename";

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
