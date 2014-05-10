class @NewEvent extends @AbstractModal
  constructor: ()->
    super()
    
    @initNewActivity()
    @setupSpinner()
    @initStartDatepicker()
    @initEndDatepicker()
    @initChooseEventType()

  $eventTypeRadio:      $("input[name=dende_schedulebundle_event\\\[eventType\\\]]:radio")
  endDateDiv:           $("input[name=dende_schedulebundle_event\\\[endDate\\\]]").parents(".control-group")
  daysDiv:              $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group")
  newActivityDiv:       $("#dende_schedulebundle_event_newActivity").parents(".control-group")
  activityDiv:          $("#dende_schedulebundle_event_activity").parents(".control-group")
  
  initChooseEventType: =>   
    @$eventTypeRadio.off("click.chooseEventType").on "click.chooseEventType", @handleEventTypeSwitch

    $checked = $("input[name=dende_schedulebundle_event\\\[eventType\\\]]:radio").filter(":checked")
    
    if $checked.length > 0
      $checked.trigger "click.chooseEventType"
    else
      $("input[name=dende_schedulebundle_event\\\[eventType\\\]]:radio").filter("[value='weekly']").trigger "click.chooseEventType"
    
  handleEventTypeSwitch: (e) =>
    if $(e.target).val() == "weekly"
      @endDateDiv.show()
      @daysDiv.show()
    else
      @endDateDiv.hide()
      @daysDiv.hide()
        
  initNewActivity: =>
    return unless $("#dende_schedulebundle_event_activity").length > 0
    
    @$activitySelect = $("#dende_schedulebundle_event_activity").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "220px"
  
    @newActivityDiv.hide()
    $("a#addNewActivity").off("click.addNewActivity").on "click.addNewActivity", @handleNewActivity
      
  handleNewActivity: (e) =>
    @$activitySelect.select2 "enable", false
    @activityDiv.hide()
    @newActivityDiv.show()
    
  handleSubmitSuccess: (response) =>
    super()
    $("#calendar").fullCalendar( 'refetchEvents' );

  initStartDatepicker: () =>
    stDate = moment().set('hour',0).set('minute',0)
    endDate = moment().add('y',1)
    
    settings = @datetimepickerSettings
    settings.format = 'dd.mm.yyyy hh:ii'
    settings.todayBtn = true
    settings.startView = 'month'
    settings.minView = 'hour'
    settings.maxView = 'year'
    settings.startDate = stDate._d
    settings.endDate = endDate._d

    @$datePicker = $("#eventStartDate").datetimepicker settings
  
  initEndDatepicker: () =>
    endDate = moment().add('y',1)
    
    settings = @datetimepickerSettings
    settings.format = 'dd.mm.yyyy'
    settings.todayBtn = true
    settings.startView = 'month'
    settings.minView = 'month'
    settings.maxView = 'year'
    settings.startDate = moment()._d
    settings.endDate = endDate._d
    
    @$datePicker = $("#eventEndDate").datetimepicker settings
    
  setupSpinner: =>
    $("#dende_schedulebundle_event_duration").spinner
      min: 15
      step: 15
      start: 90
      numberFormat: "C"