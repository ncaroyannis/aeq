<?php

class Scorer {

    /**
     * Assign scores to each of the people using our scoring methods
     * @param  Person[] $people
     * @return void
     */
    public function scorePeople($people)
    {
        foreach ($people as $person) {
            $this->scoreHighCard($person);
            $this->scoreOnePair($person);
            $this->scoreThreeOfAKind($person);
            $this->scoreFlush($person);
        }
    }

    /**
     * Find the highest score from the People provided, and return their name(s)
     * as a formatted string. Allows for ties.
     * @param  Person[] $people
     * @return string
     */
    public function getWinner($people)
    {
        foreach ($people as $person) {
            $scores[$person->getScore()][] = $person->getName();
        }

        // Sort the array keys (scores) from lowest to highest
        ksort($scores, SORT_NUMERIC);

        // Get the last array key (so, the highest score) and return the names
        // held within that key
        return implode(', ', array_pop($scores));
    }

    /**
     * Get all of the suits from the cards, and check if they're all the same
     * by counting the amount of unique elements in the array
     * @param Person $person
     * @return void
     */
    private function scoreFlush($person)
    {
        foreach ($person->getCards() as $card) {
            $suits[] = $card->getSuit();
        }

        if (count(array_unique($suits)) === 1) {
            $person->setScore(10000);
        }
    }

    /**
     * Get all of the card values and count them. If there is 3 or more of the
     * same value.
     * @param Person $person
     * @return void
     */
    private function scoreThreeOfAKind($person)
    {
        foreach ($person->getCards() as $card) {
            $values[] = $card->getValue();
        }

        $count = array_count_values($values);

        if (max($count) >= 3) {
            $person->setScore(1000);
        }
    }

    /**
     * Get all of the card values and count them. If there is 2 or more of the
     * same value.
     * @param Person $person
     * @return void
     */
    private function scoreOnePair($person)
    {
        foreach ($person->getCards() as $card) {
            $values[] = $card->getValue();
        }

        $count = array_count_values($values);

        if (max($count) >= 2) {
            $person->setScore(100);
        }
    }

    /**
     * Assign a score based on the highest card value in the Persons hand
     * @param Person $person
     * @return void
     */
    private function scoreHighCard($person)
    {
        foreach ($person->getCards() as $card) {
            $values[] = $card->getValue();
        }

        $person->setScore(max($values));
    }

}
