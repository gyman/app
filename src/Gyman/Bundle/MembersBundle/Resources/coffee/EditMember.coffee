class @EditMember extends @AbstractModal

  constructor: (@modal)->
#    super(@modal)
#    @initDatepickers()
#    @initSelects()
#    @initActivities()
#    @initVoucherTab()
#    @initCheckbox()

#    webcamTab = new WebCamTab()

  sellVoucher: true,
  userData: {} # @todo add user and pass it's id to voucher sell route

  initVoucherTab: =>
    $(".dial").knob 
      'min':0
    
  initSelects: =>
    $("#gyman_members_member_form_type_belt, #gyman_members_member_form_type_gender").select2 @selectSettings
  
  initActivities: =>
    activities = []
    $.each $("#gyman_members_member_form_type_activities option"), (i,item) ->
      activities.push $(item).val()  

  initCheckbox: =>
    $("input[name='sell_voucher_after_creation']:checkbox").on "change.sellVoucher", (e) =>
      @sellVoucher = $(e.target).is ":checked"

  initDatepickers: =>
    @datetimepickerSettings.startView =       "month"
    @datetimepickerSettings.minView =         'hour'
    @datetimepickerSettings.format =          'dd.MM.yyyy'
    @datetimepickerSettings.todayBtn =        true
    @datetimepickerSettings.todayHighlight =  true
    @datetimepickerSettings.endDate = new Date()

    @$datePicker = $("#memberBirthdate").datetimepicker @datetimepickerSettings

    @$datePicker.on "changeDate", (ev) =>
      @$datePicker.datetimepicker 'hide'

  openTabWithError: =>
    paneId = "#" + @$modalWindow.find("div.control-group.error").first().parents(".tab-pane").prop("id");
    $tab = @$modalWindow.find("ul.nav-tabs a").filter("[href="+paneId+"]");
    $tab.trigger "click"

  handleSaveButton: (e) =>
    if @deleteCheckbox? and @deleteCheckbox.is ":checked"
      if confirm @CONFIRM_DELETE_TEXT
        $.get @$form.data(@deleteActionAttributeName), @handleDeleteAction
    else
      container = $(".modal-body",@$modalWindow)
      action = @$form.attr "action" # Routing.generate "gyman_api_post_member"
      data = @$form.serialize()
      modal.block()
      @handleSubmitForm action, data, container

  handleDeleteAction: (e) =>
    @modal.hide()
#    datatable.fnReloadAjax() if datatable?

  handleSubmitSuccess: (response) =>
#   @todo: enable only for lists, omit datatables in modal
#    datatable.fnReloadAjax() if datatable? and $("table.dataTable").length > 0

    if @sellVoucher?
      @modal.showFromUrl Routing.generate("_voucher_new", {"id" : response.id})
    else
      @modal.hide()

  handleSubmitError: (responseText) =>
    super(responseText)
    @openTabWithError()
