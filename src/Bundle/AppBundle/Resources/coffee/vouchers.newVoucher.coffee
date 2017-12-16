class @NewVoucher  extends @AbstractModal
  constructor: ()->
    super()
    
    @initDatePickers()
    @initSelect()
    @initSpinners()
    @initOpenInfo()
    
  activitiesInfo: "div#ui-activitiesInfo"
  activitiesSelector: "select#dende_vouchersbundle_voucher_activities"
  priceSelector: "#dende_vouchersbundle_voucher_price"
  amountSelector: "#dende_vouchersbundle_voucher_amount"
  
  initDatePickers: () =>
    $("#dende_vouchersbundle_voucher_startDate, #dende_vouchersbundle_voucher_endDate",@$modalWindow).datetimepicker @datetimepickerSettings

  initSelect: () =>
    $(@activitiesSelector,@$modalWindow).select2 @selectSettings

  initSpinners: () =>
    $(@priceSelector,@$modalWindow).spinner
      min: 0
      step: 10
      start: 1000
      numberFormat: "C"
    $(@amountSelector,@$modalWindow).spinner
      min: 0
      step: 1
      start: 1000
      numberFormat: "C"
        
  initOpenInfo: () =>
    eventName = "change.voucher.activities"
    
    @$modalWindow.off(eventName).on eventName, @activitiesSelector, (e) =>
      list = $(e.target).val()
      if list == null || list.length == 0
        $(@activitiesInfo).show()
      else
        $(@activitiesInfo).hide()
        
    @$modalWindow.trigger eventName
    
#  handleSubmitSuccess: (response) =>
#    super()
#    datatable.fnReloadAjax() if datatable?