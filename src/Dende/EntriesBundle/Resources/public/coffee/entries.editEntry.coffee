class @EditEntry
  constructor: ()->
    @modal = window.modal
    @$modalWindow = @modal.getModal()
  
    @setupEntryTypeHidder()
    @setupSelect()
    @setupEventSelect()
    @setupSpinner()
    @setupDatepicker()
    @setupSendForm()
    @setupEnterSend()
    @updateSelectEvent() # initial load of data
    
  entryTypeInputSelector: "input[name='dende_entriesbundle_entry\\\[entryType\\\]']"
  priceInputSelector: "input#dende_entriesbundle_entry_entryPrice"
  startDateInputSelector: "#dende_entriesbundle_entry_startDate"
  eventSelector: "#dende_entriesbundle_entry_event"
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
    date = moment(val,"DD.MM.YYYY HH:mm").format("YYYY-MM-DD HH:mm")
    url = Routing.generate '_schedule_getEventsForDate', {date: date}
    $eventSelect = $(@eventSelector)
    $eventSelect.select2("destroy")
    $eventSelect.html(null)
    $eventSelect.block()
    
    $.get url, (result) =>
      result = $.parseJSON result     
      $(result).each (i, element) ->
        $option = $("<option />")
        $option.attr "value", element.id
        $option.text "(#{element.startHour}-#{element.endHour}) #{element.name}"
        $eventSelect.append $option
    
      @setupEventSelect()
      $eventSelect.unblock()
        
  setupDatepicker: =>
    @$datePicker = $("#entryStartDate").datetimepicker
      format: 'dd.mm.yyyy hh:ii'
      weekStart: 1
      autoclose: true
      todayBtn: true
      todayHighlight: true
      minuteStep: 15
      pickerPosition: "bottom-left"
      
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

  setupSendForm: =>
    @$modalWindow.off("click.addEntrance").on "click.addEntrance","a#saveFormInModal", (e) =>
      e.preventDefault()
      @sendFormData()
      
  setupEnterSend: =>
    $(document).off("keyup.addEntrance").on "keyup.addEntrance", (e) =>
      e.preventDefault()
      e.stopPropagation()
      
      if e.which == 13
        @sendFormData()
        $(document).off("keyup.addEntrance")
      
  sendFormData: =>
    $form = $("form#entranceForm",@$modalWindow)
    action = $form.attr "action"
    data = $form.serialize()

    @modal.block()

    $.ajax
      url: action
      data: data
      success: (response) =>
        @modal.hide()
        datatable.fnReloadAjax()
      error: (xhr, textStatus, errorThrown) =>
        @modal.setBody xhr.responseText if xhr.status == 400
      complete: (msg) =>
        @modal.unblock()
      type: $form.attr "method"