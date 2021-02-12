import * as Turbo from '@hotwired/turbo';

import('./bootstrap');
import('./elements/turbo-echo-stream-tag');
window._turbo = Turbo;

_turbo.start();
