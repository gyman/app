class @AbstractModal
  constructor: (@modal)->
    console.log @modal
#    @$modalWindow = @modal.getModal()
#
#    @$form = $(".modal-body form",@$modalWindow)
#
#    @datetimepickerSettings =
#      minuteStep:     15
#      format:         'dd.mm.yyyy'
#      weekStart:      1
#      autoclose:      true
#      pickerPosition: "bottom-left"
#      startView:      'decade'
#      minView:        'month'
#      maxView:        'decade'
#      todayHighlight: true
#      language:       "pl"
#
#    @selectSettings =
#      dropdownAutoWidth: true
#      containerCss:
#        width: "220px"
#
#    @deleteCheckbox = $("input#deleteCheckbox",@$modalWindow)
#    @$saveButton = $("#saveFormInModal",@$modalWindow)
    
#    @initDeleteCheckbox()
#    @initSaveButton()
    
  BUTTON_SAVE_STATE: "Zapisz"
  BUTTON_SAVE_CLASS: "btn-primary"
  BUTTON_DELETE_STATE: "Usuń"
  BUTTON_DELETE_CLASS: "btn-danger"

  CONFIRM_DELETE_TEXT: "Czy na pewno skasować?"

  deleteActionAttributeName: "deleteAction"

  initSaveButton: =>
    @$saveButton.off("click.saveButton").on "click.saveButton", @handleSaveButton       
          
  initDeleteCheckbox: =>
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
      if confirm @CONFIRM_DELETE_TEXT
        $.get @$form.data(@deleteActionAttributeName), @handleDeleteAction
    else
      container = @$modalWindow.find(".modal-body")
      action = @$form.attr "action"
      data = @$form.serialize()
      modal.block()
      @handleSubmitForm action, data, container
      
  handleDeleteAction: (e) =>
    @modal.hide()
    datatable.fnReloadAjax() if datatable?
    
  handleSubmitForm: (action, data, container) =>
    $.ajax
      url: action
      data: data
      success: (response) =>
        @handleSubmitSuccess(response)
      error: (xhr, textStatus, errorThrown) =>
        if xhr.status == 400
          @handleSubmitError xhr.responseText
      complete: =>
        @modal.unblock()
      type: @$form.attr "method"
      
  handleSubmitSuccess: (response) =>
    @modal.hide()
    
  handleSubmitError: (responseText) =>
    @modal.setBody responseText