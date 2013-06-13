function ZoomIn ()
{
	var canvas = document.getElementById("workarea");
	var ctx = canvas.getContext("2d");
	ctx.scale(1,1);
}

function ZoomOut ()
{
	var canvas = document.getElementById("workarea");
	var ctx = canvas.getContext("2d");
	ctx.scale(0.5,0.5);
}

function discard ()
{
	document.getElementById("workarea").innerHTML = "";
}