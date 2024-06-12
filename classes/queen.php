<?php
class Queen extends Piece {
    public function getPossibleMoves($board) {
        $moves = [];
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1], [-1, -1], [-1, 1], [1, -1], [1, 1]]; // All directions

        foreach ($directions as $dir) {
            for ($i = 1; $i <= 7; $i++) {
                $x = $this->position[0] + $dir[0] * $i;
                $y = $this->position[1] + $dir[1] * $i;

                if ($x < 0 || $x > 7 || $y < 0 || $y > 7) {
                    break; // Sortir du bord de l'échiquier
                }

                if ($board[$x][$y] === null) {
                    $moves[] = [$x, $y];
                } else {
                    if ($board[$x][$y]->getColor() !== $this->color) {
                        $moves[] = [$x, $y];
                    }
                    break; // Stopper après avoir rencontré une pièce
                }
            }
        }

        return $moves;
    }
}

?>
