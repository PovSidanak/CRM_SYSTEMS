<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/drew.css') }}">
    <title>Drawing app</title>
</head>
<body>
    <section class="container">
        <div id="toolbar">
            <h1>Draw.</h1>
            <label for="stroke">Stroke</label>
            <input id="stroke" name='stroke' type="color">
            <label for="lineWidth">Line Width</label>
            <input id="lineWidth" name='lineWidth' type="number" value="5">
            <button id="clear">Clear</button>
            <button id="save" >Save</button>
            <a href="pmreport">
            <button id="exit-drew"  style="width:61px">Exit</button>
            </a>
        </div>
        <div class="drawing-board">
            <canvas id="drawing-board"></canvas>
        </div>
    </section>
    <script>
        const canvas = document.getElementById('drawing-board');
const toolbar = document.getElementById('toolbar');
const ctx = canvas.getContext('2d');

const canvasOffsetX = canvas.offsetLeft;
const canvasOffsetY = canvas.offsetTop;

canvas.width = window.innerWidth - canvasOffsetX;
canvas.height = window.innerHeight - canvasOffsetY;

let isPainting = false;
let lineWidth = 5;
let startX;
let startY;

toolbar.addEventListener('click', e => {
    if (e.target.id === 'clear') {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }
});

toolbar.addEventListener('change', e => {
    if(e.target.id === 'stroke') {
        ctx.strokeStyle = e.target.value;
    }

    if(e.target.id === 'lineWidth') {
        lineWidth = e.target.value;
    }

});

const draw = (e) => {
    if(!isPainting) {
        return;
    }

    ctx.lineWidth = lineWidth;
    ctx.lineCap = 'round';

    ctx.lineTo(e.clientX - canvasOffsetX, e.clientY);
    ctx.stroke();
}

canvas.addEventListener('mousedown', (e) => {
    isPainting = true;
    startX = e.clientX;
    startY = e.clientY;
});

canvas.addEventListener('mouseup', e => {
    isPainting = false;
    ctx.stroke();
    ctx.beginPath();
});

canvas.addEventListener('mousemove', draw);


var button = document.getElementById("exit");

// Add click event listener to the button
button.addEventListener("click", function() {
    // Change the page URL
    window.location.href = "{{route('all.btireport')}}"; // Replace "newpage.html" with the desired destination URL
});
    </script>
</body>
</html>
