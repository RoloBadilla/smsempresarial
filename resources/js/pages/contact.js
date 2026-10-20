// Contáctanos: teléfono con país, "¿Cómo te enteraste?" con opción "Otro" y reCAPTCHA v3.
import intlTelInput from 'intl-tel-input';
import es from 'intl-tel-input/i18n/es';
import 'intl-tel-input/styles';

(() => {
  const form = document.getElementById('contact-form');
  if (!form) return;

  const isEnglish = document.documentElement.lang === 'en';
  const text = (spanish, english) => (isEnglish ? english : spanish);

  // ----- Teléfono -----
  const phone = document.getElementById('telefono');
  const countryCode = document.getElementById('country_code');
  const phoneError = document.getElementById('telefono-error');
  const iti = intlTelInput(phone, {
    initialCountry: 'cr',
    countryOrder: ['cr', 'pa', 'ni', 'gt', 'sv', 'hn', 'us', 'mx'],
    separateDialCode: true,
    autoPlaceholder: 'aggressive',
    i18n: isEnglish ? {} : es,
    loadUtils: () => import('intl-tel-input/utils'),
  });

  // Si volvió con errores, se recupera el país que había elegido.
  const savedCode = countryCode.value;
  if (savedCode && savedCode !== '506') {
    const country = intlTelInput.getCountryData().find((item) => item.dialCode === savedCode);
    if (country) iti.setCountry(country.iso2);
  }

  const digits = (value) => value.normalize('NFKD').replace(/\D/g, '');

  // Mismas reglas que ContactRequest: Costa Rica 8 dígitos (2, 4, 5, 6, 7 u 8); otros países de 6 a 15.
  const phoneMessage = () => {
    const value = digits(phone.value);
    if (!value) return text('El teléfono es obligatorio.', 'Phone number is required.');
    if (iti.getSelectedCountryData().iso2 === 'cr') {
      return /^[245678]\d{7}$/.test(value)
        ? ''
        : text('El teléfono de Costa Rica debe tener 8 dígitos y empezar con 2, 4, 5, 6, 7 u 8.', 'Costa Rican numbers have 8 digits and start with 2, 4, 5, 6, 7 or 8.');
    }
    return value.length >= 6 && value.length <= 15 ? '' : text('Ingresa un teléfono válido.', 'Enter a valid phone number.');
  };

  const showPhoneError = (message) => {
    phone.classList.toggle('is-invalid', message !== '');
    phone.setAttribute('aria-invalid', String(message !== ''));
    phoneError.textContent = message;
  };

  const syncCountry = () => {
    countryCode.value = iti.getSelectedCountryData().dialCode || '506';
  };

  phone.setAttribute('aria-describedby', 'telefono-error');
  phone.addEventListener('countrychange', () => {
    syncCountry();
    if (phone.value) showPhoneError(phoneMessage());
  });
  phone.addEventListener('blur', () => {
    if (phone.value) showPhoneError(phoneMessage());
  });
  phone.addEventListener('input', () => {
    if (phone.classList.contains('is-invalid')) showPhoneError(phoneMessage());
  });
  syncCountry();

  // ----- "¿Cómo te enteraste de nosotros?" -----
  const medio = document.getElementById('medio');
  const otroGrupo = document.getElementById('otro-grupo');
  const otro = document.getElementById('otro');

  if (medio && otroGrupo) {
    // Campañas de Facebook o Instagram: ?utm_source=facebook&utm_campaign=<medio> lo deja elegido.
    const params = new URLSearchParams(window.location.search);
    const source = (params.get('utm_source') || '').toLowerCase();
    const campaign = (params.get('utm_campaign') || '').toLowerCase();
    if (!medio.value && campaign && ['facebook', 'instagram'].includes(source)) {
      const option = [...medio.options].find((item) => item.value.toLowerCase() === campaign);
      if (option) medio.value = option.value;
    }

    const toggleOtro = () => {
      const isOtro = medio.value === 'Otro';
      otroGrupo.hidden = !isOtro;
      otro.required = isOtro;
      if (!isOtro) otro.value = '';
    };
    medio.addEventListener('change', toggleOtro);
    toggleOtro();
  }

  // ----- reCAPTCHA v3 -----
  const recaptchaKey = form.dataset.recaptchaKey;
  if (recaptchaKey) {
    const script = document.createElement('script');
    script.src = `https://www.google.com/recaptcha/api.js?render=${encodeURIComponent(recaptchaKey)}`;
    script.async = true;
    document.head.append(script);
  }

  const button = form.querySelector('[type="submit"]');
  const buttonHtml = button.innerHTML;
  const resetButton = () => {
    button.classList.remove('is-loading');
    button.removeAttribute('aria-busy');
    button.innerHTML = buttonHtml;
  };

  // En captura para ir antes que site.js: si el teléfono está mal no se muestra "Enviando…".
  form.addEventListener('submit', (event) => {
    const message = phoneMessage();
    if (message) {
      event.preventDefault();
      event.stopImmediatePropagation();
      showPhoneError(message);
      phone.focus();
      return;
    }

    // Se envía solo el número nacional; el código de país va aparte.
    syncCountry();
    const full = iti.getNumber();
    const prefix = `+${countryCode.value}`;
    if (full.startsWith(prefix)) phone.value = full.slice(prefix.length);

    if (!recaptchaKey) return;
    event.preventDefault();

    if (!window.grecaptcha) {
      event.stopImmediatePropagation();
      window.alert(text('No se pudo cargar la verificación. Revisa tu conexión e intenta de nuevo.', 'Verification could not load. Check your connection and try again.'));
      return;
    }

    window.grecaptcha.ready(() => {
      window.grecaptcha.execute(recaptchaKey, { action: 'contacto' }).then((token) => {
        form.elements.recaptcha_token.value = token;
        form.submit();
      }, resetButton);
    });
  }, { capture: true });
})();
