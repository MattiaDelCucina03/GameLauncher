import { onSnake, expandSnake } from './snake.js';
import { randomGridPosition } from './grid.js';

let food = getRandomPositionFood();
let score = document.getElementById('score');
let scoreGiocatore = 0;

const EXPANSION_RATE = 1;

export function update(){
    if(onSnake(food)){
        expandSnake(EXPANSION_RATE)
        scoreGiocatore += 1;
        score.innerHTML = scoreGiocatore;
        food = getRandomPositionFood();
    }
}


export function draw(gameBoard){
    const foodElement = document.createElement('div');
    foodElement.style.gridRowStart = food.y;
    foodElement.style.gridColumnStart = food.x;
    foodElement.classList.add('food')
    gameBoard.appendChild(foodElement);
}

function getRandomPositionFood() {
    let newFoodPosition
    while(newFoodPosition == null || onSnake(newFoodPosition)){
        newFoodPosition = randomGridPosition();
    }
    return newFoodPosition;
}