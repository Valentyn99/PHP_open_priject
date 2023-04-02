<?php
// #3
class Player {
    public $name;
    public $coins;

    public function  __construct($name, $coins)
    {
        $this->name = $name;
        $this->coins = $coins;
    }
//#7
    public function point()
    {
        $this->coins++;
//        $player->coins++;
//        $player->coins--;
    }

    public function bankrupt():int
    {
        return $this->coins == 1;
    }

    public function bank()
    {
        return $this->coins;
    }

//    public function odds(Player $player, Player $player1, Player $player2)
//    {
////        return round($this->bank() / ($this->bank() + $player->bank() + $player1->bank() + $player2->bank()),2) * 100 . '%';
//        return round($this->bank() / ($this->bank() + $player->bank()),2) * 100 . '%';
//
//    }

//    public function odds(Player $player)
//    {
//        return round($this->bank() / ($this->bank() + $player->bank()),2) * 100 . '%';
//    }

}
// #2
class Game {
    protected $player1;
    protected $player2;
    protected $player3;
    protected $player4;
    protected $flips = 1;

    public function __construct(Player $player1, Player $player2, Player $player3, Player $player4)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->player3 = $player3;
        $this->player4 = $player4;
    }

    public function flip()
    {
//        return $flip = rand(0, 1) ? "eagle" : "tails";
        $flip = mt_rand(0, 1);
        echo $flip;
//        if ($flip == 1) {
//            return "eagle";
//        } elseif ($flip == 2) {
//            return "tails";
//        } elseif ($flip == 3) {
//            return "edge";
//        } elseif ($flip == 4) {
//            return "fals";
//        }

        switch ($flip) {
            case 1;
                return "eagle";
                break;
            case 2;
                return "tails";
                break;
            case 3;
                return "edge";
                break;
            case 4;
                return "fals";
                break;

        }
    }
// #4
    public function start()
    {
//                {$this->player2->name} odds: {$this->player2->odds($this->player1, $this->player3, $this->player4)}
//                {$this->player3->name} odds: {$this->player3->odds($this->player1, $this->player2, $this->player4)}
//                {$this->player4->name} odds: {$this->player4->odds($this->player1, $this->player2, $this->player3)}
//            echo <<<EOT
//                Game start
//                 {$this->player1->name} odds: {$this->player1->odds($this->player2)}
//                {$this->player2->name} odds: {$this->player2->odds($this->player1)}
//
//               EOT;
        $this->play();
    }
// #5
    public function play(){


    while (true) {

        // Drop the coin
        // if (eagle), p1 get coin, p2 lose
        // if tails, p1 lose coin, p2 get

        if($this->flip() == "eagle"){
            $this->player1->point();
//            $this->player1->point($this->player2);
            }

        if ($this->flip() == "tails") {
            $this->player2->point();
            }

        if ($this->flip() == "edge") {
            $this->player3->point();
            }

        if ($this->flip() == "fals") {
            $this->player4->point();
//            $this->player2->point($this->player1);
            }

        // if anyone has it 0 coin, then game over.
        if($this->player1->bankrupt() || $this->player2->bankrupt() || $this->player3->bankrupt() || $this->player4->bankrupt()) {
            return $this->end();
        }

        $this->flips++;

    }
}
// #6
    public function winner()
    {
//            return $this->player1->bank() > $this->player2->bank() ? $this->player1 : $this->player2;
        if ($this->player1->bank() > $this->player2->bank() && $this->player1->bank() > $this->player3->bank() && $this->player1->bank() > $this->player4->bank()) {
            return $this->player1;
        }
        if ($this->player2->bank() > $this->player1->bank() && $this->player2->bank() > $this->player3->bank() && $this->player2->bank() > $this->player4->bank()) {
            return $this->player2;
        }
        if ($this->player3->bank() > $this->player2->bank() && $this->player3->bank() > $this->player1->bank() && $this->player3->bank() > $this->player4->bank()) {
            return $this->player3;
        }
        if ($this->player4->bank() > $this->player2->bank() && $this->player4->bank() > $this->player3->bank() && $this->player4->bank() > $this->player1->bank()) {
            return $this->player4;
        }

        // if two winner

//        if ($this->player1->bank() == $this->player2->bank()) {
//            return $this->player1 && $this->player2;
//        }
//        if ($this->player1->bank() == $this->player3->bank()) {
//            return $this->player1 && $this->player3;
//        }
//        if ($this->player1->bank() == $this->player4->bank()) {
//            return $this->player1 && $this->player4;
//        }
//
////
//        if ($this->player2->bank() == $this->player3->bank()) {
//            return $this->player2 && $this->player3;
//        }
//        if ($this->player2->bank() == $this->player4->bank()) {
//            return $this->player2 && $this->player4;
//        }
//
//
//        if ($this->player3->bank() == $this->player4->bank()) {
//            return $this->player3 && $this->player4;
//        }

    }





    public function end(){

        // Winner that who has all coins.
        echo <<<EOT
            Game over.
            {$this->player1->name}: {$this->player1->bank()}
            {$this->player2->name}: {$this->player2->bank()}
            {$this->player3->name}: {$this->player3->bank()}
            {$this->player4->name}: {$this->player4->bank()}
            Winner: {$this->winner()->name}
            
            Number of flips: {$this->flips}
EOT;
    }
}
// #1
$game = new Game(
  new Player("Morti", 0),
  new Player("Rick", 0),
  new Player("Jerry", 0),
  new Player("Beth", 0)
);

$game->start();
// переписати код сам змінити правила в п1 2 0 до 10
//  добавити гравців 4 , рандом 1-4, за скільки ходів гравець набере 10 балів, перший хто набере 10 за скільки ходів другий за сільки