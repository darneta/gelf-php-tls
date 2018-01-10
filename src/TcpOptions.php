<?php
/*
 * This file is part of the Darneta package.
 *
 * (c) Darneta <dev@darneta.lt>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Darneta\GelfPhpTls;

use Gelf\Transport\SslOptions;

class TcpOptions extends SslOptions
{
    /**
     * @var string
     */
    protected $localCert;

    /**
     * @var string
     */
    protected $localPk;

    /**
     * @var string
     */
    protected $localCertPassPhrase;

    /**
     * @return string
     */
    public function getLocalCert()
    {
        return $this->localCert;
    }

    /**
     * @param string $localCert
     */
    public function setLocalCert($localCert)
    {
        $this->localCert = $localCert;
    }

    /**
     * @return string
     */
    public function getLocalPk()
    {
        return $this->localPk;
    }

    /**
     * @param string $localPk
     */
    public function setLocalPk($localPk)
    {
        $this->localPk = $localPk;
    }

    /**
     * @return string
     */
    public function getLocalCertPassPhrase()
    {
        return $this->localCertPassPhrase;
    }

    /**
     * @param string $localCertPassPhrase
     */
    public function setLocalCertPassPhrase($localCertPassPhrase)
    {
        $this->localCertPassPhrase = $localCertPassPhrase;
    }

    /**
     * @inheritdoc
     */
    public function toStreamContext($serverName = null)
    {
        $context = parent::toStreamContext($serverName);

        if ($this->localCert) {
            if (!isset($context['ssl'])) {
                $context['ssl'] = [];
            }

            $context['ssl']['local_cert'] = $this->localCert;

            if ($this->localPk) {
                $context['ssl']['local_pk'] = $this->localPk;
            }

            if ($this->localCertPassPhrase) {
                $context['ssl']['passphrase'] = $this->localCertPassPhrase;
            }
        }

        return $context;
    }
}
