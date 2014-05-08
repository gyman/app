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
    
  entryTypeInputSelector: "input[name='dende_entriesbundle_entry\\\[entryType\\\]']"
  priceInputSelector: "input#dende_entriesbundle_entry_entryPrice"
  startDateInputSelector: "#dende_entriesbundle_entry_startDate"
  eventSelector: "#dende_entriesbundle_entry_occurence"
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
    url = Routing.generate '_events_getForDate', {date: moment(val,"DD.MM.YYYY HH:mm").format("YYYY-MM-DD")}

    $eventSelect = $(@eventSelector)
    $eventSelect.select2 "destroy"
    $eventSelect.html null
    $eventSelect.block()
    
    $.getJSON url, (result) =>
      $.each result, (i, element) ->
        startHour = moment(element.startDate).format("HH:mm")
        endHour = moment(element.endDate).format("HH:mm")
                
        $option = $("<option />")
        $option.attr "value", element.id
        $option.text "(#{startHour}-#{endHour}) #{element.activityName}"
        $eventSelect.append $option
    
      @setupEventSelect()
      $eventSelect.unblock()
        
  setupDatepicker: =>
    @datetimepickerSettings.startView =       "month"
    @datetimepickerSettings.minView =         'hour'
    @datetimepickerSettings.format =          'dd.mm.yyyy hh:ii'
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
        $(document).off("keyup.addEntrance")
        @sendFormData()
      
  handleSubmitSuccess: (response) =>
    super()
    datatable.fnReloadAjax() if datatable?