<?php
namespace Netresearch\Contexts\Context\Type;

/***************************************************************
*  Copyright notice
*
*  (c) 2013 Netresearch GmbH & Co. KG <typo3.org@netresearch.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
use Netresearch\Contexts\Context\AbstractContext;

/**
 * Check if a session variable is set or not
 *
 * @author     Andre Hähnel <andre.haehnel@netresearch.de>
 * @license    http://opensource.org/licenses/gpl-license GPLv2 or later
 */
class SessionContext extends AbstractContext
{
    /**
     * Check if the context is active now.
     *
     * @param array $arDependencies Array of dependent context objects
     *
     * @return bool True if the context is active, false if not
     */
    public function match(array $arDependencies = array())
    {
        /* @var $GLOBALS['TSFE'] \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController */
        $session = $GLOBALS['TSFE']->fe_user->getKey(
            'ses', $this->getConfValue('field_variable')
        );

        return $this->invert($session !== null);
    }
}
