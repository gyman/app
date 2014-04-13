class @EditEvent extends @NewEvent
  constructor: ()->
    super()
    @initChooseEditType()
  
  initChooseEditType: =>
    $serial = $("#dende_schedulebundle_event_editType_0");
    $singular = $("#dende_schedulebundle_event_editType_1");
    
    $("input[name=dende_schedulebundle_event\\\[editType\\\]]:radio").off("click.chooseEditType").on "click.chooseEditType", (e) =>
      if $(e.target).val() == "singular"
        $("textarea#dende_schedulebundle_event_description").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[eventType\\\]]").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[endDate\\\]]").parents(".control-group").hide()
      else
        $("textarea#dende_schedulebundle_event_description").parents(".control-group").hide()
        $("input[name=dende_schedulebundle_event\\\[days\\\]\\\[\\\]]").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[eventType\\\]]").parents(".control-group").show()
        $("input[name=dende_schedulebundle_event\\\[endDate\\\]]").parents(".control-group").show()
     
    $checked = $("input[name=dende_schedulebundle_event\\\[editType\\\]]:radio").filter(":checked")
    
    if $checked.length > 0
      $checked.trigger "click.chooseEditType"
    else
      $singular.trigger "click.chooseEditType"
  