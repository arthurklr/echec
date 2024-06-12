<?php
abstract class Piece {
    protected $color;
    protected $position;

    public function __construct($color, $position) {
        $this->color = $color;
        $this->position = $position;
    }

    abstract public function getPossibleMoves($board);
}
?>
