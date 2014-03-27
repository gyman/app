class @CloseVoucher
  constructor: ()->
    @modal = window.modal
    @$modalWindow = @modal.getModal()
    
    @setupConfirmButton()
    @setupDenyButton()
    
  confirmButtonSelector: "#confirmCloseVoucher"
  denyButtonSelector: "#dontCloseVoucher"
  
  setupConfirmButton: () =>
    @modal.getModal().off("click.voucher.confirmButton").on "click.voucher.confirmButton", @confirmButtonSelector, (e) =>
      e.preventDefault()
      @modal.showFromUrl $(e.target).attr "href"
  
  setupDenyButton: () =>
    @modal.getModal().off("click.voucher.denyButton").on "click.voucher.denyButton", @denyButtonSelector, (e) =>
      e.preventDefault()
      @modal.showFromUrl $(e.target).attr "href"