<?php
namespace Bright;

class DBConnResult
{
    /**
     * @var bool $result
     */
    private bool $result;

    /**
     * @var string $message
     */
    private string $error_message;

    /**
     * @var int $error_number
     */
    private int $error_number;

    /**
     * DBConnResult constructor.
     * @param bool $result
     * @param string $error_message
     * @param int $error_number
     */
    public function __construct(bool $result, string $error_message, int $error_number)
    {
        $this->result = $result;
        $this->error_message = $error_message;
        $this->error_number = $error_number;
    }

    /**
     * @return bool
     */
    public function getResult(): bool
    {
        return $this->result;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->error_message;
    }

    /**
     * @return int
     */
    public function getErrorNumber(): int
    {
        return $this->error_number;
    }
}