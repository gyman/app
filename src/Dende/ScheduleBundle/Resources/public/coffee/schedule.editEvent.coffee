class @EditEvent extends @NewEvent
  constructor: ()->
    super()
    @initChooseEditType()
    @initDeleteCheckbox()
  
  form: $("form#editEventForm",@$modalWindow)
  
  BUTTON_SAVE_STATE: "Zapisz"
  BUTTON_SAVE_CLASS: "btn-primary"
  BUTTON_DELETE_STATE: "Usuń"
  BUTTON_DELETE_CLASS: "btn-danger"
  
  initDeleteCheckbox: =>
    @deleteCheckbox = $("input#deleteOccurenceCheckbox",@$modalWindow)
    @deleteCheckbox.change @handleDeleteCheckboxChange
  
  handleDeleteCheckboxChange: (e) =>
    e.preventDefault()
    if @deleteCheckbox.is ":checked"
      @$saveButton.text @BUTTON_DELETE_STATE
      @$saveButton.removeClass @BUTTON_SAVE_CLASS
      @$saveButton.addClass @BUTTON_DELETE_CLASS
    else
      @$saveButton.text @BUTTON_SAVE_STATE
      @$saveButton.removeClass @BUTTON_DELETE_CLASS
      @$saveButton.addClass @BUTTON_SAVE_CLASS
  
  handleSaveButton: (e) =>
    e.preventDefault()
    if @deleteCheckbox? and @deleteCheckbox.is ":checked" 
      if confirm "Czy na pewno chcesz usunąć wydarzenia?"
        deleteAction = @form.data "deleteAction"
        $.get deleteAction, @handleDeleteAction
    else
      super(e)
  
  handleDeleteAction: (e) =>
    @modal.hide()
    $("#calendar").fullCalendar( 'refetchEvents' );
  
  initChooseEditType: =>
    $serial = $("#dende_schedulebundle_event_editType_0");
    $singular = $("#dende_schedulebundle_event_editType_1");
    
    event = $("form#editEventForm").data("event");
    occurence = $("form#editEventForm").data("occurence");
    
    $("input[name=dende_schedulebundle_event\\\[editType\\\]]:radio").off("click.chooseEditType").on "click.chooseEditType", (e) =>
      if $(e.target).val() == "singular"
        $("textarea#dende_schedulebundle_event_description").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[eventType\\\]]").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[endDate\\\]]").parents(".control-group").hide()
        startDate = moment(occurence.start_date).format("DD.MM.YYYY HH:mm")
        $("form#deleteOccurencesForm span.singular").removeClass("hidden")
        $("form#deleteOccurencesForm span.serial").addClass("hidden")
      else
        $("textarea#dende_schedulebundle_event_description").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[eventType\\\]]").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[endDate\\\]]").parents(".control-group").show()
        startDate = moment(event.start_date).format("DD.MM.YYYY HH:mm")
        $("form#deleteOccurencesForm span.singular").addClass("hidden")
        $("form#deleteOccurencesForm span.serial").removeClass("hidden")
     
      $("input[name=dende_schedulebundle_event\\\[startDate\\\]]").val(startDate)
        
    $checked = $("input[name=dende_schedulebundle_event\\\[editType\\\]]:radio").filter(":checked")
    
    if $checked.length > 0
      $checked.trigger "click.chooseEditType"
    else
      $singular.trigger "click.chooseEditType"
  