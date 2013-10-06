<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Soap\Struct;

use Zimbra\Soap\Enum\DistributionListSubscribeOp as Op;
use Zimbra\Utils\SimpleXML;

/**
 * DistributionListSubscribeReq class
 * @package   Zimbra
 * @category  Soap
 * @author    Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright Copyright © 2013 by Nguyen Van Nguyen.
 */
class DistributionListSubscribeReq
{
    /**
     * The operation
     * - use : required
     * @var string
     */
    private $_op;

    /**
     * Subscription request
     * @var string
     */
    private $_value;

    /**
     * Flag whether to bcc all other owners on the accept/reject notification emails.
     * @var bool
     */
    private $_bccOwners;

    /**
     * Constructor method for DistributionListSubscribeReq
     * @param  string $op
     * @param  string $value
     * @param  bool   $bccOwners
     * @return self
     */
    public function __construct($op, $value = null, $bccOwners = null)
    {
        if(Op::isValid(trim($op)))
        {
            $this->_op = trim($op);
        }
        else
        {
            throw new \InvalidArgumentException('Invalid subscribe operation');
        }
        $this->_value = trim($value);
        if(null !== $bccOwners)
        {
            $this->_bccOwners = (bool) $bccOwners;
        }
    }

    /**
     * Gets or sets op
     *
     * @param  string $op
     * @return string|self
     */
    public function op($op = null)
    {
        if(null === $op)
        {
            return $this->_op;
        }
        if(Op::isValid(trim($op)))
        {
            $this->_op = trim($op);
            return $this;
        }
        else
        {
            throw new \InvalidArgumentException('Invalid subscribe operation');
        }
    }

    /**
     * Gets or sets value
     *
     * @param  string $value
     * @return string|self
     */
    public function value($value = null)
    {
        if(null === $value)
        {
            return $this->_value;
        }
        $this->_value = trim($value);
        return $this;
    }

    /**
     * Gets or sets bccOwners
     *
     * @param  bool $bccOwners
     * @return bool|self
     */
    public function bccOwners($bccOwners = null)
    {
        if(null === $bccOwners)
        {
            return $this->_bccOwners;
        }
        $this->_bccOwners = (bool) $bccOwners;
        return $this;
    }

    /**
     * Returns the array representation of this class 
     *
     * @return array
     */
    public function toArray()
    {
        $arr = array(
            'op' => $this->_op,
            '_' => $this->_value,
        );
        if(is_bool($this->_bccOwners))
        {
            $arr['bccOwners'] = $this->_bccOwners ? 1 : 0;
        }
        return array('subsReq' => $arr);
    }

    /**
     * Method returning the xml representation of this class
     *
     * @return SimpleXML
     */
    public function toXml()
    {
        $xml = new SimpleXML('<subsReq>'.$this->_value.'</subsReq>');
        $xml->addAttribute('op', $this->_op);
        if(is_bool($this->_bccOwners))
        {
            $xml->addAttribute('bccOwners', $this->_bccOwners ? 1 : 0);
        }
        return $xml;
    }

    /**
     * Method returning the xml string representation of this class
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toXml()->asXml();
    }
}