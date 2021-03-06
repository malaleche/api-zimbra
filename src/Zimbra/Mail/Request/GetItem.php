<?php
/**
 * This file is part of the Zimbra API in PHP library.
 *
 * © Nguyen Van Nguyen <nguyennv1981@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zimbra\Mail\Request;

use Zimbra\Mail\Struct\ItemSpec;

/**
 * GetItem request class
 * Get item
 * A successful GetItemResponse will contain a single element appropriate for the type of the requested item if there is no matching item, a fault containing the code mail.NO_SUCH_ITEM is returned
 *
 * @package    Zimbra
 * @subpackage Mail
 * @category   Request
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class GetItem extends Base
{
    /**
     * Constructor method for GetItem
     * @param  ItemSpec $item
     * @return self
     */
    public function __construct(ItemSpec $item)
    {
        parent::__construct();
        $this->child('item', $item);
    }

    /**
     * Get or set item
     *
     * @param  ItemSpec $item
     * @return ItemSpec|self
     */
    public function item(ItemSpec $item = null)
    {
        if(null === $item)
        {
            return $this->child('item');
        }
        return $this->child('item', $item);
    }
}
