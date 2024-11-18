<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrGenerateToc extends Command
{
  protected $signature = 'adr:generate-toc 
                          {--i|into= : Precede the table of contents with the given INTRO text in Markdown format}
                          {--o|outro= : Follow the table of contents with the given OUTRO text in Markdown format}
                          {--p|link-prefix= : Prefix each decision file link with LINK_PREFIX}';

  protected $description = 'Generates a table of contents in Markdown format to stdout';

  protected $help = 'Examples:

1. To generate a table of content in Markdown format to a README.md file:

     php artisan adr:generate-toc > README.md

2. To insert some markdown right after the main H1 heading(# Architecture Decision Records):

     php artisan adr:generate-toc -i "<br> An ADR captures a single justified design choice ..." > README.md

 ';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $intro = $this->option('intro');
    $outro = $this->option('outro');
    $linkPrefix = trim($this->option('link-prefix'));

    $intro = match (true) {
      empty($intro) => '',
      default => "-i $intro",
    };

    $outro = match (true) {
      empty($outro) => '',
      default => "-o $outro",
    };

    $linkPrefix = match (true) {
      empty($linkPrefix) => '',
      default => "-p $linkPrefix",
    };

    // Construct the command to execute
    $command = __DIR__ . "/../bin/_adr_generate_toc $intro $outro $linkPrefix";

    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
