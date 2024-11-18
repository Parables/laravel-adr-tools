<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrLink extends Command
{
  protected $signature = 'adr:link 
                          {source : A reference (number or partial filename) of an existing ADR}
                          {link : The description of the link created in the SOURCE}
                          {target : A reference (number or partial filename) of an existing ADR}
                          {reverse-link : The description of the link created in the SOURCE}';

  protected $description = 'Creates a link between two ADRs, from SOURCE to TARGET new';

  protected  $help = 'Examples: 

  1. To create a link with the description "Ammends" from ADR 12 to ADR 10 with the description "Ammended by", 
  use the following command:
   
   php artisan adr:link 12 "Amends" 10 "Amended by"

';

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
