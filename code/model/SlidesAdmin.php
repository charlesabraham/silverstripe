<?php

/**
 * @file to create a new admin menu for slideshow settings
 */

class SlidesAdmin extends ModelAdmin {

    private static $menu_title = 'Slideshow';

    private static $url_segment = 'slides';

    private static $managed_models = array ('Slides');

    private static $menu_icon = 'responsive-slideshow/icons/slideshow.png';


}









