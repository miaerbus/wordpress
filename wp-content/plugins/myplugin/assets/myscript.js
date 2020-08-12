window.addEventListener('load', function () {
  // store tabs variables
  const tabs = document.querySelectorAll('ul.nav-tabs > li')

  tabs.forEach((el) => {
    el.addEventListener('click', switchTab)
  })

  function switchTab(event) {
    event.preventDefault()

    document.querySelector('ul.nav-tabs > li.active').classList.remove('active')
    document.querySelector('.tab-pane.active').classList.remove('active')

    let clickedTab = event.currentTarget
    let anchor = event.target
    let activePaneID = anchor.getAttribute('href')

    clickedTab.classList.add('active')
    document.querySelector(activePaneID).classList.add('active')
  }
})
