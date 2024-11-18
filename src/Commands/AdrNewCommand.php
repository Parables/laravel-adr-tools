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

  protected $help = '
 -s --superceded   A reference (number or partial filename) of a previous
                   decision that the new decision supercedes. A Markdown link
                   to the superceded ADR is inserted into the Status section.
                   The status of the superceded ADR is changed to record that
                   it has been superceded by the new ADR.

-l --link          Syntax: "TARGET:LINK:REVERSE-LINK"
                   Links the new ADR to a previous ADR.
                   TARGET is a reference (number or partial filename) of a
                   previous decision.
                   LINK is the description of the link created in the new ADR.
                   REVERSE-LINK is the description of the link created in the
                   existing ADR that will refer to the new ADR.


Examples:

1. To create a new ADR with the title "Use MySQL Database":

     php artisan adr:new "Use MySQL Database"
     # OR:
     php artisan make:adr "Use MySQL Database"

2. To create a new ADR that supercedes ADR 12:

    php artisan adr:new -s 12 "Use PostgreSQL Database"
    # OR:
    php artisan make:adr -s 12 "Use PostgreSQL Database"

3. To create a new ADR that supercedes ADRs 3 and 4, and amends ADR 5:

    php artisan adr:new -s 3 -s 4 -l "5:Amends:Amended by" "Use Riak CRDTs to cope with scale"
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
