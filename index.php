<?php
const APP_DIRECTORY = __DIR__;
require_once(APP_DIRECTORY.DIRECTORY_SEPARATOR.'autoload.php');
use Container\GameContainer;
$game_container = new GameContainer();
$war = $game_container->getWar();
$player_factory = $game_container->getPlayer();
$card_factory = $game_container->getCard();
$war->setPlayers($player_factory->createPlayers($war::NB_PLAYERS, 'Joueur 1', 'Joueur 2'));
$war->setCards($card_factory->createCardsNumber($war::NB_CARDS));
$war->shuffle();
$war->distribute();
$war->play();
$winners = $war->getWinners();
echo (sizeof($winners) > 1 ? 'Les gagnants sont ':'Le gagnant est ').implode(', ', array_map(fn($player): string => $player->getName().' avec '.$player->getPoints().' points',$winners));