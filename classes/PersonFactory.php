<?php

class PersonFactory {

    /**
     * Create People and add Cards to them via command line input in the format:
     * [name],[value][suit],[value][suit],[value][suit],[value][suit],[value][suit]
     * @param  string $input
     * @return Person
     */
    public static function create($input)
    {
        $values = explode(',', $input);

        $person = new Person;
        $person->setName(array_shift($values));
        $person->addCards($values);

        return $person;
    }

}
