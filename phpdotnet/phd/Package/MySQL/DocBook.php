<?php
/**
 * PhD MySQL Package
 *
 * PHP version 5.3+
 *
 * @category PhD
 * @package  PhD_MySQL
 * @author   Moacir de Oliveira <moacir@php.net>
 * @author   Philip Olson <philip@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @version  SVN: $Id$
 * @link     https://doc.php.net/phd/
 */
namespace phpdotnet\phd;

/**
 * DocBook Format
 *
 * @category PhD
 * @package  PhD_MySQL
 * @author   Moacir de Oliveira <moacir@php.net>
 * @author   Philip Olson <philip@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @link     https://doc.php.net/phd/
 */
class Package_MySQL_DocBook extends Format
{
    const ID_PREFIX  = 'apis-php-';
    const URL_PHPNET = 'http://www.php.net/'; 

    protected $myelementmap = array(
        'appendix'      => 'format_section',
        'book'          => 'format_section',
        'chapter'       => 'format_section',
        'function'      => 'format_function',
        'informaltable' => 'format_informaltable',
        'methodname'    => 'format_function',
        'mediaobject'   => 'format_mediaobject',
        'partintro'     => 'format_suppressed_tags',
        'phpdoc:classref'   => 'format_section',
        'preface'       => 'format_suppressed_tags',
        'refentry'      => 'format_refentry',
        'reference'     => 'format_section',
        'refname'       => 'format_refname',
        'refpurpose'    => 'format_refpurpose',
        'refnamediv'    => 'format_refnamediv',
        'refsect1'      => 'format_refsect1',
        'section'       => array(
            /*DEFAULT*/    'format_section',
            'partintro' => 'format_section_id',
        ),
        'set'           => 'format_section',
        'title'         => array(
            /*DEFAULT*/    false,
            'appendix'  => 'format_section_title',
            'book'      => 'format_section_title',
            'chapter'   => 'format_section_title',
            'phpdoc:classref'   => 'format_section_title',
            'preface'   => 'format_suppressed_tags',
            'reference' => 'format_section_title',
            'refsect1'  => 'format_refsect1_title',
            'section'   => array(
                /*DEFAULT*/     'format_section_title',
                'partintro'  => 'format_suppressed_tags', 
            ),
            'set'       => 'format_section_title',
        ),
        'alt'           => array(
                /*DEFAULT*/  false,
                'mediaobject' => 'format_suppressed_tags'
        ),
        'imageobject'   => array(
                /*DEFAULT*/ false,
                'mediaobject' => 'format_suppressed_tags',
        ),
        'imagedata'   => array(
                /*DEFAULT*/ false,
                'imageobject' => 'format_suppressed_tags',
        ),
        'titleabbrev'   => 'format_suppressed_tags',
        'link'          => 'format_link',
        'xref'          => 'format_link',
        'tgroup'        => 'format_tgroup',
        'varname'       => 'format_varname',
        'info'          => 'format_info',
        'refsynopsisdiv'=> 'format_suppressed_tags',
    );

    protected $mytextmap = array(
        'function'      => 'format_function_text',
        'methodname'    => array(
            /*DEFAULT*/        'format_function_text',
           'methodsynopsis'      => 'format_generic_tag',
           'constructorsynopsis' => 'format_generic_tag',
        ),
        'refnamediv'    => 'format_refnamediv_text',
        'title'         => array(
            /*DEFAULT*/    false,
            'preface'   => 'format_suppressed_text',
            'section'   => array(
                /*DEFAULT*/     false,
                'partintro'  => 'format_suppressed_text', 
            ),
        ),
        'titleabbrev'   => 'format_suppressed_text',
        'link'          => 'format_link_text',
        'xref'          => 'format_link_text',
        'tgroup'        => 'format_tgroup_text',
        'initializer'   => 'format_initializer_text',
        'mediaobject'   => 'format_mediaobject_text',
        'alt'           => array(
                /*DEFAULT*/ false,
                'mediaobject' => 'format_suppressed_text'
        ),
        'imageobject'   => array(
                /*DEFAULT*/ false,
                'mediaobject' => 'format_suppressed_text',
        ),
        'imagedata'   => array(
                /*DEFAULT*/ false,
                'imageobject' => 'format_suppressed_text',
        ),
    );
    
    protected $links = array(
        'ini'                                        => 'ini',
        'ref.recode'                                 => 'ref.recode',
        'features.persistent-connections'            => 'features.persistent-connections',
        'ini.sql.safe-mode'                          => 'ini.core.php#ini.sql.safe-mode',
        'language.types.resource.self-destruct'      => 'language.types.resource.php#language.types.resource.self-destruct',
        'ini.mysql.default-host'                     => 'ini.mysql.default-host',
        'ini.mysql.default-user'                     => 'ini.mysql.default-user',
        'faq.databases.mysql.php5'                   => 'faq.databases.php#faq.databases.mysql.php5',
        'ini.mysql.default-password'                 => 'ini.mysql.default-password',
        'language.operators.errorcontrol'            => 'language.operators.errorcontrol',
        'errorfunc.constants.errorlevels.e-warning'  => 'errorfunc.constants.php#errorfunc.constants.errorlevels.e-warning',
        'ini.magic-quotes-gpc'                       => 'ini.core.php#ini.magic-quotes-gpc',
        'ini.magic-quotes-runtime'                   => 'ini.core.php#ini.magic-quotes-runtime',
        'security.magicquotes'                       => 'security.magicquotes',
        'security.database.sql-injection'            => 'security.database.sql-injection',
        'intro.pdo'                                  => 'intro.pdo',
        'faq.installation.addtopath'                 => 'faq.installation.php#faq.installation.addtopath',
        'ini.extension-dir'                          => 'ini.core.php#ini.extension-dir',
        'ini.variables-order'                        => 'ini.core.php#ini.variables-orde',
        'install.windows.manual'                     => 'install.windows.manual',
        'configuration.changes'                      => 'configuration.changes',
        'configuration.changes.modes'                => 'configuration.changes.modes',
        'ini.safe-mode'                              => 'ini.core.php#ini.safe-mode',
        'language.types.integer'                     => 'language.types.integer',
        'book.stream'                                => 'book.stream',
    );
    
    protected $deprecated = array(
        'mysql_createdb',
        'mysql_dbname',
        'mysql_dropdb',
        'mysql_fieldflags',
        'mysql_fieldlen',
        'mysql_fieldname',
        'mysql_fieldtable',
        'mysql_fieldtype',
        'mysql_freeresult',
        'mysql_listdbs',
        'mysql_listfields',
        'mysql_listtables',
        'mysql_numfields',
        'mysql_numrows',
        'mysql_selectdb',           
    );

    /**
     * Store information about the current chunk 
     *
     * @var Array
     */
    protected $cchunk = array(
        'titleabbrev' => '',
        'args'        => '',
    );

    public function __construct()
    {
        parent::__construct();
        $this->registerFormatName('DocBook');
        $this->setChunked(false);
        $this->setExt(Config::ext() === null ? ".xml" : Config::ext());
    }

    public function __destruct()
    {
        if ($this->getFileStream()) {
            fclose($this->getFileStream());
        }
    }

    public function getDefaultElementMap()
    {
        return $this->myelementmap;
    }

    public function getDefaultTextMap()
    {
        return $this->mytextmap;
    }

    public function UNDEF($open, $name, $attrs, $props)
    {
        return $this->formatElementTags($open, $name, $attrs, $props);
    }

    public function TEXT($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    public function CDATA($value)
    {
        return "<![CDATA[$value]]>";
    }

    public function appendData($data)
    {
        if ($this->appendToBuffer) {
            $this->buffer .= $data;
            return;
        }
        fwrite($this->getFileStream(), $data);
    }

    public function transformFromMap($open, $tag, $name, $attrs, $props) {}
    public function createLink($for, &$desc = null, $type = Format::SDESC) {}

    public function header()
    {
        return <<<HEADER
<!DOCTYPE section PUBLIC "-//OASIS//DTD DocBook XML V4.5//EN" "http://www.oasis-open.org/docbook/xml/4.5/docbookx.dtd">

HEADER;
    }

    public function update($event, $val = null)
    {
        switch($event) {
        case Render::INIT:
            if ($this->appendToBuffer) {
                return;
            }
            if (!is_resource($this->getFileStream())) {
                $filename = Config::output_dir();
                if (Config::output_filename()) {
                    $filename .= Config::output_filename();
                } else {
                    $filename .= strtolower($this->getFormatName()) . $this->getExt();
                }
                $this->setFileStream(fopen($filename, 'w+'));
                fwrite($this->getFileStream(), $this->header());
            }
            break;

        case Render::STANDALONE:
            $this->registerElementMap(static::getDefaultElementMap());
            $this->registerTextMap(static::getDefaultTextMap());
            break;

        case Render::VERBOSE:
            v('Starting %s rendering', $this->getFormatName(), VERBOSE_FORMAT_RENDERING);
            break;
        }
    }

    public function formatElementTags($open, $name, $attrs, $props)
    {
        $strAttrs = $this->readPrefixedAttrs();

        //Handle empty tags
        if ($props['empty']) {
            return '<' . $name . $strAttrs . ' />';
        }

        return $open ? '<' . $name . $strAttrs . '>' : '</' . $name . '>';
    }

    /**
     * Creates a string with attributes and values of the current element
     * preserving the namespace prefixes
     */
    public function readPrefixedAttrs()
    {
        $r = ReaderKeeper::getReader();
        $prefixedAttrs = '';

        if ($r->hasAttributes) {
            $r->moveToFirstAttribute();
            do {
                $prefix = $r->prefix ? $r->prefix . ':' : '';
                $pair = $this->handleAttrValue($prefix . $r->localName, $r->value);

                if ($pair['attr'] !== '' && $pair['value'] !== '') {
                    $prefixedAttrs .=  ' ' . $pair['attr'] . '="' . $pair['value'] . '"';
                }
            } while ($r->moveToNextAttribute());
            $r->moveToElement();
        }

        return $prefixedAttrs;
    }

    /**
     * Transforms the attribute/values to the specific MySQL format
     */
    public function handleAttrValue($attr, $value)
    {
        switch ($attr) {
            case 'xml:id':
                $attr = 'id';
                $value = $this->replaceMysqlIds($value);
                break;
            case 'role':
            case 'choice':
            case 'xmlns':
            case 'xmlns:phd':
            case 'xmlns:phpdoc':
            case 'xmlns:xi':
            case 'xmlns:xlink':
                $attr = $value = '';
                break;
        }

        return array(
            'attr' => $attr,
            'value' => $value,
        );
    }
    
    public function linkExternal($value)
    {
        if (false !== stripos($value, 'www.mysql.com')) {
            return false;
        }
        
        if (in_array(strtolower($value), $this->deprecated)) {
            return false;
        }

        return true;
    }
    
    public function replaceMysqlIds($id)
    {
        $value = trim($id);

        //Change main ids
        if ($id == 'book.mysqli') {
            $value = 'mysqli';
        } else if ($value == 'book.pdo' || $value == 'ref.pdo-mysql') {
            $value = 'pdo-mysql';
        } else if ($value == 'intro.mysql' || $value == 'book.mysql') {
            $value = 'mysql';
        } else if ($value == 'book.mysqlnd') {
            $value = 'mysqlnd';
        } else if ($value == 'mysql') {
            $value = 'mysqlinfo';
        }
        
        return $this::ID_PREFIX . $value;
    }

    public function getCopyRightInfo ()
    {
        return <<<COPYRIGHT
<para><link linkend="php-api-copyright">Copyright 1997-2012 the PHP Documentation Group.</link></para>
COPYRIGHT;
    }

    public function extractRefnames()
    {
        $xmlContent = sprintf('<notatag>%s</notatag>', ReaderKeeper::getReader()->readInnerXML());
        $xmlParser = simplexml_load_string($xmlContent);

        return $xmlParser->refname;
    }

    public function extractTitleabbrev()
    {
        $xmlContent = sprintf('<notatag>%s</notatag>', ReaderKeeper::getReader()->readInnerXML());
        $xmlParser = simplexml_load_string($xmlContent);

        return $xmlParser->titleabbrev[0];
    }

    public function format_suppressed_tags($open, $name, $attrs, $props)
    {
        return '';
    }

    public function format_section_id($open, $name, $attrs, $props)
    {
        if ($open && isset($attrs['http://www.w3.org/XML/1998/namespace']['id'])) {
            return '<para id="' . $this->replaceMysqlIds($attrs['http://www.w3.org/XML/1998/namespace']['id']) . '"></para>';
        }
        return '';
    }
    
    public function format_suppressed_text($value, $tag)
    {
        return '';
    }
  
    public function format_section($open, $name, $attrs, $props)
    {
        $this->cchunk['titleabbrev'] = $open ? $this->extractTitleabbrev() : '';
        return $this->formatElementTags($open, 'section', $attrs, $props);
    }

    public function format_section_title($open, $name, $attrs, $props)
    {
        if ($open) {
            return $this->formatElementTags($open, $name, $attrs, $props);
        }

        //render titleabbrev as literal
        $titleabbrev = $this->cchunk['titleabbrev']
            ? ' (<literal>' . $this->cchunk['titleabbrev'] . '</literal>)': '';

        return $titleabbrev . '</title>' . $this->getCopyRightInfo();
    }

    public function format_function($open, $tag, $attrs, $props) {
        if ($open) {
            if (isset($attrs[Reader::XMLNS_PHD]['args'])) {
                $this->cchunk['args'] = $attrs[Reader::XMLNS_PHD]['args'];
            }
        } else {
            $this->cchunk['args'] = '';
        }

        return '';
    }
    
    public function format_function_text($value, $tag)
    {
        if ($this->cchunk['args'] !== '') {
            $value .= sprintf('(%s)', $this->cchunk['args']);
        }

        $ref = strtolower(str_replace(array('_', '::', '->'), array('-', '-', '-'), $value));
        if (($filename = $this->getRefnameLink($ref)) !== null && false !== stripos($ref, 'mysql')) {
            $filename = $this::ID_PREFIX . $filename;
            return sprintf('<link linkend="%s"><function>%s</function></link>', $filename, $value);
        } else {
            
            if (!$this->linkExternal($value)) {
                return sprintf('<function>%s</function>', $value);
            }
            
            $url = $this::URL_PHPNET . $value;
            return sprintf('<ulink url="%s"><function>%s</function></ulink>', $url, $value);
        }
    }
    
    public function format_generic_tag($value, $tag)
    {
        return '<' . $tag . '>' . $value . '</' . $tag . '>';
    }

    public function format_refentry($open, $name, $attrs, $props)
    {
        return $this->formatElementTags($open, 'section', $attrs, $props);
    }

    public function format_refsect1_title($open, $name, $attrs, $props)
    {
        if ($open) {
            return '<para><emphasis role="bold">';
        }
        return '</emphasis></para>';
    }

    public function format_info($open, $name, $attrs, $props)
    {
        if ($open) {
            if (isset($attrs['http://www.w3.org/XML/1998/namespace']['id'])) {
                return '<section id="' . $this->replaceMysqlIds($attrs['http://www.w3.org/XML/1998/namespace']['id']) . '">';
            } else {
                return '<section>';
            }
        }
        return '</section>';
    }

    public function format_refnamediv($open, $name, $attrs, $props)
    {
        if ($open) {
            $refnameList = $this->extractRefnames();
            $titleList = array();
            foreach ($refnameList as $refname) {
                $titleList[] = sprintf('<literal>%s</literal>', $refname);
            }
            return sprintf('<title>%s</title>%s%s',
                implode(', ', $titleList),
                $this->getCopyRightInfo(),
                '<itemizedlist><listitem>'
            );
        }
        return '</listitem></itemizedlist>';
    }
    
    public function format_refnamediv_text($value, $tag)
    {
        return '';
    }

    public function format_refname($open, $name, $attrs, $props)
    {
        if ($open) {
            return '<para><literal>';
        }
        return '</literal></para>';
    }

    public function format_refpurpose($open, $name, $attrs, $props)
    {
        if ($open) {
            return '<para>';
        }
        return '</para>';
    }

    // refsect1 was format_suppressed_tags but we need the role for format_informaltable
    public function format_refsect1($open, $name, $attrs, $props) {
       if ($open) {
           if (isset($attrs[Reader::XMLNS_DOCBOOK]['role']) && $attrs[Reader::XMLNS_DOCBOOK]['role']) {
               $this->role = $attrs[Reader::XMLNS_DOCBOOK]['role'];
           }
       }
    }

    public function format_mediaobject_text($value, $tag) {
        return '';
    }

    public function format_mediaobject($open, $name, $attrs, $props) {
    
        if ($open) {
            // Server specific variables
            $phpdocdir    = isset($_SERVER['PHPDOCDIR'])     ? $_SERVER['PHPDOCDIR']     : '.';
            $mysqldoctree = isset($_SERVER['MYSQLDOC_TREE']) ? $_SERVER['MYSQLDOC_TREE'] : '';	

            // Get data from XML elements (imageobject->imagedata) inside <mediaobject>
            $xmlContent = sprintf('<notatag>%s</notatag>', ReaderKeeper::getReader()->readInnerXML());
            $xmlParser  = simplexml_load_string($xmlContent);

            // Elements we use
            $title     = (string) $xmlParser->alt;
            $filepath  = (string) $xmlParser->imageobject->imagedata[0]['fileref'];
            $pfilepath = $phpdocdir . '/' . $filepath;
                        
            // We also need the image information, such as width/height
            $filesize = getimagesize($phpdocdir . '/' . $filepath);
            $filename = basename($filepath);
            $width    = $filesize[0];
            $height   = $filesize[1];
            $format   = trim(strtoupper(str_replace('image/', '', $filesize['mime'])));
            
            // TODO: Deal with this. Using a random id for now. Id is not always set in the PHP docs.
            $pathinfo = pathinfo($filename);
            $id       = 'apis-php-' . $pathinfo['filename'] . '-figure';
            
            // TODO: Will this work? Copy image to the appropriate directory
            if (!empty($mysqldoctree)) {
                $imagedir = $mysqldoctree . "/refman-common/images/published";
                if (is_dir($imagedir) && is_file($pfilepath)) {
                    $newfilepath = $imagedir . '/' . $filename;
                    // TODO: Add svn add here, for new images, or deal with this elsewhere
                    copy($pfilepath, $newfilepath);
                }
            }

            $text  =  "<figure id=\"$id\"><title>$title</title>";
            $text .= "<mediaobject>";
            $text .= "<imageobject role=\"html\"><imagedata contentwidth=\"$width\" contentdepth=\"$height\" fileref=\"images/published/$filename\" format=\"$format\" lang=\"en\"/></imageobject>";
            $text .= "<imageobject role=\"fo\"><imagedata width=\"100%\" fileref=\"images/published/$filename\" format=\"$format\" lang=\"en\"/></imageobject>";
            $text .= "<textobject><phrase lang=\"en\">$title</phrase></textobject>";
            $text .= "</mediaobject>";
        } else {
            $text = '</figure>';
        }
        return $text;
    }

   // An <informaltable> should include a <textobject> for user accessibility reasons
   // TODO: Either:
   //  a. Change unknown informaltable's to table, or 
   //  b. take them into account, instead of using "Unknown PHP API feature." for all
    public function format_informaltable($open, $name, $attrs, $props) {
        $text = '';
        if ($open) {
            $text .= '<informaltable>';
            if (isset($this->role)) {
                if ($this->role == 'changelog') {
                    $text .= '<textobject><phrase>Changelog information for this function</phrase></textobject>';
                } else {
                    // TODO: No other informaltable roles exist, it seems (yet?)
                    $text .= '<textobject><phrase>Unknown PHP API feature.</phrase></textobject>';
                }
            } else {
                $text .= "<textobject><phrase>Unknown PHP API feature.</phrase></textobject>";
            }
        } else {
            $text .= '</informaltable>';
        }
        return $text;
    }

    public function format_varname($open, $name, $attrs, $props)
    {
        if ($open) {
            return '<varname>';
        }
        return '</varname>';
    }

    public function format_link($open, $name, $attrs, $props)
    {
        $link       = '';
        $linktype   = '';
        $linkto     = '';
        
        // Local links
        if (isset($attrs[Reader::XMLNS_DOCBOOK]["linkend"])) {
            $linkto     = $attrs[Reader::XMLNS_DOCBOOK]["linkend"];

            // Link mysql links locally
            if (false !== stripos($linkto, 'mysql') && false === strpos($linkto, 'faq')) {
                $link = $this->replaceMysqlIds($linkto);
                $linktype   = 'local';
            } else {
                // Non-mysql links are now external
                $link = $this::URL_PHPNET . $linkto;
                $linktype = 'external';
            }
        }
        
        // External links
        if (!$link && isset($attrs[Reader::XMLNS_XLINK]['href'])) {
            $linkto     = $attrs[Reader::XMLNS_XLINK]['href'];
            $link       = $linkto;
            $linktype   = 'external';

            if (!$this->linkExternal($link)) {
                return '';
            }
        }
        
        if ($open) {

            if ($linktype === 'local') {
                
                if ($name === 'xref') {
                    return '<xref linkend="' . $link . '"/>';
                } else {
                    return '<link linkend="' . $link . '">';
                }
                
            } elseif ($linktype === 'external') {

                if (isset($this->links[$linkto])) {
                    $link = $this::URL_PHPNET . 'manual/' . Config::language() . '/' . $this->links[$linkto];
                }
                
                if ($name === 'xref') {
                    return '<ulink url="' . $link . '">' . $link . '</ulink>';
                } else {
                    return '<ulink url="' . $link . '">';
                }
            } else {
                return $link;
            }
        }
        
        if ($linktype === 'local') {
            return "</link>";            
        } elseif ($linktype === 'external') {
            return '</ulink>';
        } else {
            return '';
        }
    }

    public function format_link_text($value, $tag) 
    {
        return $value;
    }
    
    public function format_tgroup_text($value, $tag)
    {
        return $value;
    }

    public function format_tgroup($open, $name, $attrs, $props)
    {
        $text = "<tgroup>\n";
        
        if ($open) {

            $xmlContent = sprintf('<notatag>%s</notatag>', ReaderKeeper::getReader()->readInnerXML());
            $xmlParser  = simplexml_load_string($xmlContent);
            $colspec    = (array) $xmlParser->colspec;
            
            if (isset($attrs[Reader::XMLNS_DOCBOOK]["cols"])) {

                $cols       = (int) $attrs[Reader::XMLNS_DOCBOOK]["cols"];
                $text       = '<tgroup cols="' . $cols . '">' . "\n";
                $percent    = floor(100 / $cols);
                
                if (!empty($colspec)) {
                    return $text;
                }

                for ($i = 1; $i <= $cols; $i++) {
                
                    if ($i === $cols) {
                        if (($percent * $cols) !== 100) {
                            $percent = $percent + (100-($percent*$cols));
                        }
                    }

                    $text .= '<colspec colwidth="' . $percent . '*"/>' . "\n";
                }
            }
            
            return $text;
        }
        
        return "</tgroup>\n";
    }
    
    public function format_initializer_text($value, $tag)
    {
        return '=' . $value;
    }
}

/*
 * vim600: sw=4 ts=4 syntax=php et
 * vim<600: sw=4 ts=4
 */
 
