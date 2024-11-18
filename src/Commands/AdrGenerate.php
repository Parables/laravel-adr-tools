<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrGenerate extends Command
{
  protected $signature = 'adr:generate 
                          {report-type? : The type of report to be generated}
                          {opts?* : The options to be passed down to the generator}';

  protected $description = 'Generates summary documentation about the architecture decision records';

  protected $help = 'Generates summary documentation about the architecture decision records
that is typically fed into the tool chain for publishing a project\'s  documentatation. 
  
Examples:

1.  To list the report types that can be generated, run:

    php artisan adr:generate 

2. To get help on a specific report generator, run:

   php artisan adr:help generate toc|graph

3. To generate a table of contents:

     php artisan adr:generate toc

 ';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $reportType = trim($this->argument('report-type'));
    $opts = $this->argument('opts') ?? [];

    $reportType = match (true) {
      empty($reportType) => '',
      default => $reportType,
    };

    $opts = implode(' ', $opts);


    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-generate $reportType $opts";

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
