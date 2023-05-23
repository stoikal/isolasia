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