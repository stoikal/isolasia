jQuery('#side-drawer-trigger')
  .click(() => {
    jQuery('#side-drawer-overlay').removeClass('invisible')
    jQuery('#side-drawer').removeClass('-translate-x-full')
  })

jQuery('#side-drawer-overlay')
  .click(() => {
    jQuery('#side-drawer-overlay').addClass('invisible')
    jQuery('#side-drawer').addClass('-translate-x-full')
  })

jQuery('.search-form-trigger')
  .click(() => {
    jQuery('.search-form-overlay').removeClass('hidden')
  })

jQuery('.search-form-close-btn')
  .click(() => {
    jQuery('.search-form-overlay').addClass('hidden')
  })