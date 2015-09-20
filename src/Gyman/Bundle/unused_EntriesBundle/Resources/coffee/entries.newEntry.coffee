class @NewEntry extends @AbstractModal
  constructor: ()->
    super()
    
    @setupEntryTypeHidder()
    @setupSelect()
    @setupEventSelect()
    @setupSpinner()
    @setupDatepicker()
    @setupEnterSend()
    @updateSelectEvent() # initial load of data
    
  entryTypeInputSelector: "input[name='gyman_entries_entry\\\[entryType\\\]']"
  priceInputSelector: "input#dgyman_entries_entry_entryPrice"
  startDateInputSelector: "#gyman_entries_entry_startDate"
  eventSelector: "#gyman_entries_entry_occurence"
  $datePicker : null
  
  setupSelect: =>
    @updatePriceField $(@entryTypeInputSelector).filter ":selected,:checked"
  
  setupEventSelect: =>
    $(@eventSelector).select2
      dropdownAutoWidth: true
      minimumResultsForSearch: -1
      containerCss:
        width: "200px"
      minimumInputLength: -1
      
  updateSelectEvent: () =>
    val = $(@startDateInputSelector).val()
    date = moment(val, "DD.MM.YYYY HH:mm").format("YYYY-MM-DD")
    url = Routing.generate '_events_getForDate', {date: date}

    $eventSelect = $(@eventSelector)
    $eventSelect.select2 "destroy"
    $eventSelect.html null
    $eventSelect.block()
    
    $.getJSON url, (result) =>
      if result.length > 0
        $.each result, (i, element) ->
          startHour = moment(element.startDate).format("HH:mm")
          endHour = moment(element.endDate).format("HH:mm")

          $option = $("<option />")
          $option.attr "value", element.id
          $option.text "(#{startHour}-#{endHour}) #{element.activityName}"
          $eventSelect.append $option
      else 
          $option = $("<option />")
          $option.attr "value", null
          $option.text "brak wydarzeń dla tego dnia"
          $eventSelect.append $option
          
      @setupEventSelect()
      $eventSelect.unblock()
        
  setupDatepicker: =>
    @datetimepickerSettings.startView =       "month"
    @datetimepickerSettings.minView =         'hour'
    @datetimepickerSettings.format =          'dd.MM.yyyy hh:mm'
    @datetimepickerSettings.todayBtn =        true
    @datetimepickerSettings.todayHighlight =  true
    @$datePicker = $("#entryStartDate").datetimepicker @datetimepickerSettings
      
    @$datePicker.on "changeDate", (ev) =>
      @$datePicker.datetimepicker 'hide'
      @updateSelectEvent()

  setupSpinner: =>
    $(@priceInputSelector).spinner
      min: 0
      step: 10
      start: 1000
      numberFormat: "C"
        
  setupEntryTypeHidder: =>
    $(@entryTypeInputSelector).uniform()
    @$modalWindow.off("change.entries.entryType").on "change.entries.entryType", @entryTypeInputSelector, (e) =>
      @updatePriceField($(e.currentTarget))

  updatePriceField: ($el) =>
    $controlDiv = $(@priceInputSelector).parents "div.control-group"
    $controlDiv.hide()
    if $el.val() == "paid"
      $controlDiv.show()
    else
      $controlDiv.hide()
      
  setupEnterSend: =>
    $(document).off("keyup.addEntrance").on "keyup.addEntrance", (e) =>
      e.preventDefault()
      e.stopPropagation()
      
      if e.which == 13
        @$saveButton.trigger "click"
      
  handleSubmitSuccess: (response) =>
    super()
    datatable.fnReloadAjax() if datatable?