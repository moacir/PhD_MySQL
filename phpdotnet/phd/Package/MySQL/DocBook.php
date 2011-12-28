<?php
/**
 * PhD MySQL Package
 *
 * PHP version 5.3+
 *
 * @category PhD
 * @package  PhD_MySQL
 * @author   Moacir de Oliveira <moacir@php.net>
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
        'function'      => 'format_suppressed_tags',
        'partintro'     => 'format_suppressed_tags',
        'phpdoc:classref'   => 'format_section',
        'preface'       => 'format_suppressed_tags',
        'refentry'      => 'format_refentry',
        'reference'     => 'format_section',
        'refname'       => 'format_refname',
        'refpurpose'    => 'format_refpurpose',
        'refnamediv'    => 'format_refnamediv',
        'refsect1'      => 'format_suppressed_tags',
        'section'       => array(
            /*DEFAULT*/    'format_section',
            'partintro' => 'format_suppressed_tags',
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
        'titleabbrev'   => 'format_suppressed_tags',
        'link'          => 'format_link',
        'xref'          => 'format_link',
        'tgroup'        => 'format_tgroup',
    );

    protected $mytextmap = array(
        'function'      => 'format_function_text',
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

    /**
     * Store information about the current chunk 
     *
     * @var Array
     */
    protected $cchunk = array(
        'titleabbrev' => '',
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
                $filename = Config::mysql_output();
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
        }
        
        return $this::ID_PREFIX . $value;
    }

    public function getCopyRightInfo ()
    {
        return <<<COPYRIGHT
<para><link linkend="php-api-copyright">Copyright 1997-2011 the PHP Documentation Group.</link></para>
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

    public function format_function_text($value, $tag)
    {
        $ref = strtolower(str_replace(array('_', '::', '->'), array('-', '-', '-'), $value));
        if (($filename = $this->getRefnameLink($ref)) !== null) {
            $filename = $this::ID_PREFIX . $filename;
            return sprintf('<link linkend="%s"><function>%s</function></link>', $filename, $value);
        } else {
            $url = $this::URL_PHPNET . $value;
            return sprintf('<ulink url="%s"><function>%s</function></ulink>', $url, $value);
        }
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

    public function format_link($open, $name, $attrs, $props)
    {
        $link       = '';
        $linktype   = '';
        $linkto     = '';
        
        // Local links
        if (isset($attrs[Reader::XMLNS_DOCBOOK]["linkend"])) {
            $linkto     = $attrs[Reader::XMLNS_DOCBOOK]["linkend"];

            // Link mysql links locally
            if (false !== strpos($linkto, 'mysql') && false === strpos($linkto, 'faq')) {
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
            $linktype   = 'external';
            
            // Only link mysql.com links
            if (false !== strpos($linkto, 'mysql.com')) {
                $link = $linkto;
            } else {
                $link = $linkto;
            }
        }
        
        if ($open) {

            if ($linktype === 'local') {
                
                if ($name === 'xref') {
                    return '<xref linkend="' . $link . '"/>';
                } else {
                    return '<link linkend="' . $link . '">';
                }
                
            } else {

                if (isset($this->links[$linkto])) {
                    $link = $this::URL_PHPNET . 'manual/' . Config::language() . '/' . $this->links[$linkto];
                }
                
                if ($name === 'xref') {
                    return '<ulink url="' . $link . '">' . $link . '</ulink>';
                } else {
                    return '<ulink url="' . $link . '">';
                }
            }
        }
        
        if ($linktype === 'local') {
            return "</link>";            
        } else {
            return '</ulink>';
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

            if (isset($attrs[Reader::XMLNS_DOCBOOK]["cols"])) {

                $cols       = (int) $attrs[Reader::XMLNS_DOCBOOK]["cols"];
                $text       = '<tgroup cols="' . $cols . '">' . "\n";
                $percent    = floor(100 / $cols);

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
}

/*
 * vim600: sw=4 ts=4 syntax=php et
 * vim<600: sw=4 ts=4
 */
