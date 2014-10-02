class @EditEvent extends @NewEvent
  constructor: ()->
    super()
    @occurence = @$form.data("occurence")
    @event = @$form.data("event")
    @initChooseEditType()

  $editTypeRadio:     $("input[name=dende_schedulebundle_event\\\[editType\\\]]:radio")
  $startDate:         $("input[name=dende_schedulebundle_event\\\[startDate\\\]]")
  descriptionDiv:     $("textarea#dende_schedulebundle_event_description").parents(".control-group")
  eventTypeDiv:       $("input[name=dende_schedulebundle_event\\\[eventType\\\]]").parents(".control-group")
  deleteSingularSpan: "form#deleteForm span.singular"
  deleteSerialSpan:   "form#deleteForm span.serial"
  editTypeEventName:  "click.editType"
  
  handleDeleteAction: (e) =>
    super()
    $("#calendar").fullCalendar( 'refetchEvents' );
  
  setDeleteRoute: =>
    if @$editTypeRadio.length == 0
      if @occurence.occurence_type == "singular" 
        @setSingularDeleteRoute()
      else
        @setSerialDeleteRoute()
    else
      if @$editTypeRadio.filter(":checked").val() == "singular"
        @setSingularDeleteRoute()
      else
        @setSerialDeleteRoute()
  
  setSingularDeleteRoute: =>
    @$form.data @deleteActionAttributeName, Routing.generate("_events_delete_singular",{occurence:@occurence.id})
    
  setSerialDeleteRoute: =>
    @$form.data @deleteActionAttributeName, Routing.generate("_events_delete_serial",{occurence:@occurence.id})
    
  initChooseEditType: =>
    @$editTypeRadio.off(@editTypeEventName).on @editTypeEventName, @handleEditTypeSwitch

    $checked = @$editTypeRadio.filter(":checked")
    
    if $checked.length > 0
      $checked.trigger @editTypeEventName
    else
      @$editTypeRadio.eq(1).trigger @editTypeEventName
    
  handleEditTypeSwitch: (e) =>
    @setDeleteRoute()
    
    console.log @deleteSingularSpan
    console.log @deleteSerialSpan
    
    if @$editTypeRadio.filter(":checked").val() == "singular" or @$editTypeRadio.filter(":checked").length == 0
      @$startDate.val moment(@occurence.start_date).format("DD.MM.YYYY HH:mm")
      @descriptionDiv.show()
      @daysDiv.hide()
      @eventTypeDiv.hide()
      @endDateDiv.hide()
      $(@deleteSingularSpan).removeClass("hidden")
      $(@deleteSerialSpan).addClass("hidden")
    else
      @$startDate.val moment(@event.start_date).format("DD.MM.YYYY HH:mm")
      @descriptionDiv.hide()
      @daysDiv.show()
      @eventTypeDiv.show()
      @endDateDiv.show()
      $(@deleteSingularSpan).addClass("hidden")
      $(@deleteSerialSpan).removeClass("hidden")  