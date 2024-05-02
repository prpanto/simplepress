import './bootstrap';

Alpine.store('sidebar', {
  open: false,
})

Alpine.data('combobox', () => ({
  data: { 
    au: 'Australia',
    be: 'Belgium',
    cn: 'China',
    fr: 'France',
    de: 'Germany',
    it: 'Italy',
    mx: 'Mexico',
    es: 'Spain',
    tr: 'Turkey',
    gb: 'United Kingdom',
    us: 'United States'
  },
  emptyOptionsMessage: 'No results match your search.',
  name: 'country',
  placeholder: 'Select an option.',
  focusedOptionIndex: null,
  open: false,
  options: {},
  search: '',
  value: null,

  init() {
    this.options = this.data
    if (!(this.value in this.options)) this.value = null
    this.$watch('search', ((value) => {
      if (!this.open || !value) return this.options = this.data
      this.options = Object.keys(this.data)
        .filter((key) => this.data[key].toLowerCase().includes(value.toLowerCase()))
        .reduce((options, key) => {
        options[key] = this.data[key]
        return options
      }, {})
    }))
  },
  closeListbox() {
    this.open = false
    this.focusedOptionIndex = null
    this.search = ''
  },
  focusNextOption() {
    if (this.focusedOptionIndex === null) return this.focusedOptionIndex = Object.keys(this.options).length - 1
    if (this.focusedOptionIndex + 1 >= Object.keys(this.options).length) return
    this.focusedOptionIndex++
    this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
      block: "center",
    })
  },
  focusPreviousOption() {
    if (this.focusedOptionIndex === null) return this.focusedOptionIndex = 0
    if (this.focusedOptionIndex <= 0) return
    this.focusedOptionIndex--
    this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
      block: "center",
    })
  },
  selectOption() {
    if (!this.open) return this.toggleListboxVisibility()
    this.value = Object.keys(this.options)[this.focusedOptionIndex]
    this.closeListbox()
  },
  toggleListboxVisibility() {
    if (this.open) return this.closeListbox()
    this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)
    if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0
    this.open = true
    this.$nextTick(() => {
      this.$refs.search.focus()
      this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
        block: "center"
      })
    })
  }
}))

Alpine.data('combobox2', ({ data }) => ({
  data: data,
  name: 'combobox',
  placeholder: 'Select an option.',
  focusedOptionIndex: null,
  open: false,
  options: {},
  value: null,

  init() {
    this.options = this.data.data

    if (!(this.value in this.options)) this.value = null
  },
  closeListbox() {
    this.open = false
    this.focusedOptionIndex = null
    this.search = ''
  },
  selectOption() {
    if (!this.open) return this.toggleListboxVisibility()

    this.value = Object.keys(this.options)[this.focusedOptionIndex]
    this.closeListbox()
  },
  toggleListboxVisibility() {
    if (this.open) return this.closeListbox()
    
    this.focusedOptionIndex = Object.keys(this.options).indexOf(this.value)
    
    if (this.focusedOptionIndex < 0) this.focusedOptionIndex = 0
    
    this.open = true

    this.$nextTick(() => {
      this.$refs.listbox.children[this.focusedOptionIndex].scrollIntoView({
        block: "center"
      })
    })
  }
}))

Alpine.data('listbox', () => ({
  open: false,
}))
