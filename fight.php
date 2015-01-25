<?php

/** @var \Doctrine\ORM\EntityManager $em */
$em = require __DIR__ . '/_header_connect.php';

$error = NULL;
/** @var \Doctrine\ORM\EntityRepository $PokemonRepo */
$PokemonRepo = $em->getRepository('TiNyDGZz\PokemonBattle\Pokemon');

/** @var \Doctrine\ORM\EntityRepository $trainerRepo */
$trainerRepo = $em->getRepository('TiNyDGZz\PokemonBattle\Trainer');

try{
    /** @var \TiNyDGZz\PokemonBattle\Trainer $trainer */
    $trainer = $trainerRepo->find($_SESSION['trainer']);
    /** @var \TiNyDGZz\PokemonBattle\Pokemon $pokemon */
    $pokemon = $PokemonRepo->findOneBy([
        'trainer' => $trainer,
    ]);
    /** @var Array $pokemons */
    $pokemons = $PokemonRepo->findAll();
}
catch(Exception $e){
    $error = $e->getMessage();
}


catch(Exception $e){
    $error = $e->getMessage();
}
if(!isset($pokemon) || NULL === $pokemon){
    header('Location:dashboard.php');
}
else{
    $lastFight = $pokemon->getLastfight();
    if($lasthit < time()-6*3600)
        $hit = true;
}



// Display the model
echo $twig ->render('fight.html.twig',[
    'pokemons' => $pokemons,
    'error' => $error,
    'hit' => $hit,
    'trainerId' => $_SESSION['trainer'],
]);
