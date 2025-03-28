const tabTitle = document.querySelectorAll('.tab__title');
const tabContent = document.querySelectorAll('.tab__content');

tabTitle.forEach(item => item.addEventListener('click', event => {

    const tabsTitleTarget = event.target.getAttribute('data-tab');

    tabTitle.forEach(item => item.classList.remove('active-tab'));
    tabContent.forEach(item => item.classList.add('hidden-tab-content'));

    item.classList.add('active-tab');

    document.getElementById(tabsTitleTarget).classList.remove('hidden-tab-content');
}))

document.querySelector("[data-tab='tab-1']").classList.add('active-tab');
document.querySelector("#tab-1").classList.remove('hidden-tab-content');
