class @NewEvent extends @AbstractModal
  constructor: ()->
    super()
    
    @initNewActivity()
    @setupSpinner()
    @initStartDatepicker()
    @initEndDatepicker()
    @initChooseEventType()

  initChooseEventType: =>   
    $("input[name=dende_schedulebundle_event\\\[eventType\\\]]:radio").off("click.chooseEventType").on "click.chooseEventType", (e) =>
      if $(e.target).val() == "weekly"
        $("input#dende_schedulebundle_event_endDate").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group").show()
      else
        $("input#dende_schedulebundle_event_endDate").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group").hide()
     
    $checked = $("input[name=dende_schedulebundle_event\\\[eventType\\\]]:radio").filter(":checked")
    
    if $checked.length > 0
      $checked.trigger "click.chooseEventType"
    else
      $("input[name=dende_schedulebundle_event\\\[eventType\\\]]:radio").filter("[value='weekly']").trigger "click.chooseEventType"
        
  initNewActivity: =>
    return unless $("#dende_schedulebundle_event_activity").length > 0
    
    @$activitySelect = $("#dende_schedulebundle_event_activity").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "220px"
  
    $("#dende_schedulebundle_event_newActivity").parents("div.control-group").hide()
    $("a#addNewActivity").off("click.addNewActivity").on "click.addNewActivity", (e) =>
      e.preventDefault()
      @handleNewActivity()
      
    # newActivity = $("#dende_schedulebundle_event_newActivity").val()
    # $("a#addNewActivity").trigger "click"
      
  handleNewActivity: =>
    @$activitySelect.select2 "enable", false
    $("#dende_schedulebundle_event_activity").parents("div.control-group").hide()
    $("#dende_schedulebundle_event_newActivity").parents("div.control-group").show()
    
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