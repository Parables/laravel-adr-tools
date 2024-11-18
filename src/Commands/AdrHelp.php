<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrHelp extends Command
{
  protected $signature = 'adr:help 
                          {helpCcommand? : Displays help for that command}
                          {helpSubcommand?* : Displays help for that subcommand}';

  protected $description = 'Displays help for the given command/subcommand or lists the available commands';

  protected $help = 'This uses the environment variables ADR_PAGER or PAGER (in that order) 
to specify the command to be used to display the help text. The default pager is: more.
  
  Examples:

1.  To display help on the adr:new command

    php artisan adr:help new 

2. To change the default pager used:

   ADR_PAGER=less && php artisan adr:help generate graph

 ';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $helpCommand = trim($this->argument('helpCommand'));
    $helpSubcommand = implode(' ', $this->argument('helpSubcommand') ?? []);

    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-help $helpCommand $helpSubcommand";

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
