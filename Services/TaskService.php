<?php

namespace BaseBundle\Services;


use Pheanstalk\Pheanstalk;

class TaskService
{
    protected $manager;
    protected $host;
    protected $port;

    public function __construct($host, $port)
    {
        $this->host = $host;
        $this->port = $port;
    }

    /**
     * @return Pheanstalk
     */
    public function getManager()
    {
        if ($this->manager === null) {

            $this->manager = new Pheanstalk($this->host, $this->port);
        }
        return $this->manager;
    }

}