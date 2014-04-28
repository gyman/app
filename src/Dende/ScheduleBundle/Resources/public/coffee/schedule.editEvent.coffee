class @EditEvent extends @NewEvent
  constructor: ()->
    super()
    @initChooseEditType()
  
  form: $("form#editEventForm",@$modalWindow)
  
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
      else
        $("textarea#dende_schedulebundle_event_description").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[eventType\\\]]").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[endDate\\\]]").parents(".control-group").show()
        startDate = moment(event.start_date).format("DD.MM.YYYY HH:mm")
     
      $("input[name=dende_schedulebundle_event\\\[startDate\\\]]").val(startDate)
        
    $checked = $("input[name=dende_schedulebundle_event\\\[editType\\\]]:radio").filter(":checked")
    
    if $checked.length > 0
      $checked.trigger "click.chooseEditType"
    else
      $singular.trigger "click.chooseEditType"
  