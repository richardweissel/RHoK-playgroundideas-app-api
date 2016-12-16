<!doctype html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | Playground</title>
    <link rel="stylesheet" href="TemplateData/style.css">
    <link rel="shortcut icon" href="TemplateData/favicon.ico" />
    <script src="TemplateData/UnityProgress.js"></script>
  </head>
  <body class="template">
    <p class="header"><span>Unity WebGL Player | </span>Playground</p>
    <div class="template-wrap clear">
      <canvas class="emscripten" id="canvas" oncontextmenu="event.preventDefault()" height="720px" width="1280px"></canvas>
      <br>
      <div class="logo"></div>
      <div class="fullscreen"><img src="TemplateData/fullscreen.png" width="38" height="38" alt="Fullscreen" title="Fullscreen" onclick="SetFullscreen(1);" /></div>
      <div class="title">Playground</div>
    </div>
    <p class="footer">&laquo; created with <a href="http://unity3d.com/" title="Go to unity3d.com">Unity</a> &raquo;</p>
    <script type='text/javascript'>
  var Module = {
    TOTAL_MEMORY: 536870912,
    errorhandler: null,			// arguments: err, url, line. This function must return 'true' if the error is handled, otherwise 'false'
    compatibilitycheck: null,
    dataUrl: "Release/Build.datagz",
    codeUrl: "Release/Build.jsgz",
    memUrl: "Release/Build.memgz",

  };
</script>
<script src="Release/UnityLoader.js"></script>

  </body>
</html>
