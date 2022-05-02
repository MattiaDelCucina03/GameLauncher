import { update as updateSnake, draw as drawSnake, SNAKE_SPEED, getSnakeHead, snakeIntersection } from './snake.js'
import { update as updateFood, draw as drawFood } from './food.js';
import { outsideGrid } from './grid.js';
import { addScore } from '../../../Ajax/JS/AjaxCall.js';

let lastRenderTime = 0;
let gameOver = false;
const gameBoard = document.getElementById('game-board');

function main(currentTime){
    
    if(gameOver === true){
        let score = parseInt(document.getElementById('score').textContent);
        if(score > 0){
            addScore("SNAKE", score);
        }
        if(confirm("Hai perso. Premi Ok per ricominciare a giocare")){
            window.location.reload();
        }
        return
    }


    window.requestAnimationFrame(main);
    const secondsSinceLastRender = (currentTime - lastRenderTime) / 1000;
    if(secondsSinceLastRender < 1 / SNAKE_SPEED) return;
    lastRenderTime = currentTime;


    update();
    draw();

}

window.requestAnimationFrame(main);


function draw(){
    gameBoard.innerHTML = '';
    drawSnake(gameBoard);
    drawFood(gameBoard);
}

function update(){
    updateSnake();
    updateFood();
    checkDeath();
}

function checkDeath(){
    gameOver = outsideGrid(getSnakeHead()) || snakeIntersection();
}