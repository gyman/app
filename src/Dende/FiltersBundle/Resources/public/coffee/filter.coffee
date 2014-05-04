class @Filter
  constructor: ()->
    @modal = window.modal
    @$modalWindow = @modal.getModal()
    @setupAddFilterSelect()
    @setupUniform()
    @setupSaveFilterCheckbox()
    @setupSubmitButton()
    @setupRemoveFilter()
    
  addFilterSelector: "#filter_addFilter"
  saveFilterSelector: "#filter_save"
  filterNameSelector: "#filter_name"
  pinToDashboardSelector: "#filter_pinned"
  filterFormSelector: "form#filterForm"
  $form: $("form#filterForm")
  useFilterButtonSelector: "#useFilter"
  filterTabsSelector: "ul#filterTabs"
  
  # addFilter dropdown

  setupAddFilterSelect: =>
    @$modalWindow.off("change.filter.addFilter").on "change.filter.addFilter", @addFilterSelector, (e) =>
      @modal.block()
      filterName = $(e.currentTarget).val()
      action = @$form.attr("data-get-filter-url").replace("__name__",filterName)
      $.get action, (result) =>
        $(@saveFilterSelector).parents(".control-group").before result
        $("input, textarea, select",@$form).filter("[name*=FILTERNAME]").each (index,element) =>
          newName = $(element).attr("name").replace /_FILTERNAME(?:_?)/g, "["+filterName+"]" 
          $(element).attr "name",newName
          oldId = $(element).attr("id")
          $label = $("label[for='"+oldId+"']")
          newId = oldId.replace /_FILTERNAME_/g, "_"+filterName+"_" 
          $(element).attr "id",newId
          $label.attr "for", newId
        $("option[value='"+filterName+"']",@addFilterSelector).attr("disabled",true).hide()
        $(@addFilterSelector).val(null)
        @[filterName+"SubfilterHandler"]()
        @modal.unblock()
        
        
  # search filter handler
        
  searchSubfilterHandler: () =>
        
  # current voucher filter handler
        
  currentVoucherSubfilterHandler: () =>
    $("#filter_subfilters_currentVoucher_currentVoucher").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  

  # checked in filter handler
        
  checkedInSubfilterHandler: () =>
    $("#filter_subfilters_checkedIn_checkedIn").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
  # member filter handler
        
  memberSubfilterHandler: () =>
    $("#filter_subfilters_member_member").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "200px"  
    
  # registrationDate filter handler
        
  registrationDateSubfilterHandler: () =>
    @handleVoucherDates("registrationDate")
  

  # activities filter handler
        
  activitiesSubfilterHandler: () =>
    activitySelector = "#filter_subfilters_activities_activity"
    
    $(activitySelector).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "400px"
    
    
  # starred filter handler
  
  starredSubfilterHandler: () =>
    $("#filter_subfilters_starred_starred").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
  # gender filter handler
  
  genderSubfilterHandler: () =>
    $("#filter_subfilters_gender_gender").select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
  
  entryDateSubfilterHandler: () =>
    @handleVoucherDates("entryDate")
  
  entryTypeSubfilterHandler: () =>
    typeSelector = "#filter_subfilters_entryType_type"
    entryTypeSelector = "#filter_subfilters_entryType_entryType"
    
    $([typeSelector,entryTypeSelector].join(",")).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
  # vouchers filter handlers
  
  voucherStartSubfilterHandler: () =>
    @handleVoucherDates("voucherStart")
    
  voucherEndSubfilterHandler: () =>
    @handleVoucherDates("voucherEnd")
                
  handleVoucherDates: (type) =>
    typeSelector = "#filter_subfilters_"+type+"_type"
    date1Selector = "#filter_subfilters_"+type+"_date1"
    date2Selector = "#filter_subfilters_"+type+"_date2"
    
    $(typeSelector).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
    $([date1Selector,date2Selector].join(",")).datetimepicker
      format: 'dd.mm.yyyy'
      minView: 0
      maxView: 1
      
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
    typeSelector = "#filter_subfilters_belt_type"
    colorSelector = "#filter_subfilters_belt_belt"
    
    $([typeSelector,colorSelector].join(",")).select2
      dropdownAutoWidth : true
      containerCss : 
        width : "120px"  
    
  # age filter handler
  
  ageSubfilterHandler: () =>
    typeSelector = "#filter_subfilters_age_type"
    age1Selector = "#filter_subfilters_age_age1"
    age2Selector = "#filter_subfilters_age_age2"
    
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
    typeSelector = "#filter_subfilters_price_type"
    price1Selector = "#filter_subfilters_price_price1"
    price2Selector = "#filter_subfilters_price_price2"
    
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
    $groupsToHide = $(@filterNameSelector+", "+@pinToDashboardSelector).parents(".control-group");
    
    $groupsToHide.hide()
    
    @$modalWindow.off("click.filter.saveFilter").on "click.filter.saveFilter", @saveFilterSelector, (e) =>
      if $(@saveFilterSelector).is(":checked")
        $groupsToHide.show()
      else
        $groupsToHide.hide()
        
  # submission of the filter
        
  setupSubmitButton: =>
    @$saveButton = $(@useFilterButtonSelector,@$modalWindow)
    @$saveButton.off("click.filter.saveButton").on "click.filter.saveButton", (e) =>
      e.preventDefault()
      
      if !@validateFilter()
        return false
        
      action = @$form.attr "action"
      data = @$form.serialize()
      @modal.block()

      $.ajax
        url: action
        data: data
        success: (response) =>
          if $(@saveFilterSelector).is(":checked")
            @addFilterTab(response.data)
          else
            $("li",@filterTabsSelector).removeClass "active"
          datatable.fnReloadAjax()
          @modal.hide()
        error: (xhr, textStatus, errorThrown) =>
          if xhr.status == 400
            @modal.setBody xhr.responseText
            if $(@saveFilterSelector).is(":checked")
              $(@filterNameSelector+", "+@pinToDashboardSelector).parents(".control-group").show()
          else if xhr.status == 500
            alert xhr.responseText
        complete: =>
          @modal.unblock()
        type: @$form.attr "method"
        
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