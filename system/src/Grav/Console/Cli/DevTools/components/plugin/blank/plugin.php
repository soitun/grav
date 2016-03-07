<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

/**
 * Class @@NAME@@Plugin
 * @package Grav\Plugin
 */
class @@CLASSNAME@@Plugin extends Plugin
{
    /**
     * @var bool
     *
     * Often used to preven unecessary code from running if
     *     certain criteria are not met (such as a matching
     *     URI).
     */
    protected $active = false;

    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        if ($this->grav['config']->get('plugins.@@HYPHENNAME@@.enabled')) { // Check if enabled in configuration.

            $this->active = true; // Set's the plugin state to active.

            $this->enable([
                'onPageInitialized' => ['onPageInitialized', 0] // Adds the onPageInitialized event listener
            ]);
        }

    }

    /**
     * Does something with pages
     */
    public function onPageInitialized()
    {
        // Exit the function if plugin is not active
        if (!$this->active){
            return;
        }

        // Do things with the page
        $somevariable = $this->returnTrue(); // Call a protected function and set a variable to it's value

        $this->doSomeProcesses(); // Call a protected function that runs some processes
    }

    protected function returnTrue()
    {
        return true;
    }

    protected function doSomeProcesses()
    {
        // Generate a random 10 letter string
        $result = "";
        $chars = "abcdefghijklmnopqrstuvwxyz";
        $charArray = str_split($chars);
        for($i = 0; $i < 10; $i++){
            $randItem = array_rand($charArray);
            $result .= "".$charArray[$randItem];
        }

        // Do some math
        $two = 8*4;
        $twentyone = 7*3; // anyone up for poker?
    }
}
