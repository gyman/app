class @NewEvent
  constructor: ()->
    @modal = window.modal
    @$modalWindow = @modal.getModal()
    @initSelects()
    @initNewActivity()
    @setupSpinner()
    @initStartDatepicker()
    @initEndDatepicker()
    @initSaveButton()
    @initChooseEventType()
    
  BUTTON_SAVE_STATE: "Zapisz"
  BUTTON_SAVE_CLASS: "btn-primary"
  BUTTON_DELETE_STATE: "Usuń"
  BUTTON_DELETE_CLASS: "btn-danger"
   
  $saveButton: null
         
  form: $("form#newEventForm",@$modalWindow)
         
  initSelects: =>
    @$activitySelect = $("#dende_schedulebundle_event_activity, #dende_membersbundle_member_gender").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "220px"
        
  initChooseEventType: =>
    $weekly = "#dende_schedulebundle_event_eventType_0";
    $single = "#dende_schedulebundle_event_eventType_1";
    
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
    $("#dende_schedulebundle_event_newActivity").parents("div.control-group").hide()
    $("a#addNewActivity").off("click.addNewActivity").on "click.addNewActivity", (e) =>
      e.preventDefault()
      @handleNewActivity()
      
    newActivity = $("#dende_schedulebundle_event_newActivity").val()
    console.log newActivity
    
    $("a#addNewActivity").trigger "click" if newActivity.length > 0
      
  handleNewActivity: =>
    @$activitySelect.select2 "enable", false
    $("#dende_schedulebundle_event_activity").parents("div.control-group").hide()
    $("#dende_schedulebundle_event_newActivity").parents("div.control-group").show()
  
  initSaveButton: =>
    @$saveButton = $("#saveFormInModal",@$modalWindow)
    @$saveButton.off("click.saveButton").on "click.saveButton", @handleSaveButton
        
  handleSaveButton: (e) =>
    e.preventDefault()
    container = $(".modal-body",@$modalWindow)
    action = @form.attr "action"
    data = @form.serialize()
    modal.block()
    @handleSubmitForm action, data, container
        
  handleSubmitForm: (action,data, container) =>
    $.ajax
      url: action
      data: data
      success: (response) =>
        @modal.hide()
        $("#calendar").fullCalendar( 'refetchEvents' );
      error: (xhr, textStatus, errorThrown) =>
        if xhr.status == 400
          @modal.setBody xhr.responseText
        else if xhr.status == 500
          alert "Wystąpił błąd serwera"
      complete: =>
        @modal.unblock()
      type: @form.attr "method"
  
  initStartDatepicker: () =>
    stDate = moment().set('hour',0).set('minute',0)
    endDate = moment().add('y',1)
    @$datePicker = $("#eventStartDate").datetimepicker
      format: 'dd.mm.yyyy hh:ii'
      weekStart: 1
      autoclose: true
      todayBtn: true
      todayHighlight: true
      minuteStep: 15
      pickerPosition: "bottom-left"
      minView: 0
      maxView: 1
      startDate: stDate._d
      endDate: endDate._d
      
    @$datePicker.on "changeDate", (ev) =>
      @$datePicker.datetimepicker 'hide'
  
  initEndDatepicker: () =>
    endDate = moment().add('y',1)
    @$datePicker = $("#eventEndDate").datetimepicker
      format: 'dd.mm.yyyy'
      weekStart: 1
      autoclose: true
      todayBtn: true
      todayHighlight: true
      minuteStep: 15
      pickerPosition: "bottom-left"
      minView: 2
      maxView: 2
      startDate: moment()._d
      endDate: endDate._d
      
    @$datePicker.on "changeDate", (ev) =>
      @$datePicker.datetimepicker 'hide'
    
  setupSpinner: =>
    $("#dende_schedulebundle_event_duration").spinner
      min: 15
      step: 15
      start: 90
      numberFormat: "C"