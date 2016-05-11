<?php

/**
 * @file to create extra settings tab in the website settings
 */

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


