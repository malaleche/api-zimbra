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

use Zimbra\Mail\Struct\RankingActionSpec;

/**
 * RankingAction request class
 * Perform an action on the contact ranking table
 *
 * @package    Zimbra
 * @subpackage Mail
 * @category   Request
 * @author     Nguyen Van Nguyen - nguyennv1981@gmail.com
 * @copyright  Copyright © 2013 by Nguyen Van Nguyen.
 */
class RankingAction extends Base
{
    /**
     * Constructor method for RankingAction
     * @param  RankingActionSpec $action
     * @return self
     */
    public function __construct(RankingActionSpec $action)
    {
        parent::__construct();
        $this->child('action', $action);
    }

    /**
     * Get or set action
     *
     * @param  RankingActionSpec $action
     * @return RankingActionSpec|self
     */
    public function action(RankingActionSpec $action = null)
    {
        if(null === $action)
        {
            return $this->child('action');
        }
        return $this->child('action', $action);
    }
}
