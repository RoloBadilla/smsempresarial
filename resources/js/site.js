// Comportamiento compartido por todas las páginas. Cada parte vive en su módulo de resources/js/modules/.

// Solo el "collapse" de Bootstrap (menú móvil y acordeón de FAQ), no el bundle completo.
import 'bootstrap/js/dist/collapse';

import { initTheme } from './modules/theme';
import { initNavigation } from './modules/navigation';
import { initLanguage } from './modules/language';
import { initForms } from './modules/forms';
import { initReveal } from './modules/reveal';
import { initReadingProgress } from './modules/reading-progress';

initTheme();
initNavigation();
initLanguage();
initForms();
initReveal();
initReadingProgress();
