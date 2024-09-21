import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
import InputText from 'primevue/inputtext';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import Layout from './Layouts/Layout.vue';
import FloatLabel from 'primevue/floatlabel';
import InputTextarea from 'primevue/inputtext';
import Listbox  from 'primevue/listbox';
import DataTable from 'primevue/datatable';
import InputNumber from 'primevue/inputnumber';
import Button from 'primevue/button';
import MultiSelect from 'primevue/multiselect';
import { createPinia, PiniaVuePlugin } from 'pinia';
import FileUpload from 'primevue/fileupload'; 

const pinia = createPinia();

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`];
    page.default.layout = page.default.layout || Layout;
    return page;
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin,ZiggyVue,pinia)
      .use(PrimeVue, {
        theme: {
            preset: Aura
        }
        })
        .component('DataTable',DataTable)
        .component('FileUpload',FileUpload)
        .component('InputNumber',InputNumber)
        .component('Button',Button)
        .component('MultiSelect',MultiSelect)
        .component('InputTextarea',InputTextarea)
        .component('Listbox',Listbox)
        .component('FloatLabel',FloatLabel)
        .component('InputText',InputText)
      .mount(el)
  },
})
