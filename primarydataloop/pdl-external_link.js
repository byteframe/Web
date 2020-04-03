window.onDomReady(external_link);

function external_link()
{
  if (!document.getElementsByTagName)
    return;
  var a_elements = document.getElementsByTagName("a");
  for (var i=0; i < a_elements.length; i++) {
    var a = a_elements[i];
    if (a.getAttribute("href") && a.getAttribute("rel") == "ext") {
      a.target = "_blank";
    }
  }
}
