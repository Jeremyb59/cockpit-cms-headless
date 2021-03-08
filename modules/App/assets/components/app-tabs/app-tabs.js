customElements.define('app-tabs', class extends HTMLElement {

    static get observedAttributes() {
        return [];
    }

    constructor() {
        super();
    }

    connectedCallback() {

        this.activeIndex = Number(this.getAttribute('index') || 0);

        this.nav = document.createElement("ul");

        this.nav.classList.add('app-tabs-nav');
        this.prepend(this.nav);

        this.render();

        this.addEventListener('click', e => {
            if (!e.target.classList.contains('app-tabs-nav-link')) return;
            this.setIndex(e.target.getAttribute('index'));
            e.preventDefault();
        })
    }

    attributeChangedCallback(oldvalue, newvalue) {
        if (oldvalue != newvalue) this.render();
    }

    setIndex(index) {

        this.activeIndex = Number(index);

        this.tabs.forEach((tab, idx) => {

            this.nav.children[idx].setAttribute('active', this.activeIndex == idx ? 'true' : 'false');
            tab.setAttribute('active', this.activeIndex == idx ? 'true' : 'false');
        })
    }

    render() {

        this.tabs = [];

        this.nav.innerHTML = '';

        let item, isActive;

        for (let i = 0; i < this.children.length; i++) {

            if (this.children[i].tagName.toLowerCase() == 'tab') {

                item = document.createElement("li");
                item.innerHTML = `<a class="app-tabs-nav-link" index="${this.tabs.length}">${this.children[i].getAttribute('title') || 'Tab'}</a>`
                this.nav.append(item);

                this.tabs.push(this.children[i]);

                this.children[i].setAttribute('active', 'false');
                item.setAttribute('active', 'false');
            }
        }

        this.setIndex(this.activeIndex);
    }
})