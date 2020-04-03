window.onDomReady = at_domready;

function at_domready(func)
{
  if (document.addEventListener) {
    document.addEventListener("DOMContentLoaded",func,false);
  } else {
    document.onreadystatechange = function(){ IEreadyState(func) }
  }
}

function IEreadyState(func)
{
  if (document.readyState == "interactive") {
    func();
  }
}
