let
	canvas,
	w, h,
	logoParticles = [],
	particleIndex = 0,
	logo = new Image(),
	hue = 0;

canvas = document.getElementById('main-canvas');
	ctx = canvas.getContext("2d");
	w = canvas.width  = window.innerWidth;
	h = canvas.height = window.innerHeight;

	logo.src = "images/particleImage.png";

logo.onload = function()
{
	let posX = (w - this.width) / 2;
	let posY = (h - this.height) / 2;
	ctx.drawImage(this, posX, posY);

	let imgData = ctx.getImageData(0, 0, w, h);
	pixels = imgData.data;

	for(let x = 0; x < imgData.width; x+=3)
	{
		for(let y = 0; y < imgData.height; y+=3)
		{
			let a = pixels[((imgData.width * y) + x) * 4 + 3];

			if(a > 0)
			{
				logoParticles.push(new Particle(x, y));
			}
		}
	}

	setTimeout(function()
	{
		animate();
	}, 800);
};

function animate()
{
	ctx.fillStyle = 'rgba(0, 0, 0, 0.1)';
	ctx.fillRect(0, 0, w, h);
	for(let i in logoParticles)
	{
		logoParticles[i].draw();
	}

	hue += 1;
	window.requestAnimationFrame(animate);
}

function Particle(x, y)
{
	this.origX = this.x = x;
	this.origY = this.y = y;
	this.color = "#fff";
	this.maxLife = this.random(20);
	this.life = 0;
	this.velX = this.random(-1, 1);
	this.velY = this.random(-1, 1);
	this.grav = 0.4;
	this.index = particleIndex;
	logoParticles[particleIndex] = this;
	particleIndex++;
}

Particle.prototype =
{
	constructor: Particle,

	draw: function()
	{
		ctx.fillStyle = this.color;
		ctx.fillRect(this.x, this.y, 2, 2);
		this.update();
	},

	update: function()
	{
		if(this.life >= this.maxLife)
		{
			logoParticles[this.index].reset();
		}
		this.x += this.velX;
		this.y += this.velY;
		this.velY += this.grav;
		this.life++;
	},

	reset: function()
	{
		this.x = this.origX;
		this.y = this.origY;
		this.life = 0;
		this.color = 'hsl(' + hue + ', 100%, 50%)';
		this.velX = this.random(-1, 1);
		this.velY = this.random(-1, 1);
	},

	random: function()
	{
		min = arguments.length == 1 ? 0 : arguments[0],
        max = arguments.length == 1 ? arguments[0] : arguments[1];
        return Math.random() * (max - min) + min;
	}
};
