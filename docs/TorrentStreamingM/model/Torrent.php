<?php
class Torrent
{
    private $upTorrent, $nameTorrent, $downTorrent;
    
    public function __construct($upTorrent, $nameTorrent, $downTorrent){
        $this->setUpTorrent($upTorrent);
        $this->setNameTorrent($nameTorrent);
        $this->setDownTorrent($downTorrent);
    
    }
    public function getUpTorrent()
    {
        return $this->upTorrent;
    }
    public function getNameTorrent()
    {
        return $this->nameTorrent;
    }
    public function getDownTorrent()
    {
        return $this->downTorrent;
    }
    
    public function setUpTorrent($upTorrent)
    {
        $this->upTorrent = $upTorrent;
    }
    public function setNameTorrent($nameTorrent)
    {
        $this->nameTorrent = $nameTorrent;
    }
    public function setDownTorrent($downTorrent)
    {
        $this->downTorrent = $downTorrent;
    }

}