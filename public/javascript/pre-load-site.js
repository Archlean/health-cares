document.onreadystatechange = function() {
    if (document.readyState !== "complete") {
      document.querySelector(
        "body").style.visibility = "hidden";
      document.querySelector(
        ".loader").style.visibility = "visible";
    } 
    else {
      document.querySelector(
        ".loader").style.display = "none";
      document.querySelector(
        "body").style.visibility = "visible";
      document.getElementById('info_success').style.visibility = "hidden";
      document.getElementById('info_alert').style.visibility = "hidden";
      document.getElementById('info_warning').style.visibility = "hidden";
      document.getElementById('info_general').style.visibility = "hidden";
      document.getElementById('info_success').style.width = "0%";
      document.getElementById('info_alert').style.width = "0%";
      document.getElementById('info_warning').style.width = "0%";
      document.getElementById('info_general').style.width = "0%";
    }
};