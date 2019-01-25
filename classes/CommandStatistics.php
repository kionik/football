<?php

class CommandStatistics
{

    protected $goalAverage; // Среднее количество голлов за матч
    protected $skipAverage; // Среднее количество пропущенных мячей за матч
    protected $goodAttackGamesPercent; // Примерный процент игр хорошо сыгранных атакой
    protected $badDefenceGamesPercent; // Примерный процент игр плохо сыгранных обороной
    protected $attackPower; // Мощь атаки
    protected $defencePower; // Мощь обороны. Чем меньше, тем лучше.
    protected $dataInfo;

    public function __construct($data)
    {
        $this->dataInfo = $data;
        $this->setPercentStatictics();
        $this->setAttackPower();
        $this->setDefencePower();
    }

    public function getAttackPower()
    {
        return $this->attackPower;
    }

    public function getDefencePower()
    {
        return $this->defencePower;
    }

    protected function getPercent($a, $b)
    {
        return $a / $b;
    }

    protected function setPercentStatictics()
    {
        $this->goodAttackGamesPercent = $this->getPercent($this->dataInfo['win'] + $this->dataInfo['draw'] / 2 + $this->dataInfo['defeat'] / 4, $this->dataInfo['games']);
        $this->badDefenceGamesPercent = $this->getPercent($this->dataInfo['defeat'] + $this->dataInfo['draw'] / 2 + $this->dataInfo['win'] / 4, $this->dataInfo['games']);
        $this->goalAverage = $this->getPercent($this->dataInfo['goals']['scored'], $this->dataInfo['games']);
        $this->skipAverage = $this->getPercent($this->dataInfo['goals']['skiped'], $this->dataInfo['games']);
    }

    protected function setAttackPower()
    {
        $this->attackPower = $this->goodAttackGamesPercent * $this->goalAverage;
    }

    protected function setDefencePower()
    {
        $this->defencePower = $this->badDefenceGamesPercent * $this->skipAverage;
    }

}