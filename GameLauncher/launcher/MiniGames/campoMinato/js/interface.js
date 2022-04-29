import {
    TILE_STATUSES,
    createBoard,
    markTile,
    revealTile,
    checkWin,
    checkLose
} from "./game.js";
import{
    addScore
}from "../../../Ajax/JS/AjaxCall.js";
const buttons=document.getElementsByClassName("buttons");
const gamePart=document.getElementsByClassName("game_part");
const minesLeftText = document.querySelector("[data-mine-count]");
const difficultyText = document.querySelector("[difficulty]");
const messageText = document.querySelector(".subtext");
/*for(let i=0;i<3;i++){
    numberOfMines+=4;
    board_size+=4;
    buttons[i].onclick=function(){createGame(board_size, numberOfMines)};
}*/
buttons[0].onclick=function(){createGame(8,6, "Facile")};
buttons[1].onclick=function(){createGame(9,14, "Media")};
buttons[2].onclick=function(){createGame(12,20, "Difficile")};
function createGame(board_size, numberOfMines, difficulty) {
    document.getElementsByClassName("board")[0].style.display="inline-grid";
    for(let button of buttons){
        button.style.display="none";
    }
    for(let item of gamePart){
        item.style.display="inline";
    }
    const BOARD_SIZE = board_size;
    const NUMBER_OF_MINES = numberOfMines;
    const board = createBoard(BOARD_SIZE, NUMBER_OF_MINES);
    const boardElement = document.querySelector(".board"); // document element that matches .board css class
    board.forEach(row => {
        row.forEach(tile => {
            boardElement.append(tile.element); // add tiles to the board
            tile.element.addEventListener("click", () => { // left click event
                revealTile(board, tile);
                checkGameEnd(board,boardElement,messageText,difficulty); // check if you win/lose
            });
            tile.element.addEventListener("contextmenu", e => {
                e.preventDefault(); // blocks normal right click event
                markTile(tile);
                listMinesLeft(board, NUMBER_OF_MINES);
            })
        })
    });

    boardElement.style.setProperty("--size", BOARD_SIZE); // in css it knows the boardSize
    minesLeftText.textContent = NUMBER_OF_MINES;
    difficultyText.textContent=difficulty;
}
function listMinesLeft(board, NUMBER_OF_MINES) {
    const markedTilesCount = board.reduce((count, row) => {
        return(count + row.filter(tile => tile.status === TILE_STATUSES.MARKED).length);
    }, 0);

    minesLeftText.textContent = NUMBER_OF_MINES - markedTilesCount; // after marking says how many mines are left
}
function checkGameEnd(board,boardElement,messageText, difficulty) {
    const win = checkWin(board);
    const lose = checkLose(board);

    if (win || lose) {
        boardElement.addEventListener("click", stopProp, {capture: true});
        boardElement.addEventListener("contextmenu", stopProp, {capture: true});
    }

    if (win) {
        messageText.textContent = "Hai vinto";
        let score=0;
        if(difficulty=="Facile") score=5;
        if(difficulty=="Media") score=10;
        if(difficulty=="Difficile") score=15;
        addScore("CAMPOMINATO", score);
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