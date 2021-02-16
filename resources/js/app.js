import * as Turbo from '@hotwired/turbo';

import('./bootstrap');
import('./elements/turbo-echo-stream-tag');
window.Turbolinks = Turbo
window.Turbolinks.supported = true;
turbolinks.start();
