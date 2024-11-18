<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrGenerateGraph extends Command
{
  protected $signature = 'adr:generate-graph 
                          {--p|link-prefix= : Prefix each decision file link with LINK_PREFIX}
                          {--e|link-extension=.html : The file extension of the documents to which generated links refer}';

  protected $description = 'Generates a visualisation of the links between decision records in Graphviz format';

  protected $help = 'Examples:

1. To generate a graph visualisation of decision records in SVG format:

     php artisan adr:generate-graph | dot -Tsvg > graph.svg

2. To generate a graph visualisation in PDF format, in which all links are to .pdf files:

    php artisan adr:generate-graph -e .pdf | dot -Tpdf > graph.pdf

 ';

  public function handle(): void
  {
    // Get the subcommand and additional arguments
    $linkPrefix = trim($this->option('link-prefix'));
    $linkExtension = trim($this->option('link-extension'));

    $linkPrefix = match (true) {
      empty($linkPrefix) => '',
      default => "-p $linkPrefix",
    };


    $linkExtension = match (true) {
      empty($linkExtension) => '',
      default => "-e $linkExtension",
    };


    // Construct the command to execute
    $command = __DIR__ . "/../bin/_adr_generate_graph $linkExtension $linkPrefix";
    // Execute the command
    $output = shell_exec($command);

    // Display the output
    $this->info($output);
  }
}
