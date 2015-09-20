class @CloseEntry extends @AbstractModal
  constructor: ()->
    super()

  handleSubmitSuccess: (response) =>
    super()
    datatable.fnReloadAjax() if datatable?