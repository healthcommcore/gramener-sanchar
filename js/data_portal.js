/* global helpers_get_, notyfication_, convertToSlug */
/* exported indicator_data */
let indicator_data, url
url = g1.url.parse(location.href)

let figure_charts = [{img_name: 'map', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=india_map&qid=instel_del&dataset=BR", header_name:"Institutional births", header_desc: "State-wise Institutional births performance in India", caption:"Map"}, {img_name: 'tree_map', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=tree_map&qid=ch_bcg&dataset=BR", header_name:"Children age 12-23 months who have received BCG (%)", header_desc: "State-wise Children age 12-23 months who have received BCG (%) performance in India", caption:"Tree Chart"}, {img_name: 'bar_chart', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=bar_chart&qid=m17&dataset=BR&state=2&rotate=yes", header_name:"Births delivered by caesarean section", header_desc: "State-wise Births delivered by caesarean section performance in Andhra Pradesh", caption:"Bar Chart"}, {img_name: 'stack_bar_chart', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=stack_bar_chart&qid=ANC_4v&dataset=IR&rotate=yes", header_name:"At least 4 ANC visits", header_desc: "State-wise At least 4 ANC visits performance in India", caption:"Stack Bar Chart"}, {img_name: 'spine_chart', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=spine_chart&qid=FP_any&dataset=IR&rotate=yes", header_name:"% using any method", header_desc: "State-wise % using any method performance in India", caption:"Spine Chart"}, {img_name: 'group_bar_chart', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=group_bar_chart&qid=stunted&dataset=KR&rotate=no", header_name:"Children under 5 years who are stunted (height-for-age) (%)", header_desc: "State-wise Children under 5 years who are stunted (height-for-age) (%) performance in India", caption:"Group Bar Chart"}, {img_name: 'group_stack_bar', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=group_stack_chart&qid=ch_dpt&dataset=BR&rotate=no&v025=1&v025=2&v013=1&v013=2&v013=3", header_name:"Children age 12-23 months who have received 3 doses of DPT vaccine (%)", header_desc: "State-wise % Children age 12-23 months who have received 3 doses of DPT vaccine (%) in rural and urban sector with age bin 15-19, 20-24, 25-29 performance in India", caption:"Group Stack Bar Chart"}, {img_name: 'heat_map', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=heatmap_chart&qid=Public_delivery&dataset=BR&rotate=no", header_name:"Institutional births in public facility", header_desc: "State-wise % Institutional births in public facility performance in India", caption:"Heat Map Chart"}, {img_name: 'lollipop_chart', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=lollipop_chart&qid=mar_fs&dataset=IR&rotate=no", header_name:"% used female sterilization", header_desc: "State-wise % used female sterilization performance in India", caption:"lollipop Chart"}, {img_name: 'waffle_chart', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=waffle_chart&qid=d_zinc&dataset=BR&rotate=no", header_name:"Children with diarrhoea in the last 2 weeks who received zinc (%)", header_desc: "State-wise Children with diarrhoea in the last 2 weeks who received zinc (%) performance in India", caption:"Waffle Chart"}, {img_name: 'scatter_plot', link:"https://projectsanchar.org/odp/?program_area=all&tab=chart&chart=scatter_plot&qid=ch_dpt&dataset=BR&rotate=no&v025=1&v025=2&v013=1&v013=2", header_name:"Children age 12-23 months who have received 3 doses of DPT vaccine (%)", header_desc: "State-wise Children age 12-23 months who have received 3 doses of DPT vaccine (%) performance with rural and urban selected and age 15-19, 20-24 selected in India", caption:"Scatter Chart"}
]

$('.figures_charts').template({data: figure_charts})

helpers_get_('indicator_names')
  .then(function (data) {
    indicator_data = (typeof data === 'object') ? data : JSON.parse(data)
    $('.health_themes_cls').template({ data: indicator_data })
    render_sanchar_briefs_template()
    if (url.searchKey.view === 'health' && url.searchKey.area){
      $('.health-themes-inner').click()
      $("#v-pills-health-tab").addClass("active")
      render_heath_themes_inner()
    }
    else{
      $('#v-pills-' + (url.searchKey.view || 'viz') + '-tab').click()
    }
  })
  .catch(function (err) {
    notyfication_('error', err)
  })

function render_sanchar_briefs_template() {
  let _data = _.sortBy(indicator_data, 'Variable Name')
  if (url.searchKey.sort === 'z-a') {
    _data = _data.reverse()
  }
  $('.sanchar_briefs_cls').template({ data: _data })
}

function download_data(indicator, dataset, variablename, format) {
	console.log(indicator_data);
 // let selected_indicator_data = _.filter(indicator_data, function (d) { return d.QID === indicator })
	let selected_indicator_data_name = variablename;
  let cuts = {
    v024: '',
    sdistri: '',
  }
  let params = {
    'indicator:_by': [indicator].concat(_.keys(cuts)),
    'indicator:_c': [indicator, indicator + '|count'].concat(_.keys(cuts))
  }
  Object.assign(params, cuts)
  let download_url = 'https://projectsanchar.org/download?table=' + dataset.toLowerCase() + "_dataset&" + $.param(params, true)
    + '&defs:_c=Value&defs:_c=Definition&defs:_c=QID&defs:QID=' + indicator
    + '&cuts:_c=value_label&cuts:_c=value&cuts:_c=cut_label&cuts:_c=cut_name&' + $.param({ cut_label: _.keys(cuts) }, true)
    + '&mapping:_c=ind_name&mapping:_c=qid&mapping:qid=' + indicator + "&format=" + format
    if (format == 'table') {
    helpers_get_(download_url).then(function (response) {
    	console.log(response);
    	console.log("TEST");
      response = (typeof response === 'object') ? response : JSON.parse(response)
      let new_data = []
      _.each(response, function (each_dict) {
        let _tmp_dict = {}
        _.each(each_dict, function (value, key) {
          if (convertToSlug(key) === convertToSlug(selected_indicator_data_name.trim()))
            _tmp_dict[indicator] = _.startCase(value)
          else
            _tmp_dict[key] = _.startCase(value)
        })
        new_data.push(_tmp_dict)
      })
      $("#health_data_view_modal").modal()
      $("#health_data_view_modal_title").html(selected_indicator_data_name + " (" + indicator + ")")
      $('.map-formhandler-table').formhandler({
        data: new_data,
        pageSize: 10,
        count: false,
        export: false,
        columns: [
          { name: '*', link: false }
        ]
      })
    })
  } else if (format == 'csv') {
    download_url = download_url + '&_format=csv'
    location.href = download_url
  }
  $(".min-vh-90").removeClass('d-none')
  $("#loading").addClass('d-none')
}

function render_heath_themes_inner(){
  let area_name = url.searchKey.area
  let _data = _.sortBy(indicator_data, 'Variable Name')
  if (url.searchKey.sort === 'z-a')
    _data = _data.reverse()
  $('.health_themes_inner_cls').on('template', function () {
    $('.health_theme_indicators_cls').removeClass('d-none')
    $('.selectpicker').selectpicker('refresh')
    $('.top-header .selectpicker').selectpicker('val', url.searchKey.sort)
  }).template({ data: _data, selected_area: area_name })
}

function url_update(uri) {
  var _url = g1.url.parse(location.href).update(uri)
  history.pushState({}, '', _url.toString())
  url = g1.url.parse(location.href)
}
$('body')
  .ready(function () {
    $('body').search()
  })
  .on('click', '.selected_program', function () {
    let area_name = $(this).attr('data-area-name')
    $('.health-themes-inner').click()
    $("#v-pills-health-tab").addClass("active")
    url_update({ area: area_name })
    render_heath_themes_inner()
  })
  .on("click", ".download-data", function () {
    let qid = $(this).attr('data-qid')
    let dataset = $(this).attr('data-datset')
     let variablename = $(this).attr('data-variablename');
    download_data(qid, dataset, variablename, 'csv')
  })
  .on("click", ".view-data", function () {
    let qid = $(this).attr('data-qid')
    let dataset = $(this).attr('data-datset')
    let variablename = $(this).attr('data-variablename');
    $('.modal_template').template()
    download_data(qid, dataset,variablename, 'table')
  })
  .on("click", ".left-panel .nav-links", function (e) {
	  e.preventDefault();
   /* $('.left-panel .nav-link').removeClass('active')
    var data_tab = $(this).data("tab")
    $(this).addClass("active");*/
   // $('.left-panel .nav-link[tab="'+data_tab+'"]').addClass('active')
   // if (data_tab == 'health-inner') return
    /*url.update({'area': url.searchList.area || [], sort: url.searchList.sort || []}, 'del')
    history.pushState({}, '', url.toString())
    url_update({ view: data_tab })*/
  })
  .on('change', '#v-pills-briefs select', function () {
    url_update({ sort: $(this).val() })
    render_sanchar_briefs_template()
  })
  .on('change', '#v-pills-health-inner select', function () {
    url_update({ sort: $(this).val() })
    render_heath_themes_inner()
  })
  .on("click", ".back-to-health-themes", function(){
    $('#v-pills-health-tab').click()
    url.update({'area': url.searchList.area || [], sort: url.searchList.sort || []}, 'del')
    history.pushState({}, '', url.toString())
    url_update({ view: 'health' })
  })
  .on("keyup", "input[type='search']", function(){
    let data_search = $(this).attr('data-search-name')
    setTimeout(function(){
      if (data_search === 'heath_themes_search'){
        if($('.each_category').length === $('.each_category.d-none').length){
          $('.no-health-data-available').removeClass('d-none')
          $('.search_heath_row').addClass('d-none')
        }else{
          $('.no-health-data-available').addClass('d-none')
          $('.search_heath_row').removeClass('d-none')
        }
      }else if (data_search === 'sanchar_briefs_search'){
        if($('.sanchar_briefs .data-card').length === $('.sanchar_briefs .data-card.d-none').length){
          $('.no-sanchar-data-available').removeClass('d-none')
          $('.search_sanchar_row').addClass('d-none')
        }else{
          $('.no-sanchar-data-available').addClass('d-none')
          $('.search_sanchar_row').removeClass('d-none')
        }
      }
    }, 100)
  })