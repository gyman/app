class @Modal
  constructor: (@params) ->
    if !@params
      @params = {}

    @$modal =  $(@modalSelector)

    if @params.node?
      @$modal = $(@params.node)
    
    @$titleElement = $("h3#modalTitle",@$modal)
    @$headerElement = $("div.modal-header",@$modal)
    @$bodyElement = $("div.modal-body",@modal)
    @$footerElement = $("div.modal-footer",@$modal)
    
    if @params.body?
      @setBody ""
      
    if @params.url?
      @url = @params.url 
      
    if @params.title?
      @setTitle @params.title
    
    if @params.footer?
      @setFooter @params.footer
    
    @$modal.modal
      show: false
    
    @events = 
      preSendFormEvent: () ->

      postSendFormEvent: () ->

      preShowEvent: () ->

      postShowEvent: () ->
    
    @setupModal()
  
  modalSelector: "div#modalWindow"
  windowClass: null
  isOpened: false
  
  setupModal: () =>
    @$modal.off("hidden.addWindowClass").on "hidden.addWindowClass", (e) =>
      if @windowClass != null
        @getModal().removeClass @windowClass
        @windowClass = null
  
    @$modal.off("hidden.setIsOpened").on "hidden.setIsOpened", (e) =>
      @isOpened = false
    @$modal.off("shown.setIsOpened").on "shown.setIsOpened", (e) =>
      @isOpened = true
  
  getModal: =>
    @$modal
    
  setTitle: (title) ->
    @$titleElement.text(title)  

  setHeader: (header) ->
    @$headerElement.html(header)
    
  setBody: (body) ->
    @$bodyElement.html(body)  
    
  setFooter: (footer) ->
    @$footerElement.html(footer)
  
  sendForm: () ->
    
    $form = $("form",@$modal)
    action = $form.attr "action" || @url
    data = $form.serialize()
    method = $form.attr "method"
    
    @events.preSendFormEvent()
    
    $.ajax
      url: action
      data: data
      type: @$form.attr "method"
      success: (response) =>
        @events.successSendFormEvent response
        @setBody response
      error: (xhr, textStatus, errorThrown) ->
        @events.errorSendFormEvent xhr, textStatus, errorThrown
      complete:
        @events.completeSendFormEvent xhr, textStatus, errorThrown
        
  show: =>     
    @events.preShowEvent()
    @$modal.modal "show"
    @events.postShowEvent()

  hide: =>
    @events.preShowEvent()
    @$modal.modal "hide"
    @events.postShowEvent()
    
  block: (full) ->
    @unblock
    if full
      @getModal().block()
    else
      @$footerElement.block()
      
  unblock: () ->
    @getModal().unblock()
    @$footerElement.unblock()
    
  loadFromUrl: (url) =>
    $.get url, (response) =>
      @setBody response
  
  showFromUrl: (url, postData) =>
    if postData?
      method = "post"
    else
      method = "get"

    if @isOpened
      @$modal.off("hidden.imidiateShow").on "hidden.imidiateShow", (e) =>
        $.ajax(
          url: url
          data: postData
          dataType: "html"
          type: method
        ).success((response) =>
          @setBody response
          @show()
          window.modal.getModal().off("hidden.imidiateShow")
        ).error (xhr, status, message) =>
          @logError xhr, status, message
          
      @hide()
    else
      $.ajax(
        url: url
        data: postData
        type: method
        dataType: "html"
      ).success((response) =>
        @setBody response
        @show()
      ).error (xhr, status, message) =>
        @logError xhr, status, message    

  logError: (xhr, status, message) =>
    console.log "#{message} (#{xhr.status})"

  setupFromNode: (node) =>
    $dataDiv = $(node)
    $footer = $(".modal-footer", $dataDiv).html()
    $header = $(".modal-header", $dataDiv).html()

    @setFooter($footer);
    @setHeader($header);
    
    $(node).remove();
    
  setModalWindowClass: (cssClass) =>
    @windowClass = cssClass
    @getModal().addClass cssClass
    