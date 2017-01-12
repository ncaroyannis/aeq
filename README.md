Instructions

* Input the players and their cards by running, for example: `php index.php Dan,8H,9H,10H,2S,AS Sofie,9H,10H,JH,KD,AH`
* Do not include spaces after the commas
* Unlimited players can be added
* The winner(s) are output to the console

Assumptions

* Everyone at the table has a unique name
* The input has no spaces, ie: Dan,8H,9H,10H,JH,KD (makes it easier so you don't have to escape the console spaces, but it's not that hard to do either way)
* There can be more than 1 of the same card (multiple decks?)
* Values can be entered for the suit cards as well (11 can be entered instead of J, etc)
* There can be ties if multiple players have the same score. In actual poker games I'm pretty sure there are rules if this happens to prevent it, but I'm not entirely sure of the specifics without having to... learn all of poker

Notes

* Basic Exceptions are thrown but there's obviously room for custom exceptions/handlers
* PHP 5+ required
