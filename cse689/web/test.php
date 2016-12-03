<script src="js/1.12.4/jquery.min.js"></script>
<script src="js/1.12.4/jquery-ui.js"></script>
<link rel=stylesheet href=lib/codemirror.css>
<script src=lib/codemirror.js></script>
<script src=lib/xml.js></script>
<script src=lib/javascript.js></script>
<script src=lib/css.js></script>
<script src=lib/closetag.js></script>
<script src=js/custom.js></script>

<style type="text/css">
  .CodeMirror {
    height: auto;
  }
</style>

<textarea id=editor name=editor>
<!doctype html>
<html>
  <head>
    <meta charset=utf-8>
    <title>HTML5 canvas demo</title>
    <style>p {font-family: monospace;}</style>
  </head>
  <body>
    <p>Canvas pane goes here:</p>
    <canvas id=pane width=300 height=200></canvas>
    <script>
      var canvas = document.getElementById('pane');
      var context = canvas.getContext('2d');
 
      context.fillStyle = 'rgb(250,0,0)';
      context.fillRect(10, 10, 55, 50);
 
      context.fillStyle = 'rgba(0, 0, 250, 0.5)';
      context.fillRect(30, 30, 55, 50);
    </script>
  </body>
</html>
</textarea>

<div id="iframewrapper"></div>
<button id="runButton" type="button" class="btn btn-default" onclick="submitTryit()">Run</button>

<script>
	// Initialize CodeMirror editor with a nice html5 canvas demo.
	var editor = CodeMirror.fromTextArea(document.getElementById('editor'), {
		mode: 'text/html',
		autoCloseTags: true
	});
	submitTryit();
</script>