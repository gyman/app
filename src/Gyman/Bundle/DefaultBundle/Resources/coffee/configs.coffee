$ () ->
  $.blockUI.defaults =
    message: "<img src=\"/assets/images/072.gif\" alt=\"loading\"/>"
    css:
      border: "none"
      backgroundColor: "transparent"
    overlayCSS:
      backgroundColor: "#E8EAEB"
      textAlign: "center"

  $(document).bind "ajaxComplete", (event, jqXHR, ajaxOptions) ->
    if jqXHR.status == 401
      window.location = Routing.generate 'fos_user_security_logout';
