// SIDE NAVIGATION DRAWER

jQuery('.side-drawer-trigger')
  .click(() => {
    jQuery('#side-drawer-overlay').removeClass('invisible')
    jQuery('#side-drawer').removeClass('-translate-x-full')
  })

jQuery('#side-drawer-overlay')
  .click(() => {
    jQuery('#side-drawer-overlay').addClass('invisible')
    jQuery('#side-drawer').addClass('-translate-x-full')
  })


// SEARCH FORM

function closeSearchForm () {
  jQuery('.search-form-overlay').addClass('hidden')
}

function handleKeyDown (e) {
  if (e.key === "Escape") {
    closeSearchForm()
  }
}

jQuery('.search-form-trigger')
  .click(() => {
    jQuery('.search-form-overlay').removeClass('hidden')
    jQuery('#search-input')?.select()
    jQuery(document).keydown(handleKeyDown);
  })

jQuery('.search-form-close-btn')
  .click(() => {
    closeSearchForm()
    jQuery(document).unbind('keydown', handleKeyDown);
  })


// DARK MODE IMPLEMENTATION

class ThemeStorage {
  constructor (options = {}) {
    const {
      key = 'theme'
    } = options

    this.key = key
    this.callbacks = []
  }

  get value () {
    const theme = JSON.parse(localStorage.getItem(this.key)) ?? {}
    return theme
  }

  set value (newValue) {
    const theme = JSON.stringify(newValue)
    localStorage.setItem(this.key, theme)

    this.callbacks.forEach((cb) => {
      cb(newValue)
    })
  }

  merge (props) {
    this.value = {
      ...this.value,
      ...props
    }
  }
  
  onChange (cb) {
    this.callbacks.push(cb)
  }
}

class DarkMode {
  constructor (toggleElClass, themeStorage) {
    this.toggles = document.querySelectorAll('.' + toggleElClass)
    this.html = document.querySelector('html')
    this.themeStorage = themeStorage
  }

  setDark () {
    this.html.classList.add('dark')
    this.toggles.forEach(element => {
      element.checked = true
    })
  }

  setLight () {
    this.html.classList.remove('dark')
    this.toggles.forEach(element => {
      element.checked = false
    })
  }

 
  init () {
    this.themeStorage.onChange((value) => {
        const { isDark } = value

        if (isDark) {
          this.setDark()
        } else {
          this.setLight()
        }
      }
    )

    this.toggles.forEach(element => {
      element.addEventListener('click', (e) => {
        const isChecked = e.target.checked
        this.themeStorage.merge({ isDark: isChecked })
      })
    })

    const { isDark } = this.themeStorage.value

    if (isDark) {
      this.setDark()
    } else {
      this.setLight()
    }
  }
}

const themeStorage = new ThemeStorage({ key: 'theme' })
const darkMode = new DarkMode('isolasia_dark-mode-toggle-input', themeStorage)

darkMode.init()
