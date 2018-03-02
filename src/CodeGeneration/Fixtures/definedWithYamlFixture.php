<?php

namespace DefinedWith\Yaml;

use EventSauce\EventSourcing\Event;
use EventSauce\EventSourcing\PointInTime;

final class WeWentYamling implements Event
{
    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $reference;

    /**
     * @var string
     */
    private $slogan;

    /**
     * @var PointInTime
     */
    private $timeOfRecording;

    public function __construct(
        PointInTime $timeOfRecording,
        \Ramsey\Uuid\UuidInterface $reference,
        string $slogan
    ) {
        $this->timeOfRecording = $timeOfRecording;
        $this->reference = $reference;
        $this->slogan = $slogan;
    }

    public function reference(): \Ramsey\Uuid\UuidInterface
    {
        return $this->reference;
    }

    public function slogan(): string
    {
        return $this->slogan;
    }

    public function timeOfRecording(): PointInTime
    {
        return $this->timeOfRecording;
    }

    public static function fromPayload(
        array $payload,
        PointInTime $timeOfRecording): Event
    {
        return new WeWentYamling(
            $timeOfRecording,
            \Ramsey\Uuid\Uuid::fromString($payload['reference']),
            (string) $payload['slogan']
        );
    }

    public function toPayload(): array
    {
        return [
            'reference' => $this->reference->toString(),
            'slogan' => (string) $this->slogan,
        ];
    }

    /**
     * @codeCoverageIgnore
     */
    public function withReference(\Ramsey\Uuid\UuidInterface $reference): WeWentYamling
    {
        $this->reference = $reference;

        return $this;
    }

    public static function withSlogan(PointInTime $timeOfRecording, string $slogan): WeWentYamling
    {
        return new WeWentYamling(
            $timeOfRecording,
            \Ramsey\Uuid\Uuid::fromString("c0b47bc5-2aaa-497b-83cb-11d97da03a95"),
            $slogan
        );
    }

}

final class HideFinancialDetailsOfFraudulentCompany
{
    /**
     * @var PointInTime
     */
    private $timeOfRequest;

    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $companyId;

    public function __construct(
        PointInTime $timeOfRequest,
        \Ramsey\Uuid\UuidInterface $companyId
    ) {
        $this->timeOfRequest = $timeOfRequest;
        $this->companyId = $companyId;
    }

    public function timeOfRequest(): PointInTime
    {
        return $this->timeOfRequest;
    }

    public function companyId(): \Ramsey\Uuid\UuidInterface
    {
        return $this->companyId;
    }

}

final class GoYamling
{
    /**
     * @var PointInTime
     */
    private $timeOfRequest;

    /**
     * @var \Ramsey\Uuid\UuidInterface
     */
    private $reference;

    /**
     * @var string
     */
    private $slogan;

    public function __construct(
        PointInTime $timeOfRequest,
        \Ramsey\Uuid\UuidInterface $reference,
        string $slogan
    ) {
        $this->timeOfRequest = $timeOfRequest;
        $this->reference = $reference;
        $this->slogan = $slogan;
    }

    public function timeOfRequest(): PointInTime
    {
        return $this->timeOfRequest;
    }

    public function reference(): \Ramsey\Uuid\UuidInterface
    {
        return $this->reference;
    }

    public function slogan(): string
    {
        return $this->slogan;
    }

}
