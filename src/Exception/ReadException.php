<?php
declare(strict_types=1);

namespace BauerKirch\CoronaWarnAppEventRegistration\Exception;

use Throwable;

class ReadException extends \Exception implements ExceptionInterface
{
    public function __construct(Throwable $previous)
    {
        parent::__construct('Reading QR code payload failed.', 0, $previous);
    }
}
