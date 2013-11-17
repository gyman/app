window.setupEntriesModal = ->     
  $entranceModal = $("#editEntranceModal")

  setupClickEvent = (e, href) ->
    e.stopPropagation()
    e.preventDefault()
    container = $(".modal-body",$entranceModal)
    $.get href, (response) ->
      container.html response
      $entranceModal.modal
        "show" : true
  
  # event na liście
  
  $(document).off("click.openAddEntranceModal.button").on "click.openAddEntranceModal.button",".addEntrance", (e) ->
    href = $(this).attr "href"
    setupClickEvent(e,href)
    
  $(document).off("click.openAddEntranceModal.keytype").on "click.openAddEntranceModal.keytype", (e,href) ->
    setupClickEvent(e,href)
    
  # $entranceModal.on "shown", () ->
  #  $("input#dende_entriesbundle_entry_entryDate",@$modalWindow).datepicker
  #    dateFormat: "dd.mm.yyyy"
  
  # event w modalu
