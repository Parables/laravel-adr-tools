<?php

namespace Parables\LaravelAdrTools\Commands;

use Illuminate\Console\Command;

class AdrNewCommand extends Command
{
  protected $signature = 'adr:new 
                          {--s|superceded?=* :  A reference (number or partial filename) of a previous decision that the new decision supercedes. A Markdown link to the superceded ADR is inserted into the Status section. The status of the superceded ADR is changed to record that it has been superceded by the new ADR}
                          {--l|link?=* : Links the new ADR to a previous ADR. TARGET is a reference (number or partial filename) of a previous decision. LINK is the description of the link created in the new ADR. REVERSE-LINK is the description of the link created in the existing ADR that will refer to the new ADR}
                          {title* : The TITLE_TEXT arguments are concatenated to form the title of the new ADR}';
  protected $description = 'Creates a new, numbered ADR.  The TITLE_TEXT arguments are concatenated to form the title of the new ADR.  The ADR is opened for editing in the editor specified by the VISUAL or EDITOR environment variable (VISUAL is preferred; EDITOR is used if VISUAL is not set).  After editing, the file name of the ADR is output to stdout, so the command can be used in scripts. If the ADR directory contains a file `templates/template.md`, this is used as the template for the new ADR.  Otherwise a default template is used that follows the style described by Michael Nygard in this article: http://thinkrelevance.com/blog/2011/11/15/documenting-architecture-decisions
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
