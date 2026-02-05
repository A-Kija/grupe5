<?php
namespace AI\GPT5;

class Knyga
{
    private string $pavadinimas;
    private string $autorius;
    private int $puslapiuSkaicius;
    private string $spalva;
    private bool $yraSkaityta;

    public function __construct(string $pavadinimas, string $autorius, int $puslapiuSkaicius)
    {
        $this->pavadinimas = $pavadinimas;
        $this->autorius = $autorius;
        $this->puslapiuSkaicius = $puslapiuSkaicius;
        $this->spalva = 'juoda';
        $this->yraSkaityta = false;
    }

    public function getPavadinimas(): string
    {
        return $this->pavadinimas;
    }

    public function getAutorius(): string
    {
        return $this->autorius;
    }

    public function getPuslapiuSkaicius(): int
    {
        return $this->puslapiuSkaicius;
    }

    public function getSpalva(): string
    {
        return $this->spalva;
    }

    public function arSkaityta(): bool
    {
        return $this->yraSkaityta;
    }

    public function Skaityta(): void
    {
        $this->yraSkaityta = true;
    }

    public function info(): string
    {
        $statusas = $this->yraSkaityta ? 'skaityta' : 'neskaityta';
        return "Knyga: \"{$this->pavadinimas}\" ({$this->autorius}), {$this->puslapiuSkaicius} psl., {$this->spalva} viršelis, {$statusas}";
    }
}