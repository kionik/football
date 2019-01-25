<?php


class Match
{
    protected $com1;
    protected $com2;

    public function __construct(CommandStatistics $com1, CommandStatistics $com2)
    {
        $this->com1 = $com1;
        $this->com2 = $com2;
    }

    public function getResult()
    {
        $FirstStrikeCount = $this->getStrikesCount($this->com1, $this->com2);
        $SecondStrikeCount = $this->getStrikesCount($this->com2, $this->com1);
        $result[0] = $this->getScore($FirstStrikeCount);
        $result[1] = $this->getScore($SecondStrikeCount);
        return $result;
    }

    protected function getScore($strikeCount)
    {
        $goalsPercent = $this->getGoalsToStrikesPercent();
        $score = 0;
        for ($i = 0; $i < $strikeCount; $i++) {
            if (rand(0, 100) <= $goalsPercent) {
                $score++;
            }
        }
        return $score;
    }

    protected function getStrikesCount(CommandStatistics $attackCommand, CommandStatistics $defendCommand)
    {
        return ceil(($attackCommand->getAttackPower() * $this->getTeamSpirit() )
                * ($defendCommand->getDefencePower()  * $this->getTeamSpirit() ) );
    }

    protected function getTeamSpirit()
    {
        return rand(10, 30) / 10;
    }

    protected function getGoalsToStrikesPercent()
    {
        return rand(30, 50);
    }
}