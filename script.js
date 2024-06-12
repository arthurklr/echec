document.addEventListener('DOMContentLoaded', function() {
    const chessboard = document.getElementById('chessboard');
    const rows = 8;
    const columns = 8;
    let selectedPiece = null;
    let selectedSquare = null;

    const initialBoard = [
        ['R', 'N', 'B', 'Q', 'K', 'B', 'N', 'R'],
        ['P', 'P', 'P', 'P', 'P', 'P', 'P', 'P'],
        ['', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', ''],
        ['p', 'p', 'p', 'p', 'p', 'p', 'p', 'p'],
        ['r', 'n', 'b', 'q', 'k', 'b', 'n', 'r']
    ];

    function createPieceElement(piece) {
        const pieceElement = document.createElement('div');
        pieceElement.classList.add('piece');
        pieceElement.textContent = piece;
        return pieceElement;
    }

    function initializeBoard() {
        for (let row = 0; row < rows; row++) {
            for (let col = 0; col < columns; col++) {
                const square = document.createElement('div');
                square.classList.add('square');
                square.classList.add((row + col) % 2 === 0 ? 'white' : 'black');
                square.dataset.position = `${String.fromCharCode(97 + col)}${8 - row}`;

                const piece = initialBoard[row][col];
                if (piece) {
                    const pieceElement = createPieceElement(piece);
                    square.appendChild(pieceElement);
                }

                chessboard.appendChild(square);
            }
        }
    }

    initializeBoard();

    chessboard.addEventListener('click', function(event) {
        const target = event.target;

        if (target.classList.contains('square') || target.classList.contains('piece')) {
            const square = target.classList.contains('piece') ? target.parentElement : target;

            if (selectedPiece) {
                // Déplace la pièce
                if (square !== selectedSquare) {
                    square.appendChild(selectedPiece);
                    selectedPiece = null;
                    selectedSquare.classList.remove('selected');
                    selectedSquare = null;
                } else {
                    selectedPiece = null;
                    selectedSquare.classList.remove('selected');
                    selectedSquare = null;
                }
            } else {
                if (square.firstChild) {
                    selectedPiece = square.firstChild;
                    selectedSquare = square;
                    selectedSquare.classList.add('selected');
                }
            }
        }
    });
});
