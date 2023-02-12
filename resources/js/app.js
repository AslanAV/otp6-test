import * as bootstrap from 'bootstrap';
import './bootstrap';

import '../sass/app.scss'
import ujs from '@rails/ujs';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
ujs.start();
