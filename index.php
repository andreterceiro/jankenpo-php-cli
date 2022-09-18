<?php
namespace andredepaulaterceiro;
require_once "./Jankenpo.php";

$Jankenpo = new Jankenpo;

$characterUserOption = '';

// Getting the user input
while ($characterUserOption != 'p' && $characterUserOption != 'r' && $characterUserOption != 's') {
    $characterUserOption = readline("Please insert 'p' for paper or 's' for scissor or 'r' for rock: ");
}

$Jankenpo->process($characterUserOption);