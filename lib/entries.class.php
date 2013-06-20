<?

class inTerraEntry
{
    var $db;                // @access private
    var $limitStart;        // @access private
    var $timeStart;         // @access private
    var $timeEnd;           // @access private
    var $section;           // @access private
    var $limit = PER_PAGE;  // @access private
    var $order = 'DESC';    // @access private
    var $entryID;           // @access private
    var $entriesID;         // @access private
    var $root = false;      // @access private


    /***
     El Constructor
     @param $db (object)
    ***/
    function inTerraEntry(&$db)
    {
        $this->db = &$db;
    }


    /***
     inTerraEntry::createSQL() -- creates the SQL query that will be passed to the DB handler

     @access private
     @return string
    ***/
    function createSQL()
    {
        //initial sql string
        $sql = "SELECT
            ".PREFIX."entry.entryid AS id,
            title,
            subtitle,
            lead,
            content,
            image,
            intime,
            comments,
            commentcount,
            video,
            urlcache,
            rubrikacache AS rubrika,
            authorcache AS authors,
            keywordcache AS keywords,
            ".PREFIX."entry.catid,
            ".PREFIX."category.unixword,
            ".PREFIX."category.word,
            ".PREFIX."image.ext
            FROM ".PREFIX."entry
            LEFT JOIN ".PREFIX."category ON (".PREFIX."entry.catid = ".PREFIX."category.wordid)
            LEFT JOIN ".PREFIX."image ON (".PREFIX."entry.image = ".PREFIX."image.imgid)
        ";

        //check if there is a sectional dellimiter
        $delim = array();

        //check if we need a separate entry
        if (isset($this->entryID)) {
            $sql .= " WHERE ".PREFIX."entry.entryid = '".$this->getEntryID()."'";
        } else {
            //check if there is a entries delimiter
            if (isset($this->entriesID)) {
                $delim[] = PREFIX."entry.entryid IN (".implode(",", $this->getEntriesID()).")";
            }
            //check if there is a section delimiter
            if (isset($this->section)) {
                $delim[] = PREFIX."entry.catid = '".$this->getSection()."'";
            }
            //check if there is a timeframe
            if(!empty($this->timeStart) and !empty($this->timeEnd)) {
                $delim[] = PREFIX."entry.intime > '".$this->getTimeStart()."' AND ".PREFIX."entry.intime < '".$this->getTimeEnd()."'";
            }
            //check if this is the root page
            if($this->getRoot()) {
                $delim[] = PREFIX."entry.format = '1'";
            }
            //create dellimmiting query
            if(!empty($delim)) {
                $sql .= " WHERE ".implode(" AND ", $delim);
            }
            //set sort order
            $sql .= " ORDER BY ".PREFIX."entry.intime ".$this->getOrder()." LIMIT ".(int)$_GET['skip'].", ".$this->getLimit();
        }
        return $sql;
    }

    /***
     inTerraEntry::getEntries() -- returns an array of entries

     @return array
    ***/
    function getEntries()
    {

        $entries = $this->db->getAll($this->getSQL());

        //check if keywords are allowed and process them into an array
        foreach ($entries as $key => $entry)
        {

            // Authors
            if (!empty($entry['authors'])) {
                $myWords = explode(',', $entry['authors']);
                foreach ($myWords as $mkey => $keyword)
                {
                    $temp = explode('|', $keyword);
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => $temp[1]);
                }
                $entries[$key]['authors'] = $myWords;
            } else {
                $entries[$key]['authors'] = array();
            }

            //keywords
            if (!empty($entry['keywords'])) {
                $myWords = explode(',', $entry['keywords']);
                foreach ($myWords as $mkey => $keyword)
                {
                    $temp = explode('|', $keyword);
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => $temp[1]);
                }
                $entries[$key]['keywords'] = $myWords;
            } else {
                $entries[$key]['keywords'] = array();
            }

            //rubrika
            if (!empty($entry['rubrika'])) {
                $myWords = explode(',', $entry['rubrika']);
                $link = '';
                foreach ($myWords as $mkey => $keyword)
                {
                    $temp = explode('|', $keyword);
                    $link .= $temp[1];
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => '/'.$link.'/');
                    $link .= '_';
                }
                $entries[$key]['rubrika'] = $myWords;
            } else {
                $entries[$key]['rubrika'] = array();
            }

            // Thumbnail
            // global function getPartToFiles()
           if ($entry['image']) {
                $entries[$key]['imagepart'] = getPartToFiles($entry['image']);
           }

            // video: XXXXXXXXXXX#true
            if (!empty($entry['video'])) {
                $video = explode('#', $entry['video']);
                $entries[$key]['video'] = $video[0];
                $entries[$key]['videofull'] = $video[1];
            }

/*
            //cat_types
            if (!empty($entry['cat_types'])) {
                $myWords = explode(',', $entry['cat_types']);
                foreach ($myWords as $mkey => $cat_type)
                {
                    $temp = explode('|', $cat_type);
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => $temp[1]);
                }
                $entries[$key]['cat_types'] = $myWords;
            } else {
                $entries[$key]['cat_types'] = array();
            }

*/
            //categorial settings
            if (!empty($entry['catid'])) {
                $entries[$key]['section'] = array();
                $entries[$key]['section']['id'] = $entry['catid'];
                $entries[$key]['section']['unixword'] = $entry['unixword'];
                $entries[$key]['section']['name'] = $entry['word'];
            } else {
                $entries[$key]['section'] = array();
            }

            //unset double data
            unset($entries[$key]['catid'], $entries[$key]['unixword'], $entries[$key]['word']);


            $entries[$key]['url'] = date('/Y/m/d/', $entry['intime']).$entry['urlcache'].'/';

        }
        return $entries;
    }

    /***
     inTerraEntry::getEntry() -- returns one entry object with all associate data

     @param entryID int
     @return array
    ***/
    function getEntry($entryID)
    {
        $this->setEntryID($entryID);
        $entries = $this->getEntries();
        return $entries[0];
    }

    /***
     inTerraEntry::getSQL() -- alias for createSQL()

     @return string
    ***/
    function getSQL()
    {
        return $this->createSQL();
    }

    /***
     inTerraEntry::setOrder() -- set SQL sort order, default is DESC

     @param order string
    ***/
    function setOrder($order="DESC")
    {
        $this->order = $order;
    }

    /***
     inTerraEntry::getOrder() -- returns the preset sort order

     @return string
    ***/
    function getOrder()
    {
        return $this->order;
    }

    /***
     inTerraEntry::setSection() -- sets the section of entries for SQL dellim

     @param section int
    ***/
    function setSection($section)
    {
        $this->section = (int)$section;
    }

    /***
     inTerraEntry::getSection() -- return currently selected section

     @return int
    ***/
    function getSection()
    {
        return $this->section;
    }

    /***
     inTerraEntry::setTimeStart()

     @param timestamp int
    ***/
    function setTimeStart($timestamp)
    {
        $this->timeStart = $timestamp;
    }

    /***
     inTerraEntry::getTimeStart()

     @return int
    ***/
    function getTimeStart()
    {
        return $this->timeStart;
    }

    /***
     inTerraEntry::setTimeEnd()

     @param timestamp int
    ***/
    function setTimeEnd($timestamp)
    {
        $this->timeEnd = $timestamp;
    }

    /***
     inTerraEntry::getTimeEnd()

     @return int
    ***/
    function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /***
     inTerraEntry::setTimes()

     @param start int
     @param end int
    ***/
    function setTimes($start, $end)
    {
        $this->setTimeStart($start);
        $this->setTimeEnd($end);
    }

    /***
     inTerraEntry::setEntryID() -- sets the desired entry id

     @param id int
    ***/
    function setEntryID($id)
    {
        $this->entryID = (int)$id;
    }

    /***
     inTerraEntry::getEntryID() -- return the preset entry id

     @return int
    ***/
    function getEntryID()
    {
        return $this->entryID;
    }

    /***
     inTerraEntry::setEntryID() -- sets the desired entry id

     @param id array(int)
    ***/
    function setEntriesID($id)
    {
        $this->entriesID = array();
        if (is_array($id)) {
            foreach ($id as $value) {
                $this->entriesID[] = (int)$value;
            }
        }
    }

    /***
     inTerraEntry::getEntriesID() -- return the preset entries id

     @return array(int)
    ***/
    function getEntriesID()
    {
        return $this->entriesID;
    }

    /***
     inTerraEntry::setRoot() -- sets the notion of this being the root page

     @return int
    ***/
    function setRoot($value=true)
    {
        $this->root = (bool)$value;
    }

    /***
     inTerraEntry::getRoot() -- return the notion of this being the root page

     @return int
    ***/
    function getRoot()
    {
        return $this->root;
    }

    /***
     inTerraEntry::setLimit()

     @return int
    ***/
    function setLimit($limit)
    {
        $this->limit = (int)$limit;
    }

    /***
     inTerraEntry::getLimit()

     @return int
    ***/
    function getLimit()
    {
        return $this->limit;
    }


}

?>
