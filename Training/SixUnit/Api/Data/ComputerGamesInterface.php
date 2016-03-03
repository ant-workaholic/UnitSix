<?php
namespace Training\SixUnit\Api\Data;

interface ComputerGamesInterface
{
    const GAME_ID = 'game_id';
    const NAME = 'name';
    const TYPE = 'type';
    const RST = 'rst';
    const MMO = 'mmo';
    const SIMULATOR = 'simulator';
    const SHOOTER = 'shooter';
    const TRIAL_PERIOD = 'trial_period';
    const RELEASE_DATE = 'release_date';


    /**
     * @return int
     */
    public function getGameId();

    /**
     * @param $id
     * @return ComputerGamesInterface
     */
    public function setGameId($id);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param $name
     * @return ComputerGamesInterface
     */
    public function setName($name);

    /**
     * @param $type
     * @return ComputerGamesInterface
     */
    public function setType($type);

    /**
     * @return int
     */
    public function getType();

    /**
     * @return bool
     */
    public function getRst();

    /**
     * @param $rst
     * @return ComputerGamesInterface
     */
    public function setRst($rst);

    /**
     * @return bool
     */
    public function getMmo();

    /**
     * @param $mmo
     * @return ComputerGamesInterface
     */
    public function setMmo($mmo);

    /**
     * @param $simulator
     * @return ComputerGamesInterface
     */
    public function setSimulator($simulator);

    /**
     * @return bool
     */
    public function getSimulator();

    /**
     * @param $shooter
     * @return ComputerGamesInterface
     */
    public function setShooter($shooter);

    /**
     * @return bool
     */
    public function getShooter();

    /**
     * @param $trialPeriod
     * @return ComputerGamesInterface
     */
    public function setTrialPeriod($trialPeriod);

    /**
     * @return integer
     */
    public function getTrialPeriod();

    /**
     * @param $releaseDate
     * @return ComputerGamesInterface
     */
    public function setReleaseDate($releaseDate);

    /**
     * @return integer
     */
    public function getReleaseDate();
}