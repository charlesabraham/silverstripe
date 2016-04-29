<?php


class SlideSettings extends DataExtension {


private static $db = array (               
        'SlideNumber' => 'Int',
	'SlideTime' => 'Int'	
    );



public function updateCMSFields(FieldList $fields) {

$fields->addFieldsToTab('Root.SlideshowSettings', array(
            TextField::create('SlideNumber','Number of Slides'),
	    TextField::create('SlideTime','Time Between Slides (milliseconds)')
        ));
}



}


