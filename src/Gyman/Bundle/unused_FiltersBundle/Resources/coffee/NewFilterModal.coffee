class @NewFilterModal extends @AbstractModal
  constructor: ()->
    super()
#    @setup()
    @setupAddFilterSelect() # --
    @listname = @$form.data "listname"
    
  addFilterSelector: "#filter_addFilter"
  saveFilterSelector: "#filter_save"
  filterNameSelector: "#filter_name"
  pinToDashboardSelector: "#filter_pinned"
  filterFormSelector: "form#filterForm"
  $form: null
  useFilterButtonSelector: "#saveFormInModal"
  filterTabsSelector: "ul#filterTabs"
  listname: null
  chosenFilters: []
  
  mode : null
  
  MODE_SET : "set"
  MODE_SAVE : "save"
  MODE_UPDATE : "update"
  
  setup: =>
    @$form = $("form#filterForm")
    @setupAddFilterSelect()
    @runSubfilterMethods()
    @setupUniform()
    @setupSaveFilterCheckbox()
    @setupRemoveFilter()    
    @setupAction()
  
  setupAction: =>
    uri = URI(@$form.attr "action");
    uri.addQuery("add[]",@chosenFilters)
    uri.removeQuery(["mode"]).addQuery("mode",@mode)
    @$form.attr "action", uri
  
  setupAddFilterSelect: => # addFilter dropdown
    @$modalWindow.off("change.filter.addFilter").on "change.filter.addFilter", @addFilterSelector, @handleAddFilter
    # @removeBindedOptions()
    
  handleAddFilter: (e) =>
    @modal.block()
    filterName = $(e.currentTarget).val()
    @chosenFilters.push filterName
    @handleSaveButton(null, @MODE_UPDATE)

  removeBindedOptions: () =>
    $(@chosenFilters).each (i,filterName) =>
      $("option[value='"+filterName+"']",@addFilterSelector).attr("disabled",true).hide()
      $(@addFilterSelector).val(null)
      
  runSubfilterMethods: () =>
    $(@chosenFilters).each (i,filterName) =>
      method = filterName.charAt(0).toLowerCase() + filterName.slice(1) + "SubfilterHandler"
      @[method]()
        
  # search filter handler
        
  searchSubfilterHandler: () =>
        
  # current voucher filter handler
        
  currentVoucherSubfilterHandler: () =>
    $("#filter_sub_currentVoucher_currentVoucher").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  

  # checked in filter handler
        
  checkedInSubfilterHandler: () =>
    $("#filter_sub_checkedIn_checkedIn").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
        
  # member filter handler
        
  memberSubfilterHandler: () =>
    $("#filter_sub_member_member").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "200px"  
    
  # registrationDate filter handler
        
  registrationDateSubfilterHandler: () =>
    @handleVoucherDates("registrationDate")
  

  # activities filter handler
        
  activitiesSubfilterHandler: () =>
    activitySelector = "#filter_sub_Activities_activity"
    $(activitySelector).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "400px"
    
    
  # starred filter handler
  
  starredSubfilterHandler: () =>
    $("#filter_sub_Starred_starred").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
  # gender filter handler
  
  genderSubfilterHandler: () =>
    $("#filter_sub_Gender_gender").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
  
  entryDateSubfilterHandler: () =>
    @handleVoucherDates("EntryDate")
  
  entryTypeSubfilterHandler: () =>
    typeSelector = "#filter_sub_EntryType_type"
    entryTypeSelector = "#filter_sub_EntryType_entryType"
    
    $([typeSelector,entryTypeSelector].join(",")).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
  # vouchers filter handlers
  
  voucherStartSubfilterHandler: () =>
    @handleVoucherDates("VoucherStart")
    
  voucherEndSubfilterHandler: () =>
    @handleVoucherDates("VoucherEnd")
                
  handleVoucherDates: (type) =>
    typeSelector = "#filter_sub_"+type+"_type"
    date1Selector = "#filter_sub_"+type+"_date1"
    date2Selector = "#filter_sub_"+type+"_date2"
    
    $(typeSelector).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
    settings = @datetimepickerSettings
    
    settings.format = 'dd.mm.yyyy'
    settings.minView = 'month'
    settings.maxView = 'decade'
    settings.startView = 'month'
    
    $([date1Selector,date2Selector].join(",")).datetimepicker settings
      
    $(date2Selector).hide()
      
    eventName = "change.filter."+type+".type"
      
    @$modalWindow.off(eventName).on eventName, typeSelector, (e) =>
      noneInputsArray = ["today","yesterday","thisWeek","lastWeek","thisMonth","lastMonth","thisYear","lastYear"]
      singleInputArray =  ["eq","lt","gt"]
      doubleInputsArray = ["between","notBetween"]
      
      value = $(e.currentTarget).val()
      
      if noneInputsArray.indexOf(value) != -1
        $(date1Selector).hide()
        $(date2Selector).hide()
      else if doubleInputsArray.indexOf(value) != -1
        $(date1Selector).show()
        $(date2Selector).show()
      else if singleInputArray.indexOf(value) != -1
        $(date1Selector).show()
        $(date2Selector).hide()
      
  # belt filter handler
  
  beltSubfilterHandler: () =>
    typeSelector = "#filter_sub_Belt_type"
    colorSelector = "#filter_sub_Belt_belt"
    
    $([typeSelector,colorSelector].join(",")).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
  # age filter handler
  
  ageSubfilterHandler: () =>
    typeSelector = "#filter_sub_Age_type"
    age1Selector = "#filter_sub_Age_age1"
    age2Selector = "#filter_sub_Age_age2"
    
    @$modalWindow.off("change.filter.age.type").on "change.filter.age.type", typeSelector, (e) =>
      if $(e.currentTarget).val() == "between"
        $(age2Selector).show()
      else
        $(age2Selector).hide()
        
    $(age2Selector).hide()
    
    $(typeSelector).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"
    
    $([age1Selector,age2Selector].join ",").spinner
      min: 0
      step: 1
      start: 100
      numberFormat: "C"
    
  # price filter handler
  
  priceSubfilterHandler: () =>
    typeSelector = "#filter_sub_Price_type"
    price1Selector = "#filter_sub_Price_price1"
    price2Selector = "#filter_sub_Price_price2"
    
    @$modalWindow.off("change.filter.price.type").on "change.filter.price.type", typeSelector, (e) =>
      if $(e.currentTarget).val() == "between"
        $(price2Selector).show()
      else
        $(price2Selector).hide()
        
    $(price2Selector).hide()
    
    $(typeSelector).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"
    
    $([price1Selector,price2Selector].join ",").spinner
      min: 0
      step: 1
      start: 100
      numberFormat: "C"
  
  # delete filter from list
  
  setupRemoveFilter: =>
    @$modalWindow.off("click.filter.removeFilter").on "click.filter.removeFilter", "a.removeFilter", (e) =>
      e.preventDefault()
      $group = $(e.currentTarget).parents ".control-group"
      filterName = $group.attr "data-filter-name"
      $("option[value='"+filterName+"']",@addFilterSelector).removeAttr("disabled").show()
      $group.remove()
      $(@addFilterSelector).val(null)
  
  setupUniform: =>
    $(":checkbox",@$modalWindow).uniform()
  
  # save filter needs to show div with filter name and pin to dashboard checkbox
  
  setupSaveFilterCheckbox: =>
    @$groupsToHide = $(@filterNameSelector+", "+@pinToDashboardSelector).closest(".control-group");
    @$groupsToHide.hide()
    @$modalWindow.off("click.filter.saveFilter").on "click.filter.saveFilter", @saveFilterSelector, @handleGroupsHide
    
  handleGroupsHide: (e) =>
    if $(@saveFilterSelector).is(":checked")
      @$groupsToHide.show()
    else
      @$groupsToHide.hide()
      
  # submission of the filter
    
  handleSaveButton: (e, setMode) =>
    @mode = if $(@saveFilterSelector).is(":checked") then @MODE_SAVE else @MODE_SET
    if setMode?
      @mode = setMode
    @setupAction()
#    if !@validateFilter()
#      return false
    super()
    
  handleSubmitSuccess: (response) =>
    if @mode == @MODE_UPDATE
      @handleSubmitError(response)
      return
      
    if $(@saveFilterSelector).is(":checked")
      @addFilterTab(response.data)
    else
      $("li",@filterTabsSelector).removeClass "active"
    datatable.fnReloadAjax() if datatable?
    super()
    
  handleSubmitError: (responseText) =>
    super(responseText)
    if $(@saveFilterSelector).is(":checked")
      @$groupsToHide = $(@filterNameSelector+", "+@pinToDashboardSelector).closest(".control-group");
      @$groupsToHide.hide()
    @setup()
  # validate filter
  
  validateFilter: () =>
    if $(@saveFilterSelector).is(":checked") and $(@filterNameSelector).val().length == 0
      controlGroup = $(@filterNameSelector).parents ".control-group"
      controlGroup.addClass "error"
      controlGroup.find(".help-block").text "Pole nie może być puste"
      return false
    return true
        
  # add filter tab when saved
        
  addFilterTab: (filter) =>
    $("li",@filterTabsSelector).removeClass "active"
    $templateElement = $("li.template",@filterTabsSelector)
    originalHref = $templateElement.find("a").attr "href"
    deleteHref = $templateElement.find("span.delete-filter").attr "data-href"
    href = originalHref.replace /__FILTERID__/g, filter.id
    deleteHref = deleteHref.replace /__FILTERID__/g, filter.id
    
    $newElement = $templateElement.clone()
    
    $newElement.removeClass("hidden")
    $newElement.removeClass("template")
    $newElement.addClass("active")
    
    $newElement.find("span.filterName").text filter.name
    $newElement.find("a").attr "href", href
    $newElement.find("span.delete-filter").attr "data-href", deleteHref
    
    $templateElement.before $newElement
