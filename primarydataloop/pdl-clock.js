window.onDomReady(clock);
setInterval('clock()',1000);

function clock()
{
  var date = new Date();
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();

  hours = (hours < 10 ? "0" : "") + hours;
  minutes = (minutes < 10 ? "0" : "") + minutes;
  seconds = (seconds < 10 ? "0" : "") + seconds;

  var timeString = hours + ":" + minutes + ":" + seconds;

  document.getElementById("clock").firstChild.nodeValue = timeString;
}
