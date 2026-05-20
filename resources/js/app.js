import '../css/app.css';
import './bootstrap';

const supportedLanguages = ['id', 'en'];
const storageKey = 'rk_lang';

const syncLanguage = () => {
    const currentUrl = new URL(window.location.href);
    const queryLanguage = currentUrl.searchParams.get('lang');
    const storedLanguage = window.localStorage.getItem(storageKey);
    const modal = document.querySelector('[data-language-modal]');
    const applyLanguage = (language) => {
        if (!supportedLanguages.includes(language)) {
            return;
        }

        const currentLanguage = currentUrl.searchParams.get('lang') || document.body.dataset.currentLang;

        if (currentLanguage === language) {
            if (modal) {
                modal.hidden = true;
            }

            return;
        }

        window.localStorage.setItem(storageKey, language);
        currentUrl.searchParams.set('lang', language);

        document.documentElement.classList.add('language-is-switching');

        const navigate = () => window.location.assign(currentUrl.toString());

        if (document.startViewTransition) {
            document.startViewTransition(navigate);
            return;
        }

        window.setTimeout(navigate, 120);
    };

    document.querySelectorAll('[data-language-option]').forEach((button) => {
        button.addEventListener('click', () => applyLanguage(button.dataset.languageOption || 'id'));
    });

    if (supportedLanguages.includes(queryLanguage || '')) {
        window.localStorage.setItem(storageKey, queryLanguage);
        return;
    }

    if (supportedLanguages.includes(storedLanguage || '')) {
        currentUrl.searchParams.set('lang', storedLanguage);
        window.location.replace(currentUrl.toString());
        return;
    }

    if (modal) {
        modal.hidden = false;
    }
};

const setupMobileNav = () => {
    const nav = document.querySelector('[data-mobile-nav]');
    const toggleButton = document.querySelector('[data-mobile-nav-toggle]');
    const menu = document.querySelector('[data-mobile-nav-menu]');

    if (!nav || !toggleButton || !menu) {
        return;
    }

    const closeMenu = () => {
        nav.classList.remove('is-open');
        toggleButton.setAttribute('aria-expanded', 'false');
    };

    const openMenu = () => {
        nav.classList.add('is-open');
        toggleButton.setAttribute('aria-expanded', 'true');
    };

    toggleButton.addEventListener('click', () => {
        if (nav.classList.contains('is-open')) {
            closeMenu();
            return;
        }

        openMenu();
    });

    menu.querySelectorAll('a').forEach((link) => {
        link.addEventListener('click', closeMenu);
    });

    document.addEventListener('click', (event) => {
        if (window.innerWidth >= 768) {
            return;
        }

        if (nav.contains(event.target)) {
            return;
        }

        closeMenu();
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeMenu();
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768) {
            closeMenu();
        }
    });
};

const getPrototypeText = (id, en) => {
    const lang = document.body?.dataset?.currentLang === 'en' ? 'en' : 'id';
    return lang === 'en' ? en : id;
};

const ensureToastRoot = () => {
    let root = document.querySelector('[data-prototype-toast-root]');

    if (!root) {
        root = document.createElement('div');
        root.className = 'prototype-toast-root';
        root.setAttribute('data-prototype-toast-root', '');
        document.body.append(root);
    }

    return root;
};

const showToast = (message, tone = 'info') => {
    const root = ensureToastRoot();
    const toast = document.createElement('div');
    toast.className = `prototype-toast prototype-toast-${tone}`;
    toast.textContent = message;
    root.append(toast);

    window.setTimeout(() => {
        toast.classList.add('is-leaving');
        window.setTimeout(() => toast.remove(), 240);
    }, 2600);
};

const createModal = () => {
    let modal = document.querySelector('[data-prototype-modal]');

    if (modal) {
        return modal;
    }

    modal = document.createElement('div');
    modal.className = 'prototype-modal';
    modal.hidden = true;
    modal.setAttribute('data-prototype-modal', '');
    modal.innerHTML = `
        <button type="button" class="prototype-modal-backdrop" data-prototype-modal-close aria-label="Tutup preview"></button>
        <article class="prototype-modal-card" role="dialog" aria-modal="true" aria-labelledby="prototype-modal-title">
            <div class="prototype-modal-head">
                <div>
                    <p class="prototype-modal-eyebrow" data-prototype-modal-eyebrow>Preview</p>
                    <h2 id="prototype-modal-title" data-prototype-modal-title></h2>
                </div>
                <button type="button" class="prototype-modal-close" data-prototype-modal-close aria-label="Tutup">x</button>
            </div>
            <div class="prototype-modal-body" data-prototype-modal-body></div>
            <div class="prototype-modal-actions" data-prototype-modal-actions></div>
        </article>
    `;

    document.body.append(modal);
    modal.querySelectorAll('[data-prototype-modal-close]').forEach((button) => {
        button.addEventListener('click', () => {
            modal.hidden = true;
            document.body.classList.remove('prototype-modal-open');
        });
    });

    window.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !modal.hidden) {
            modal.hidden = true;
            document.body.classList.remove('prototype-modal-open');
        }
    });

    return modal;
};

const showModal = ({ eyebrow, title, body, actions = [] }) => {
    const modal = createModal();
    const eyebrowEl = modal.querySelector('[data-prototype-modal-eyebrow]');
    const titleEl = modal.querySelector('[data-prototype-modal-title]');
    const bodyEl = modal.querySelector('[data-prototype-modal-body]');
    const actionsEl = modal.querySelector('[data-prototype-modal-actions]');

    eyebrowEl.textContent = eyebrow || 'Preview';
    titleEl.textContent = title || getPrototypeText('Preview fitur', 'Feature preview');
    bodyEl.innerHTML = body || '';
    actionsEl.innerHTML = '';

    const closeButton = document.createElement('button');
    closeButton.type = 'button';
    closeButton.className = 'primary-button prototype-modal-action';
    closeButton.textContent = getPrototypeText('Mengerti', 'Got it');
    closeButton.addEventListener('click', () => {
        modal.hidden = true;
        document.body.classList.remove('prototype-modal-open');
    });
    actionsEl.append(closeButton);

    actions.forEach((action) => {
        const button = document.createElement('button');
        button.type = 'button';
        button.className = action.className || 'soft-button prototype-modal-action';
        button.textContent = action.label;
        button.addEventListener('click', () => {
            if (typeof action.onClick === 'function') {
                action.onClick();
            }
        });
        actionsEl.append(button);
    });

    modal.hidden = false;
    document.body.classList.add('prototype-modal-open');
};

const renderList = (items) => {
    if (!items || items.length === 0) {
        return '';
    }

    return `<ul class="prototype-preview-list">${items.map((item) => `<li>${item}</li>`).join('')}</ul>`;
};

const parsePreviewItems = (value) => {
    if (!value) {
        return [];
    }

    return value
        .split('|')
        .map((item) => item.trim())
        .filter(Boolean);
};

const setupPrototypePreviews = () => {
    document.querySelectorAll('[data-prototype-preview]').forEach((trigger) => {
        trigger.setAttribute('tabindex', trigger.getAttribute('tabindex') || '0');

        const open = (event) => {
            event.preventDefault();

            const items = parsePreviewItems(trigger.dataset.prototypeItems);
            showModal({
                eyebrow: trigger.dataset.prototypeEyebrow || getPrototypeText('Prototype frontend', 'Frontend prototype'),
                title: trigger.dataset.prototypeTitle || trigger.textContent.trim(),
                body: `
                    <p>${trigger.dataset.prototypeBody || getPrototypeText('Interaksi ini hanya simulasi untuk kebutuhan lomba web design.', 'This interaction is a web design prototype simulation.')}</p>
                    ${renderList(items)}
                `,
            });
        };

        trigger.addEventListener('click', open);
        trigger.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                open(event);
            }
        });
    });
};

const setupPrototypeForms = () => {
    document.querySelectorAll('[data-prototype-form]').forEach((form) => {
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            if (!form.reportValidity()) {
                return;
            }

            const submitButton = form.querySelector('[type="submit"]');
            const originalText = submitButton?.textContent || '';

            if (submitButton) {
                submitButton.disabled = true;
                submitButton.textContent = form.dataset.prototypeLoading || getPrototypeText('Memproses...', 'Processing...');
            }

            window.setTimeout(() => {
                if (submitButton) {
                    submitButton.disabled = false;
                    submitButton.textContent = originalText;
                }

                showModal({
                    eyebrow: getPrototypeText('Simulasi berhasil', 'Simulation complete'),
                    title: form.dataset.prototypeTitle || getPrototypeText('Data demo sudah terbaca', 'Demo data captured'),
                    body: `
                        <p>${form.dataset.prototypeMessage || getPrototypeText('Di versi backend, data ini akan disimpan dan diteruskan ke alur bantuan yang sesuai.', 'In the backend version, this data will be saved and routed to the right support flow.')}</p>
                        <div class="prototype-summary-card">
                            <strong>${getPrototypeText('Status UI', 'UI status')}</strong>
                            <span>${getPrototypeText('Frontend-only, tidak ada data yang dikirim.', 'Frontend-only, no data was sent.')}</span>
                        </div>
                    `,
                });
            }, 520);
        });
    });
};

const setupPrototypeActions = () => {
    document.querySelectorAll('[data-prototype-action]').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();

            if (button.dataset.prototypeToggle === 'true') {
                const active = button.classList.toggle('is-prototype-active');
                button.setAttribute('aria-pressed', active ? 'true' : 'false');
            }

            showToast(button.dataset.prototypeMessage || getPrototypeText('Aksi demo aktif.', 'Demo action is active.'), button.dataset.prototypeTone || 'info');
        });
    });
};

const setupButtonPressFeedback = () => {
    document.addEventListener('click', (event) => {
        const target = event.target.closest('button, .primary-button, .soft-button, .success-button, .danger-button, .bela-live-btn, .halokum-chip, .halokum-tab, .case-card, .tahukum-card, .bela-live-feature-card');

        if (!target) {
            return;
        }

        target.classList.remove('prototype-pressed');
        void target.offsetWidth;
        target.classList.add('prototype-pressed');
        window.setTimeout(() => target.classList.remove('prototype-pressed'), 260);
    });
};

const setupLegalAIDemo = () => {
    const renderResult = (card, kind) => {
        const previous = card.querySelector('[data-demo-result]');
        if (previous) {
            previous.remove();
        }

        const result = document.createElement('div');
        result.className = 'prototype-inline-result';
        result.setAttribute('data-demo-result', '');

        if (kind === 'check') {
            result.innerHTML = `
                <strong>${getPrototypeText('Preview Risk & Clause Check', 'Risk & Clause Check Preview')}</strong>
                <span>${getPrototypeText('Terdeteksi klausul denda tanpa batas nominal, tenggat tanggapan belum jelas, dan bagian yang perlu diverifikasi advokat.', 'Detected an uncapped penalty clause, unclear response deadline, and sections that need advocate verification.')}</span>
                ${renderList([
                    getPrototypeText('Risiko tinggi: denda sepihak', 'High risk: one-sided penalty'),
                    getPrototypeText('Perlu review advokat: pasal 4 dan 7', 'Needs advocate review: clauses 4 and 7'),
                    getPrototypeText('Status: siap masuk brief konsultasi', 'Status: ready for consultation brief'),
                ])}
            `;
        } else {
            result.innerHTML = `
                <strong>${getPrototypeText('Preview Client Brief', 'Client Brief Preview')}</strong>
                <span>${getPrototypeText('Dokumen klien diringkas menjadi brief kerja: pihak terkait, kronologi, kewajiban, dan tenggat penting.', 'The client document is summarized into a work brief: parties, chronology, obligations, and key deadlines.')}</span>
                ${renderList([
                    getPrototypeText('Kronologi awal siap dibaca sebelum konsultasi.', 'Initial chronology is ready before consultation.'),
                    getPrototypeText('Batas revisi dan pembayaran perlu diklarifikasi.', 'Revision limits and payment terms need clarification.'),
                    getPrototypeText('Pertanyaan lanjutan disiapkan untuk sesi advokat.', 'Follow-up questions are prepared for the advocate session.'),
                ])}
            `;
        }

        card.append(result);
        result.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
    };

    document.querySelectorAll('[data-demo-upload-card]').forEach((card) => {
        const kind = card.dataset.demoKind || 'translate';
        const dropzone = card.querySelector('[data-demo-upload]');
        const actionButton = card.querySelector('[data-demo-run]');
        const cancelButton = card.querySelector('[data-demo-cancel]');

        const simulate = () => {
            if (!dropzone) {
                return;
            }

            dropzone.classList.add('is-demo-uploading');
            dropzone.innerHTML = `
                <div class="prototype-uploading">
                    <strong>${getPrototypeText('Membaca dokumen demo...', 'Reading demo document...')}</strong>
                    <span></span>
                </div>
            `;

            window.setTimeout(() => {
                dropzone.classList.remove('is-demo-uploading');
                dropzone.classList.add('is-demo-done');
                dropzone.innerHTML = `
                    <div class="prototype-uploaded">
                        <strong>${getPrototypeText('contoh-dokumen.pdf', 'sample-document.pdf')}</strong>
                        <span>${getPrototypeText('PDF demo siap dianalisis', 'Demo PDF ready to analyze')}</span>
                    </div>
                `;
                renderResult(card, kind);
                showToast(getPrototypeText('Preview analisis muncul di bawah card.', 'Analysis preview appears below the card.'), 'success');
            }, 720);
        };

        dropzone?.addEventListener('click', simulate);
        actionButton?.addEventListener('click', simulate);
        cancelButton?.addEventListener('click', () => {
            const result = card.querySelector('[data-demo-result]');
            result?.remove();
            dropzone?.classList.remove('is-demo-done', 'is-demo-uploading');
            if (dropzone) {
                dropzone.innerHTML = `
                    <div class="mx-auto mb-1 grid h-8 w-8 place-items-center rounded-md border border-[#d4dbe3] bg-[#f9fafb] text-xs text-[#6b7280]" aria-hidden="true">&#11156;</div>
                    <p class="text-[0.95rem] text-[#6b7280]">
                        <a href="#" onclick="return false;" class="font-semibold text-[#2b8de3]">${getPrototypeText('Click to upload', 'Click to upload')}</a>
                        ${getPrototypeText('atau drag and drop', 'or drag and drop')}
                    </p>
                    <small class="text-xs text-[#9ca3af]">PDF (max. 50 MB)</small>
                `;
            }
            showToast(getPrototypeText('Upload demo dibatalkan.', 'Demo upload canceled.'), 'info');
        });
    });

    document.querySelectorAll('[data-demo-doc]').forEach((button) => {
        button.addEventListener('click', () => {
            showModal({
                eyebrow: getPrototypeText('Riwayat brief kerja', 'Work brief history'),
                title: button.dataset.demoDocTitle || getPrototypeText('Preview dokumen', 'Document preview'),
                body: `
                    <p>${getPrototypeText('Contoh preview hasil AI untuk berkas kerja advokat yang pernah dianalisis.', 'Example AI result preview for an advocate work file that was reviewed.')}</p>
                    ${renderList([
                        getPrototypeText('Ringkasan: isu utama dan pihak terkait.', 'Summary: main issue and parties.'),
                        getPrototypeText('Risiko: klausul yang perlu dicek advokat.', 'Risk: clauses that need advocate review.'),
                        getPrototypeText('Aksi berikutnya: lanjut konsultasi atau simpan checklist tindak lanjut.', 'Next action: continue consultation or save follow-up checklist.'),
                    ])}
                `,
            });
        });
    });
};

const setupHaloHukumDemo = () => {
    const shell = document.querySelector('.halokum-shell');

    if (!shell) {
        return;
    }

    shell.querySelectorAll('.halokum-chip').forEach((chip) => {
        chip.addEventListener('click', () => {
            const row = chip.closest('.halokum-chip-row');
            row?.querySelectorAll('.halokum-chip').forEach((item) => item.classList.remove('active'));
            chip.classList.add('active');
            showToast(`${chip.textContent.trim()} ${getPrototypeText('dipilih sebagai filter.', 'selected as filter.')}`, 'success');
        });
    });

    shell.querySelectorAll('.halokum-tab').forEach((tab) => {
        tab.addEventListener('click', () => {
            shell.querySelectorAll('.halokum-tab').forEach((item) => item.classList.remove('active'));
            tab.classList.add('active');
            showToast(`${getPrototypeText('Tab', 'Tab')} ${tab.textContent.trim()} ${getPrototypeText('aktif.', 'active.')}`, 'info');
        });
    });

    shell.querySelectorAll('.halokum-expert-item').forEach((item) => {
        const name = item.querySelector('h3')?.textContent.trim() || getPrototypeText('Pakar hukum', 'Legal expert');
        const specialty = item.querySelector('p')?.textContent.trim() || '';
        const isBusy = item.querySelector('.halokum-status.busy');
        const button = item.querySelector('.halokum-mini-btn');

        button?.addEventListener('click', () => {
            if (isBusy) {
                showToast(getPrototypeText('Advokat sedang sibuk. Slot intake demo belum tersedia.', 'Advocate is busy. Demo intake slot is unavailable.'), 'info');
                return;
            }

            showModal({
                eyebrow: getPrototypeText('Preview intake advokat', 'Advocate intake preview'),
                title: name,
                body: `
                    <p>${specialty}</p>
                    <div class="prototype-chat-preview">
                        <span class="from-user">${getPrototypeText('Klien butuh review somasi dan batas waktunya.', 'Client needs a demand letter review and deadline check.')}</span>
                        <span class="from-expert">${getPrototypeText('Brief masuk, dokumen siap dicek untuk risiko dan langkah awal.', 'Brief received, document is ready for risk and first-step review.')}</span>
                    </div>
                `,
            });
        });
    });

    shell.querySelectorAll('.halokum-topic-item').forEach((topic) => {
        topic.setAttribute('tabindex', '0');
        const openTopic = () => {
            showModal({
                eyebrow: getPrototypeText('Preview intake klien', 'Client intake preview'),
                title: topic.querySelector('h3')?.textContent.trim() || getPrototypeText('Topik komunitas', 'Community topic'),
                body: `
                    <p>${topic.querySelector('p')?.textContent.trim() || ''}</p>
                    ${renderList([
                        getPrototypeText('AI merangkum kebutuhan dan kronologi singkat.', 'AI summarizes the need and short chronology.'),
                        getPrototypeText('Kategori perkara membantu advokat memilih intake relevan.', 'Case category helps advocates choose relevant intakes.'),
                        getPrototypeText('Advokat bisa mengambil konsultasi lanjutan.', 'Advocate can take over further consultation.'),
                    ])}
                `,
            });
        };

        topic.addEventListener('click', openTopic);
        topic.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                openTopic();
            }
        });
    });

    const quickInput = shell.querySelector('input[aria-label="Intake klien cepat"], input[aria-label="Pertanyaan cepat"]');
    const quickButton = shell.querySelector('.halokum-ask-btn');
    quickButton?.addEventListener('click', () => {
        const value = quickInput?.value.trim();

        if (!value) {
            showToast(getPrototypeText('Tulis kebutuhan klien dulu.', 'Write the client need first.'), 'info');
            quickInput?.focus();
            return;
        }

        showModal({
            eyebrow: getPrototypeText('Intake demo terkirim', 'Demo intake submitted'),
            title: value,
            body: `
                <p>${getPrototypeText('Dalam versi backend, intake ini masuk pipeline dan bisa diambil advokat yang sesuai.', 'In the backend version, this intake enters the pipeline and can be picked up by a matching advocate.')}</p>
                ${renderList([
                    getPrototypeText('Kategori otomatis: ketenagakerjaan/bisnis/perdata sesuai isi.', 'Automatic category based on content.'),
                    getPrototypeText('Estimasi respons: kurang dari 24 jam.', 'Estimated response: under 24 hours.'),
                    getPrototypeText('Privasi: nomor kontak tidak tampil di forum.', 'Privacy: contact number is hidden from forum.'),
                ])}
            `,
        });
        quickInput.value = '';
    });
};

const setupScanDemo = () => {
    document.querySelectorAll('[data-scan-preview]').forEach((card) => {
        card.setAttribute('tabindex', '0');
        const open = () => {
            showModal({
                eyebrow: card.dataset.scanEyebrow || getPrototypeText('Preview hasil scan', 'Scan result preview'),
                title: card.dataset.scanTitle || card.querySelector('h2')?.textContent.trim(),
                body: `
                    <p>${card.dataset.scanBody || card.querySelector('p:last-child')?.textContent.trim() || ''}</p>
                    ${renderList(parsePreviewItems(card.dataset.scanItems))}
                `,
            });
        };

        card.addEventListener('click', open);
        card.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                open();
            }
        });
    });
};

const setupJusticeExtraDemo = () => {
    document.querySelectorAll('[data-justice-action]').forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            showToast(button.dataset.justiceMessage || getPrototypeText('Aksi kasus tersimpan di prototype.', 'Case action saved in prototype.'), 'success');
        });
    });
};

syncLanguage();
setupMobileNav();
setupPrototypePreviews();
setupPrototypeForms();
setupPrototypeActions();
setupButtonPressFeedback();
setupLegalAIDemo();
setupHaloHukumDemo();
setupScanDemo();
setupJusticeExtraDemo();
