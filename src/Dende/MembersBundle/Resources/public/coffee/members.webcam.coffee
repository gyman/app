class @WebCamTab
  constructor: ()->
    @modal = window.modal
    @modalWindow = @modal.getModal()
  
    @initMakeFotoButton()
    @initFileUpload()
    @initWebcam()
    @initPictureMenu()
   
  FOTO_UPLOAD_ERROR: "Błąd po stronie serwera! Spróbuj z innym plikiem graficznym"    
    
  swffile : "/bundles/members/js/jQueryWebcam/jscam_canvas_only.swf"
  cameraId : "#camera"
  buttonMakeFotoId : "a#makeFoto"
   
  pos: 0
  ctx: null
  image: []
  canvas: null
  
  initMakeFotoButton: =>
    $(@modalWindow)
    .off("click.makeFoto")
    .on "click.makeFoto", @buttonMakeFotoId, (e) ->
      e.preventDefault();
      if webcam.capture?
        webcam.capture()
      else
        document.getElementById('XwebcamXobjectX').capture()

  initPictureMenu: =>
    $("#openWebcam").off("click.switchUpload").on "click.switchUpload", (e)->
      $("#webcamDiv").removeClass("hidden")
      $("#uploadDiv").hide()
     
    $("#openUpload").off("click.switchUpload").on "click.switchUpload", (e)->
      $("#uploadDiv").show()
      $("#webcamDiv").addClass("hidden")

  initWebcam: =>      
    @canvas = document.createElement("canvas")
    @canvas.setAttribute "width", 320
    @canvas.setAttribute "height", 240
    @ctx = @canvas.getContext("2d")
    @image = @ctx.getImageData(0, 0, 320, 240)
    
    $(@cameraId).webcam
      width: 270
      height: 200
      mode: "callback"
      swffile: @swffile
      onCapture: ->
        if webcam.save?
          webcam.save()
        else
          document.getElementById('XwebcamXobjectX').save()
      onSave: @handleImageSave

  handleImageSave: (data) =>
    col = data.split(";")
    img = @image
    i = 0

    while i < 320
      tmp = parseInt(col[i])
      img.data[@pos + 0] = (tmp >> 16) & 0xff
      img.data[@pos + 1] = (tmp >> 8) & 0xff
      img.data[@pos + 2] = tmp & 0xff
      img.data[@pos + 3] = 0xff
      @pos += 4
      i++

    if @pos >= 4 * 320 * 240
      @pos = 0
      @ctx.putImageData img, 0, 0

      formData = new FormData()
      formData.append "UploadedFile", @canvas.toDataURL()

      @sendFormData formData
      
      $("a[href='#filePane']").trigger "click"
          
  initFileUpload: () =>
    $("#dende_membersbundle_member_fotoUploader").uniform()
    
    $("#dende_membersbundle_member_fotoUploader",$(@modalWindow)).fileupload
      limitMultiFileUploads: 1
      done: (e, data) =>
        response = data.response().result
        @handleResponse response
      fail: (e, data) ->
        alert @FOTO_UPLOAD_ERROR

  sendFormData: (formData) =>
    $.ajax
      url: $(@cameraId).attr "data-upload-url"
      type: "POST"
      success: @handleResponse
      data: formData
      cache: false
      contentType: false
      processData: false
  
  handleResponse: (response) =>
    responseJSON = $.parseJSON(response)
    pathname = responseJSON.pathname
    filename = responseJSON.filename
    $("img#memberFoto",$(@modalWindow)).attr "src", pathname
    $("input#dende_membersbundle_member_foto",$(@modalWindow)).val filename
