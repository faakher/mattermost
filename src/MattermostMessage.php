<?php

namespace NotificationChannels\Mattermost;


use Illuminate\Support\Arr;

class MattermostMessage
{
    public string $message;

    public function __construct($message = '')
    {
        $this->message = $message;
    }

    public static function create($message = ''): MattermostMessage
    {
        return new static($message);
    }

    /**
     * @param string $heading
     * @param bool $newLine
     * @return $this
     */
    public function headingLevel1(string $heading, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '# ' . $heading;
        return $this;
    }

    /**
     * @param string $heading
     * @param bool $newLine
     * @return $this
     */
    public function headingLevel2(string $heading, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '## ' . $heading;
        return $this;
    }

    /**
     * @param string $heading
     * @param bool $newLine
     * @return $this
     */
    public function headingLevel3(string $heading, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '### ' . $heading;
        return $this;
    }

    /**
     * @param string $heading
     * @param bool $newLine
     * @return $this
     */
    public function headingLevel4(string $heading, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '#### ' . $heading;
        return $this;
    }

    /**
     * @param string $heading
     * @param bool $newLine
     * @return $this
     */
    public function headingLevel5(string $heading, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '##### ' . $heading;
        return $this;
    }

    /**
     * @param string $heading
     * @param bool $newLine
     * @return $this
     */
    public function headingLevel6(string $heading, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '###### ' . $heading;
        return $this;
    }

    /**
     * @param string $text
     * @param bool $newLine
     * @return $this
     */
    public function text(string $text, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . $text;
        return $this;
    }

    /**
     * @param string $text
     * @param bool $newLine
     * @return $this
     */
    public function boldText(string $text, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '**' . $text . '**';
        return $this;
    }

    /**
     * @param string $text
     * @param bool $newLine
     * @return $this
     */
    public function italicText(string $text, bool $newLine = true)
    {
        $this->message = $this->message . ($newLine ? PHP_EOL : '') . '*' . $text . '*';
        return $this;
    }
}
