<?php

class Person {

    /**
     * The person's name
     * @var string
     */
    protected $name;

    /**
     * The score of this persons hand for this round
     * @var int
     */
    protected $score;

    /**
     * The cards this person has in their hand
     * @var Card[]
     */
    protected $cards = [];

    /**
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $score
     * @return void
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Add cards to this persons hand
     * @param array $cards
     * @throws Exception
     * @return void
     */
    public function addCards($cards)
    {
        if (count($cards) === 5) {
            foreach ($cards as $card) {
                $this->cards[] = new Card($card);
            }
        } else {
            throw new Exception('You must have only 5 cards in your hand!');
        }
    }

    /**
     * Get the cards in this persons hand
     * @return Card[]
     */
    public function getCards()
    {
        return $this->cards;
    }

}
