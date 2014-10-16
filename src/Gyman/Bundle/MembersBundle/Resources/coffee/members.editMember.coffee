class @EditMember extends @AbstractModal
  constructor: ()->
    super()
    @initDatepickers()
    @initSelects()
    @initActivities()
    @initVoucherTab()
    @initCheckbox()

    webcamTab = new WebCamTab()

  $sellVoucherCheckbox: $("input[name='sell_voucher_after_creation']:checkbox")
  sellVoucher: true,
  userData: {} # @todo add user and pass it's id to voucher sell route

  initVoucherTab: =>
    $(".dial").knob 
      'min':0
    
  initSelects: =>
    $("#dende_membersbundle_member_belt, #dende_membersbundle_member_gender").select2 @selectSettings
  
  initActivities: =>
    activities = []
    $.each $("#dende_membersbundle_member_activities option"), (i,item) ->
      activities.push $(item).val()  

  initCheckbox: =>
    @$sellVoucherCheckbox.on "click", (e) =>
      if $(e.target).is(":checked")
        @sellVoucher = true
      else
        @sellVoucher = false

  initDatepickers: () =>
    @datetimepickerSettings.endDate = new Date()
    $("#dende_membersbundle_member_birthdate",@$modalWindow).datetimepicker @datetimepickerSettings
      
  openTabWithError: () =>
    paneId = "#" + @$modalWindow.find("div.control-group.error").first().parents(".tab-pane").prop("id");
    $tab = @$modalWindow.find("ul.nav-tabs a").filter("[href="+paneId+"]");
    $tab.trigger "click"
    
  handleSubmitSuccess: (response) =>
    datatable.fnReloadAjax() if datatable?

    if @sellVoucher
      @modal.showFromUrl Routing.generate("_events_delete_singular",{occurence:@occurence.id})
    else
      @modal.hide()
    
  handleSubmitError: (responseText) =>
    super(responseText)
    @openTabWithError()