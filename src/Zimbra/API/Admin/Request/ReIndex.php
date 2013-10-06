<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\API\Admin\Request;

use Zimbra\Soap\Request;
use Zimbra\Soap\Struct\ReindexMailboxInfo as Mailbox;

/**
 * ReIndex class
 * ReIndex.
 *
 * @package   Zimbra
 * @category  API
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class ReIndex extends Request
{
    /**
     * Action to perform
     * @var string
     */
    private $_action;

    /**
     * Specify reindexing to perform
     * @var Mailbox
     */
    private $_mbox;

    /**
     * Constructor method for ModifyVolume
     * @param Mailbox $mbox
     * @param string $action
     * @return self
     */
    public function __construct(Mailbox $mbox, $action = null)
    {
        parent::__construct();
        $this->_mbox = $mbox;
        if(in_array(trim($action), array('start', 'status', 'cancel')))
        {
            $this->_action = trim($action);
        }
    }

    /**
     * Gets or sets mbox
     *
     * @param  Mailbox $mbox
     * @return Mailbox|self
     */
    public function mbox(Mailbox $mbox = null)
    {
        if(null === $mbox)
        {
            return $this->_mbox;
        }
        $this->_mbox = $mbox;
        return $this;
    }

    /**
     * Gets or sets action
     *
     * @param  string $action
     * @return string|self
     */
    public function action($action = null)
    {
        if(null === $action)
        {
            return $this->_action;
        }
        if(in_array(trim($action), array('start', 'status', 'cancel')))
        {
            $this->_action = trim($action);
        }
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray()
    {
        $this->array = $this->_mbox->toArray('mbox');
        if(!empty($this->_action))
        {
            $this->array['action'] = $this->_action;
        }
        return parent::toArray();
    }

    /**
     * Method returning the xml representation of this class
     *
     * @return SimpleXML
     */
    public function toXml()
    {
        $this->xml->append($this->_mbox->toXml('mbox'));
        if(!empty($this->_action))
        {
            $this->xml->addAttribute('action', $this->_action);
        }
        return parent::toXml();
    }
}