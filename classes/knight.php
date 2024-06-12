<?php
class Knight extends Piece {
    public function getPossibleMoves($board) {
        $moves = [];
        $directions = [[-2, -1], [-2, 1], [-1, -2], [-1, 2], [1, -2], [1, 2], [2, -1], [2, 1]];

        foreach ($directions as $dir) {
            $x = $this->position[0] + $dir[0];
            $y = $this->position[1] + $dir[1];

            if ($x >= 0 && $x <= 7 && $y >= 0 && $y <= 7) {
                if ($board[$x][$y] === null || $board[$x][$y]->getColor() !== $this->color) {
                    $moves[] = [$x, $y];
                }
            }
        }

        return $moves;
    }
}

?>
