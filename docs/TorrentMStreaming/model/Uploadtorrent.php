<?php
class Uploadtorrent
{
	private $name;
	private $gen;
	private $quality;
	private $sound_quality;
	private $resolution;
	private $upload_type;
	public function __construct($name, $gen,
								$quality, $sound_quality, $resolution, $upload_type)
	{
		$this->name = $name;
		$this->gen = $gen;
		$this->quality = $quality;
		$this->sound_quality = $sound_quality;
		$this->resolution = $resolution;
		$this->upload_type = $upload_type;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getGen()
	{
		return $this->gen;
	}
	public function getResolution()
	{
		return $this->resolution;
	}
	public function getSound_quality()
	{
		return $this->sound_quality;
	}
	public function getQuality()
	{
		return $this->quality;
	}
	public function getUpload_type()
	{
		return $this->upload_type;
	}
}