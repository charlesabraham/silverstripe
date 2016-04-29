<?php

	
class Slides extends DataObject {

/*******************
Database Fields;
*******************/

private static $db = array (
        'Title' => 'Varchar',        
        'Show' => 'Boolean',
	'Slideorder' => 'Int',	
	'Description' => 'Text'	
    );

/*******************
Fields in the form;
*******************/

public function getCMSfields() {

$fields = FieldList::create(TabSet::create('Root'));

$fields->addFieldsToTab('Root.Main', array(
            TextField::create('Title','Title'),
	    TextareaField::create('Description','Description'),
	    DropdownField::create('Slideorder')
                ->setSource(ArrayLib::valuekey(range(1,10))),
            CheckboxField::create('Show','Feature on Slideshow'),
	    $upload = UploadField::create('PrimaryPhoto','Slideshow Image')
        ));

$upload->getValidator()->setAllowedExtensions(array('png','jpeg','jpg','gif'));

$upload->setFolderName('Slideshow-photos');

return $fields;
}

private static $has_one = array (        
        'PrimaryPhoto' => 'Image'
    );


public function getGridThumbnail() {
        if($this->Photo()->exists()) {
            return $this->Photo()->SetWidth(100);
        }

        return "(no image)";
    }

/*******************
Summary fields in listing page;
*******************/

private static $summary_fields = array (
	'Slideorder' => '#Slide Order',
	'PrimaryPhoto.CMSThumbnail' => 'Image',
        'Title' => 'Title',        
        'Show.Nice' => 'Enabled',
        'Description.FirstSentence' => 'Description'
    );

private static $default_sort = array('Slideorder'=>'ASC');


}





class Slides_Controller extends Page_Controller {


}

/*******************
Function to add to Page_Controller;
NB: changes in _config.php also;
*******************/

class SliderExtension extends Extension {
	
public function Showslides($count = 6) 
{ 


$number = SiteConfig::current_site_config()->SlideNumber;

$count = ($number > 0) ? $number : $count;

  Requirements::css("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css");
  Requirements::css("responsive-slideshow/css/responsive_slideshow.css");
  Requirements::javascript("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js");
  Requirements::javascript("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js");

    		return Slides::get()
               ->sort('Slideorder', 'ASC')
	       ->filter(array('Show' => true))
               ->limit($count);



}
	
}




