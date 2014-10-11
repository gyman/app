class @EditMember extends @AbstractModal
  constructor: ()->
    super()
    @initDatepickers()
    @initSelects()
    @initActivities()
    @initVoucherTab()
    
    webcamTab = new WebCamTab()
    
  initVoucherTab: =>
    $(".dial").knob 
      'min':0
    
  initSelects: =>
    $("#dende_membersbundle_member_belt, #dende_membersbundle_member_gender").select2 @selectSettings
  
  initActivities: =>
    activities = []
    $.each $("#dende_membersbundle_member_activities option"), (i,item) ->
      activities.push $(item).val()  
  
  initDatepickers: () =>
    @datetimepickerSettings.endDate = new Date()
    $("#dende_membersbundle_member_birthdate",@$modalWindow).datetimepicker @datetimepickerSettings
      
  openTabWithError: () =>
    paneId = "#" + @$modalWindow.find("div.control-group.error").first().parents(".tab-pane").prop("id");
    $tab = @$modalWindow.find("ul.nav-tabs a").filter("[href="+paneId+"]");
    $tab.trigger "click"
    
  handleSubmitSuccess: (response) =>
    datatable.fnReloadAjax() if datatable?
    @modal.hide()
    
  handleSubmitError: (responseText) =>
    super(responseText)
    @openTabWithError()