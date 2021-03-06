<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Mail\Struct;

use Zimbra\Common\Text;
use Zimbra\Enum\SearchType;
use Zimbra\Struct\Base;

/**
 * NewFolderSpec struct class
 *
 * @package    Zimbra
 * @subpackage Mail
 * @category   Struct
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class NewFolderSpec extends Base
{
    /**
     * Constructor method for NewFolderSpec
     * @param string $name If "l" is unset, name is the full path of the new folder; otherwise, name may not contain the folder separator '/'
     * @param NewFolderSpecAcl $acl Action grant selectors
     * @param SearchType $view Default type for the folder; used by web client to decide which view to use; possible values are the same as <SearchRequest>'s {types}: conversation|message|contact|etc
     * @param string $f Flags
     * @param int $color Color numeric; range 0-127; defaults to 0 if not present; client can display only 0-7
     * @param string $rgb RGB color in format #rrggbb where r,g and b are hex digits
     * @param string $url URL (RSS, iCal, etc.) this folder syncs its contents to
     * @param string $l Parent folder ID
     * @param bool $fie If set, the server will fetch the folder if it already exists rather than throwing mail.ALREADY_EXISTS
     * @param bool $sync If set (default) then if "url" is set, synchronize folder content on folder creation
     * @return self
     */
    public function __construct(
        $name,
        NewFolderSpecAcl $acl = null,
        SearchType $view = null,
        $f = null,
        $color = null,
        $rgb = null,
        $url = null,
        $l = null,
        $fie = null,
        $sync = null
    )
    {
        parent::__construct();
        $this->property('name', trim($name));
        if($acl instanceof NewFolderSpecAcl)
        {
            $this->child('acl', $acl);
        }
        if($view instanceof SearchType)
        {
            $this->property('view', $view);
        }
        if(null !== $f)
        {
            $this->property('f', trim($f));
        }

        if(null !== $color)
        {
            $color = (int) $color;
            $this->property('color', ($color > 0 && $color < 128) ? $color : 0);
        }
        if(null !== $rgb && Text::isRgb(trim($rgb)))
        {
            $this->property('rgb', trim($rgb));
        }
        if(null !== $url)
        {
            $this->property('url', trim($url));
        }
        if(null !== $l)
        {
            $this->property('l', trim($l));
        }
        if(null !== $fie)
        {
            $this->property('fie', (bool) $fie);
        }
        if(null !== $sync)
        {
            $this->property('sync', (bool) $sync);
        }
    }

    /**
     * Gets or sets name
     *
     * @param  string $name
     * @return string|self
     */
    public function name($name = null)
    {
        if(null === $name)
        {
            return $this->property('name');
        }
        return $this->property('name', trim($name));
    }

    /**
     * Gets or sets acl
     *
     * @param  NewFolderSpecAcl $acl
     * @return NewFolderSpecAcl|self
     */
    public function acl(NewFolderSpecAcl $acl = null)
    {
        if(null === $acl)
        {
            return $this->child('acl');
        }
        return $this->child('acl', $acl);
    }

    /**
     * Gets or sets view
     *
     * @param  SearchType $view
     * @return SearchType|self
     */
    public function view(SearchType $view = null)
    {
        if(null === $view)
        {
            return $this->property('view');
        }
        return $this->property('view', $view);
    }

    /**
     * Gets or sets f
     *
     * @param  string $f
     * @return string|self
     */
    public function f($f = null)
    {
        if(null === $f)
        {
            return $this->property('f');
        }
        return $this->property('f', trim($f));
    }

    /**
     * Gets or sets color
     *
     * @param  int $color
     * @return int|self
     */
    public function color($color = null)
    {
        if(null === $color)
        {
            return $this->property('color');
        }
        return $this->property('color', ($color > 0 && $color < 128) ? $color : 0);
    }

    /**
     * Gets or sets rgb
     *
     * @param  string $rgb
     * @return string|self
     */
    public function rgb($rgb = null)
    {
        if(null === $rgb)
        {
            return $this->property('rgb');
        }
        return $this->property('rgb', Text::isRgb(trim($rgb)) ? trim($rgb) : '');
    }

    /**
     * Gets or sets url
     *
     * @param  string $url
     * @return string|self
     */
    public function url($url = null)
    {
        if(null === $url)
        {
            return $this->property('url');
        }
        return $this->property('url', trim($url));
    }

    /**
     * Gets or sets l
     *
     * @param  string $l
     * @return string|self
     */
    public function l($l = null)
    {
        if(null === $l)
        {
            return $this->property('l');
        }
        return $this->property('l', trim($l));
    }

    /**
     * Gets or sets fie
     *
     * @param  bool $fie
     * @return bool|self
     */
    public function fie($fie = null)
    {
        if(null === $fie)
        {
            return $this->property('fie');
        }
        return $this->property('fie', (bool) $fie);
    }

    /**
     * Gets or sets sync
     *
     * @param  bool $sync
     * @return bool|self
     */
    public function sync($sync = null)
    {
        if(null === $sync)
        {
            return $this->property('sync');
        }
        return $this->property('sync', (bool) $sync);
    }

    /**
     * Returns the array representation of this class 
     *
     * @param  string $name
     * @return array
     */
    public function toArray($name = 'folder')
    {
        return parent::toArray($name);
    }

    /**
     * Method returning the xml representative this class
     *
     * @param  string $name
     * @return SimpleXML
     */
    public function toXml($name = 'folder')
    {
        return parent::toXml($name);
    }
}
