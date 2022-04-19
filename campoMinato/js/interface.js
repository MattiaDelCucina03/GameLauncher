import {
    TILE_STATUSES,
    createBoard,
    markTile,
    revealTile,
    checkWin,
    checkLose
} from "./game.js";

const BOARD_SIZE = 10;
const NUMBER_OF_MINES = 8;

const board = createBoard(BOARD_SIZE, NUMBER_OF_MINES);
const boardElement = document.querySelector(".board"); // document element that matches .board css class
const minesLeftText = document.querySelector("[data-mine-count]");
const messageText = document.querySelector(".subtext");
board.forEach(row => {
    row.forEach(tile => {
        boardElement.append(tile.element); // add tiles to the board
        tile.element.addEventListener("click", () => { // left click event
            revealTile(board, tile);
            checkGameEnd(); // check if you win/lose
        });
        tile.element.addEventListener("contextmenu", e => {
            e.preventDefault(); // blocks normal right click event
            markTile(tile);
            listMinesLeft();
        })
    })
});

boardElement.style.setProperty("--size", BOARD_SIZE); // in css it knows the boardSize
minesLeftText.textContent = NUMBER_OF_MINES;

function listMinesLeft() {
    const markedTilesCount = board.reduce((count, row) => {
        return(count + row.filter(tile => tile.status === TILE_STATUSES.MARKED).length);
    }, 0);

    minesLeftText.textContent = NUMBER_OF_MINES - markedTilesCount; // after marking says how many mines are left
}
function checkGameEnd() {
    const win = checkWin(board);
    const lose = checkLose(board);

    if (win || lose) {
        boardElement.addEventListener("click", stopProp, {capture: true});
        boardElement.addEventListener("contextmenu", stopProp, {capture: true});
    }

    if (win) {
        messageText.textContent = "Hai vinto";
    }
    if (lose) {
        messageText.textContent = "hai perso";
        board.forEach(row => {
            row.forEach(tile => {
                if (tile.status === TILE_STATUSES.MARKED) 
                    markTile(tile);
                if (tile.mine) 
                    revealTile(board, tile);
            })
        }); // if lose shows all bombs
    }
}
function stopProp(e) {
    e.stopImmediatePropagation()
}
