<?php
class Pawn extends Piece {
    public function getPossibleMoves($board) {
        $moves = [];
        $direction = ($this->color === 'white') ? -1 : 1;

        // Avancer d'une case
        $x = $this->position[0] + $direction;
        $y = $this->position[1];
        if ($x >= 0 && $x <= 7 && $board[$x][$y] === null) {
            $moves[] = [$x, $y];
            // Avancer de deux cases lors du premier mouvement
            if (($this->color === 'white' && $this->position[0] === 6) || ($this->color === 'black' && $this->position[0] === 1)) {
                $x = $this->position[0] + 2 * $direction;
                if ($board[$x][$y] === null) {
                    $moves[] = [$x, $y];
                }
            }
        }

        // Prendre une pièce en diagonale
        foreach ([-1, 1] as $offset) {
            $x = $this->position[0] + $direction;
            $y = $this->position[1] + $offset;
            if ($x >= 0 && $x <= 7 && $y >= 0 && $y <= 7 && $board[$x][$y] !== null && $board[$x][$y]->getColor() !== $this->color) {
                $moves[] = [$x, $y];
            }
        }

        return $moves;
    }
}
    

?>
