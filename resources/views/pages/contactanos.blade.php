@extends('layouts.app', [
    'pageKey' => 'contactanos',
    'footerVariant' => 'contactanos',
    'title' => 'Contáctanos | SMS Empresarial Costa Rica',
    'description' => 'Contacta a SMS Empresarial para recibir asesoría sobre SMS masivos, WhatsApp Business, tarifas e integración de mensajería.',
    'breadcrumb' => 'Contáctanos',
])

@section('content')
    <main id="contenido" class="main">
        <header class="contact-hero page-hero">
            <div class="container">
                <x-breadcrumbs current="Contáctanos" />
                <span class="pill mb-3">Estamos para ayudarte</span>
                <h1 class="mb-3">Hablemos de tu próximo mensaje.</h1>
                <p class="mb-0">Cuéntanos qué necesitas comunicar. Te orientamos sobre SMS, WhatsApp Business, tarifas,
                    SINPE Móvil e integración con tus sistemas, y te atendemos 24/7.</p>
            </div>
        </header>

        <section class="container contact-wrap" id="contacto">
            <div class="card-panel p-3 p-md-4 p-lg-5">
                <div class="row g-4 g-lg-5">
                    <div class="col-lg-7">
                        <span class="eyebrow">Escríbenos</span>
                        <h2 class="title mt-2 mb-2">¿Cómo podemos ayudarte?</h2>
                        <div class="form-intro mb-4">
                            <p class="copy mb-0">Completa tus datos y un asesor te contactará.</p>
                            <p class="nota-obligatorios mb-0"><span class="nota-obligatorios-icono" aria-hidden="true">*</span>Campos obligatorios</p>
                        </div>

                        @if (session('contact_sent'))
                            <div class="alert alert-success" role="status">
                                <strong>¡Gracias! Recibimos tu mensaje.</strong> Un asesor te contactará pronto.
                            </div>
                        @endif
                        @if (session('contact_error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>No pudimos enviar tu mensaje.</strong> Intenta de nuevo o escríbenos a
                                <a href="mailto:info@cyberfuel.com">info@cyberfuel.com</a>.
                            </div>
                        @endif

                        <form
                            id="contact-form"
                            method="post"
                            action="{{ route('contact.submit') }}"
                            data-loading-text="Enviando…"
                            data-loading-text-en="Sending…"
                            @if ($recaptchaKey) data-recaptcha-key="{{ $recaptchaKey }}" @endif
                        >
                            @csrf
                            <input type="hidden" name="recaptcha_token" value="">

                            @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <strong>Por favor revisa los campos indicados:</strong>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label" for="nombre">Nombre <span class="campo-obligatorio" aria-hidden="true">*</span></label>
                                    <input class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre"
                                        value="{{ old('nombre') }}" autocomplete="name" maxlength="120" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="empresa">Empresa</label>
                                    <input class="form-control @error('empresa') is-invalid @enderror" id="empresa" name="empresa"
                                        value="{{ old('empresa') }}" autocomplete="organization" maxlength="160">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="correo">Correo electrónico <span class="campo-obligatorio" aria-hidden="true">*</span></label>
                                    <input class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo"
                                        type="email" value="{{ old('correo') }}" autocomplete="email" maxlength="255" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="telefono">Teléfono <span class="campo-obligatorio" aria-hidden="true">*</span></label>
                                    <input type="hidden" id="country_code" name="country_code" value="{{ old('country_code', '506') }}">
                                    <input class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono"
                                        type="tel" value="{{ old('telefono') }}" autocomplete="tel-national" inputmode="tel" required>
                                    {{-- Sin espacios adentro: el CSS solo muestra esta caja si no está vacía (:empty). --}}
                                    <div class="invalid-feedback" id="telefono-error">@error('telefono'){{ $message }}@enderror</div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="tema">¿Sobre qué quieres conversar?</label>
                                    <select class="form-select @error('tema') is-invalid @enderror" id="tema" name="tema">
                                        @foreach ($temas as $tema)
                                            <option value="{{ $tema }}" @selected(old('tema') === $tema)>{{ $tema }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($medios)
                                    <div class="col-md-6">
                                        <label class="form-label" for="medio">¿Cómo te enteraste de nosotros? <span class="campo-opcional">(opcional)</span></label>
                                        <select class="form-select @error('medio') is-invalid @enderror" id="medio" name="medio">
                                            <option value="">Selecciona una opción</option>
                                            @foreach ($medios as $medio)
                                                <option value="{{ $medio }}" @selected(old('medio') === $medio)>{{ $medio }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12" id="otro-grupo" @if (old('medio') !== 'Otro') hidden @endif>
                                        <label class="form-label" for="otro">¿Cuál otro?</label>
                                        <input class="form-control @error('otro') is-invalid @enderror" id="otro" name="otro"
                                            value="{{ old('otro') }}" maxlength="120">
                                    </div>
                                @endif

                                <div class="col-12">
                                    <label class="form-label" for="mensaje">Mensaje <span class="campo-obligatorio" aria-hidden="true">*</span></label>
                                    <textarea class="form-control @error('mensaje') is-invalid @enderror" id="mensaje" name="mensaje" rows="5"
                                        maxlength="5000" required placeholder="Cuéntanos un poco sobre lo que necesitas…">{{ old('mensaje') }}</textarea>
                                </div>
                                <div class="col-12 d-flex flex-column flex-sm-row align-items-sm-center gap-3">
                                    <button class="btn btn-brand" type="submit">Enviar mensaje <span aria-hidden="true">→</span></button>
                                    @if ($recaptchaKey)
                                        <span class="small text-secondary recaptcha-aviso">Protegido por reCAPTCHA. Aplican la
                                            <a href="https://policies.google.com/privacy" target="_blank" rel="noopener noreferrer">Privacidad</a>
                                            y los <a href="https://policies.google.com/terms" target="_blank" rel="noopener noreferrer">Términos</a>
                                            de Google.</span>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>

                    <aside class="col-lg-5">
                        <div class="row g-3">
                            <div class="col-12">
                                <article class="contact-item">
                                    <div class="contact-icon mb-3" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <path d="m3 7 9 6 9-6" />
                                    </svg></div>
                                    <h3>Correo electrónico</h3>
                                    <p class="mb-1">Escríbenos y te ayudaremos con tu consulta.</p>
                                    <a href="mailto:info@cyberfuel.com">info@cyberfuel.com</a>
                                </article>
                            </div>
                            <div class="col-12">
                                <article class="contact-item">
                                    <div class="contact-icon mb-3" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                        <path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2Z" />
                                    </svg></div>
                                    <h3>Llámanos o escríbenos</h3>
                                    <p class="mb-1">Atención por teléfono y WhatsApp.</p>
                                    <a href="tel:+50622049494">+506 2204 9494</a>
                                    <a href="https://api.whatsapp.com/send?phone=50622049494" target="_blank" rel="noopener noreferrer">Abrir WhatsApp</a>
                                </article>
                            </div>
                            <div class="col-12">
                                <article class="contact-item">
                                    <div class="contact-icon mb-3" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false">
                                        <path d="M12 21s7-6.2 7-12a7 7 0 0 0-14 0c0 5.8 7 12 7 12Z" />
                                        <circle cx="12" cy="9" r="2.5" />
                                    </svg></div>
                                    <h3>Visítanos</h3>
                                    <p class="mb-0">Edificio E, Forum 1<br>Santa Ana, San José, Costa Rica</p>
                                </article>
                            </div>
                        </div>
                        <p class="note mt-3 mb-0">Tus datos se usan solo para responder tu consulta. Si prefieres, también
                            puedes escribirnos directamente por correo o WhatsApp.</p>
                    </aside>
                </div>
            </div>
        </section>

        <x-cta-panel
            section-class="pt-5"
            kicker="¿Ya tienes todo listo?"
            title="Empieza a comunicarte"
            text="Conoce las opciones para enviar mensajes a tus clientes."
            :href="route('tarifas')"
            label="Ver tarifas"
        />
    </main>
@endsection
