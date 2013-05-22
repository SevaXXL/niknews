<?

class inTerraEntry
{
    var $db;                // @access private
    var $limitStart;        // @access private
    var $timeStart;         // @access private
    var $timeEnd;           // @access private
    var $section;           // @access private
    var $author;            // @access private
    var $order = 'DESC';    // @access private
    var $entryID;           // @access private
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
            entryid AS id,
            security,
            subject,
            subject2,
            content_p AS content,
            history_p AS history,
            intime,
            comments,
            commentcount,
            image,
            ljurl,
            urlcache AS url,
            keywordcache AS keywords,
            keyword2cache AS keywords2,
            bim_entry.cat_type AS cat_types,
            bim_entry.gal_type AS gal_types,
            bim_entry.catid,
            bim_entry.catid AS catd,
            bim_entry.som AS som,
            bim_category.name AS catName,
            bim_category.fullName AS catFullName,
            bim_authors.name as authorName,
            bim_authors.fullName as authorFullName,
            ordr,
            descr,
            razdel,
            som,
            nomer,
            page,
            bim_entry.news_read as view,
            is_bottom,
            price
            FROM bim_entry
            LEFT JOIN bim_category ON (bim_entry.catid = bim_category.catid)
            LEFT JOIN bim_authors ON (bim_authors.authorid = bim_entry.authorid)
        ";

        //check if there is a sectional dellimiter
        $delim = array();

        //check if we need a separate entry
        if (isset($this->entryID)) {
            $sql .= " WHERE entryid = '".$this->getEntryID()."'";
        } else {
            //check if there is a section delimiter
            if (isset($this->section)) {
                $delim[] = "bim_entry.catid = '".$this->getSection()."'";
            }
            if(isset($this->author)) {
                $delim[] = "bim_entry.authorid = '".$this->getAuthor()."'";
            }
            //check if there is a timeframe
            if(!empty($this->timeStart) and !empty($this->timeEnd)) {
                $delim[] = "bim_entry.intime > '".$this->getTimeStart()."' AND bim_entry.intime < '".$this->getTimeEnd()."'";
            }
            //check if this is the root page
            if($this->getRoot()) {
                $delim[] = "bim_entry.format = '1'";
            }
            //create dellimmiting query
            if(!empty($delim)) {
                $sql .= " WHERE ".implode(" AND ", $delim);
            }
            //set sort order
            $sql .= " ORDER BY bim_entry.entryid DESC, bim_entry.intime ".$this->getOrder()." LIMIT ".(int)$_GET['skip'].", ".PER_PAGE;
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
            //keywords
            if (!empty($entry['keywords'])) {
                $myWords = explode(',', $entry['keywords']);
                foreach ($myWords as $mkey => $keyword)
                {
                    $temp = explode('|', $keyword);
                    //upgrade bogus check
                    if (empty($temp[1])) {
                        $temp[1] = urlencode($temp[0]);
                    }
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => $temp[1]);
                }
                $entries[$key]['keywords'] = $myWords;
            } else {
                $entries[$key]['keywords'] = array();
            }

            //keywords2
            if (!empty($entry['keywords2'])) {
                $myWords = explode(',', $entry['keywords2']);
                foreach ($myWords as $mkey => $keyword)
                {
                    $temp = explode('|', $keyword);
                    //upgrade bogus check
                    if (empty($temp[1])) {
                        $temp[1] = urlencode($temp[0]);
                    }
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => $temp[1]);
                }
                $entries[$key]['keywords2'] = $myWords;
            } else {
                $entries[$key]['keywords2'] = array();
            }

            //cat_types
            if (!empty($entry['cat_types'])) {
                $myWords = explode(',', $entry['cat_types']);
                foreach ($myWords as $mkey => $cat_type)
                {
                    $temp = explode('|', $cat_type);
                    //upgrade bogus check
                    if (empty($temp[1])) {
                        $temp[1] = urlencode($temp[0]);
                    }
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => $temp[1]);
                }
                $entries[$key]['cat_types'] = $myWords;
            } else {
                $entries[$key]['cat_types'] = array();
            }

            //gal_types
            if (!empty($entry['gal_types'])) {
                $myWords = explode(',', $entry['gal_types']);
                foreach ($myWords as $mkey => $gal_type)
                {
                    $temp = explode("|",$gal_type);
                    //upgrade bogus check
                    if (empty($temp[1])) {
                        $temp[1] = urlencode($temp[0]);
                    }
                    $myWords[$mkey] = array('word' => $temp[0], 'link' => $temp[1]);
                }
                $entries[$key]['gal_types'] = $myWords;
            } else {
                $entries[$key]['gal_types'] = array();
            }

            //categorial settings
            if (!empty($entry['catid'])) {
                $entries[$key]['section'] = array();
                $entries[$key]['section']['id'] = $entry['catid'];
                $entries[$key]['section']['name'] = $entry['catName'];
                $entries[$key]['section']['fullName'] = $entry['catFullName'];
            } else {
                $entries[$key]['section'] = array();
            }

            $entries[$key]['url'] = date('/Y/m/d/', $entry['intime']).$entry['url'].'/';
            $entries[$key]['datetime'] = date('H:i d.m.y', $entry['intime']);

            //unset double data
            unset($entries[$key]['catid']);
            unset($entries[$key]['catName']);
            unset($entries[$key]['catFullName']);
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

    function setAuthor($section)
    {
        $this->author = (int)$section;
    }

    /***
     inTerraEntry::getSection() -- return currently selected section

     @return int
    ***/
    function getAuthor()
    {
        return $this->author;
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
    function setTimes($start,$end)
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
}

?>
