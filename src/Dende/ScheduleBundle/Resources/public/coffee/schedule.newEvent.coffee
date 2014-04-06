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
    ###
    @initDatepickers()
    @initActivities()
    @initDeleteCheckbox()
    ###
  BUTTON_SAVE_STATE: "Zapisz"
  BUTTON_SAVE_CLASS: "btn-primary"
  BUTTON_DELETE_STATE: "Usuń"
  BUTTON_DELETE_CLASS: "btn-danger"
   
  $saveButton: null
         
  initSelects: =>
    @$activitySelect = $("#dende_schedulebundle_event_activity, #dende_membersbundle_member_gender").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "220px" 
  
  initNewActivity: =>
    $("#dende_schedulebundle_event_new_activity").parents("div.control-group").hide()
    $("a#addNewActivity").off("click.addNewActivity").on "click.addNewActivity", (e) =>
      e.preventDefault()
      @handleNewActivity()
      
  handleNewActivity: =>
    @$activitySelect.select2 "enable", false
    $("#dende_schedulebundle_event_activity").parents("div.control-group").hide()
    $("#dende_schedulebundle_event_new_activity").parents("div.control-group").show()
  
  initSaveButton: =>
    @$saveButton = $("#saveFormInModal",@$modalWindow)
    @$saveButton.off("click.saveButton").on "click.saveButton", @handleSaveButton
        
  handleSaveButton: (e) =>
    e.preventDefault()
    @form = $("form#newEventForm",@$modalWindow)
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
      error: (xhr, textStatus, errorThrown) =>
        if xhr.status == 400
          @modal.setBody xhr.responseText
        else if xhr.status == 500
          alert "Wystąpił błąd serwera"
      complete: =>
        @modal.unblock()
      type: @form.attr "method"
  
  initStartDatepicker: () =>
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
      startDate: moment()._d
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
      minView: 1
      maxView: 1
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