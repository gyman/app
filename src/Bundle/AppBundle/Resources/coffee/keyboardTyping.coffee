$ ->
  bodyEl = $("body")[0]
  keyboardCache = null

  timeOut = setInterval(->
    if ticksToCleanup > 0
      --ticksToCleanup
    else if keyboardCache != null
      keyboardCache = null
  ,1000)

  ticksToCleanup = 1

  $(document).on "keyup", (e) ->
    return null if keyboardCache != null && keyboardCache.length > 50
    return null if not $(e.target).is bodyEl

    code = e.which
    character = String.fromCharCode code

    if code == 13 && keyboardCache != null
      $(document).trigger 'enteredMembersBarcode', [code: keyboardCache]
      return
    else if code == 13
      keyboardCache = null
      return    
      
    if not character.match /^[A-Za-z0-9]*[A-Za-z0-9][A-Za-z0-9]*$/
      return
    
    if keyboardCache is null
      keyboardCache = character
    else
      keyboardCache += character
        
    ticksToCleanup = 1
    
  return
