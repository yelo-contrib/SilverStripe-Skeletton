<?php
class ExtendedImage extends Image{
	 
	static $summary_fields = array(
		'Name',
		'Title'
	);
        
	static $searchable_fields = array(
		'Name',
		'Title'
	);
	
	public function Title(){
		if(!$this->_Title){
			preg_match('/(?:\d{0,3}-?)([\s\w-.]*?)\.(?:jpg|jpeg|png|gif)/i', $this->Name,$t);
			$this->_Title = str_replace('-',' ',$t[1]);
		}
		return $this->_Title;
	}

	public function SetFixedSize($width, $height) {
		return $this->getFormattedImage('SetReSize', $width, $height);
	}

	public function generateSetFixedSize(GD $gd, $width, $height) {
		return $gd->resize($width, $height);
	}
}
