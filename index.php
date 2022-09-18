<?php
namespace andredepaulaterceiro;
require_once "./Jankenpo.php";

$Jankenpo = new Jankenpo;

$characterUserOption = '';

// Getting the user input
while ($characterUserOption != 'p' && $characterUserOption != 'r' && $characterUserOption != 's') {
    $characterUserOption = readline("Please insert 'p' for paper or 'r' for rock or 's' for scissor: ");
}

$Jankenpo->process($characterUserOption, false);