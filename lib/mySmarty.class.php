<?

/**
 * Настраиваем Smarty под себя
 */
class mySmarty extends Smarty
{
    var $timer;

    /**
     * mySmarty::MySmarty() - constructor
     *
     * Set smarty environment
     *
     * @return
     */
    function mySmarty()
    {
        $this->caching           = $GLOBALS['_CONFIG']['SMARTY']['ALLOW_CACHE'];
        $this->cache_lifetime    = $GLOBALS['_CONFIG']['SMARTY']['CACHE_TIME'];
        $this->compile_check     = $GLOBALS['_CONFIG']['SMARTY']['COMPILE_CHECK'];
        $this->debugging         = $GLOBALS['_CONFIG']['SMARTY']['DEBUG'];
        $this->force_compile     = $GLOBALS['_CONFIG']['SMARTY']['FORCE_COMPILE'];
        $this->template_dir      = array("templates/public", "templates/admin");
        $this->config_dir        = array("templates/public", "templates/admin");
        $this->use_sub_dirs      = true;
        $this->config_booleanize = false;
        $this->left_delimiter    = "{{";
        $this->right_delimiter   = "}}";
        $this->cache_modified_check = true;

        //start timer and init smarty
        $this->startTiming();
        $this->Smarty();

        $this->register_block("dynamic", "smarty_block_dynamic", false);
        $this->autoload_filters = array('output' => array("trimwhitespace"));
    }

    /**
     * mySmarty::display()
     *
     * Purpose: wrapper of the original function to set global variables
     *
     * @param $template (string)
     * @return (void)
     */
    function display($template, $cacheid = "")
    {
        //global assigns
        $this->assignDefaults();

        //fetch template
        parent::display($template, $cacheid);
    }

    /**
     * mySmarty::preFetch()
     *
     * @param template
     * @param string $cacheid
     * @return
     */
    function preFetch($template, $cacheid = '')
    {
        //global assigns
        $this->assignDefaults();

        //fetch template
        return parent::fetch($template, $cacheid);
    }

    /**
     * mySmarty::assignDefaults()
     *
     * Purpose: assign default values to global vars
     *
     * @return
     */
    function assignDefaults()
    {
        global $db;
        //$this->assign("CACHING", $this->caching);
        $this->assign("TIME", $this->stopTiming());
        $this->assign("TOTALDBQUERIES", (int)$db->totq); // количество запросов к БД при создании страницы

        if (function_exists("memory_get_usage")) {
           $this->assign("MEMORY", round(memory_get_usage()/(1024*1024), 2));
        }
    }

    /**
     * mySmarty::startTiming()
     *
     * Purpose: Start the page generation timer
     *
     * @return (void)
     */
    function startTiming()
    {
        $microtime = microtime();
        $microsecs = substr($microtime, 2, 8);
        $secs = substr($microtime, 11);
        $this->timer = "$secs.$microsecs";
    }

    /**
     * mySmarty::stopTiming()
     *
     * Purpose: Stop the page generation timer
     *
     * @return (float)
     */
    function stopTiming()
    {
        $microtime = microtime();
        $microsecs = substr($microtime, 2, 8);
        $secs = substr($microtime, 11);
        $endTime = "$secs.$microsecs";
        return round(($endTime - $this->timer), 4);
    }
}

/**
 * smarty_block_dynamic()
 *
 * @param param (string)
 * @param content (string)
 * @param smarty (object)
 * @return
 */
function smarty_block_dynamic($param, $content, &$smarty)
{
    return $content;
}

?>