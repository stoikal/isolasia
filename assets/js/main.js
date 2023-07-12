// SIDE NAVIGATION DRAWER

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


// SEACH FORM

jQuery('.search-form-trigger')
  .click(() => {
    jQuery('.search-form-overlay').removeClass('hidden')
  })

jQuery('.search-form-close-btn')
  .click(() => {
    jQuery('.search-form-overlay').addClass('hidden')
  })


// DARK MODE IMPLEMENTATION

class ThemeStorage {
  constructor (options = {}) {
    const {
      key = 'theme',
      onChange = () => {}
    } = options

    this.key = key
    this.onChange = onChange
  }

  get value () {
    const theme = JSON.parse(localStorage.getItem(this.key)) ?? {}
    return theme
  }

  set value (newValue) {
    const theme = JSON.stringify(newValue)
    localStorage.setItem(this.key, theme)

    this.onChange(newValue)
  }

  merge (props) {
    this.value = {
      ...this.value,
      ...props
    }
  }
}

class DarkMode {
  constructor (toggleElClass) {
    this.toggles = document.querySelectorAll('.' + toggleElClass)
    this.html = document.querySelector('html')
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
    this.theme = new ThemeStorage({
      onChange: (value) => {
        const { isDark } = value

        if (isDark) {
          this.setDark()
        } else {
          this.setLight()
        }
      }
    })

    this.toggles.forEach(element => {
      element.addEventListener('click', (e) => {
        const isChecked = e.target.checked
        this.theme.merge({ isDark: isChecked })
      })
    })

    const { isDark } = this.theme.value

    if (isDark) {
      this.setDark()
    } else {
      this.setLight()
    }
  }
}

const darkMode = new DarkMode('isolasia_dark-mode-toggle-input')

darkMode.init()