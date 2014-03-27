$.fn.dataTableExt.oApi.fnReloadAjax = (oSettings, sNewSource, fnCallback, bStandingRedraw) ->
  # DataTables 1.10 compatibility - if 1.10 then versionCheck exists.
  # 1.10s API has ajax reloading built in, so we use those abilities
  # directly.
  if $.fn.dataTable.versionCheck
    api = new $.fn.dataTable.Api(oSettings)
    if sNewSource
      api.ajax.url(sNewSource).load fnCallback, not bStandingRedraw
    else
      api.ajax.reload fnCallback, not bStandingRedraw
    return
  oSettings.sAjaxSource = sNewSource  if sNewSource isnt `undefined` and sNewSource isnt null
  
  # Server-side processing should just call fnDraw
  if oSettings.oFeatures.bServerSide
    @fnDraw()
    return
  @oApi._fnProcessingDisplay oSettings, true
  that = this
  iStart = oSettings._iDisplayStart
  aData = []
  @oApi._fnServerParams oSettings, aData
  oSettings.fnServerData.call oSettings.oInstance, oSettings.sAjaxSource, aData, ((json) ->
    
    # Clear the old information from the table 
    that.oApi._fnClearTable oSettings
    
    # Got the data - add it to the table 
    aData = (if (oSettings.sAjaxDataProp isnt "") then that.oApi._fnGetObjectDataFn(oSettings.sAjaxDataProp)(json) else json)
    i = 0

    while i < aData.length
      that.oApi._fnAddData oSettings, aData[i]
      i++
    oSettings.aiDisplay = oSettings.aiDisplayMaster.slice()
    that.fnDraw()
    if bStandingRedraw is true
      oSettings._iDisplayStart = iStart
      that.oApi._fnCalculateEnd oSettings
      that.fnDraw false
    that.oApi._fnProcessingDisplay oSettings, false
    
    # Callback user function - for event handlers etc 
    fnCallback oSettings  if typeof fnCallback is "function" and fnCallback isnt null
  ), oSettings