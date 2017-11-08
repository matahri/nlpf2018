<?php

namespace Hackathon\PlayerIA;
use Hackathon\Game\Result;

/**
 * Class TahriPlayer
 * @package Hackathon\PlayerIA
 * @author Robin
 *
 */
class TahriPlayer extends Player
{
    protected $mySide;
    protected $opponentSide;
    protected $result;

    public function getChoice()
    {
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Choice           ?    $this->result->getLastChoiceFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Choice ?    $this->result->getLastChoiceFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide) -- if 0 (first round)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide) -- if 0 (first round)
        // -------------------------------------    -----------------------------------------------------
        // How to get all the Choices          ?    $this->result->getChoicesFor($this->mySide)
        // How to get the opponent Last Choice ?    $this->result->getChoicesFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get my Last Score            ?    $this->result->getLastScoreFor($this->mySide)
        // How to get the opponent Last Score  ?    $this->result->getLastScoreFor($this->opponentSide)
        // -------------------------------------    -----------------------------------------------------
        // How to get the stats                ?    $this->result->getStats()
        // How to get the stats for me         ?    $this->result->getStatsFor($this->mySide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // How to get the stats for the oppo   ?    $this->result->getStatsFor($this->opponentSide)
        //          array('name' => value, 'score' => value, 'friend' => value, 'foe' => value
        // -------------------------------------    -----------------------------------------------------
        // How to get the number of round      ?    $this->result->getNbRound()
        // -------------------------------------    -----------------------------------------------------
        // How can i display the result of each round ? $this->prettyDisplay()
        // -------------------------------------    -----------------------------------------------------
	
	if ($this->result->getNbRound() == 0)
	{
		$choice = parent::paperChoice();
		return $choice;
	}

        $scissors = parent::scissorsChoice();
        $paper = parent::paperChoice();
        $rock = parent::rockChoice();

	$opponent_paper = $this->result->getStatsFor($this->opponentSide)['paper']/$this->result->getNbRound();
	$opponent_scissors = $this->result->getStatsFor($this->opponentSide)['scissors']/$this->result->getNbRound();
	$opponent_rock = $this->result->getStatsFor($this->opponentSide)['rock']/$this->result->getNbRound();

	$my_paper = $this->result->getStatsFor($this->mySide)['paper']/$this->result->getNbRound();
	$my_scissors = $this->result->getStatsFor($this->mySide)['scissors']/$this->result->getNbRound();
	$my_rock = $this->result->getStatsFor($this->mySide)['rock']/$this->result->getNbRound();

	if ($opponent_paper > $opponent_scissors && $opponent_paper > $opponent_rock)
		return $scissors;

	if ($opponent_scissors > $opponent_paper && $opponent_scissors > $opponent_rock)
		return $rock;

	if ($opponent_rock > $opponent_scissors && $opponent_rock > $opponent_paper)
		return $paper;

	if ($my_paper > $my_scissors && $my_paper > $my_rock)
		return $rock;

	if ($my_scissors > $my_paper && $my_scissors > $my_rock)
		return $paper;

	if ($my_rock > $my_scissors && $my_rock > $my_paper)
		return $scissors;

	if ($this->result->getLastChoiceFor($this->mySide) == 'paper')
		return $rock;
	else if ($this->result->getLastChoiceFor($this->mySide) == 'scissors')
		return $paper;
	else
		return $scissors;
	/*if ($opponent_paper > = 0.4)
		return $scissors;

	if ($opponent_scissors >= 0.4)
		return $rock;

	if ($opponent_rock >= 0.4)
		return $paper;

	if ($my_paper >= 0.4)
		return $rock;

	if ($my_rock >= 0.4)
		return $scissors;

	if ($my_scissors >= 0.4)
		return $paper;*/
	
        return $paper;
    }
};
