<?php
/*
 * This file is part of the php-gelf package.
 *
 * (c) Darneta <dev@darneta.lt>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darneta\GelfPhpTls;

use Gelf\Transport\TcpTransport;
use Gelf\Transport\SslOptions;
use Gelf\Transport\StreamSocketClient;

class TlsTransport extends TcpTransport
{
    public function __construct($host = self::DEFAULT_HOST, $port = self::DEFAULT_PORT, SslOptions $sslOptions = null)
    {
        parent::__construct($host, $port);

        $context = $sslOptions ? $sslOptions->toStreamContext() : [];
        $this->socketClient = new StreamSocketClient('tls', $host, $port, $context);
    }
}
