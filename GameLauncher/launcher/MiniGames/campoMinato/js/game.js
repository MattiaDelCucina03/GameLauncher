export const TILE_STATUSES = {
    HIDDEN: "hidden",
    MINE: "mine",
    NUMBER: "number",
    MARKED: "marked"
} // status of each tile
export function createBoard(boardSize, numberOfMines) {
    const board = [];
    const minePositions = getMinePositions(boardSize, numberOfMines); // put mines inside the board
    for (let x = 0; x < boardSize; x++) {
        const row = [];
        for (let y = 0; y < boardSize; y++) {
            const element = document.createElement('div'); // creates a div for each tile
            element.dataset.status = TILE_STATUSES.HIDDEN; // every div is hidden
            const tile = {
                element,
                x,
                y,
                // if there is a mine in x,y it will return true else fals
                mine: minePositions.some(p => positionMatch(p, {x, y})),
                get status() {
                    return this.element.dataset.status; // allows to know the status in interface.js
                },
                set status(value) {
                    this.element.dataset.status = value; // allows to edit the status in interface.js
                }
            }
            row.push(tile); // add the tile to the raw
        }board.push(row); // creates a board with multiple rows

    }
    return board;
}

export function markTile(tile) {
    if (tile.status !== TILE_STATUSES.HIDDEN && tile.status !== TILE_STATUSES.MARKED) {
        return; // the tile must be hidden/marked
    }
    if (tile.status === TILE_STATUSES.MARKED) {
        tile.status = TILE_STATUSES.HIDDEN;
    } else {
        tile.status = TILE_STATUSES.MARKED;
    }

}
export function revealTile(board, tile) {
    if (tile.status !== TILE_STATUSES.HIDDEN) {
        return; // The tile must be hidden to be clicked
    }

    if (tile.mine) {
        tile.status = TILE_STATUSES.MINE; // if there is a mine you loose
        return;
    }

    tile.status = TILE_STATUSES.NUMBER;
    const adjacentTiles = nearbyTiles(board, tile); // get the near tiles foreach tile
    const mines = adjacentTiles.filter(t => t.mine); // Check if there is a mine near
    if (mines.length === 0) {
        adjacentTiles.forEach(revealTile.bind(null, board)) // if not there is mine will reveal the near tile calling again revalTile
    } else {
        tile.element.textContent = mines.length; // if there are 1 or more mines puts the number
    }
}
export function checkWin(board) {
    return board.every(row => {
        return row.every(tile => {
            return(tile.status === TILE_STATUSES.NUMBER || (tile.mine && (tile.status === TILE_STATUSES.HIDDEN || tile.status === TILE_STATUSES.MARKED)));
            //returns true if there are only mines to be clicked
        })
    })
}

export function checkLose(board) {
    return board.some(row => {
        return row.some(tile => {
            return tile.status === TILE_STATUSES.MINE;//if you click a mine returns true
        })
    })
}
function getMinePositions(boardSize, numberOfMines) {
    const positions = [];
    while (positions.length<numberOfMines){
        const position={
            x:randomNumber(boardSize), y:randomNumber(boardSize)
        };
        if(!positions.some(p=> positionMatch(p, position)) ) {
            positions.push(position); // if the position generated does not exist in positions array it will be added
        };
    }
    return positions;
}
function positionMatch (a, b) {
    if (a.x === b.x && a.y === b.y) {
        return true;
    } else {
        return false;
    }
}
function randomNumber (size) {
    return Math.floor(Math.random() * size);
}
function nearbyTiles (board, {
    x,
    y
}) {
    const tiles = [];

    for (let xOffset = -1; xOffset <= 1; xOffset++) {
        for (let yOffset = -1; yOffset <= 1; yOffset++) {
            const tile = board[x + xOffset] ?. [y + yOffset]; // check if the nearby tile goes out of border
            if (tile) 
                tiles.push(tile);
            

        }
    }

    return tiles
}
