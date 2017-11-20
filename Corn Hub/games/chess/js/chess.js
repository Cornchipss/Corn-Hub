"use strict";

var canvas, width, height, ctx;

var board;

var xOffset, yOffset;

function init()
{
  canvas = document.getElementById('canvas');
	resize();

  board = new Board();

  initListeners();

  draw(ctx);
}

function draw()
{
  requestAnimationFrame(draw);
  board.draw(xOffset, yOffset, ctx);
}

window.onload = function()
{
  init();
}

/// Resizes all variables needed
function resize()
{
  width = window.innerWidth;
	height = window.innerHeight;
	canvas.width = width;
	canvas.height = height;
	ctx = canvas.getContext('2d');

  // A great scaling algorithm!
  tileWidth = 0.0001 * ((width + height) / 2) * TILE_WIDTH_ORIG * BOARD_WIDTH;
  tileHeight = tileWidth;

  xOffset = width / 2 - (tileWidth * BOARD_WIDTH) / 2;
  yOffset = height / 2 - (tileHeight * BOARD_HEIGHT) / 2;
}

function clickEvt(x, y)
{
  // Remove the x & y offset from any calculations
  x -= xOffset;
  y -= yOffset;
  // For array-friendly things
  x /= tileWidth;
  y /= tileHeight;
  // Convert x & y to integer to get rid of those nasty decimals and work w/ arrays
  // Floor it first because of -1 < x < 0 returning 0 if you just outright convert to decimal
  x = ~~Math.floor(x);
  y = ~~Math.floor(y);

  board.togglePiece(x, y);
}

function initListeners()
{
  canvas.onclick = function(e)
  {
    clickEvt(e.x, e.y);
  }

  window.onresize = resize;
}
