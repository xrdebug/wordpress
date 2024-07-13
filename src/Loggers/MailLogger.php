<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress\Loggers;

use Chevere\xrDebug\WordPress\Interfaces\LoggerInterface;
use PHPMailer\PHPMailer\PHPMailer;

class MailLogger implements LoggerInterface
{
    protected bool $active = false;

    public function start(): void
    {
        if ($this->active) {
            return;
        }
        add_action('phpmailer_init', [$this, 'sendMailToXrDebug']);
        $this->active = true;
    }

    public function stop(): void
    {
        if (! $this->active) {
            return;
        }
        remove_action('phpmailer_init', [$this, 'sendMailToXrDebug']);
        $this->active = false;
    }

    public function sendMailToXrDebug(PHPMailer $mailer): void
    {
        xr(
            mail: $mailer,
            from: [
                'email' => $mailer->From,
            ],
            subject: $mailer->Subject,
            to: $this->convertToPersons($mailer->getToAddresses()),
            cc: $this->convertToPersons($mailer->getCcAddresses()),
            bcc: $this->convertToPersons($mailer->getBccAddresses()),
            html: $mailer->Body,
        );
    }

    /**
     * @param array<array<string>> $persons
     * @return array<array<string, string>>
     */
    protected function convertToPersons(array $persons): array
    {
        return array_map(
            function (array $persons): array {
                return [
                    'email' => $persons[0],
                    'name' => $persons[1],
                ];
            },
            $persons
        );
    }
}
