import './bootstrap';

(function () {
    'use strict'

    const debounce = (func, delay) => {
        let timer;
        return function (...args) {
            clearTimeout(timer);
            timer = setTimeout(() => {
                func.apply(this, args);
            }, delay);
        };
    };

    // currency
    const currency_toggle = document.querySelectorAll('[data-toggle-currency]')
    let current_currency = localStorage.getItem('current_currency')
    const data_modal_currency = document.querySelector('[data-modal-currency]')

    if (currency_toggle) {
        currency_toggle.forEach((el) => {
            el.addEventListener('click', () => {
                if(data_modal_currency) {
                    data_modal_currency.classList.add('hidden')
                }
                if(el.dataset.toggleCurrency=='IDR') {
                    toggleCurrency('IDR')
                }else if (el.dataset.toggleCurrency=='USD') {
                    toggleCurrency('USD')
                }else {
                    if (current_currency == 'IDR') {
                        toggleCurrency('USD')
                    } else {
                        toggleCurrency('IDR')
                    }
                }
            })
        })
    }


    toggleCurrency(current_currency)

    function toggleCurrency(cc) {
        if (cc == 'IDR') {
            localStorage.setItem('current_currency', 'IDR')
            current_currency = 'IDR'
            document.querySelectorAll('[data-display-currency="USD"]').forEach((el) => {
                el.classList.add('hidden')
            })
            document.querySelectorAll('[data-display-currency="IDR"]').forEach((el) => {
                el.classList.remove('hidden')
            })
        } else {
            localStorage.setItem('current_currency', 'USD')
            current_currency = 'USD'
            document.querySelectorAll('[data-display-currency="USD"]').forEach((el) => {
                el.classList.remove('hidden')
            })
            document.querySelectorAll('[data-display-currency="IDR"]').forEach((el) => {
                el.classList.add('hidden')
            })
        }
    }


    const html = document.querySelector('html');
    const body = document.querySelector('body');

    // theme mode ---------------start
    const click_theme = document.querySelectorAll('[data-switch-theme]');
    const theme_key = 'theme-ilsya';

    click_theme.forEach((el) => {
        el.addEventListener('click', () => {
            toggleTheme();
        });
    });

    function toggleTheme() {
        if (html.getAttribute('data-theme') == 'dark') {
            localStorage.setItem(theme_key, 'light');
            html.setAttribute('data-theme', 'light');
        } else {
            localStorage.setItem(theme_key, 'dark');
            html.setAttribute('data-theme', 'dark');
        }
    }
    // theme mode ---------------end

    // modal search ---------------start
    var btn_search = document.querySelectorAll('[data-btn-search]')
    var modal_search = document.querySelector('#modal-search')
    btn_search.forEach(btn => {
        btn.addEventListener('click', (event) => {
            event.preventDefault()
            toggleModalSearch(true)
        })
    })

    if(modal_search){
        //placeholder typed effect
        let s_currentText = "";
        let s_currentIndex = 0;
        let s_currentCharIndex = 0;
        let s_placeholderTexts = ['Search for something...', '#LICENSE-XXXX-XXXX-XXXX']

        function typeEffect() {
            if (s_currentCharIndex < s_placeholderTexts[s_currentIndex].length) {
                s_currentText += s_placeholderTexts[s_currentIndex][s_currentCharIndex];
                modal_search.querySelector('input').setAttribute('placeholder', s_currentText);
                s_currentCharIndex++;
                setTimeout(typeEffect, 100); // Waktu tunggu antara setiap karakter (dalam milidetik)
            } else {
                // Reset variabel jika sudah mencapai akhir teks
                s_currentCharIndex = 0;
                s_currentText = "";
                s_currentIndex = (s_currentIndex + 1) % s_placeholderTexts.length; // Beralih ke teks berikutnya
                setTimeout(typeEffect, 2000); // Waktu tunggu antara setiap teks (dalam milidetik)
            }
        }

        typeEffect()

        modal_search.querySelector('input').addEventListener('keyup', debounce(function (e) {
            modal_search.querySelector('#result').classList.remove('min-h-[20rem]')
            modal_search.querySelector('#result').innerHTML = ''
            modal_search.querySelector('#empty').classList.add('hidden')
            if(!e.target.value.length) return
            modal_search.querySelector('#indicator-loading').classList.remove('hidden')
            let querysearch = encodeURIComponent(e.target.value)
            if(e.target.value.startsWith('#')){
                if(e.target.value.length == 1){
                    modal_search.querySelector('#empty').classList.remove('hidden')
                    modal_search.querySelector("#empty").innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-900 dark:text-gray-300 text-opacity-40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path><path d="M12 16v.01"></path><path d="M12 13a2 2 0 0 0 .914 -3.782a1.98 1.98 0 0 0 -2.414 .483"></path></svg><p class="mt-4 text-sm text-gray-900 dark:text-gray-400">License Require<br>Example: #LICENSE-XXX-XXX-XXX-XXX</p>`
                    modal_search.querySelector('#indicator-loading').classList.add('hidden')
                    return
                }
            }
            axios.get(document.querySelector('meta[name="base_url"]').getAttribute('content') + '/search?q=' + querysearch)
                .then(function (response) {
                    if(response.data.for == 'search'){
                        if(response.data.result.length > 0){
                            var ul = document.createElement('ul')
                            ul.classList.add('max-h-80', 'min-h-0', 'scroll-py-2', 'divide-x-0', 'divide-y', 'divide-gray-500', 'divide-opacity-10', 'overflow-x-hidden', 'overflow-y-auto')
                            modal_search.querySelector('#result').appendChild(ul)
                            ul.classList.add('min-h-[20rem]')
                            function delayForEach(array, callback, delay) {
                                array.forEach((item, index) => {
                                    setTimeout(() => {
                                        callback(item, index);
                                    }, index * delay);
                                });
                            }

                            delayForEach(response.data.result, (item, index) => {
                                var a = document.createElement('a')
                                a.href = item.url
                                a.classList.add('group', 'animate-fade-in-left-bounce','flex', 'cursor-pointer', 'select-none', 'items-center', 'rounded-md', 'px-3', 'py-2', 'hover:bg-gray-900', 'hover:bg-opacity-5', 'dark:hover:bg-gray-900')
                                if(item.type == 'item') {
                                    a.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-none text-gray-900 dark:text-gray-400 text-opacity-40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5"></path><path d="M12 12l8 -4.5"></path><path d="M12 12l0 9"></path><path d="M12 12l-8 -4.5"></path></svg>`
                                } else {
                                    a.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 flex-none text-gray-900 dark:text-gray-400 text-opacity-40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M8 21h8a5 5 0 0 0 5 -5v-3a3 3 0 0 0 -3 -3h-1v-2a5 5 0 0 0 -5 -5h-4a5 5 0 0 0 -5 5v8a5 5 0 0 0 5 5z"></path><path d="M7 7m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h3a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-3a1.5 1.5 0 0 1 -1.5 -1.5z"></path><path d="M7 14m0 1.5a1.5 1.5 0 0 1 1.5 -1.5h7a1.5 1.5 0 0 1 1.5 1.5v0a1.5 1.5 0 0 1 -1.5 1.5h-7a1.5 1.5 0 0 1 -1.5 -1.5z"></path></svg>`
                                }
                                a.innerHTML += `<span class="ml-3 flex-auto truncate dark:text-gray-200">${item.title}</span><span class="jump ml-3 hidden flex-none text-gray-500 group-hover:block">Jump to...</span>`
                                ul.appendChild(a)
                            }, 80);
                        }else{
                            modal_search.querySelector('#empty').classList.remove('hidden')
                            modal_search.querySelector("#empty").innerHTML = `<svg class="mx-auto h-6 w-6 text-gray-900 dark:text-gray-300 text-opacity-40" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" /></svg><p class="mt-4 text-sm text-gray-900 dark:text-gray-400">We couldn't find any items with that term. Please try again.</p>`
                        }
                    } else if(response.data.for == 'license'){
                        if(response.data.error){
                            modal_search.querySelector('#empty').classList.remove('hidden')
                            modal_search.querySelector("#empty").innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-6 w-6 text-gray-900 dark:text-gray-300 text-opacity-40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M9 10l.01 0"></path><path d="M15 10l.01 0"></path><path d="M9 15l6 0"></path></svg><p class="mt-4 text-sm text-gray-900 dark:text-gray-400">${response.data.error}</p>`
                        }else{
                            var resultforlicense = document.createElement('div')
                            resultforlicense.innerHTML = `<div class="py-14 px-6 text-center sm:px-14 animate-popup-in"><svg xmlns="http://www.w3.org/2000/svg" class="mx-auto animate-spin h-6 w-6 text-gray-900 dark:text-gray-300 text-opacity-40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M9 10l.01 0"></path><path d="M15 10l.01 0"></path><path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path></svg><p class="mt-4 text-sm text-gray-900 dark:text-gray-400">${response.data.result.item}<br>License available. Click the "claim" button below to proceed.<br><br><a class="btn-gradient w-full p-3 rounded-full font-semibold text-white block" href="${response.data.result.url}">CLAIM</a> </p></div>`
                            modal_search.querySelector('#result').appendChild(resultforlicense)
                        }
                    }
                    modal_search.querySelector('#indicator-loading').classList.add('hidden')
                }).catch(function (error) {
                    modal_search.querySelector('#indicator-loading').classList.add('hidden')
                    console.log(error);
                })
        }, 450))
    }

    const overlay = document.querySelector('#modal-search .modal-overlay')
    if(overlay){
        overlay.addEventListener('click', () => {
            toggleModalSearch(false)
        })
    }

    // if input focus
    if(document.getElementById('navbarsearchdash')){
        document.getElementById('navbarsearchdash').addEventListener('focus', () => {
            toggleModalSearch(true)
        })
    }

    document.querySelectorAll('#modal-search .modal-close').forEach(close => {
        close.addEventListener('click', () => {
            toggleModalSearch(false)
        })
    })

    document.onkeydown = function (evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-search-active')) {
            toggleModalSearch(false)
        }

        // if focus on input,textarea, select radio checkbox nothing happen
        if (document.activeElement.tagName == 'INPUT' || document.activeElement.tagName == 'TEXTAREA' || document.activeElement.tagName == 'SELECT' || document.activeElement.tagName == 'RADIO' || document.activeElement.tagName == 'CHECKBOX') {
            return
        }

        // key f
        if (evt.keyCode == 70) {
            evt.preventDefault()
            if (document.body.classList.contains('modal-search-active')) {
                toggleModalSearch(false)
            } else {
                toggleModalSearch(true)
            }
        }

        // key q
        if (evt.keyCode == 81) {
            evt.preventDefault()
            if (document.body.classList.contains('quick-access-active')) {
                toggleQuickAccess(false)
            } else {
                toggleQuickAccess(true)
            }
        }

        // if esc
        if (evt.keyCode == 27 && document.body.classList.contains('quick-access-active')) {
            evt.preventDefault()
            toggleQuickAccess(false)
        }

        // key d
        if (evt.keyCode == 68) {
            evt.preventDefault()
            toggleTheme()
        }
    };

    function toggleModalSearch(event) {
        if(!modal_search) return
        if (event) {
            toggleQuickAccess(false)
            modal_search.classList.remove('hidden')
            // autofocus input
            modal_search.querySelector('input').focus()
            // set input value
            modal_search.querySelector('input').value = ''
            modal_search.querySelector('#result').innerHTML = ''
            modal_search.querySelector('#empty').classList.add('hidden')
            // disabled scroll
            body.classList.add('overflow-hidden', 'pr-[5px]')
            modal_search.classList.add('flex')
            setTimeout(() => {
                modal_search.querySelector('.modal-overlay').classList.remove('opacity-0')
                modal_search.querySelector('.modal-container').classList.remove('opacity-0', '-translate-y-4')
            }, 100)
            body.classList.add('modal-search-active')

        } else {
            modal_search.querySelector('.modal-overlay').classList.add('opacity-0')
            modal_search.querySelector('.modal-container').classList.add('opacity-0', '-translate-y-4')
            body.classList.remove('overflow-hidden', 'pr-[5px]')
            setTimeout(() => {
                modal_search.classList.add('hidden')
                modal_search.classList.remove('flex')
            }, 300)
            body.classList.remove('modal-search-active')
        }
    }
    // modal search ---------------end


    // navbar -------------start

    var navbar = document.querySelector('#navbar')
    // if .on-scroll-static  exist
    if(navbar){
        if (!navbar.classList.contains('on-scroll-static')) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 0) {
                    navbar.classList.remove('border-none')
                    navbar.classList.add('bg-white/70')
                    navbar.classList.add('shadow-sm')
                    navbar.classList.add('backdrop-blur-lg')
                    navbar.classList.remove('backdrop-blur')
                    navbar.classList.add('dark:bg-slate-950/80')
                } else {
                    navbar.classList.remove('bg-white/70')
                    navbar.classList.add('border-none')
                    navbar.classList.remove('shadow-sm')
                    navbar.classList.add('backdrop-blur')
                    navbar.classList.remove('backdrop-blur-lg')
                    navbar.classList.remove('dark:bg-slate-950/80')
                }
            })
        } else {
            navbar.classList.remove('border-none')
            navbar.classList.add('bg-white/70')
            navbar.classList.add('dark:bg-slate-950/80')
        }
    }

    // navbar -------------end


    // quick access start
    const click_quick_access = document.querySelector('[data-quick-access="click"]')
    const quick_access = document.getElementById('quick-access');
    if(click_quick_access){
        if (quick_access) {
            click_quick_access.addEventListener('click', () => {
                toggleQuickAccess(true)
            })

            quick_access.querySelectorAll('[data-quick-access="close"]').forEach((el) => {
                el.addEventListener('click', () => {
                    toggleQuickAccess(false)
                })
            })
        }
    }

    function toggleQuickAccess(event) {
        if (quick_access) {
            if (event) {
                toggleModalSearch(false)
                body.classList.add('overflow-hidden', 'quick-access-active', 'pr-[5px]')
                quick_access.classList.remove('hidden')
                setTimeout(() => {
                    quick_access.classList.remove('opacity-0')

                    // transfrom translate y content
                    let timeout = 0
                    quick_access.querySelectorAll('[data-list-translate="-y"]').forEach((el) => {
                        timeout = (timeout + 100)
                        setTimeout(() => {
                            el.classList.remove('-translate-y-3', 'opacity-0')
                        }, timeout)
                    })

                    timeout = 0
                    quick_access.querySelectorAll('[data-list-translate="-x"]').forEach((el) => {
                        timeout = (timeout + 100)
                        setTimeout(() => {
                            el.classList.remove('-translate-x-3', 'opacity-0')
                        }, timeout)
                    })
                    // quick access end
                }, 50)
            } else {
                body.classList.remove('overflow-hidden', 'quick-access-active', 'pr-[5px]')
                quick_access.classList.add('opacity-0')
                setTimeout(() => {
                    quick_access.classList.add('hidden')
                    quick_access.querySelectorAll('[data-list-translate="-y"]').forEach((el) => {
                        el.classList.add('-translate-y-3', 'opacity-0')
                    })
                    quick_access.querySelectorAll('[data-list-translate="-x"]').forEach((el) => {
                        el.classList.add('-translate-x-3', 'opacity-0')
                    })
                }, 300)
            }
        }
    }




    var clock = document.getElementById("clock"); // Mendapatkan elemen dengan ID "clock"
    if (clock) {
        setInterval(function(){
            var now = new Date(); // Mendapatkan objek tanggal dan waktu saat ini

            // Format jam dan tanggal
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var day = now.getDate();
            var month = now.getMonth() + 1; // Perhatikan bahwa bulan dimulai dari 0 (Januari = 0)
            var year = now.getFullYear();

            // Menambahkan angka 0 di depan jika jam, menit, atau detik hanya satu digit
            hours = hours < 10 ? "0" + hours : hours;
            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            // Mengupdate konten elemen "clock" dengan jam dan tanggal
            clock.textContent = hours + ":" + minutes + ":" + seconds + " - " + day + "/" + month + "/" + year;
        }, 1000);
    }

    // already anytime
    document.querySelectorAll('[data-scroll-top="click"]').forEach((block) => { block.addEventListener('click', () => { window.scrollTo({ top: 0, behavior: 'smooth' }); }); });
})()
