<?php

namespace Parables\LaravelAdrTools\Commands;

class MakeAdrCommand extends AdrNewCommand
{
  protected $signature = 'adr:new 
                          {--s|superceded=* :  A reference (number or partial filename) of a previous decision that the new decision supercedes.}
                          {--l|link=* : Links the new ADR to a previous ADR. }
                          {title* : Concatenated to form the title of the new ADR}';

  protected $description = 'Creates a new, numbered ADR. Alias to `adr:new` command';
}
