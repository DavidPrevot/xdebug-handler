<?php

/*
 * This file is part of composer/xdebug-handler.
 *
 * (c) Composer <https://github.com/composer>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Composer\XdebugHandler\Tests;

use Composer\XdebugHandler\Tests\Helpers\BaseTestCase;
use Composer\XdebugHandler\Tests\Helpers\Logger;
use Composer\XdebugHandler\Tests\Mocks\CoreMock;
use Psr\Log\LogLevel;

class StatusTest extends BaseTestCase
{
    /**
     * @return void
     */
    public function testSetLoggerProvidesOutput()
    {
        $loaded = true;

        $logger = new Logger();
        $settings = array('setLogger' => array($logger));

        $xdebug = CoreMock::createAndCheck($loaded, null, $settings);
        $this->checkRestart($xdebug);

        $output = $logger->getOutput();
        self::assertNotEmpty($output);
    }
}
