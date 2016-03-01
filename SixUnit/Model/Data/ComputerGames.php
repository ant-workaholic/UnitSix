<?php
namespace Training\SixUnit\Model\Data;
use \Magento\Framework\Api\AbstractSimpleObject;
use Training\SixUnit\Api\Data\ComputerGamesInterface;

class ComputerGames extends AbstractSimpleObject implements \Training\SixUnit\Api\Data\ComputerGamesInterface
{
    /**
     * @return int
     */
    public function getGameId()
    {
       return $this->_get(self::GAME_ID);
    }

    /**
     * @return bool
     */
    public function getMmo()
    {
        return $this->_get(self::MMO);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_get(self::NAME);
    }

    /**
     * @return integer
     */
    public function getReleaseDate()
    {
        return $this->_get(self::RELEASE_DATE);
    }

    /**
     * @return bool
     */
    public function getRst()
    {
        return $this->_get(self::RST);
    }

    /**
     * @return bool
     */
    public function getShooter()
    {
        return $this->_get(self::SHOOTER);
    }

    /**
     * @return bool
     */
    public function getSimulator()
    {
        return $this->_get(self::SIMULATOR);
    }

    /**
     * @return integer
     */
    public function getTrialPeriod()
    {
        return $this->_get(self::TRIAL_PERIOD);
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->_get(self::TYPE);
    }

    /**
     * @param $id
     * @return ComputerGamesInterface
     */
    public function setGameId($id)
    {
        return $this->setData(self::GAME_ID, $id);
    }

    /**
     * @param $mmo
     * @return ComputerGamesInterface
     */
    public function setMmo($mmo)
    {
        return $this->setData(self::MMO, $mmo);
    }

    /**
     * @param $name
     * @return ComputerGamesInterface
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * @param $releaseDate
     * @return ComputerGamesInterface
     */
    public function setReleaseDate($releaseDate)
    {
        return $this->setData(self::RELEASE_DATE, $releaseDate);
    }

    /**
     * @param $rst
     * @return ComputerGamesInterface
     */
    public function setRst($rst)
    {
        return $this->setData(self::RST, $rst);
    }

    /**
     * @param $shooter
     * @return ComputerGamesInterface
     */
    public function setShooter($shooter)
    {
        return $this->setData(self::SHOOTER, $shooter);
    }

    /**
     * @param $simulator
     * @return ComputerGamesInterface
     */
    public function setSimulator($simulator)
    {
        return $this->setData(self::SIMULATOR, $simulator);
    }

    /**
     * @param $trialPeriod
     * @return ComputerGamesInterface
     */
    public function setTrialPeriod($trialPeriod)
    {
        return $this->setData(self::TRIAL_PERIOD, $trialPeriod);
    }

    /**
     * @param $type
     * @return ComputerGamesInterface
     */
    public function setType($type)
    {
        return $this->setData(self::TYPE, $type);
    }

}