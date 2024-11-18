<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class AdrInit extends Command
{
  protected $signature = 'adr:init 
                          {directory? : The directory to keep the architecture decision records}
                          {--t|template?=micheal : Specify which template to use for ADRs. choices: ["1. micheal", "2. parables"]}';
  // {--m|template-michael? : Use Michael Nygard\'s template for the ADRs}
  // {--p|template-parables? : Use Parables Boltnoel\'s template for the  ADRs}';

  protected $description = 'Initialises the directory of architecture decision records';

  protected $help = 'This command creates a subdirectory of the current working directory 
and creates the first ADR in that subdirectory, recording the decision to record architectural decisions with ADRs.

If the DIRECTORY is not given, the ADRs are stored in the directory `doc/adr`. 
  
Examples:

1. To use the `./docs/adr/decisions` as the directory for all the ADRs:

   php artisan adr:init "./docs/adr/decisions"

 ';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $directory = trim($this->argument('directory'));
    $template = Str::snake(last($this->options()));

    $directory = match (true) {
      empty($directory) => $this->ask('Specify a directory to keep the ADRs', './docs/adr'),
      default => $directory,
    };

    $template = match (true) {
      empty($template) => $this->choice(
        question: 'Specify a template to use for the ADRs',
        choices: [
          '1. Michael Nygard\'s Template',
          '2. Parables Boltnoel\'s Template'
        ],
        multiple: false,
      ),
      default => $template,
    };

    $template = match (true) {
      str_contains(needle: '1', haystack: $template) => 'init-michael-nygard.md',
      str_contains(needle: '2', haystack: $template) => 'init-parables-boltnoel.md',
      default => 'init-parables-boltnoel.md',
    };

    $this->info($template);

    // Construct the command to execute
    $command = __DIR__ . "/../bin/adr-init $directory $template";

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
