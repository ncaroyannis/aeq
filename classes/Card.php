<?php

class Card {

    /**
     * The suit of the card - H, D, S, C
     * @var string
     */
    protected $suit;

    /**
     * The value of the card from 2 to 14
     * @var int
     */
    protected $value;

    /**
     * Conversions for the face values to integers
     * @var array
     */
    protected $faceValues = [
        'J' => 11,
        'Q' => 12,
        'K' => 13,
        'A' => 14,
    ];

    /**
     * Take the input string from the console and parse it to get the suit/value
     * @param string $input
     */
    public function __construct($input)
    {
        $value = substr($input, 0, -1);
        $suit = substr($input, -1);

        $this->setSuit($suit);
        $this->setValue($value);
    }

    /**
     * @return string
     */
    public function getSuit()
    {
        return $this->suit;
    }

    /**
     * Ensures the suit is a valid entry
     * @param string $suit
     * @throws Exception
     * @return void
     */
    public function setSuit($suit)
    {
        if (in_array($suit, ['H', 'D', 'S', 'C'])) {
            $this->suit = $suit;
        } else {
            throw new Exception('Invalid suit type.');
        }
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Ensures the value is between 2-14, and converts from face value to int
     * @param string $value
     * @throws Exception
     * @return void
     */
    public function setValue($value)
    {
        if (in_array($value, array_keys($this->faceValues))) {
            $this->value = $this->faceValues[$value];
        } else {
            $this->value = (int) $value;
        }

        if ($this->value > 14 || $this->value < 2) {
            throw new Exception('Invalid card value.');
        }
    }

}
